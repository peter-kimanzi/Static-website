<?php

// This is a sample code in case you wish to check the username from a mysql db table
include('connect.php');
if($_GET['id'])
{
$id=$_GET['id'];
 mysql_query("delete from reservation where confirmation='$id'");
 $sql = "delete from rooinventory where confirmation='$id'";
 mysql_query( $sql);
}

?>