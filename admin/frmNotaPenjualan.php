<html>
<head>
	<title>Nota</title>
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
	<header class="header"><h1>TOKO ELEKTRONIK MAKMUR SEJAHTERA  </h1></header>
	<nav class="topnav">
		<a href="index.php" style="padding-top: 32px;">Data Barang</a>  
		<a href="frmPenjualan.php" style="padding-top: 32px;">Data Penjualan</a> 
		<a href="logout.php" style="float:right; padding-top: 20px;"> <img src="img/icon.png" width="30px;"></a>
	</nav>
	<div class="row">
		<content class="leftcolumn">
			<div class="card">
				<h2><center>Pembayaran</center></h2>
				<hr>
				<br>
				<br>
				<form action="frmPenjualan.php">
					<button type="submit" name="Finish" value="Transaksi Selesai" style='width: 150px; height: 70px; border-radius: 10px; color: black;'><b> Transaksi Selesai</b></button>
				</form>	
				<br>
				<?php
					include 'Connection.php';
					session_start();
					$kode_transaksi = $_SESSION['kode_transaksiPenjualan'];
					$total_penjualanTr = $_SESSION['total_penjualan'];
					$bayar = $_POST['bayar'];
					if ($bayar <= $total_penjualanTr) {
						echo "<script>alert('Mohon Bayar Dengan Uang Lebih Atau Pas');window.location='frmPembayaran.php'</script>";
					}else {
						$kembalian = $bayar - $total_penjualanTr;
						$Query_update="UPDATE tbl_penjualan SET total_penjualan=".$total_penjualanTr.",
													Bayar=".$bayar.",
													Kembali=".$kembalian." WHERE kode_penjualan='$kode_transaksi'";
						$Procces_update=mysqli_query($conn, $Query_update);				
					}
					
					$sqlFinishPenjualan = "SELECT * FROM tbl_penjualan WHERE kode_penjualan='$kode_transaksi'";
					$result = mysqli_query($conn, $sqlFinishPenjualan);
					while ($row=mysqli_fetch_array($result)) {
						$TrTanggal = $row['tgl_penjualan'];
						$Trnama_pembeli =  $row['nama_pembeli'];
						$Tralamat_pembeli = $row['alamat_pembeli'];
						$Trtelpon_pembeli = $row['telepon_pembeli'];
						$Trtotal_penjualan = $row['total_penjualan'];
						$TrBayar = $row['bayar'];
						$TrKembali = $row['kembali'];
					}
					echo "
					<table>
						<tr>
							<th style='background:#80f4fc; color:black; border:2px solid #150cc9;'>Kode Penjualan</th>
							<td style=' color:black; border:2px solid #150cc9;'>$kode_transaksi</td>
						</tr>
						<tr>
							<th style='background:#80f4fc; color:black; border:2px solid #150cc9;'>Tanggal Transaksi</th>
							<td style=' color:black; border:2px solid #150cc9;'>$TrTanggal</td>
						</tr>
						<tr>
							<th style='background:#80f4fc; color:black; border:2px solid #150cc9;'>Nama Pembeli</th>
							<td style=' color:black; border:2px solid #150cc9;'>$Trnama_pembeli</td>
						</tr>
						<tr>
							<th style='background:#80f4fc; color:black; border:2px solid #150cc9;'>Alamat Pembeli</th>
							<td style=' color:black; border:2px solid #150cc9;'>$Tralamat_pembeli</td>
						</tr>
						<tr>
							<th style='background:#80f4fc; color:black; border:2px solid #150cc9;'>Telepon Pembeli</th>
							<td style=' color:black; border:2px solid #150cc9;'>$Trtelpon_pembeli</td>
						</tr>
						<tr>
							<th style='background:#80f4fc; color:black; border:2px solid #150cc9;'>Total Transaksi</th>
							<td style=' color:black; border:2px solid #150cc9;'>$Trtotal_penjualan</td>
						</tr>
						<tr>
							<th style='background:#80f4fc; color:black; border:2px solid #150cc9;'>Bayar</th>
							<td style=' color:black; border:2px solid #150cc9;'>$TrBayar</td>
						</tr>
						<tr>
							<th style='background:#80f4fc; color:black; border:2px solid #150cc9;'>Kembalian</th>
							<td style=' color:black; border:2px solid #150cc9;'>$TrKembali</td>
						</tr>
				  	</table>";
					echo "
					<br><br>
					<table>
						<tr>
							<th>Kode Penjualan</th>
							<th>Nama Barang</th>
							<th>Jumlah</th>
							<th>Harga</th>
							<th>Total</th>
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
						while ($row= mysqli_fetch_array($result)) {
						echo "<tr>
							<td>$row[kode_penjualan]</td>
							<td>$row[nama_barang]</td>
							<td>$row[jumlah_jual]</td>
							<td>$row[harga]</td>
							<td>$row[total]</td>
						</tr>";
						}
					echo "</table>";
					echo "<br>";
				?>
			<form action="frmctk.php">
				<table>
					<tr>
						<td><button type="submit" targer="_blank" style="width: 70px; height: 30px; border-radius: 10px; align: justify; color: black"><b>Print</b></button></td>
					</tr>
				</table>
			</form>
		<h2><marquee>Terima Kasih atas Kepercayaan anda</marquee></h2>
			</div>
		</content>
	</div>
	<footer class="footer"> 
		<h4><marquee>Develop By : Khoirudin Ansori<br> &nbsp;&nbsp;&nbsp;Program Pendidikan Vokasi<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Universitas Brawijaya</marquee></h4>
	</footer>
</body>
</html>
