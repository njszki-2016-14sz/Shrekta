<?php
session_start();
include_once 'dbconnect.php';
include_once 'post.php';
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

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        
        </div>
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['usr_id'])) { ?>
                <li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
                <li><a href="logout.php">Shrek Out</a></li>
                <?php } else { ?>
                <li><a href="login.php">Shrek in</a></li>
                <li><a href="register.php">Shrek Up</a></li>
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
                    <label for="name">Text</label>
					
					<span class="text-danger"><?php if (isset($text_error)) echo $text_error; ?></span>
                </div>
			
		
			</div>
			
				<div id="post-editor" class="post-editor js-post-editor">

					<div style="position: relative;">     
						<div class="wmd-container">
							<div id="wmd-button-bar" class="wmd-button-bar"></div>
							<textarea id="wmd-input" class="wmd-input" name="post-text" cols="92" rows="15" tabindex="101" data-min-length=""></textarea>
						</div>
					</div>

					<div class="fl" style="margin-top: 8px; height:24px;">&nbsp;</div>
					<div id="draft-saved" class="draft-saved community-option fl" style="margin-top: 8px; height:24px; display:none;">draft saved</div>

					<div id="draft-discarded" class="draft-discarded community-option fl" style="margin-top: 8px; height:24px; display:none;">draft discarded</div>
					
					<input type="submit" name="UpPost" value="Shrek Up!">





				</div>
			</div>
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
		
		<!--------------------------------------------------------------------------------------------------------------------------------------->
</body>
</html>