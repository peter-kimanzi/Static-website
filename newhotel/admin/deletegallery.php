<?php

// This is a sample code in case you wish to check the username from a mysql db table
include('connect.php');
if($_GET['id'])
{
$id=$_GET['id'];
 $sql = "delete from gallery where id='$id'";
 mysql_query( $sql);
}

?>