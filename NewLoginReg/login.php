<?php
session_start();

if(isset($_SESSION['usr_id'])!="") {
    header("Location: index.php");
}

include_once 'dbconnect.php';
//check if form is submitted
if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");

    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['usr_id'] = $row['id'];
        $_SESSION['usr_name'] = $row['name'];
        header("Location: index.php");
    } else {
        $errormsg = "Incorrect Email or Password!!!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Shrekbook</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link href="shrek.css" type="text/css" rel="stylesheet" />
      <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="shortcut icon" href="http://www.iconarchive.com/download/i61338/majdi-khawaja/shrek/Shrek.ico" type="favicon/ico" />
</head>
<body>
<audio controls>
  <source src="Allstar.mp3" type="audio/mpeg">
</audio> 

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        
        </div>
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="login.php">Shrek in</a></li>
                <li><a href="register.php">Shrek Up</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
               <!-- <fieldset>
                    <legend>Shrek in</legend>
                    
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="email" placeholder="Your Email" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" name="password" placeholder="Your Password" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <input type="submit" name="login" value="Login" class="btn btn-primary" />
                    </div>
                </fieldset>
                -->
            </form>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        </div>
    </div>
</div>


<div id="wrapper">

  <form name="login-form" class="login-form" action="" method="post">
  
    <div class="header">
    <h1>Shrekbook</h1>
    <span>What are you doing in my swamp?</span>
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
    <div> <img id="pics"  src="shrek.png" > </div>

        <script>
        $( document ).ready(function() {
          $( "div" ).effect( "slide", "slow" );
        });
        </script>

</body>
</html>
