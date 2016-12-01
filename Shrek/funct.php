<?php
include('Dbconnect.php');
	Class Shrek{
		
		
		public function Register($con, $name, $email, $password, $cpassword, $error) {
			if (isset($_POST['signup'])) {
				$name = mysqli_real_escape_string($con, $name);
				$email = mysqli_real_escape_string($con, $email);
				$password = mysqli_real_escape_string($con, $password);
				$cpassword = mysqli_real_escape_string($con, $cpassword);
				   
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
						header("Location: login.php");
						$successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
					} else {
						$errormsg = "Error in registering...Please try again later!";
					}
				}
			}
		}
		
		public function Login($email, $password, $con, $errormsg){
			

				$email = mysqli_real_escape_string($con, $email);
				$password = mysqli_real_escape_string($con, $password);
				$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");

				if ($row = mysqli_fetch_array($result)) {
					$_SESSION['usr_id'] = $row['id'];
					$_SESSION['usr_name'] = $row['name'];
					header("Location: index.php");
				} else {
					$errormsg = "Incorrect Email or Password!!!";
				}
			}
			
			
		public function Logout(){
			
			if(isset($_SESSION['usr_id'])) {
				session_destroy();
				unset($_SESSION['usr_id']);
				unset($_SESSION['usr_name']);
				header("Location: index.php");
			} else {
				header("Location: index.php");
			}
		}
	}
	
	class Post{
		
		public function NewPost($author, $message, $con){
			$name = mysqli_real_escape_string($con, $author);
			$text = mysqli_real_escape_string($con, $message);
			
			
			if(!empty($text)){
				$link = mysqli_query($con, "INSERT INTO `post` (`ID`, `Author`, `Text`, `Date`) VALUES (NULL, '$name', '$text', CURTIME())");
					if(!$link) return print("Hibás lekérdezés!");
				
				
			} else {
				return print("Nem adtál meg üzenetet");
			}
			
			
		}
		
		public function ListPost($con){
			
			$link = mysqli_query($con, "SELECT * FROM `post` WHERE 1 ORDER BY `ID` DESC");
			if($link) {
				
				while($row =  mysqli_fetch_array($link)) {
					echo "<div id='post'>";
					echo "<div id='name'>";	echo $row['Author'];echo "</div>";
					echo "<div id='time'>";	echo $row['Date'];echo "</div>";
					echo "<div id='text'>";	echo $row['Text'];	echo "</div>";
					echo "</div>";
				}
			} else  return print("Hibás lekérdezés"); 
			
			
		}
		
		
		
	}
















?>