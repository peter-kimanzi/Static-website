<?php
require "connect.php";
$confirmation=$_GET['confirm'];
$ip_confirmation=mysql_query("select * from reservation where confirmation='$confirmation'");
while($rows = mysql_fetch_array($ip_confirmation))
	{
	$firstname=$rows['firstname'];
	$lastname=$rows['lastname'];
	$city=$rows['city'];
	$address=$rows['address'];
	$country=$rows['country'];
	$email=$rows['email'];
	$contact=$rows['contact'];
	$arrival=$rows['arrival'];
	$departure=$rows['departure'];
	$result=$rows['result'];
	$payable=$rows['payable'];
	}
	echo '<h2>Personal Information</h2>';
echo 'Name: '.$firstname.' '.$lastname.'<br>';
echo 'City: '.$city.'<br>';
echo 'Address: '.$address.'<br>';
echo 'Country: '.$country.'<br>';
echo 'Email: '.$email.'<br>';
echo 'Contact: '.$contact.'<br><br>';
echo '<h2>Reservation Details</h2><br>';
echo 'Arrival: '.$arrival.'<br>';
echo 'Departure: '.$departure.'<br>';
echo 'Number Of nights: '.$result.'<br>';
echo 'Payable: '.$payable.'<br>';
echo 'Rooms: <br>';
$ip_room=mysql_query("select * from rooinventory where confirmation='$confirmation'");
while($rowa = mysql_fetch_array($ip_room))
	{
	$qty=$rowa['qty'];
	$room=$rowa['room'];
	$ip_roomdetails=mysql_query("select * from internet_shop where id='$room'");
	while($rowas = mysql_fetch_array($ip_roomdetails))
		{
		echo $rowas['name']. '    X      ';
		}
		echo $qty;
		echo '<br>';
	}
?>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr"  method="post">
   
	<input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="business" value="argiep_1323161081_biz@gmail.com" />
        <input type="hidden" name="item_name" value="Rooms Reserve" />
        <input type="hidden" name="item_number" value="<?php echo $confirmation; ?>" />
        <input type="hidden" name="amount" value="<?php echo $payable; ?>" />
        <input type="hidden" name="no_shipping" value="1" />
        <input type="hidden" name="no_note" value="1" />
        <input type="hidden" name="currency_code" value="PHP" />
        <input type="hidden" name="lc" value="GB" />
        <input type="hidden" name="bn" value="PP-BuyNowBF" />
        <input type="image" src="paypal_button.png" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" style="margin-left: 157px;" />
        <img alt="fdff" border="0" src="paypal_button.png" width="1" height="1" />
        <!-- Payment confirmed -->
        <input type="hidden" name="return" value="https://tameraplazainn.x10.mx/savingreservation.php?confirmation<?php echo $confirmation; ?>" />
        <!-- Payment cancelled -->
        <input type="hidden" name="cancel_return" value="http://tameraplazainn.x10.mx/cancel.php" />
        <input type="hidden" name="rm" value="2" />
        <input type="hidden" name="notify_url" value="http://tameraplazainn.x10.mx/ipn.php" />
        <input type="hidden" name="custom" value="any other custom field you want to pass" />
    </form>