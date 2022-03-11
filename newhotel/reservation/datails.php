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

</head>

<body>

<div id="main-container">

    <div class="container">
    
    	<span class="top-label">
            <span class="label-txt">Your order</span>
        </span>
        
        <div class="content-area">
    
    		<div class="content">
            	
                <?php
				
				$cnt = array();
				$products = array();
				
				foreach($_POST as $key=>$value)
				{
					$key=(int)str_replace('_cnt','',$key);
				
					$products[]=$key;
					$cnt[$key]=$value;
				}

				$result = mysql_query("SELECT * FROM internet_shop WHERE id IN(".join($products,',').")");
				
				if(!mysql_num_rows($result))
				{
					echo '<h1>There was an error with your order!</h1>';
				}
				else
				{
					echo '<h1>You ordered:</h1>';
					
					while($row=mysql_fetch_assoc($result))
					{
						echo '<h2>'.$cnt[$row['id']].' x '.$row['name'].' = '.$ble=$cnt[$row['id']]*$row['price'].'</h2>';
						echo '<div style="display:none;">';
						$total+=$cnt[$row['id']]*$row['price'];
						echo '</div>';
					}
		
					echo '<h1>Total: $'.$total.'</h1>';
				}
				?>
                
                
       	        <div class="clear"></div>
            </div>

        </div>
        
        <div class="bottom-container-border">
        </div>

    </div>

</div>

</body>
</html>
