<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>Untitled Document</title> 
</head> 

<body> 
<?php
$myFile = "testFile.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "awsus 1\n";
fwrite($fh, $stringData);
$stringData = "awsus 2\n";
fwrite($fh, $stringData);
fclose($fh);
$con = mysql_connect("localhost","root","");
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db("shoopingcart", $con);
// this is optional but useful for setting up database access constants etc
// The majority of the following code is a direct copy of the example code specified on the Paypal site.
// Paypal POSTs HTML FORM variables to this page
// we must post all the variables back to paypal exactly unchanged and add an extra parameter cmd with value _notify-validate
// initialise a variable with the requried cmd parameter
$req = 'cmd=_notify-validate';
// go through each of the POSTed vars and add them to the variable
foreach($_POST as $key => $value) {
    $value = urlencode(stripslashes($value));
    $req.= "&$key=$value";
}
// post back to PayPal system to validate
$header.= "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header.= "Content-Type: application/x-www-form-urlencoded\r\n";
$header.= "Content-Length: " . strlen($req) . "\r\n\r\n";
// In a live application send it back to www.paypal.com
// but during development you will want to uswe the paypal sandbox
// comment out one of the following lines
$fp = fsockopen('ssl://www.sandbox.paypal.com',443,$err_num,$err_str,30);
//$fp = fsockopen ('www.paypal.com', 80, $errno, $errstr, 30);
// or use port 443 for an SSL connection
//$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);
if (!$fp) {
    // HTTP ERROR Failed to connect
    // You can optionally send an email to let you know of the problem
    // or add other error handling.
    $myFile = "testFile.txt";
    $fh = fopen($myFile, 'a') or die("can't open file");
    $stringData = "HTTP ERROR \n";
    fwrite($fh, $stringData);
    $stringData = "$errstr\n";
    fwrite($fh, $stringData);
    fclose($fh);
    //email
    $mail_From = "From: argiepolicarpio@gmail.com";
    $mail_To = $email;
    $mail_Subject = "HTTP ERROR";
    $mail_Body = $errstr; //error string from fsockopen
    mail($mail_To, $mail_Subject, $mail_Body, $mail_From);
} else {
    $myFile = "testFile.txt";
    $fh = fopen($myFile, 'a') or die("can't open file");
    $stringData = "after else\n";
    fwrite($fh, $stringData);
    fclose($fh);
    fputs($fp, $header . $req);
    while (!feof($fp)) {
        $myFile = "testFile.txt";
        $fh = fopen($myFile, 'a') or die("can't open file");
        $stringData = "after while\n";
        fwrite($fh, $stringData);
        fclose($fh);
        $res = fgets($fp, 1024);

		    $myFile = "testFile.txt";
            $fh = fopen($myFile, 'a') or die("can't open file");
            $stringData = "Get res value baby\n";
            fwrite($fh, $stringData);
            $stringData = "$res\n";
            fwrite($fh, $stringData);
            fclose($fh);

        if (strcmp($res, "VERIFIED") == 0) {
            $item_name = $_POST['item_name'];
            $item_number = $_POST['item_number'];
            $item_colour = $_POST['custom'];
            $payment_status = $_POST['payment_status'];
            $payment_amount = $_POST['mc_gross'];
            $payment_currency = $_POST['mc_currency'];
            $txn_id = $_POST['txn_id'];
            $receiver_email = $_POST['receiver_email'];
            $payer_email = $_POST['payer_email'];

            $myFile = "testFile.txt";
            $fh = fopen($myFile, 'a') or die("can't open file");
            $stringData = "after verified baby\n";
            fwrite($fh, $stringData);
            $stringData = "$item_name\n";
            fwrite($fh, $stringData);
            $stringData = "$item_number\n";
            fwrite($fh, $stringData);
            $stringData = "payment status: $payment_status\n";
            fwrite($fh, $stringData);			
            $stringData = "receiver email: $receiver_email\n";
            fwrite($fh, $stringData);
            $stringData = "amount: $payment_amount\n";
            fwrite($fh, $stringData);			
            $stringData = "currency: $payment_currency\n";
            fwrite($fh, $stringData);
            fclose($fh);

            $amount_they_should_have_paid = $payment_amount; //lookup_price($item_name);
			 
			// receiver_email is same as your account email //check they payed what they should have // and its the correct currency
            /*if (($payment_status == 'Completed') && ($receiver_email == "argiep_1323161081_biz@gmail.com") && 
            ($payment_amount == $amount_they_should_have_paid) && 
            ($payment_currency == "PHP") && 
            (!txn_id_used_before($txn_id))) { //txn_id isn't same as previous to stop duplicate payments. You will need to write a function to do this check.*/

            if (($payment_status == 'Completed') && ($receiver_email == "argiep_1323161081_biz@gmail.com") && 
            ($payment_amount == $amount_they_should_have_paid) && 
            ($payment_currency == "PHP") ) { //txn_id isn't same as previous to stop duplicate payments. You will need to write a function to do this check.
			
                // everything is ok
                // you will probably want to do some processing here such as logging the purchase in a database etc
				$sql = "INSERT INTO payment_notification (item_name, item_number, status, amount, currency, txn_id, payer_email) 
				VALUES 
				('$item_name','$item_number','$payment_status',$payment_amount,'$payment_currency','$txn_id','$payer_email')";
                mysql_query($sql);
            
			$myFile = "testFile.txt";
            $fh = fopen($myFile, 'a') or die("can't open file");
            $stringData = "Completed baby\n";
            fwrite($fh, $stringData);
            $stringData = "$item_name\n";
            fwrite($fh, $stringData);
            $stringData = "$item_number\n";
            fwrite($fh, $stringData);
            $stringData = "$sql\n";
            fwrite($fh, $stringData);			
            fclose($fh);
			
                //        uncomment this section during development to receive an email to indicate whats happened
                $mail_To = "argiepolicarpio@gmail.com";
                $mail_Subject = "completed status received from paypal";
                $mail_Body = "completed: $item_number  $txn_id";
                mail($mail_To, $mail_Subject, $mail_Body);
            } else {
                //
                // paypal replied with something other than completed or one of the security checks failed.
                // you might want to do some extra processing here
                //
                //in this application we only accept a status of "Completed" and treat all others as failure. You may want to handle the other possibilities differently
                //payment_status can be one of the following
                //Canceled_Reversal: A reversal has been canceled. For example, you won a dispute with the customer, and the funds for
                //                           Completed the transaction that was reversed have been returned to you.
                //Completed:            The payment has been completed, and the funds have been added successfully to your account balance.
                //Denied:                 You denied the payment. This happens only if the payment was previously pending because of possible
                //                            reasons described for the PendingReason element.
                //Expired:                 This authorization has expired and cannot be captured.
                //Failed:                   The payment has failed. This happens only if the payment was made from your customerâ€™s bank account.
                //Pending:                The payment is pending. See pending_reason for more information.
                //Refunded:              You refunded the payment.
                //Reversed:              A payment was reversed due to a chargeback or other type of reversal. The funds have been removed from
                //                          your account balance and returned to the buyer. The reason for the
                //                           reversal is specified in the ReasonCode element.
                //Processed:            A payment has been accepted.
                //Voided:                 This authorization has been voided.
                //
                //
                // we will send an email to say that something went wrong
                $mail_To = "argiepolicarpio@gmail.com";
                $mail_Subject = "PayPal IPN status not completed or security check fail";
                //
                //you can put whatever debug info you want in the email
                //
                $mail_Body = "Something wrong. \n\nThe transaction ID number is: $txn_id \n\n Payment status = $payment_status \n\n Payment amount = $payment_amount";
                mail($mail_To, $mail_Subject, $mail_Body);
                $myFile = "testFile.txt";
                $fh = fopen($myFile, 'a') or die("can't open file");
                $stringData = "status baby:\n";
                fwrite($fh, $stringData);
                $stringData = "$mail_Body\n";
                fwrite($fh, $stringData);
                fclose($fh);
            }
        } else if (strcmp($res, "INVALID") == 0) {
                $myFile = "testFile.txt";
                $fh = fopen($myFile, 'a') or die("can't open file");
                $stringData = "INVALID baby:\n";
                fwrite($fh, $stringData);
                $stringData = "$mail_Body\n";
                fwrite($fh, $stringData);
                fclose($fh);		
            //
            // Paypal didnt like what we sent. If you start getting these after system was working ok in the past, check if Paypal has altered its IPN format
            //
            $mail_To = "argiepolicarpio@gmail.com";
            $mail_Subject = "PayPal - Invalid IPN ";
            $mail_Body = "We have had an INVALID response. \n\nThe transaction ID number is: $txn_id \n\n username = $username";
            mail($mail_To, $mail_Subject, $mail_Body);
        }
    } //end of while
    fclose($fp);
	$myFile = "testFile.txt";
	$fh = fopen($myFile, 'a') or die("can't open file");
	$stringData = "gn close gd...\n";
	fwrite($fh, $stringData);
	fclose($fh);	
}
?> 

</body> 
</html> 