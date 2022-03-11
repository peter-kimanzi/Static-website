<?php
include('connect.php');





	if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
	$image_size= getimagesize($_FILES['image']['tmp_name']);

	
		if ($image_size==FALSE) {
		
			echo "That's not an image!";
			
		}else{
			
			move_uploaded_file($_FILES["image"]["tmp_name"],"../images/fullscreen/" . $_FILES["image"]["name"]);
			
			$location=$_FILES["image"]["name"];
			

			
			$update=mysql_query("INSERT INTO gallery (image)
VALUES
('$location')");
header("location: gallery.php");
			exit();
		
			}
	}


?>
