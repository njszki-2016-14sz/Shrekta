<?php
session_start();

if(isset($_SESSION['usr_id'])) {
    header("Location: index.php");
}

include 'funct.php';


$error = false;

if (isset($_POST['signup'])) {
   Shrek::Register($con, $_POST['name'], $_POST['email'], $_POST['password'], $_POST['cpassword'], $error);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Shrek Regisztráció</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
     <link href="shrek.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="http://www.iconarchive.com/download/i61338/majdi-khawaja/shrek/Shrek.ico" type="favicon/ico" />
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<audio controls autoplay="autoplay">
  <source src="Allstar.ogg" type="audio/ogg">
  <source src="Allstar.mp3" type="audio/mpeg" preload="auto">
  <p>Your browser does not support the audio element.</p>
</audio>

        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login.php">Shrek in</a></li>
                <li class="active"><a href="register.php">Shrek Up</a></li>
            </ul>
        </div>
    </div>
</nav>

<div id="wrapper">

  <form name="login-form" class="login-form" action="" method="post">
  
    <div class="header">
    <h1>Shrekbook</h1>
    <span>Only for green ones.</span>
    </div>
  
    <div class="content">
        <input name="name" type="text" class="input username" required class="form-control" required value="<?php if($error) echo $name; ?>" placeholder="Enter Full Name" />
        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
   
        <input name="email" type="text" class="input password" class="form-control" placeholder="Email" required class="form-control" required value="<?php if($error) echo $email; ?>" />
        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
    
        <input name="password" type="password" class="input password" class="form-control" placeholder="Password" required class="form-control" />
        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>

        <input name="cpassword" type="password" class="input password" class="form-control" placeholder="Confirm Password" required class="form-control" />
        <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>

    </div>
    <div class="footer">
    <input type="submit" name="signup" value="Shrek Up" class="button" class="btn btn-primary" />
  
    </div>
  
  </form>

</div>
    </div>
</div>
<div> <img id="pics"  src="shrek.png" > </div>

        <script>
        $( document ).ready(function() {
          $( "div" ).effect( "slide", "slow" );
        });
        </script>
</body>
</html>


