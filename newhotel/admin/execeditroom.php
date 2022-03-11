<?php
	include('connect.php');
	$roomid = $_POST['roomid'];
	$type=$_POST['type'];
	$rate=$_POST['rate'];
	$description=$_POST['description'];
	$rnumber=$_POST['rnumber'];
	mysql_query("UPDATE internet_shop SET name='$type', price='$rate', description='$description', room_number='$rnumber' WHERE id='$roomid'");
	header("location: rooms.php");
?>