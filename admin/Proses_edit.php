<?php
	include 'Connection.php';
	$kode=$_GET['kode_barang'];
	$stok=$_GET['stok'];
	$harga=$_GET['harga'];
	
	$sqlUpdate="update elektronik set stok = ".$stok.", harga = ".$harga." where kode_barang='".$kode."'";
	
	$Procces_update = $conn->query($sqlUpdate);
	if ($Procces_update) {
		echo'<script type = "text/javascript">';
		echo 'window.location="index.php"';
		echo '</script>';
	}else{
		echo "Data tidak berhasil di edit";
		var_dump($sqlUpdate);
	}
	
?>