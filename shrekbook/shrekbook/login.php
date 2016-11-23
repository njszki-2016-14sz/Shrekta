<?php 
	require("database.php");
	require("function.php");	?>
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

	</body>
	

</html>