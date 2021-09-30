<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<!-- menghubungkan dengan file css -->
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<style>
		td, th {
		  border: 1px solid #dddddd;
		  text-align: left;
		  padding: 8px;
		}
	</style>
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

	<div class="content">
	<p><div>
		<form action="frmPenyewaan.php">
			<input type="submit" name="Finish" value="Transaksi Selesai" style='width: 150px; height: 70px; margin-left:100px;'/>
		</form>
		<h2 align="center">NOTA TRANSAKSI</h2>	
		<?php
			include 'conn.php';
			session_start();
			$kode_sewa = $_SESSION['kode_transaksiSewa'];
			$total_sewaTr = $_SESSION['total'];
			
			$bayar = $_POST['bayar'];
			$kembalian = $bayar - $total_sewaTr;

			$Query_update="UPDATE tbl_penjualan SET total=".$total_sewaTr.",
													bayar=".$bayar.",
													kembali=".$kembalian." WHERE kode_sewa='$kode_sewa'";
			$Procces_update=mysqli_query($conn, $Query_update);
							
			$sqlFinishPenjualan = "SELECT * FROM tbl_penjualan WHERE kode_sewa='$kode_sewa'";
			$result = mysqli_query($conn, $sqlFinishPenjualan);
			while ($row=mysqli_fetch_array($result)) {
				$TrTanggal = $row['tgl_sewa'];
				$Trnama_penyewa =  $row['nama_penyewa'];
				$Tralamat = $row['alamat'];
				$Trtelpon = $row['telpon'];
				$Trtotal = $row['total'];
				$Trbayar = $row['bayar'];
				$Trkembali = $row['kembali'];
			}
			echo "<center><table>
					<tr>
						<th >Kode Sewa</th>
						<td>$kode_sewa</td>
					</tr>
					<tr>
						<th>Tanggal Transaksi</th>
						<td>$TrTanggal</td>
					</tr>
					<tr>
						<th>Nama Penyewa</th>
						<td>$Trnama_penyewa</td>
					</tr>
					<tr>
						<th>Alamat Penyewa</th>
						<td>$Tralamat</td>
					</tr>
					<tr>
						<th>Telepon</th>
						<td>$Trtelpon</td>
					</tr>
					<tr>
						<th>Total Transaksi</th>
						<td>$Trtotal</td>
					</tr>
					<tr>
						<th>Bayar</th>
						<td>$Trbayar</td>
					</tr>
					<tr>
						<th>Kembalian</th>
						<td>$Trkembali</td>
					</tr>
				  </table>";
				  echo "<br>";
			
			echo "<table>
					<tr>
						<th>ID Transaksi</th>
						<th>Nama Barang</th>
						<th>Harga Sewa</th>
						<th>Total</th>
					</tr>";
				$sql="SELECT a.kode_sewa,
							 a.kode_kamera,
							 b.nama_barang,
							 b.harga_sewa,
							 a.total
						FROM tbl_detailpenjualan as a, data_kamera as b 
						WHERE a.kode_kamera=b.kode_kamera AND a.kode_sewa='".$_SESSION['kode_transaksiSewa']."'";
				$result = mysqli_query($conn, $sql);
				while ($row= mysqli_fetch_array($result)) {
		echo "	<tr>
					<td>$row[kode_sewa]</td>
					<td>$row[nama_barang]</td>
					<td>$row[harga_sewa]</td>
					<td>$row[total]</td>
				</tr>";
				}
		echo "</table>";
		?>
			
		<p><h2>Terima Kasih atas Kepercayaan anda</h2></p>
</div>
</div>
</div>
	</body>
</html>