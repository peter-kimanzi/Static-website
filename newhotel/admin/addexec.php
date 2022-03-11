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
			
			move_uploaded_file($_FILES["image"]["tmp_name"],"../reservation/img/products/" . $_FILES["image"]["name"]);
			
			$location=$_FILES["image"]["name"];
			$type=$_POST['type'];
			$rate=$_POST['rate'];
			$desc=$_POST['desc'];
			$rnum=$_POST['rnum'];
			

			
			$update=mysql_query("INSERT INTO internet_shop (name, price, description, img, room_number)
VALUES
('$type','$rate','$desc','$location','$rnum')");
header("location: rooms.php");
			exit();
		
			}
	}


?>
