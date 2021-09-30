<?php
	include 'conn.php';
	
	$kode_sewa = $_POST['kode_sewa'];
	$kode_kamera = $_POST['kode_kamera'];
	
	$sqlSearchHarga = "SELECT harga_sewa FROM data_kamera WHERE kode_kamera='$kode_kamera'";
	$row = mysqli_query($conn, $sqlSearchHarga);
	$harga_sewa = mysqli_fetch_array($row);
	
	$total = $harga_sewa[0];
	
	
	$sqlInsertDetTransPenjualan="INSERT INTO tbl_detailpenjualan (kode_sewa,
														 kode_kamera,
														 total) 
												values 
														 ('$kode_sewa',
														  '$kode_kamera',
														  '$total')";
	$ProccesInsert = mysqli_query($conn, $sqlInsertDetTransPenjualan);
	if ($ProccesInsert) {
		echo'<script type = "text/javascript">';
		echo 'window.location="detail_TranPenjualan.php"';
		echo '</script>';
	}else {
		var_dump($sqlInsertDetTransPenjualan);
	}
	
?>