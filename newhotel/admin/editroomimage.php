<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = mysql_query("SELECT * FROM internet_shop where id='$id'");
		while($row = mysql_fetch_array($result))
			{
				$image=$row['img'];
			}
?>
<img src="../reservation/img/products/<?php echo $image ?>">
<form action="editpicexec.php" method="post" enctype="multipart/form-data">
	<br>
	<input type="hidden" name="roomid" value="<?php echo $id=$_GET['id']; ?>">
	Select Image
	<br>
	<input type="file" name="image"><br>
	<input type="submit" value="Upload">
</form>