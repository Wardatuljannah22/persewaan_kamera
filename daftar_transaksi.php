<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<!-- menghubungkan dengan file css -->
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
</head>
<body>
<div class="head">
	<header>
	<div class="logo">
		<img src="logo.png">
	</div>
	</header>

	<nav class="menu1">
			<hr>
            <p align="center">
            <a href="index.php">HOME</a>
            <a href="data_kamera.php">DATA KAMERA</a>
			<a href="transaksi.php">TRANSAKSI</a>
			<a href="daftar_transaksi.php">DAFTAR TRANSAKSI</a>
			<a href="login.php">LOGOUT</a>
			
            <hr>
            </p>
</nav>

<br><br>
<div class="container">
		<h2 style="margin-left:300px;">Daftar Transaksi Sewa Kamera</h2>
		
		<form action="daftar_transaksi.php" method="post">
			<input type="text" name="txtcari" style="margin-left:300px;" placeholder="cari data" />
			<input type="submit" name="pencarian" value="Cari"/>
		</form>	
		<br><br>
		<?php
			include 'conn.php';
			echo "<table border='5px' style='margin-left:300px;'>
					<tr>
						<th>Kode Transaksi</th>
						<th>Nama Penyewa</th>
						<th>Tanggal Sewa</th>
						<th>Total Sewa</th>
					</tr>";
			$pencarian_Transaksi = isset($_POST['txtcari'])? $_POST['txtcari']:"";
			$tampil = mysqli_query($conn, "SELECT kode_sewa,
														nama_penyewa,
														tgl_sewa,
														total
													FROM tbl_penjualan  
													WHERE kode_sewa like '%$pencarian_Transaksi%' or nama_penyewa like '%$pencarian_Transaksi%'");
			while ($r =  mysqli_fetch_array($tampil)) {
				echo "<tr>
						<td>$r[kode_sewa]</td>
						<td>$r[nama_penyewa]</td>
						<td>$r[tgl_sewa]</td>
						<td>$r[total]</td>
					</tr>";
			}
			echo "</table>";
		?>
		</div>
		</div>
	</body>
</html>