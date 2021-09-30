<!DOCTYPE html>
<html>
<head>
	<title>Form Input</title>
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
        
            <div class="mt-3 text-center" style="font-family:'Lobster', cursive; font-size:35pt;">Form Input Data Kamera</div>
            <div class="row mt-5">
                <div class="col-md-2"></div>
                <div class="col-md-8">
            <form action="proses_input.php" method="GET" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" style="font-family: 'Fira Sans Condensed', sans-serif; value="'.$KodeTransaksiPenjualanNew.'"">Kode Kamera</label>
                            <div class="col-md-9">
                                <input type="text" name="kode_kamera" id="kode_kamera" class="form-control"required>
                            </div>
                        </div>

                       <div class="form-group row">
                            <label class="col-md-3 col-form-label" style="font-family: 'Fira Sans Condensed', sans-serif;">Nama Barang</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" style="font-family: 'Fira Sans Condensed', sans-serif;">Stok</label>
                            <div class="col-md-9">
                                <input type="text" name="stok" id="stok" class="form-control"required>
                            </div>
                        </div>

                    <div class="form-group row">
                            <label class="col-md-3 col-form-label" style="font-family: 'Fira Sans Condensed', sans-serif;">Harga Sewa</label>
                            <div class="col-md-9">
                                <input type="text" name="harga_sewa" id="harga_sewa" class="form-control"required>
                            </div>
                    </div>

                    <div class="form-group row mt-5">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <!-- Back to home -->
                                <a name="backBtn" id="backBtn" class="btn btn-dark btn-block" href="data_kamera.php" role="button">Kembali</a>
                            </div>

                            <div class="col-md-4">
                                <!-- Input button to submit form. Please check href attribute -->
                                <input type="submit" name="add" class="btn btn-success btn-block" value="Tambah"/>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
</body>
</html>