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


<div class="container">
<br>
            <div class="mt-3 text-center" style="font-family:'Lobster', cursive; font-size:35pt;">Data Kamera</div>
            <?php
            include 'conn.php'
		    ?>
			
            <a href="input.php" class="btn btn-success mt-3" style="background: red;">+ Tambah Data</a>

            <table class="table table-stripped text-center mt-3" id="tbl_data" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kode Kamera</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Harga Sewa</th>
							<th>Aksi</th>
							
                        </tr>
                    </thead>
					
					 <?php
                    $query = "SELECT * FROM data_kamera";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $kode_kamera = $row["kode_kamera"];
                            $nama_barang = $row["nama_barang"];
                            $stok = $row["stok"];
                            $harga_sewa = $row["harga_sewa"];
                            echo "
                            <tr>
                                <td>" . $row["kode_kamera"] . "</td>
                                <td>" . $row["nama_barang"] . "</td>
                                <td>" . $row["stok"] . "</td>
                                <td>" . $row["harga_sewa"] . "</td>
                                <td>
                                    <a href='edit.php?kode_kamera=$kode_kamera&nama_barang=$nama_barang&stok=$stok&harga_sewa=$harga_sewa' class='btn btn-warning' style='background:black; color:white;'>Edit</a>
                                    <a href='hapus.php?kode_kamera=$kode_kamera' class='btn btn-danger' style='background:white; color:black;'>Hapus</a>
                                </td>
                            </tr>
                            ";
                        }
                    }
              		mysqli_close($conn);
                    ?>
                    </tbody>
                    </table>
        </div>
</body>
</html>