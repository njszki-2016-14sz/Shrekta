<?php
session_start();

if(isset($_SESSION['usr_id'])) {
    header("Location: index.php");
}

include_once 'dbconnect.php';


$error = false;

if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
       
    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    if($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    }
    if (!$error) {
        if(mysqli_query($con, "INSERT INTO users(name,email,password) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "')")) {
            $successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
        } else {
            $errormsg = "Error in registering...Please try again later!";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Shrek Regisztráció</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
     <link href="shrek.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="http://www.iconarchive.com/download/i61338/majdi-khawaja/shrek/Shrek.ico" type="favicon/ico" />
</head>
<body>


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
    <input type="submit" name="login" value="Shrek Up" class="button" class="btn btn-primary" />
  
    </div>
  
  </form>

</div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">    
        <a href="login.php">Shrek In</a>
        </div>
    </div>
</div>
</body>
</html>


