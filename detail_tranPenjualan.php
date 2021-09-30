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
	table{
		margin-left:100px;
	}
	h1{
		margin-left:100px;
	}
	.lanjut{
		margin-left:100px;
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
	
	<?php
	session_start();
	include 'conn.php';
		echo "
		<div class='container'>
	<div class='row mt-5'>
        <div class='col-md-2'></div>
            <div class='col-md-8'>

<form action='detail_tranPenjualan_function.php' method='POST'>
	<div class='form-group row'>
    	<label class='col-md-3 col-form-label'>Kode Sewa</label>
            <div class='col-md-9'>
                <input type='hidden' name='kode_sewa' value='".$_SESSION['kode_transaksiSewa']."' class='form-control'>
                <input type='text' readonly name='kode_sewa' value='".$_SESSION['kode_transaksiSewa']."' class='form-control'>
            </div>
     </div>

     <div class='form-group row'>
    	<label class='col-md-3 col-form-label'>Kode Kamera</label>
            <div class='col-md-9'>
                <select name='kode_kamera'>"
				?>
				
				<?php
                	include 'conn.php';
                	$result = mysqli_query($conn, "SELECT * FROM data_kamera");
					while ($row = mysqli_fetch_array($result)) {
						echo "<option value='$row[kode_kamera]' >$row[kode_kamera] - $row[nama_barang] - $row[harga_sewa]</option>";
					}	
                	echo "
                </select>
            </div>
     </div>

     <div class='form-group row mt-5'>
     	<div class='col-md-8'></div>

            <div class='col-md-4'>
            <!-- Input button to submit form. Please check href attribute -->
            <input type='submit' name='submit' class='btn btn-success btn-block' value='Tambahkan ke keranjang'/>
            </div>
    </div>
</form>";


echo "<table>
          <tr>
            <th>ID Transaksi</th>
            <th>Nama Barang</th>
            <th>Harga Sewa</th>
            <th>Total</th>
            <th>Aksi</th>
          </tr>";

          $sql = "SELECT a.kode_sewa,
                         a.kode_kamera,
                         b.nama_barang,
                         b.harga_sewa,
                         a.total
                  FROM tbl_detailpenjualan as a, data_kamera as b
                  WHERE a.kode_kamera=b.kode_kamera AND a.kode_sewa='".$_SESSION['kode_transaksiSewa']."'";
          $result = mysqli_query($conn, $sql);
          while ($row= mysqli_fetch_array($result)){
      echo "  <tr>
          <td>$row[kode_sewa]</td>
          <td>$row[nama_barang]</td>
          <td>$row[harga_sewa]</td>
          <td>$row[total]</td>
          <td><a href=DeleteDetailPenjualan.php?kode_kamera=$row[kode_kamera]>Hapus</a></td>
        </tr>";
          }
      echo "</table>";

      $sqlTotal = "SELECT SUM(total) FROM tbl_detailpenjualan WHERE kode_sewa='".$_SESSION['kode_transaksiSewa']."'";
      $result = mysqli_query($conn, $sqlTotal);
      $total =0;
      while ($row = mysqli_fetch_array($result)) {
        $total = $row[0];
      }
      echo "<h1>Total Sewa</h1>";
      echo "<h1>Rp ".$total."  ,-</h1>";
      $_SESSION['total'] = $total;
      echo "<form action='frmPembayaran.php' method='post'>
        <input type='hidden' name='kode_sewa' value='".$_SESSION['kode_transaksiSewa']."' />
        <input type='submit' name='submit' value='Lanjut pembayaran' style='width: 400px; height: 30px; margin-left:100px;'/>
        </form>"; 
?>


</div>
</div>
</div>

</div></p>
</div>

</body>
<script type="text/javascript">
  function toggleSidebar(ref){
  document.body.classList.toggle('sidebar-active');
}
</script>
</html>