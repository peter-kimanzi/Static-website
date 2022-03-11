<?php

define('INCLUDE_CHECK',1);
require "connect.php";

if(!$_POST)
{
	if($_SERVER['HTTP_REFERER'])
	header('Location : '.$_SERVER['HTTP_REFERER']);
	
	exit;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Checkout! | Tutorialzine demo</title>

<link rel="stylesheet" type="text/css" href="demo.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>

<script type="text/javascript" src="simpletip/jquery.simpletip-1.3.1.pack.js.txt"></script>


<script type="text/javascript" src="script.js"></script>
<Script language="javascript">
function checkKeyCode(evt)
{

var evt = (evt) ? evt : ((event) ? event : null);
var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
if(event.keyCode==116)
{
evt.keyCode=0;
return false
}
}
document.onkeydown=checkKeyCode;
</script> 
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=900, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 900px; font-size:16px; font-family:arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
</head>

<body>

<div id="main-container">

    <div class="container">
    
    	<span class="top-label">
            <span class="label-txt">Reservation Summary</span>
        </span>
        
        <div class="content-area" style="background-image:none; background-color:#ffffff; border-radius:15px;">
    
    		<div class="content" id="content">
            	<h1>Reservation details:</h1>
                <?php
				$confirmation = $_POST['confirmation'];
				$numnights=round($_POST['numnights']);
				$arival=$_POST['start'];
				$departure=$_POST['end'];
				$firstname=$_POST['fname'];
				$lastname=$_POST['lname'];
				$address=$_POST['address'];
				$city=$_POST['city'];
				$country=$_POST['country'];
				$email=$_POST['email'];
				$contact=$_POST['contact'];
				$stat='active';
				$roomid=$_POST['id'];
				$qty=$_POST['qty'];
				$price=$_POST['price'];
				$roomname=$_POST['roomname'];
				$N = count($roomid);
				$ip_sqlq=mysql_query("select * from rooinventory where confirmation='$confirmation' and arrival='$arival'and departure='$departure'");
					$countq=mysql_num_rows($ip_sqlq);
					if($countq==0)
					{
						for($i=0; $i < $N; $i++)
						{
						
						mysql_query("INSERT INTO rooinventory (room, qty, arrival, departure, status, confirmation) VALUES ('$roomid[$i]','$qty[$i]','$arival','$departure','$stat','$confirmation')");
						
						echo '<h2>'.$qty[$i].' x '.$roomname[$i].' = '.$ble=$qty[$i]*$price[$i].'</h2>';
						echo '<div style="display:none;">';
						$dddd=$ble;
						$total=$total+$dddd;
						echo '</div>';
						}
						mysql_query("INSERT INTO reservation (firstname, lastname, city, address, country, email, contact, arrival, departure, result, payable, status, confirmation) VALUES ('$firstname','$lastname','$city','$address','$country','email','$contact','$arival','$departure','$numnights','$total','$stat','$confirmation')");
						header("location: paypalpayout.php?confirm=$confirmation");
					}
					else{
					header("location: ../index.php");
					}
				?>
				<h2>Check Inn:<?php echo $arival ?></h2>
				<h2>Check Out: <?php echo $departure ?></h2>
				<h2>Number Of Nights: <?php echo $numnights ?></h2>
				<h2>Confirmation: <?php echo $confirmation ?></h2>
				<?php echo '<h2>Total :'. $total=$total.'</h2>'; ?>
				<h1>You Personnal Details:</h1>
				<h2>Firstname: <?php echo $firstname ?></h2>
				<h2>Lastname: <?php echo $lastname ?></h2>
				<h2>Address: <?php echo $address ?></h2>
				<h2>City: <?php echo $city ?></h2>
				<h2>Country: <?php echo $country ?></h2>
				<h2>Email: <?php echo $email ?></h2>
				<h2>Contact: <?php echo $contact ?></h2>
       	        <div class="clear"></div>
            </div>
			<a href="javascript:Clickheretoprint()">print</a>
        </div>
        

    </div>

</div>

</body>
</html>
