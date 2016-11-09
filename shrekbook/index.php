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
		</ul>
	</head>
	
	<body>
	
	
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
	
	
	?>
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