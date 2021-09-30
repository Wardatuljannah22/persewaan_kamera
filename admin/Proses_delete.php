<?php
	include 'Connection.php';
	
	$kode=$_GET['kode_barang'];
	$Query_delete="delete from elektronik WHERE kode_barang='".$kode."'";
	$Procces_Delete=$conn->query($Query_delete);
	
	if ($Procces_Delete) {
		echo'<script type = "text/javascript">';
		echo 'window.location="index.php"';
		echo '</script>';
	}else{
		echo "Data Failed";
	}
?>