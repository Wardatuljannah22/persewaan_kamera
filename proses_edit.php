<?php 
	include 'conn.php';
	$kode_kamera = $_GET["kode_kamera"];
    $nama_barang = $_GET["nama_barang"];
    $stok = $_GET["stok"];
	$harga_sewa = $_GET["harga_sewa"];
		
	$sqlUpdate="UPDATE data_kamera SET kode_kamera ='".$kode_kamera."',nama_barang ='".$nama_barang."',stok ='".$stok."',harga_sewa =".$harga_sewa." WHERE kode_kamera= '".$kode_kamera."'";
	
	
	$Procces_update = $conn->query($sqlUpdate);
	if($Procces_update) {
		echo '<script type = "text/javascript">';
		echo 'window.location="data_kamera.php"';
		echo '</script>';
	}else{
		echo "Data tidak berhasil di edit";
		var_dump($sqlUpdate);
	}
?>
