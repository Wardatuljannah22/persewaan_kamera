<?php
	include 'conn.php';
	
	$kode_kamera=$_GET['kode_kamera'];
	$Query_delete="delete from data_kamera WHERE kode_kamera='".$kode_kamera."'";
	$Procces_Delete=$conn->query($Query_delete);
	
	if ($Procces_Delete) {
		echo'<script type = "text/javascript">';
		echo 'window.location="data_kamera.php"';
		echo '</script>';
	}else{
		echo "Data Failed";
	}
?>