<html>
<head>
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
</body>
<?php
	require "connect.php";
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
						header("location: savingreservation.php");
					}
					else{
					header("location: ../index.php");
					}
?>
</body>
</html>