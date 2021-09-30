<?php
session_start();
$conn = mysqli_connect("localhost","root","","persewaan_kamera");
$message="";
if(!empty($_POST["login"])) {
	$result = mysqli_query($conn,"SELECT * FROM users WHERE username='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
	$row  = mysqli_fetch_array($result);
	if(is_array($row)) $_SESSION["user_id"] = $row['user_id'];
	 else $message = "Invalid Username or Password!";
	
}
if(!empty($_POST["logout"])) {
	$_SESSION["user_id"] = "";
	session_destroy();
}
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/css.css">
	<link href="https://fonts.googleapis.com/css?family=ZCOOL+XiaoWei" rel="stylesheet">
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<style>
	.content1{
	margin-top:95px;
	margin-left:7px;
	position: absolute;
	top: 75%;
	left: 50%;
	transform: translate(-50%,-100%);
	width: 400px;
	height: 350px;
	box-sizing: border-box;
	padding: 40px;
	color: #000;
	background: rgba(0,0,0,0.3);
	}
	</style>
</head>
<body background="b1.jpg">
<div>
<img src="b1.jpg" style="width:403px; height:350px; margin-top:170px; margin-left:480px">
</div>
	<div class="content">
    <div class="content1">
	<?php if(empty($_SESSION["user_id"])) { ?>
			<form action="proses_login.php" method="post" id="frmLogin">
				<div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>	
        <form method="POST" action="login.php">
            <p style="color: #ffffff">Username</p>  
            <input type="text" style="color: #000000; background:#e6f0ff" name="username" placeholder="Masukkan username"><br><br>
            <p style="color: #ffffff">Password</p>  
            <input type="password" style="color: #000000; background:#e6f0ff" name="password" id="" placeholder="Masukkan password"><br><br>
            <br>
            <button type="submit" style="color: #ffffff; background:blue; width:320px;" name="submit" class="btn btn-primary">LOGIN</button><br><br>
        </form>
		<?php 
		} else { 
			echo'<script type = "text/javascript">';
			echo 'window.location="index.php"';
			echo '</script>';			
			?>
		<?php } ?>
    </div>
	</div>
</body>
</html>