<?php

define('INCLUDE_CHECK',1);
require "connect.php";
function createRandomPassword() {
					$chars = "abcdefghijkmnopqrstuvwxyz023456789";
					srand((double)microtime()*1000000);
					$i = 0;
					$pass = '' ;
					while ($i <= 7) {
						$num = rand() % 33;
						$tmp = substr($chars, $num, 1);
						$pass = $pass . $tmp;
						$i++;
					}
					return $pass;
				}
				$confirmation = createRandomPassword();
?>
<?php
	$arival = $_POST['start'];
	$departure = $_POST['end'];
	$numberofnights = $_POST['result'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tutorialzine's shopping cart | Tutorialzine demo</title>

<link rel="stylesheet" type="text/css" href="demo.css" />

<!--[if lt IE 7]>
<style type="text/css">
	.pngfix { behavior: url(pngfix/iepngfix.htc);}
    .tooltip{width:200px;};
</style>
<![endif]-->


<script type="text/javascript" src="js/sadrag1.js"></script>
<script type="text/javascript" src="js/sadrag2.js"></script>

<script type="text/javascript" src="simpletip/jquery.simpletip-1.3.1.pack.js"></script>


<script type="text/javascript" src="script.js"></script>

</head>

<body>

<div id="main-container">

	<div class="tutorialzine">
    <h1>Select Room</h1>
    </div>

	<div style="width:1000px; height:auto;">
		<div class="container" style="float: left; width: 464px;">
		
			<span class="top-label">
				<span class="label-txt">Rooms</span>
			</span>
			
			<div class="content-area" style="border-radius:15px;">
		
				<div class="content drag-desired">
					
					<?php
					
					$result = mysql_query("SELECT * FROM internet_shop");
					while($row=mysql_fetch_assoc($result))
					{
					$a=$row['id'];
					  $query = mysql_query("SELECT sum(qty) FROM rooinventory where arrival <= '$arival' and departure >= '$departure' and room='$a'");
						while($rows = mysql_fetch_array($query))
						  {
						  $inogbuwin=$rows['sum(qty)'];
						  }
					  $angavil = 1 - $inogbuwin;
						if($angavil>0){
						echo '<div class="product"><img src="img/products/'.$row['img'].'" alt="'.htmlspecialchars($row['name']).'" width="128" height="128" class="pngfix" /></div>';
						}
					}

					?>
					
					
					<div class="clear"></div>
				</div>

			</div>
		</div>


		<form name="checkoutForm" method="post" action="order.php">
		<div class="container" style="float: left; width: 299px; margin-left: 12px;">
		
			<span class="top-label">
				<span class="label-txt">Room Details</span>
			</span>
			
			<div class="content-area" style="border-radius:15px;">
				<div>
					
				</div>
				<div class="content drop-here">
					<div id="cart-icon">
						<img src="img/Shoppingcart_128x128.png" alt="shopping cart" class="pngfix" width="128" height="128" />
						<img src="img/ajax_load_2.gif" alt="loading.." id="ajax-loader" width="16" height="16" />
					</div>

					
					<input name="start" type="hidden" value="<?php echo $arival; ?>" />
					<input name="end" type="hidden" value="<?php echo $departure; ?>" />
					<input name="numnights" type="hidden" value="<?php echo $numberofnights; ?>" />
					<div>
						<div id="item-list">
						</div>
						<div id="total"></div>
					</div>
					<div class="clear"></div>
			  </div>

			</div>
			

		</div>
		<div class="container" style="float: right; width: 212px; padding-bottom: 15px;">
			<span class="top-label">
				<span class="label-txt">Personal Details</span>
			</span>
			<div class="content-area" style="border-radius:15px; padding-bottom: 25px;">
				<div>
					Firstname:<br>
					<input type="text" name="fname" id="boxy" /><br>
					lastname:<br>
					<input type="text" name="lname" id="boxy" /><br>
					Address:<br>
					<input type="text" name="address" id="boxy" /><br>
					City:<br>
					<input type="text" name="city" id="boxy" /><br>
					Country:<br>
					<input type="text" name="country" id="boxy" /><br>
					Email:<br>
					<input type="text" name="email" id="boxy" /><br>
					Contact Number:<br>
					<input type="text" name="contact" id="boxy" /><br>
					<input type="hidden" name="confirmation" id="boxy" value="<?php echo $confirmation ?>" /><br>
					<input type="submit" onclick="document.forms.checkoutForm.submit(); return false;" class="button" value="Checkout" id="boxy"  style="width: 147px; margin-top: 18px;">
				</div>
			</div>
		</div>
		</form>
		<div class="clearfix"></div>
	</div>
	
</div>

</body>
</html>
