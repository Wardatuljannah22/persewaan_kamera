<?php
	include 'Connection.php';
	session_start();
	$kode_penjualan = $_POST['kode_transaksi'];
	$nama_pembeli = $_POST['nama_pembeli'];
	$alamat_pembeli = $_POST['alamat_pembeli'];
	$telpon_pembeli = $_POST['telpon_pembeli'];
	
	$_SESSION['kode_transaksiPenjualan'] = $kode_penjualan;
	
	$sqlInsertTransPenjualan="INSERT INTO tbl_penjualan (kode_penjualan,
														 tgl_penjualan,
														 nama_pembeli,
														 alamat_pembeli,
														 telepon_pembeli) 
												values 
														 ('$kode_penjualan',
														  NOW(),
														  '$nama_pembeli',
														  '$alamat_pembeli',
														  '$telpon_pembeli')";
	$ProccesInsert = mysqli_query($conn, $sqlInsertTransPenjualan);
	if ($ProccesInsert) {
		echo'<script type = "text/javascript">';
		echo 'window.location="frmDetailTransPenjualan.php"';
		echo '</script>';
	}else {
		var_dump($sqlInsertTransPenjualan);
	}
	
?>