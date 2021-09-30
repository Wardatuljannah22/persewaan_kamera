<?php
session_start();

if(isset($_POST['submit'])){
	include 'conn.php';
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$query =("SELECT * FROM users where username = '$username' AND password = ('$password')");
	echo '$query';
	
	$result = mysqli_query($conn, $query);
	if(mysqli_num_rows($result)==true)
	{
		header('location:index.php');
	}else{
		header('location:login.php');
	}
	mysql_close($conn);
}
?>