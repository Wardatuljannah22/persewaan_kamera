<html>
<head>
	<title>Transaksi</title>
	<link rel="stylesheet" type="text/css" href="index.css" />
	<style>
		* {
		  box-sizing: border-box;
		}
		body {
		  font-family: Arial;
		  padding: 10px;
		  background: #f1f1f1;
		}
		.header {
		  padding: 30px;
		  text-align: center;
		  background: white;
		}
		.header h1 {
		  font-size: 50px;
		}
		.topnav {
		  overflow: hidden;
		  background-color: #333;
		}
		.topnav a {
		  float: left;
		  display: block;
		  color: #f2f2f2;
		  text-align: center;
		  padding: 14px 16px;
		  text-decoration: none;
		}
		.topnav a:hover {
		  background-color: #ddd;
		  color: black;
		  padding: 14px 16px;

		}
		.leftcolumn {   
		  float: left;
		  width: 100%;
		}
		.card {
		  background-color: white;
		  padding: 20px;
		  margin-top: 20px;
		}
		.row:after {
		  content: "";
		  display: table;
		  clear: both;
		}
		.footer {
		  padding: 20px;
		  text-align: center;
		  background: #ddd;
		  margin-top: 20px;
		}
		table{
			font-family: sans-serif;
		    color: #444;
		    border-collapse: collapse;
		    width: 50%;
		    border: 1px solid #f2f5f7;
		}
		table tr th{
			background: #35A9DB;
		    color: #fff;
		    font-weight: normal;
		}
		table th td {
			padding: 8px 20px;
		    text-align: center;
		}
		table tr:hover {
		    background-color: #f5f5f5;
		} 
		table tr:nth-child(even) {
		    background-color: #f2f2f2;
		}
		button {
		  background-color: #e5ac10; /* Green */
		  border: none;
		  color: white;
		  padding: 10px 20px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 14px;
		  margin: 4px 2px;
		  cursor: pointer;
		  transition-duration: 0.4s;
		}
		button:hover {
		  box-shadow: 0 12px 16px 0 rgb(130, 96, 5),0 17px 50px 0 rgb(214, 178, 83);
		}
	</style>
</head>
<body>
	<header class="header"><h2>TOKO ELEKTRONIK MAKMUR SEJAHTERA  </h2></header>
	<nav class="topnav">
		<a href="index.php" style="padding-top: 32px;">Data Barang</a>  
		<a href="frmPenjualan.php" style="padding-top: 32px;">Data Penjualan</a> 
		<a href="logout.php" style="float:right; padding-top: 20px;"> <img src="img/icon.png" width="30px;"></a>
	</nav>
	<div class="row">
		<content class="leftcolumn">
			<div class="card">
				<h2><center>Data Pembeli</center></h2>
					<hr>
					<br>
					<br>

		<form action="frmInsertTransPenjualanFunction.php" method="post">
			<?php
				session_start();
				include 'Connection.php';
				$SQLRecordTransaksi = mysqli_query($conn,"SELECT kode_penjualan FROM tbl_penjualan");
				$JumTrans = mysqli_num_rows($SQLRecordTransaksi);
				$KodeTransaksiPenjualanNew = "TRNS-0".($JumTrans + 1);

				// $result = mysqlI_query($conn,"SELECT * FROM admin WHERE id='" . $_SESSION["id"] . "'");
				// $row  = mysqli_fetch_array($result);

				
				echo '<table border="1">
				<tr>
					<td>Kode Transaksi</td>
					<td><input type="text" readonly="" name="kode_transaksi" value="'.$KodeTransaksiPenjualanNew.'" required style="width: 300px; height: 30px;"/></td>
				<tr>
					<td>Nama Pembeli</td>
					<td><input type="text" name="nama_pembeli" value="" required style="width: 300px; height: 30px;"/></td>
				</tr>
				<tr>
					<td>Alamat Pembeli</td>
					<td><input type="text" name="alamat_pembeli" value="" required style="width: 300px; height: 30px;"/></td>
				</tr>
				<tr>
					<td>Telepon</td>
					<td><input type="text" name="telpon_pembeli" required style="width: 300px; height: 30px;"/></td>
				</tr>
				<tr>
					<td></td>
					<td><button type="submit" name="Submit_pembelian" value="Selanjutnya">Selanjutnya</button></td>
				</tr>
			</table>';
			?>
		
				</form>
				<br>
			</div>
		</content>
	</div>
	<footer class="footer"> 
		<h4><marquee>Develop By : Khoirudin Ansori<br> &nbsp;&nbsp;&nbsp;Program Pendidikan Vokasi<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Universitas Brawijaya</marquee></h4>
	</footer>	
</body>

</html>