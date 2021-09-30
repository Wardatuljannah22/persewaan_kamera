<?php 
	include 'Connection.php';
	$kode=$_GET['kode_barang'];
	$nama=$_GET['nama_barang'];
	$stok=$_GET['stok'];
	$harga=$_GET['harga'];	

	$sql = "INSERT INTO elektronik (kode_barang, nama_barang, stok, harga ) VALUES ('".$kode."','".$nama."',".$stok.",".$harga.")";
	
	$Procces_Insert = $conn->query($sql);
	if (Procces_Insert) {
		header("location: index.php");
	}else{
		echo "Data tidak berhasil di edit";
		var_dump($sqlUpdate);
	}
?>