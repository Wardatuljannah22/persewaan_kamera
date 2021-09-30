<?php
	include 'Connection.php';

	$kode_barang=$_GET['kode_barang'];
	$stokjual = $_GET['stok'];

	$sqlSelectPenjualan="SELECT stok from elektronik where kode_barang='$kode_barang'";
	$row = mysqli_query($conn, $sqlSelectPenjualan);
	$stok = mysqli_fetch_array($row);

	$total =$stok[0] + $stokjual;

	$sqlUpdatePenjualan = "update elektronik set stok = '$total' where kode_barang='$kode_barang'";
	mysqli_query($conn, $sqlUpdatePenjualan); 
	
	$Query_delete="DELETE FROM tbl_detailpenjualan WHERE kode_barang='$kode_barang'";
	$Procces_Delete=mysqli_query($conn, $Query_delete);
	if ($Procces_Delete) {
		echo'<script type = "text/javascript">';
		echo 'window.location="frmDetailTransPenjualan.php"';
		echo '</script>';
	}else{
		echo "Data Failed";
	}
?>