<?php
	include 'conn.php';
	session_start();
	$kode_sewa = $_POST['kode_sewa'];
	$kode_admin = $_POST['kode_admin'];
	$nama_penyewa = $_POST['nama_penyewa'];
	$alamat = $_POST['alamat'];
	$telpon = $_POST['telpon'];
	
	
	$_SESSION['kode_transaksiSewa'] = $kode_sewa;
	
	$sqlInsertTransPenjualan="INSERT INTO tbl_penjualan (kode_sewa,
														 kode_admin,
														 tgl_sewa,
														 nama_penyewa,
														 alamat,
														 telpon) 
												values 
														 ('$kode_sewa',
														  '$kode_admin',
														  NOW(),
														  '$nama_penyewa',
														  '$alamat',
														  '$telpon')";
	$ProccesInsert = mysqli_query($conn, $sqlInsertTransPenjualan);
	if ($ProccesInsert) {
		echo'<script type = "text/javascript">';
		echo 'window.location="detail_tranPenjualan.php"';
		echo '</script>';
	}else {
		var_dump($sqlInsertTransPenjualan);
	}
	
?>