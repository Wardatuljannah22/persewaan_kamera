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
				<h1><center>Data Transaksi</center></h1>
				<hr>
				<br>
				<br>
				<?php
					session_start();
					include 'Connection.php';
					$SQLRecordTransaksi = mysqli_query($conn,"SELECT kode_penjualan FROM tbl_penjualan");
					$JumTrans = mysqli_num_rows($SQLRecordTransaksi);
					$KodeTransaksiPenjualanNew = "SPL0".($JumTrans + 1);
					echo "<form action='frmDetailTransPenjualanFunc.php' method='post'>
						<table border='3px solid gold'>
							<tr>
								<td><b>Kode Transaksi</b></td>
								<td><input type='hidden' name='kode_transaksi' value='".$_SESSION['kode_transaksiPenjualan']."' /><label font-size:40px;>".$_SESSION['kode_transaksiPenjualan']."</label></td>
							</tr>
							<tr>
								<td><b>Kode Barang</b></td>
								<td><select name='kode_barang' style='width: 300px; height: 30px;'>";
								?>
								<?php
								include 'Connection.php';
								$result = mysqli_query($conn, "SELECT * FROM elektronik");
								while ($row = mysqli_fetch_array($result)) {
									echo "<option value='$row[kode_barang]' >$row[nama_barang] - $row[harga]</option>";
								}													
									echo "</select>
								</td>
							</tr>
							<tr>
								<td><b>Jumlah Yang Di Beli</b></td>
								<td><input type='text' name='jumlah_jual' value='' requiered style='width: 150px; height: 30px;'/></td>
							</tr>
							<tr>
								<td></td>
								<td><button type='submit' name='submit' style='width: 250px; height: 35px; border-radius:10px;'>Tambahkan Ke Keranjang</button></td>
							</tr>
						</table>
					</form>";
					echo "<table>
						<tr>
							<th>Kode Transaksi</th>
							<th>Nama Barang</th>
							<th>Jumlah</th>
							<th>Harga barang</th>
							<th>Total</th>
							<th>Aksi</th>
						</tr>";
					$sql="SELECT a.kode_penjualan,
								 a.kode_barang,
								 b.nama_barang,
								 a.jumlah_jual,
								 b.harga,
							 	a.total
						  FROM tbl_detailpenjualan as a, elektronik as b 
						  WHERE a.kode_barang=b.kode_barang AND kode_penjualan='".$_SESSION['kode_transaksiPenjualan']."'";
					$result = mysqli_query($conn, $sql);
					while ($row=mysqli_fetch_array($result)){
						echo "<tr>
							<td>$row[kode_penjualan]</td>
							<td>$row[nama_barang]</td>
							<td>$row[jumlah_jual]</td>
							<td>$row[harga]</td>
							<td>$row[total]</td>
							<td><a href=frmDeleteDetailPenjualan.php?kode_barang=$row[kode_barang]&&stok=$row[jumlah_jual]><button style='border-radius:10px;'>Batal</button></a></td>
						</tr>";
					}
					echo "</table>";
					$sqlTotal = "SELECT SUM(total) FROM tbl_detailpenjualan WHERE kode_penjualan='".$_SESSION['kode_transaksiPenjualan']."'";
					$result = mysqli_query($conn, $sqlTotal);
					$total =0;
					while ($row =  mysqli_fetch_array($result)) {
						$total = $row[0];
					}
					echo "<h1>Total Pembelian</h1>";
					echo "<h1>Rp ".$total."  ,-</h1>";
					$_SESSION['total_penjualan'] = $total;
					echo "<form action='frmPembayaran.php' method='post'>
						<input type='hidden' name='kode_penjualan' value='".$_SESSION['kode_transaksiPenjualan']."' />
						<button type='submit' value='Lanjut pembayaran' style='width: 200px; height: 50px; border-radius:10px;'>Lanjut Pembayaran</button>
			  		</form>";
				?>
			</div>
		</content>
	</div>
	<footer class="footer"> 
		<h4><marquee>Develop By : Khoirudin Ansori<br> &nbsp;&nbsp;&nbsp;Program Pendidikan Vokasi<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Universitas Brawijaya</marquee></h4>
	</footer>
</body>
</html>