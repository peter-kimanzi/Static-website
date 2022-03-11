<style type="text/css">
<!--
.ed{
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
margin-bottom: 4px;
}
#button1{
text-align:center;
font-family:Arial, Helvetica, sans-serif;
border-style:solid;
border-width:thin;
border-color:#00CCFF;
padding:5px;
background-color:#00CCFF;
height: 34px;
}
-->
</style>
<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = mysql_query("SELECT * FROM user where user_id='$id'");
		while($row = mysql_fetch_array($result))
			{
				$username=$row['username'];
				$password=$row['password'];
				$position=$row['position'];
			}
?>
<form action="execedituser.php" method="post">
	<input type="hidden" name="userid" value="<?php echo $id=$_GET['id'] ?>">
	Username:<br><input type="text" name="username" value="<?php echo $username ?>" class="ed"><br>
	Password:<br><input type="text" name="password" value="<?php echo $password ?>" class="ed"><br>
	Position:<br><select name="position" class="ed">
		<option><?php echo $position ?></option>
		<option>admin</option>
		<option>front desk</option>
	</select><br>
	<input type="submit" value="Edit" id="button1">
</form>