<html>
	<head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> </head>
		<body>

<?php
session_start();
include_once("shop_function.php");


?>
<div class="products">
<?php

$results = $mysqli->query("SELECT termek_kod, termek_nev, termek_leiras, termek_kep_nev, erteke FROM termekek");

if($results){
$products_item = '<ul class="products">';


while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
    <li class="product">
    <form method="post" action="cart_update.php">
    <div class="product-content"><h3>{$obj->termek_nev}</h3>
    <div class="product-thumb"><img src="images/{$obj->termek_kep_nev}"></div>
    <div class="product-desc">{$obj->termek_leiras}</div>
    <div class="product-info"><br>
     Ára:{$obj->erteke} -.Ft
	 <br>
   
    <fieldset>
    <label>
        <span>DB:</span>
        <input type="text" size="2" maxlength="2" name="product_qty" value="1" />
    </label>
    </fieldset>
	
    <input type="hidden" name="product_code" value="{$obj->termek_kod}" />
    <input type="hidden" name="type" value="add" />
    <div align="center"><button type="submit" class="add_to_cart">Hozzáadás</button></div>
    </div></div>
    </form>
    </li>
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}
?>
</div>

<!-- View Cart Box Start -->
<?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
	echo '<div class="cart-view-table-front" id="view-cart">';
	echo '<h3>Kosarad</h3>';
	echo '<form method="post" action="cart_update.php">';
	echo '<table width="100%"  cellpadding="6" cellspacing="0">';
	echo '<tbody>';

	$total =0;
	$b = 0;
	foreach ($_SESSION["cart_products"] as $cart_itm)
	{
		$product_name = $cart_itm["termek_nev"];
		$product_qty = $cart_itm["product_qty"];
		$product_price = $cart_itm[""];
		$product_code = $cart_itm["termek_kod"];
		echo '<td>Qty <input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
		echo '<td>'.$product_name.'</td>';
		echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /> Remove</td>';
		echo '</tr>';
		$subtotal = ($product_price);
		$total = ($total + $subtotal);
	}
	echo '<td colspan="4">';
	echo '<button type="submit">Update</button><a href="view_cart.php" class="button">Checkout</a>';
	echo '</td>';
	echo '</tbody>';
	echo '</table>';
	
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
	echo '</form>';
	echo '</div>';

}
?>
<!-- View Cart Box End -->

 </body>
</html>