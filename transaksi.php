<!DOCTYPE html>
<html>
<head>
	<title>Transaksi</title>
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
        
            <div class="mt-3 text-center" style="font-family:'Lobster', cursive; font-size:35pt;">Data Transaksi Sewa</div>
            <div class="row mt-5">
                <div class="col-md-2"></div>
                <div class="col-md-8">
            <form action="transaksi_function.php" method='POST'>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" style="font-family: 'Fira Sans Condensed', sans-serif;">Kode Sewa</label>
                            <div class="col-md-9">
                                <input type="text" name="kode_sewa" id="kode_sewa" value="" class="form-control"required>
                            </div>
                        </div>

                       <div class="form-group row">
                            <label class="col-md-3 col-form-label" style="font-family: 'Fira Sans Condensed', sans-serif;">Kode Admin</label>
                            <div class="col-md-9">
                                <input type="text" name="kode_admin" id="kode_admin" value="" class="form-control" required>
                            </div>
                        </div>
						
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" style="font-family: 'Fira Sans Condensed', sans-serif;">Nama Penyewa</label>
                            <div class="col-md-9">
                                <input type="text" name="nama_penyewa" id="nama_penyewa" value="" class="form-control"required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" style="font-family: 'Fira Sans Condensed', sans-serif;">Alamat</label>
                            <div class="col-md-9">
                                <input type="text" name="alamat" id="alamat" value="" class="form-control"required>
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label class="col-md-3 col-form-label" style="font-family: 'Fira Sans Condensed', sans-serif;">Telepon</label>
                            <div class="col-md-9">
                                <input type="text" name="telpon" id="telpon" value="" class="form-control"required>
                            </div>
                        </div>

                            <div class="col-md-4">
                                <!-- Input button to submit form. Please check href attribute -->
                               <input type="submit" name="submit" class="btn btn-success btn-block" style="background-color: red; margin-left:300px;" value="Selanjutnya">
                            </div>
							
                            
                    </form>
                </div>
        </div>
		</div>
		</div>
</body>
</html>