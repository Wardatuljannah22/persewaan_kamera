<!DOCTYPE html>
<html>
<head>
	<title>Data Barang Makmur Sejahtera</title>
	<link rel="stylesheet" type="text/css" href="style.css">
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
		    align-content: center;
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
		  background-color: #e5ac10;
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
		.cari{
			float: right;
		}
		input[type=submit]{
      background-color: #35A9DB;
      padding: 5px 10px;
      border: none;
      color: white;
      cursor: pointer;
      border-radius: 10px;
    }
	</style>
</head>
<body>
	<header class="header"><h1>TOKO ELEKTRONIK MAKMUR SEJAHTERA  </h1></header>
	<nav class="topnav">
		<a href="index.php" style="padding-top: 30px;">Data Barang</a>  
		<a href="frmPenjualan.php" style="padding-top: 30px;">Data Penjualan</a> 
		<a href="logout.php" style="float:right"> <img src="img/icon.png" width="30px;"></a>
	</nav>
	<div class="row">
		<content class="leftcolumn">
			<div class="card">
				<h2 align="center">Daftar Barang Elektronik</h2>
				<hr>
				
				<form class="cari" method="post" action="index.php">
					<input style="border-radius: 50px; margin-top: 10px; padding: 5px;" type="text" name="cari" id="cari" placeholder="Search...">
					<input type="submit" name="submit" id="submit" value="Submit">
				</form>
				<?php 
					include 'Connection.php ';
					$txt_cari ="";
					if (isset($_POST['cari'])) {
						$txt_cari = $_POST['cari'];
					}

					echo "<a href=Form_insert.php><button>Tambahkan Data Barang + </button><br></a>";

					$sql = "SELECT kode_barang, nama_barang, stok ,harga FROM elektronik where nama_barang like '%".$txt_cari."%' or kode_barang like '%".$txt_cari."%' or stok like '%".$txt_cari."%' or harga like '%".$txt_cari."%'";
					$result = $conn->query($sql);
	 				echo "<table style='border:1px solid black' align='center'>";
					echo "<tr>
							<center><th>KODE BARANG</th></center>
							<center><th>NAMA BARANG</th></center>
							<center><th>STOK</th></center>
							<center><th>HARGA</th></center>
							<center><th>AKSI</th></center>
						  </tr>";
					if($result->num_rows > 0) {	
						while($row = $result->fetch_assoc()) {
							echo "<tr>
									<td>".$row["kode_barang"]."</td>
									<td>".$row["nama_barang"]."</td>
									<td>". $row["stok"]."</td>
									<td>".$row["harga"]. "</td>
									<td><a href=Form_edit.php?kode_barang=".$row["kode_barang"]."&nama_barang=".str_replace(' ', '%20', $row["nama_barang"])."&stok=".$row["stok"]."&harga=".$row["harga"]."><button style='border-radius:10px;'>Edit</button></a> | <a href=Proses_delete.php?kode_barang=".$row["kode_barang"]."><button style='border-radius:10px;'>hapus</button></a></td>
				  				  </tr>";
						}
					} else {
						echo "0 results";
					}
					echo "</table>";
				?>
				<br>
				<br>
			</div>
		</content>
	</div>
	<footer class="footer"> 
		<h4><marquee>Develop By : Khoirudin Ansori<br> &nbsp;&nbsp;&nbsp;Program Pendidikan Vokasi<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Universitas Brawijaya</marquee></h4>
	</footer>
</body>
</html>