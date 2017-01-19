<?php
session_start();
include_once("../Control/config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View shopping cart</title>
<link href="../View/style/style.css" rel="stylesheet" type="text/css"></head>
<body>
<h1 align="center">View Cart</h1>
<div class="cart-view-table-back">
<form method="post" action="cart_update.php">
<table width="100%"  cellpadding="6" cellspacing="0"><thead><tr><th>Quantity</th><th>Name</th><th>Price</th><th>Total</th><th>Remove</th></tr></thead>
  <tbody>
  <audio controls autoplay="autoplay">
  <source src="../Model/Allstar.mp3" type="audio/mpeg" preload="auto">
    <source src="../Model/Allstar.ogg" type="audio/ogg" >
  <p>Your browser does not support the audio element.</p>
</audio> 
 	<?php
	if(isset($_SESSION["cart_products"])) 
    {
		$total = 0; 
		$b = 0; 
		foreach ($_SESSION["cart_products"] as $cart_itm)
        {
			
			$product_name = $cart_itm["product_name"];
			$product_qty = $cart_itm["product_qty"];
			$product_price = $cart_itm["product_price"];
			$product_code = $cart_itm["product_code"];
			$subtotal = ($product_price * $product_qty); 
			
		 
			echo '<td><input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
			echo '<td>'.$product_name.'</td>';
			echo '<td>'.$product_price.'</td>';
			echo '<td>'.$subtotal.'</td>';
			echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
            echo '</tr>';
			$total = ($total + $subtotal); 
        }
		
		$grand_total = $total;

		
	}
	
    ?>
    <tr><td colspan="5"><span style="float:right;text-align: right;">Payable : <?php echo sprintf("%01.2f", $grand_total);?><?php echo " HUF";?></span></td></tr>
    <tr><td colspan="5"><a href="index.php" class="button">Add More Items</a><button type="submit">Update</button></td></tr>
  </tbody>
</table>
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
</div>

</body>
</html>
