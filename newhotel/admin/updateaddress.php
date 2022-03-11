<?php
	include('connect.php');
	$address = $_POST['address'];
	mysql_query("UPDATE address SET address='$address'");
	header("location: message.php");
?>