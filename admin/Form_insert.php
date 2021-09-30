<html>
<head>
<title>Input Data Barang Baru</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
    * {
      box-sizing: border-box;
    }
    input[typr=text]:focus{
    	background-color: lightblue;
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
    input[type=submit]{
      background-color: #e5ac10;
      border: none;
      color: white;
      padding: 16px 32px;
      text-decoration: none;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 10px;
    }
</style>
</head>
<body>
    <header class="header"><h1>TOKO ELEKTRONIK MAKMUR SEJAHTERA</h1></header>
	<nav class="topnav">
    	<a href="index.php" style="padding-top: 28px;">Data Barang</a>  
    	<a href="frmPenjualan.php" style="padding-top: 28px;">Data Penjualan</a> 
    	<a href="logout.php" style="float:right; padding-top: 20px;"> <img src="img/icon.png" width="30px;"></a>
  	</nav>
  	<div class="row">
  		<content class="leftcolumn">
  			<div class="card">
				<h2><center>Input Data Baru</center></h2>
				<hr>
				<?php
					session_start();
					include 'Connection.php';
					$SQLRecordTransaksi = mysqli_query($conn,"SELECT kode_barang FROM elektronik");
					$JumTrans = mysqli_num_rows($SQLRecordTransaksi);
					$KodeTransaksiPenjualanNew = "BRG-EL0".($JumTrans + 1);
				?>
				<form  method="get" action="Proses_insert.php" id="form">
				 
					<label class="w3-text-blue">Kode Barang :</label>
					<input style="border-radius: 50px;" class="w3-input w3-border" type="text" readonly="" name="kode_barang" id="kode_barang" value="<?php echo $KodeTransaksiPenjualanNew ?>" required/>
					<label class="w3-text-blue">Nama Barang</label>
					<input style="border-radius: 50px;" class="w3-input w3-border" type="text" name="nama_barang" id="nama_barang" required/>
					<label class="w3-text-blue">Stok :</label>
					<input style="border-radius: 50px;" class="w3-input w3-border" type="text" name="stok" id="stok" required />
					<label class="w3-text-blue">Harga :</label>
					<input style="border-radius: 50px;" class="w3-input w3-border" type="text" name="harga" id="harga" required />
					<input type="submit" name="submit" id="submit" value="Submit">
				</form>
	  			</div>
  		</content>
  	</div>
  	<footer class="footer"> 
    <h4><marquee>Develop By : Khoirudin Ansori<br> &nbsp;&nbsp;&nbsp;Program Pendidikan Vokasi<br>&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Universitas Brawijaya</marquee></h4>
  	</footer>
</body>
</html>