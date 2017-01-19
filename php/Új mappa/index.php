<?php
session_start();
include_once("config.php");
include 'funct.php';


$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>
<link href="View/style/style.css" rel="stylesheet" type="text/css">
<link href="View/style/shrek.css" rel="stylesheet" type="text/css">
</head>
<body>
  <audio controls autoplay="autoplay">
  <source src="Model/Allstar.mp3" type="audio/mpeg" preload="auto">
    <source src="Model/Allstar.ogg" type="audio/ogg" >
  <p>Your browser does not support the audio element.</p>
</audio>

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        
        </div>
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['usr_id'])) { ?>
                <li><a href="index.php?action=index">Signed in as <?php echo $_SESSION['usr_name']; ?></a></li>
					
				<li><a href="index.php?action=shop"><img src="shop.jpg"> </a> </li> 
                <li><a href="index.php?action=logout">Shrek Out</a></li>
                <?php 
					} else { ?>
                <li><a href="index.php?action=login">Shrek in</a></li>
                <li><a href="index.php?action=register">Shrek Up</a></li>
				<li><a href="index.php?action=shop"><img src="Model/shop.jpg"> </a> </li>
                <?php }
				?>
            </ul>
        </div>
    </div>
</nav> 

			<?php 
				if(isset($_GET['action'])) {
							switch ($_GET['action'])
							{	
										case 'logout': User::LogOut(); break;
							}
				}
			?>

<!--- LOGIN - REGISTER !! ------------------------------------------------------------------------------------------------------------------------------------>
		
		<?php  if(empty($_SESSION['usr_name'])) { 
		if(isset($_GET['action'])) {
					switch ($_GET['action'])
					{	
						case 'login': /*login*/
						
						if(isset($_SESSION['usr_id'])!="") {
							header("Location: index.php");
						}
							//$errormsg = "";
						
						if (isset($_POST['login'])) {	
							User::Login($_POST['email'], $_POST['password'], $con);
						}
		?>
				
					<div id="wrapper">

					  <form name="login-form" class="login-form" action="" method="post">
					  
						<div class="header">
						<h1>Shrekbook</h1>
						<span>What are you doing in my swamp?</span>
						<?php
						if(isset($_SESSION["error"]))
									{
										$error=$_SESSION["error"];?>
										<br><span id='hint'><?php print $error;?></span><br><?php
										$_SESSION["error"]=null;
									}
						?>
						</div>
					  
						<div class="content">
						<input name="email" type="text" class="input username" required class="form-control" placeholder="Email" />
						<div class="user-icon"></div>
						<input name="password" type="password" class="input password" placeholder="Password" required class="form-control" />
						<div class="pass-icon"></div>   
						</div>
						<div class="footer">
						<input type="submit" name="login" value="Shrek In" class="button" class="btn btn-primary" />
					  
						</div>
					  
					  </form>

					</div>
					<div> <img id="pics"  src="shrek.png" > 
					</div>

							<script>
							$( document ).ready(function() {
							  $( "div" ).effect( "slide", "slow" );
							});
							</script>
				<?php 
						; break;
				
						case 'register': /*register*/
						
						if(isset($_SESSION['usr_id'])) {
							header("Location: index.php");
						}
						$error = false;
						if (isset($_POST['signup'])) {
						   User::Register($con, $_POST['name'], $_POST['email'], $_POST['password'], $_POST['cpassword'], $error);

						}
				?>
						<div id="wrapper">

						  <form name="login-form" class="login-form" action="" method="post">
						  
							<div class="header">
							<h1>Shrekbook</h1>
							<span>Only for green ones.</span>
							<?php
										if(isset($_SESSION["error"]))
										{
											$error=$_SESSION["error"];?>
											<span id='hint'><?php print $error;?></span><br><?php
											$_SESSION["error"]=null;
										}
							?>
							</div>
						  
							<div class="content">
								<input name="name" type="text" class="input username" required class="form-control" placeholder="Enter Full Name" />
								
								<input name="email" type="text" class="input password" class="form-control" placeholder="Email" required class="form-control"  />
							   							
								<input name="password" type="password" class="input password" class="form-control" placeholder="Password" required class="form-control" />

								<input name="cpassword" type="password" class="input password" class="form-control" placeholder="Confirm Password" required class="form-control" />
								
							</div>
							
							<div class="footer">
							<input type="submit" name="signup" value="Shrek Up" class="button" class="btn btn-primary" />					  
							</div>					  
						  </form>
						</div>
							</div>
						</div>
					
						<?php						
						; break;
					}
		}	
		} else {
				?>
		<!-- LOG/REG Vége -->	
<h1 align="center">Shrek Shop (Better than Ebay) </h1>
<?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
	echo '<div class="cart-view-table-front" id="view-cart">';
	echo '<h3>Shopping Cart</h3>';
	echo '<form method="post" action="cart_update.php">';
	echo '<table width="100%"  cellpadding="6" cellspacing="0">';
	echo '<tbody>';

	$total =0;
	$b = 0;
	foreach ($_SESSION["cart_products"] as $cart_itm)
	{
		$product_name = $cart_itm["product_name"];
		$product_qty = $cart_itm["product_qty"];
		$product_price = $cart_itm["product_price"];
		$product_code = $cart_itm["product_code"];
		
		echo '<td>Qty <input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
		echo '<td>'.$product_name.'</td>';
		echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /> Remove</td>';
		echo '</tr>';
		$subtotal = ($product_price * $product_qty);
		$total = ($total + $subtotal);
	}
	echo '<td colspan="4">';
	echo '<button type="submit">Update</button><a href="view_cart.php" class="button">Go to Pay</a>';
	echo '</td>';
	echo '</tbody>';
	echo '</table>';
	
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
	echo '</form>';
	echo '</div>';

}
?>





<?php
$results = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name, price FROM products ORDER BY id ASC");
if($results){ 
$products_item = '<ul class="products">';

while($obj = $results->fetch_object())
{
$products_item .= <<<EOT
	<li class="product">
	<form method="post" action="cart_update.php">
	<div class="product-content"><h3>{$obj->product_name}</h3>
	<div class="product-thumb"><img src="images/{$obj->product_img_name}"></div>
	<div class="product-desc">{$obj->product_desc}</div>
	<div class="product-info">
	Price: {$obj->price} .-HUF
	
	<fieldset>
	
	<label>
		<span>Quantity: </span>
		<input type="text" size="2" maxlength="2" name="product_qty" value="1" />
	</label>
	
	</fieldset>
	<input type="hidden" name="product_code" value="{$obj->product_code}" />
	<input type="hidden" name="type" value="add" />
	<input type="hidden" name="return_url" value="{$current_url}" />
	<div align="center"><button type="submit" class="add_to_cart">Add</button></div>
	</div></div>
	</form>
	</li>
EOT;
}
$products_item .= '</ul>';
echo $products_item;
}
		}
?>    

</body>
</html>
