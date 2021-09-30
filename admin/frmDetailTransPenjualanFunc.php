<?php
	include 'Connection.php';
	
	$kode_penjualan = $_POST['kode_transaksi'];
	$kode_barang = $_POST['kode_barang'];
	$jumlah_jual = $_POST['jumlah_jual'];

	
	$sqlSearchHarga = "SELECT harga FROM elektronik WHERE kode_barang='$kode_barang'";
	$row = mysqli_query($conn, $sqlSearchHarga);
	$harga = mysqli_fetch_array($row);
	
	$total = $jumlah_jual * $harga[0];
	
	
	$sqlInsertDetTransPenjualan="INSERT INTO tbl_detailpenjualan (kode_penjualan,
														 kode_barang,
														 jumlah_jual,
														 total) 
												values 
														 ('$kode_penjualan',
														  '$kode_barang',
														  '$jumlah_jual',
														  '$total')";

	$sqlSelectPenjualan = "select stok from elektronik  where kode_barang='$kode_barang'";
	$row = mysqli_query($conn, $sqlSelectPenjualan);
	$stok = mysqli_fetch_array($row);
	
	$total =  $stok[0] - $jumlah_jual;
	$sqlUpdatePenjualan="update elektronik set stok = '$total' where kode_barang='$kode_barang'";
	mysqli_query($conn, $sqlUpdatePenjualan);


	$ProccesInsert = mysqli_query($conn, $sqlInsertDetTransPenjualan);
	if ($ProccesInsert) {
		echo'<script type = "text/javascript">';
		echo 'window.location="frmDetailTransPenjualan.php"';
		echo '</script>';
	}else {
		var_dump($sqlInsertTransPenjualan);
	}
	
?>