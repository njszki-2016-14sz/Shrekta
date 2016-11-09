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
			<li class="UN"> <?php echo $_SESSION['Username']; ?> <a href="<?php header("index.php?action=profile"); ?>"></a></li>
			<li class="UN"> <?php LogOut(); ?> <a href="<?php header("index.php"); ?>"></a></li>
		</ul>
	</head>
	
	<body>
	
	<?php if(!$_SESSION['Logged']) { ?>
		<form  action="" method="POST">
		<div class="center">
			
			<div class="spacing"><label>Username: </label><input type="text" name="username"></div>
			<div class="spacing"><label>Password: </label><input type="password" name="password"></div>
			
			<form enctype="multipart/form-data" action="" method="POST">				
				
			</form>
				<div class="spacing"><input type="submit" name="Login" value="Shrek Up"></div>
		</div>
	</form>
	
	<?php 
		Login($_POST['username'], $_POST['password']);  
		echo "Üdv újra  " . $_SESSION['Username'];
	} else {
		header("index.php?action=forum");
		} ?>
	
	
	
	<!--<div class="UpPost" >
		Új Üzenet Hozzáadása
		<form action="" method="POST">
			<div class="NewPost">
				<input type="text" value="Írd be az üzenetet">
				<input type="submit" value="Shrek Up!">
		<?php /*UpPost($author, $_POST["text"]);*/ ?>
	
	</div>
	
	
	<div class="Posts" >
	
		<?php ListPost(); ?>
	
	</div>
-->
	</body>
	

</html>