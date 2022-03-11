<?php
	include('db.php');
	$name = $_POST['name'];
	$email = $_POST['email'];	
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	mysql_query("INSERT INTO message (name, email, subject, message) VALUES ('$name','$email','$subject','$message')");
	header("location: sending.php");
?>