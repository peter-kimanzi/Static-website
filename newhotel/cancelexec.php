<?php
include('db.php');
$confirmation=$_POST['confirmation'];
$stat='Cancel';
mysql_query("UPDATE reservation SET status='$stat' WHERE confirmation='$confirmation'");
header("location: cancel.php");
?>