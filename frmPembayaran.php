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
	table{
		margin-left: 50px;
	}
  td, th {
    border: 1px solid #dddddd;
    text-align: center;
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
  	<?php
		session_start();
				  
			include 'conn.php';
			$kode_sewa = $_SESSION['kode_transaksiSewa'];
			$total_sewaTr = $_SESSION['total'];

			$Query_update="UPDATE tbl_penjualan SET total=".$total_sewaTr." WHERE kode_sewa='$kode_sewa'";
			$Procces_update=mysqli_query($conn, $Query_update);
							
			$sqlFinishPenjualan = "SELECT * FROM tbl_penjualan WHERE kode_sewa='$kode_sewa'";
			$result = mysqli_query($conn, $sqlFinishPenjualan);
			while ($row=mysqli_fetch_array($result)) {
				$Trnama_penyewa =  $row['nama_penyewa'];
				$Tralamat_penyewa = $row['alamat'];
				$Trtelepon_penyewa = $row['telpon'];
				$Trtotal = $row['total'];
			}

	echo "
<div class='container'>
	<div class='row mt-5'>
	<h2 class='mt-3 text-center'>Pembayaran Sewa Kamera</h2>
        <div class='col-md-2'></div>
            <div class='col-md-8'>

    <div class='form-group row'>
    	<label class='col-md-3 col-form-label'>Kode Sewa</label>
            <div class='col-md-9'>
                <input type='text' name='kode_sewa' value='$kode_sewa' class='form-control' disabled>
            </div>
     </div>

     <div class='form-group row'>
    	<label class='col-md-3 col-form-label'>Nama Penyewa</label>
            <div class='col-md-9'>
                <input type='text' name='nama_penyewa' value='$Trnama_penyewa' class='form-control'>
            </div>
     </div>

     <div class='form-group row'>
    	<label class='col-md-3 col-form-label'>Alamat Penyewa</label>
            <div class='col-md-9'>
                <input type='text' name='alamat' value='$Tralamat_penyewa' class='form-control'>
            </div>
     </div>

     <div class='form-group row'>
    	<label class='col-md-3 col-form-label'>Telepon Penyewa</label>
            <div class='col-md-9'>
                <input type='text' name='telpon' value='$Trtelepon_penyewa' class='form-control'>
            </div>
     </div>

     <div class='form-group row'>
    	<label class='col-md-3 col-form-label'>Total Transaksi</label>
            <div class='col-md-9'>
                <input type='text' name='total' value='$Trtotal' class='form-control'>
            </div>
     </div>
     </div>

                  </form>
                </div>
            </div>
		</div>";

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
          while ($row= mysqli_fetch_array($result)){
			echo "	<tr>
						<td>$row[kode_sewa]</td>
          				<td>$row[nama_barang]</td>
          				<td>$row[harga_sewa]</td>
          				<td>$row[total]</td>
					</tr>";
					}
			echo "</table>";
			echo "<br>";

			echo "<form action='frmNotaPenjualan.php' method='POST'>
					<table>
						<tr>
							<td>Total</td>
							<td>".$_SESSION['total']."</td>
						</tr>
						<tr>
							<td>Tanggal Kembali</td>
							<td><input type='text' name='tgl_kembali' value='' style='width: 150px; height: 30px;'/></td>
						</tr>
						<tr>
							<td>Bayar</td>
							<td><input type='text' name='bayar' value='' style='width: 150px; height: 30px;'/></td>
						</tr>
						<tr>
							<td></td>
							<td><input type='submit' name='submit' value='Bayar' style='width: 150px; height: 30px;'/></td>
						</tr>
					</table>
				  </form>";
?>
  </div></p>
</div>
</div>
</body>
<script type="text/javascript">
  function toggleSidebar(ref){
  document.body.classList.toggle('sidebar-active');
}
</script>
</html>