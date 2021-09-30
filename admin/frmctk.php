<html>
<head>
	<title>Nota</title>
	<link rel="stylesheet" type="text/css" href="index.css" />
	<style>
button {
  display: inline-block;
  border-radius: 4px;
  border: none;
  color: black;
  text-align: center;
  font-size: 14px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin-left: 80px;
}

button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

button:hover span {
  padding-right: 25px;
}

button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
</head>
<body>			
		<?php
			include 'Connection.php';
			session_start();
			$kode_transaksi = $_SESSION['kode_transaksiPenjualan'];
			$total_penjualanTr = $_SESSION['total_penjualan'];
			
			//$bayar = $_POST['bayar'];
			//$kembalian = $bayar - $total_penjualanTr;

			// $Query_update="UPDATE tbl_penjualan SET total_penjualan=".$total_penjualanTr.",
			// 										Bayar=".$bayar.",
			// 										Kembali=".$kembalian." WHERE kode_penjualan='$kode_transaksi'";
			//$Procces_update=mysqli_query($conn, $Query_update);
							
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
			<h2><b>Toko Elektronik Makmur Sejahtera</b></h2>
			<h3><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jl. Teratai Desa Pringo Kec.Bululawang</b></h3>
			<table>
					<tr>
						<th style='text-align:left;'>Kode Penjualan</th>
						<td>$kode_transaksi</td>
					</tr>
					<tr>
						<th style='text-align:left;'>Tanggal Transaksi</th>
						<td>$TrTanggal</td>
					</tr>
					<tr>
						<th style='text-align:left;'>Nama Pembeli</th>
						<td>$Trnama_pembeli</td>
					</tr>
					<tr>
						<th style='text-align:left;'>Alamat Pembeli</th>
						<td>$Tralamat_pembeli</td>
					</tr>
					<tr>
						<th style='text-align:left;'>Telepon Pembeli</th>
						<td>$Trtelpon_pembeli</td>
					</tr>
					<tr>
						<th style='text-align:left;'>Total Transaksi</th>
						<td>$Trtotal_penjualan</td>
					</tr>
					<tr>
						<th style='text-align:left;'>Bayar</th>
						<td>$TrBayar</td>
					</tr>
					<tr>
						<th style='text-align:left;'>Kembalian</th>
						<td>$TrKembali</td>
					</tr>
				  </table>";
			
			echo "
			<br>
			<h2><b>-------------Detail Transaksi------------</b></h2> 
			<br>
			<table style='float:center;'>
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
		echo "	<tr>
					<td>$row[kode_penjualan]</td>
					<td>$row[nama_barang]</td>
					<td>$row[jumlah_jual]</td>
					<td>$row[harga]</td>
					<td>$row[total]</td>
				</tr>";
				}
		echo "</table>";
		?>
			<script>
		window.print();
	</script>
		<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Terima Kasih atas Kepercayaan anda</h3>
		<form action="frmPenjualan.php">
			<button type="submit" name="Finish" value="Transaksi Selesai"><b><span> Transaksi Selesai</span></b></button>
		</form>	
</body>
</html>
