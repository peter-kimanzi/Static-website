<?php
	include('connect.php');
	$address = $_POST['address'];
	mysql_query("UPDATE about SET about='$address'");
	header("location: aboutus.php");
?>