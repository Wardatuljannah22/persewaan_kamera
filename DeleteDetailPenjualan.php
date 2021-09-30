<?php
	include 'conn.php';
	
	$kode_kamera=$_GET['kode_kamera'];
	
	$Query_delete="DELETE FROM tbl_detailpenjualan WHERE kode_kamera='$kode_kamera'";
	$Procces_Delete=mysqli_query($conn, $Query_delete);
	if ($Procces_Delete) {
		echo'<script type = "text/javascript">';
		echo 'window.location="detail_tranPenjualan.php"';
		echo '</script>';
	}else{
		echo "Data Failed";
	}
?>