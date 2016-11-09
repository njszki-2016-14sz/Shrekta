<?php 
	require("database.php");
	require("function.php");
	
	
	?>
<html>
	<head>
		<title>Shrekbook</title>
		<link href="shrek.css" type="text/css" rel="stylesheet" />
		<link rel="shortcut icon" href="http://www.iconarchive.com/download/i61338/majdi-khawaja/shrek/Shrek.ico" type="favicon/ico" />
		<ul>
			<li><a class="active" href="#home">MainShrek</a></li>
			<li><a href="#news"></a></li>
			<li><a href="#contact">ShrekContact</a></li>
			<li><a href="#about">AboutShrek</a></li>
			<? if($_SESSION['Logged']) { ?>
			<li class="UN"> <a href="<?php header("Location: index.php?action=profile"); ?>"><?php echo $_SESSION['Username']; ?> </a></li>
			<li class="UN"> <a href="<?php header("Location: index.php"); ?>"><?php LogOut(); ?>Logout </a></li>
			<? } else { ?><li class="UN"> <a href="<?php header("Location: index.php?action=login"); ?>">Login </a></li> <? } ?>
		</ul>
	</head>
	
	<body>
	
	<?php if(!$_SESSION['Logged']) { ?>
		<form  action="" method="POST">
		<div class="center">
			
			<div class="spacing"><label>Username: </label><input type="text" name="username"></div>
			<div class="spacing"><label>Password: </label><input type="password" name="password"></div>
			<div class="spacing"><input type="submit" name="Login" value="Shrek Up"></div>
		</div>
	</form>
	
	<?php 
		
	} else {
		Login($_POST['username'], $_POST['password']);  
		echo "Üdv újra  " . $_SESSION['Username'];
		//header("index.php?action=forum");
		} ?>
	
	
		<?php ListPost(); ?>
	
	</div>
-->
	</body>
	

</html>