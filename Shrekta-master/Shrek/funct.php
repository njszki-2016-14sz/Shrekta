<?php
$con = mysqli_connect("localhost", "root", "", "shrekbook") or die("Error " . mysqli_error($con));
			
	Class DB {
			
				

		    public function query($queryString) {
				$resultId = mysql_query($queryString, $this->$con);
				if(!$resultId){
					die('Query error: '.mysql_error());
				}
			}

			public function Close($con) {
				$close = mysqli_close($con);
				if(!$close){
					die('Close error: '.mysql_error());
				}
			}		
	}

	Class User {
		public function ChangePass($oldpass, $newpass, $cnewpass, $usrid, $con) {
			
			$oldpass = mysqli_real_escape_string($con, $oldpass);
			$newpass = mysqli_real_escape_string($con, $newpass);
			$cnewpass = mysqli_real_escape_string($con, $cnewpass);
			
			$result = mysqli_query($con, "SELECT '$usrid' FROM users WHERE password = '" . md5($oldpass) . "'");

				if ($result) {
					if($newpass == $cnewpass && $oldpass != $newpass) {
						$query = mysqli_query($con, "UPDATE `users` SET `password`= ".md5($newpass)." WHERE id = ".$usrid.";");
						$_SESSION['error'] = 'Sikeresen megváltoztattad a jelszavad! \n Kérlek jelentkezz be újra!';
						print($query);
						User::Logout();
					} else {
						$_SESSION['error'] = 'A megadott jelszók nem egyeznek';
					}
				} else $_SESSION['error'] = 'Hibás lekérdezés';
			DB::Close($con);	
		}
		
		public function Register($con, $name, $email, $password, $cpassword, $error) {
			if (isset($_POST['signup'])) {
				$name = mysqli_real_escape_string($con, $name);
				$email = mysqli_real_escape_string($con, $email);
				$password = mysqli_real_escape_string($con, $password);
				$cpassword = mysqli_real_escape_string($con, $cpassword);
				   
				if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
					$error = true;
					$_SESSION['error'] = "Name must contain only alphabets and space";
				}
				if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
					$error = true;
					$_SESSION['error'] = "Please Enter Valid Email ID";
				}
				if(strlen($password) < 6) {
					$error = true;
					$_SESSION['error'] = "Password must be minimum of 6 characters, dick weed";
				}
				if($password != $cpassword) {
					$error = true;
					$_SESSION['error'] = "Password and Confirm Password doesn't match, you dick weed";
				}
				if (!$error) {
					if(mysqli_query($con, "INSERT INTO users(name,email,password) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "')")) {
						header("Location: index.php?action=login");
						$_SESSION['error'] = "Successfully Registered! <a href='index.php?action=login'>Click here to Login</a>";
					} else {
						$_SESSION['error'] = "Error in registering...Please try again later!";
					}
				}
			}
			DB::Close($con);
		}
		
		public function Login($email, $password, $con){
			

				$email = mysqli_real_escape_string($con, $email);
				$password = mysqli_real_escape_string($con, $password);
				$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");

				if ($row = mysqli_fetch_array($result)) {
					$_SESSION['usr_id'] = $row['id'];
					$_SESSION['usr_name'] = $row['name'];
					if($row['admin'] == true) $_SESSION['IsAdmin'] = true;
					header("Location: index.php");
				} else {
					$_SESSION['error'] = "Incorrect Email or Password!!!";
				}
				DB::Close($con);
		}
			
			
		public function Logout(){
			
			if(isset($_SESSION['usr_id'])) {
				session_destroy();
				unset($_SESSION['usr_id']);
				unset($_SESSION['usr_name']);
				unset($_SESSION['IsAdmin']);
				header("Location: index.php");
				$_SESSION['error'] = "Sikeresen kijelentkeztél.";
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
					if(!$link) return $_SESSION['error'] = "Hibás lekérdezés!";
				
				
			} else {
				$_SESSION['error'] = "Nem adtál meg üzenetet";
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
					
					if(isset($_SESSION['IsAdmin'])){
						echo "<div id='admintextarea'><input type='submit' name='delete' value='Törlés'/></div> ";
						
					}
					echo "</div>";
				}
			} else  $_SESSION['error'] = "Hibás lekérdezés"; 			
		}	
		
		
	}
	
	class Admin {
		
		public function DeleteUser($userid, $con) {
			
			$res = mysqli_query($con, "DELETE * FROM `users` WHERE `id`='$userid';");
			if($res) $_SESSION['adminmsg'] = "Sikeresen törölted ".$userid." idjű felhasználót!";
			else $_SESSION['adminmsg'] = "Hibás lekérdezés!";
			DB::Close($con);
		}
		
		public function SetAdmin($userid, $con) {
			$res = mysqli_query($con, "UPDATE `users` SET `admin`='1' WHERE `id`='$userid';");
			if($res) $_SESSION['adminmsg'] = "Sikeresen adminná tetted ".$userid." idjű felhasználót!";
			else $_SESSION['adminmsg'] = "Hibás lekérdezés!";
			DB::Close($con);
		}
		
	}
	
	
















?>