<?php 
	require("database.php");
	require("function.php");
	$author = SESSION['author'];
	
	?>
<html>
	<head>
		<title>Shrekbook</title>
	</head>
	
	<body>
		<form action="" method="POST">
		<div class="login">
			
			<div class="spacing"><label>User name/Email: </label><input type="text" name="username"></div>
			<div class="spacing"><label>Password: </label><input type="password" name="password"></div>
			
			<form enctype="multipart/form-data" action="" method="POST">				
				
			</form>
				<div class="spacing"><input type="submit" name="Login" value="Shrek Up"></div>
		</div>
	</form>
	<div class="UpPost" >
		Új Üzenet Hozzáadása
		<form action="" method="POST">
			<div class="NewPost">
				<input type="text" value="Írd be az üzenetet">
				<input type="submit" value="Shrek Up!">
		<?php UpPost($author, $_POST["text"]); ?>
	
	</div>
	
	
	<div class="Posts" >
	
		<?php ListPost(); ?>
	
	</div>

	</body>
	

</html>