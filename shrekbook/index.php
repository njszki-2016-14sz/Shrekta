<?php 
	require("database.php");
	require("function.php");
	$forum = new Forum;
	
	?>
<html>
	<head>
<<<<<<< HEAD
	 	
		 <object width="100%" height="26px" autoplay="true" data="Allstar.mp3"></object>

		 

=======
>>>>>>> origin/master
		<title>Shrekbook</title>
		<link href="shrek.css" type="text/css" rel="stylesheet" />
		<link rel="shortcut icon" href="http://www.iconarchive.com/download/i61338/majdi-khawaja/shrek/Shrek.ico" type="favicon/ico" />
		<ul>
			<li><a class="active" href="#home">MainShrek</a></li>
			<li><a href="#news"></a></li>
			<li><a href="#contact">ShrekContact</a></li>
			<li><a href="#about">AboutShrek</a></li>
		<!--	<? if($_SESSION['Logged']) { ?>
			<li class="UN"> <a href="<?php /*header("Location: http://localhost/shrekbook/index.php");*/ ?>"><?php echo $_SESSION['Username']; ?> </a></li>
			--><li class="UN"> <a href="<?php header("index.php"); ?>"><?php $forum->LogOut(); ?>Logout </a></li> <!--
			<? } else { ?><li class="UN"> <a href="<?php /*header("Location: http://localhost/shrekbook/index.php");*/ ?>">Login </a></li> <? } ?> -->
		</ul>
	</head>
	
	<body>
	
	
	<?php if(!$_SESSION['Logged']) { ?>
		<form  action="" method="POST">
			<div class="center">
				<div class="spacing"><input type="submit" name="Login1" value="Login"></div>
				<div class="spacing"><input type="submit" name="Reg1" value="Register"></div>
	
			</div>
		</form>
	
	<?php 
	}
	
		if(isset($_POST['Reg1'])) {
	
			
				
				?>
				<form  action="" method="POST">
				<div class="center">
						<audio controls>						 
						  <source src="Allstar.mp3" type="audio/mpeg">					
						</audio> 
					<div class="spacing"><label>Username: </label><input type="text" name="username"></div>
					<div class="spacing"><label>Email: </label><input type="text" name="email"></div>
					<div class="spacing"><label>Phone: </label><input type="text" name="phone"></div>
					<div class="spacing"><label>Name: </label><input type="text" name="name"></div>
					<div class="spacing"><label>Password: </label><input type="password" name="password"></div>
					<div class="spacing"><label>Password: </label><input type="password" name="password2"></div>
					<div class="spacing"><input type="submit" name="Register" value="Shrek Up"></div>
					
					
					
					
					
					
					
				</div>
				</form>	
				
				<?php
				if(isset($_POST['RegUp'])) 
				$forum->Register($_POST['username'],$_POST['password'],$_POST['password2'],$_POST['email'],$_POST['phone'],$_POST['name']);
		} else if(isset($_POST['Login1'])) {
				?>
				<form  action="" method="POST">
					<div class="center">
				
						<div class="spacing"><label>Username: </label><input type="text" name="username"></div>
						<div class="spacing"><label>Password: </label><input type="password" name="password"></div>
						<div class="spacing"><input type="submit" name="Login" value="Shrek Up"></div>
				
				
					</div>
				</form>
				<?php
				if(isset($_POST['Login'])) {
					$forum->Login($_POST['username'], $_POST['password']);  
					
					header("index.php");
				}

		}?>
	
		<form action="" method="POST">
		<div class="ujpost">
			<div class="spacing" value="Írd be az üzeneted"><input type="text" name="text"></div>
			<div class="spacing"><input type="submit" name="ShrekUp" value="Shrek Up"></div>
			<?php if(isset($_POST['ShrekUp']))$forum::UpPost($_SESSION['Username'], $_POST['text']);?>
		</form>


		<div class="postok">
		<?php 

			$forum->ListPost();			
		?>
		</div>
	
	</div>

	</body>
	

</html>