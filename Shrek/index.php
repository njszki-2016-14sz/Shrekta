<?php
session_start();
include 'funct.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Shrekbook</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link href="shrek.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="http://www.iconarchive.com/download/i61338/majdi-khawaja/shrek/Shrek.ico" type="favicon/ico" />
</head>
<body>
<audio controls autoplay="autoplay">
  <source src="Allstar.mp3" type="audio/mpeg" preload="auto">
    <source src="Allstar.ogg" type="audio/ogg" >
  <p>Your browser does not support the audio element.</p>
</audio>  

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        
        </div>
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['usr_id'])) { ?>
                <li><p class="navbar-text"><a href="index.php?action=index">Signed in as <?php echo $_SESSION['usr_name']; ?></a></p></li>
					<?php if(isset($_SESSION['IsAdmin'])) { ?>
						<li><a href="index.php?action=admin">Admin</a></li>
					<?php } ?>
                <li><a href="index.php?action=logout">Shrek Out</a></li>
                <?php } else { ?>
                <li><a href="index.php?action=login">Shrek in</a></li>
                <li><a href="index.php?action=register">Shrek Up</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
	<!---------------------------------------------------------------------------------------------------------------------->
	<?php if(!empty($_SESSION['usr_name'])) { ?>
		<div class="newpost">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="uppost">
				<div class="form-group">
                    <label id="posttext" for="name">Post Here !!</label>
					
					<span class="text-danger"><?php if (isset($text_error)) echo $text_error; ?></span>
                </div> 
			</div>
				<div class="post-editor js-post-editor">
					<div>     
						<div class="wmd-container">
							<div id="wmd-button-bar" class="wmd-button-bar"></div>
							<textarea id="wmd-input" class="wmd-input" name="post-text" cols="92" rows="15" tabindex="101" data-min-length=""></textarea>
						</div>
					</div>	
					<input id="uppost" type="submit" name="UpPost" value="Post Up!" class="footer" class="button" class="btn btn-primary">
				</div>
			</div>
			
			<!--- Admin menü -->
			
			<?php if(isset($_SESSION['IsAdmin']))  { ?>
				
				<div class="menu">
					<ul>
						<li><a href="index.php?action=changepass" name="changepass">Jelszó Módosítás</a></li>
						<li><a href="index.php?action=deluser" name="deleteuser">Felhasználó törlése</a></li>
						<li><a href="index.php?action=makeadmin" name="makeadmin">Admin kinevezés</a></li>
					</ul>
				
				<?php 
				if(isset($_GET['action'])) {
					switch ($_GET['action'])
					{
						
						case 'deluser': Admin::DeleteUser($_POST['DelUserID']); break;
						case 'makeadmin': Admin::SetAdmin($_POST['NewAdminID']); break;
						case 'admin': Admin::SetAdmin($_POST['NewAdminID']); break;
						case 'logout': Shrek::LogOut(); break;
						
						
						
					}
				}
					if(isset($_SESSION["adminmsg"]))
					{
						$error=$_SESSION["adminmsg"];?>
						<span id='hint'><?php print $error;?></span><br><?php
						$_SESSION["adminmsg"]=null;
					} 
				?>
				
				</div>
			
			<?php  ?>
			
			<!-- User menü -->
			
			<?php } else { ?>
				
				<li><a href="index.php?action=changepass" name="changepass">Jelszó Módosítás</a></li>
				
		<?php	}
			?>
		
		<!--- Changepass -->
		<?php 
		if(isset($_GET['action'])) {
			switch ($_GET['action'])
			{	
						case 'changepass':
						
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
								<input name="oldpass" type="password" class="input username" required class="form-control" placeholder="Old Password" />
								
								<input name="newpass" type="password" class="input password" class="form-control" placeholder="Password" required class="form-control" />

								<input name="cnewpass" type="password" class="input password" class="form-control" placeholder="Confirm Password" required class="form-control" />
								

							</div>
							
							<div class="footer">
							<input type="submit" name="changepassword" value="Shrek Up" class="button" class="btn btn-primary" />
						  
							</div>
						  
						  </form>

						</div>
							</div>
						</div>
		
			<?php 
				if(isset($_POST['changepassword'])) {
					User::ChangePass($_POST['olddass'],$_POST['newpass'], $_POST['cnewpass'], $_SESSION['usr_id'], $con);
				}
				
				; break;
				
			}
		}?>
		
		<!--- POSTOK --------------------------------------------------------------->
		<?php
			
				$error = false;
					if(isset($_POST['UpPost'])){
						if(empty($_POST['post-text'])){
							$text_error = "Nem lehet üresen hagyni";
							$error = true;
						}
						if(!$error) Post::NewPost($_SESSION['usr_name'], $_POST['post-text'], $con);
					}

				?>

			<div class="listpost">

				<?php
					Post::ListPost($con);
			}
				?>
		</div> 
		
		
		<!--- LOGIN - REGISTER !! ------------------------------------------------------------------------------------------------------------------------------------>
		
		<?php 
		if(isset($_GET['action'])) {
					switch ($_GET['action'])
					{	
						case 'login': /*login*/
						
						if(isset($_SESSION['usr_id'])!="") {
							header("Location: index.php");
						}
							//$errormsg = "";
						
						if (isset($_POST['login'])) {	
							Shrek::Login($_POST['email'], $_POST['password'], $con);
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
						   Shrek::Register($con, $_POST['name'], $_POST['email'], $_POST['password'], $_POST['cpassword'], $error);

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
						<div> <img id="pics"  src="shrek.png" > 
						 <img src="szamar.png" > </div>

								<script>
								$( document ).ready(function() {
								  $( "div" ).effect( "slide", "slow" );
								});
								</script>

						<?php
						
						
						; break;
					}
		}
	
				?>
		<!-- LOG/REG Vége -->	
</body>
</html>