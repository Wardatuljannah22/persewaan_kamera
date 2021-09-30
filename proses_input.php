<?php
	include 'conn.php';
	$kode_kamera = $_GET["kode_kamera"];
    $nama_barang = $_GET["nama_barang"];
    $stok = $_GET["stok"];
	$harga_sewa = $_GET["harga_sewa"];
		
	$sql = "INSERT INTO data_kamera (kode_kamera, nama_barang, stok, harga_sewa) VALUES ('".$kode_kamera."', '".$nama_barang."', ".$stok.", ".$harga_sewa.")";
	
	$Procces_insert = $conn->query($sql);
	if (Procces_insert) {
		echo'<script type = "text/javascript">';
		echo 'window.location="data_kamera.php"';
		echo '</script>';
	}else{
		echo "Data tidak berhasil di edit";
		var_dump($sqlUpdate);
	}
?>