<?php
	session_start();
	header('index.php?=passchange')
 ?>
 
 
 <html>
	<head>
		<title>Shrekbook</title>
		<link href="shrek.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<form action="" method="POST">
		<div class="login">
			Jelszó változtatás
			<div class="spacing"><label>User name/Email: </label><input type="text" name="username"></div>
			<div class="spacing"><label>Jelelegi jelszó: </label><input type="password" name="password"></div>
			
			<div class="spacing"><label>Új jelszó: </label><input type="password" name="password"></div>
			<div class="spacing"><label>Új jelszó megerősítése: </label><input type="password" name="password"></div>
			
			<form enctype="multipart/form-data" action="" method="POST">				
				
			</form>
				<div class="spacing"><input type="submit" name="PassChange" value="Shrek Up"></div>
		</div>
	</form>
	
	</body>
	

</html>