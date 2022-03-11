<?php
	include('connect.php');
	$userid = $_POST['userid'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$position=$_POST['position'];
	mysql_query("UPDATE user SET username='$username', password='$password', position='$position' WHERE user_id='$userid'");
	header("location: user.php");
?>