<?php
session_start();
require("database.php");
class Forum {

	public function Login ($Username, $Password) {
		
			$query = "(SELECT * FROM user WHERE Username = '$Username' AND Password = '$Password');";
			$link = mysql_fetch_assoc(mysql_query($query));
			if(!$link) {
				print("Hibás felhasználónév vagy jelszó!");
				
			} else { 

				$_SESSION['Username'] = $link['Username'];
				$_SESSION['ID'] = $link['ID'];
				$_SESSION['Logged'] = true;		
				//header("Location: index.php?action=forum");
				
			}
		
		
	}

	public function LogOut() {
		
		$_SESSION['Logged'] = false;
		$_SESSION['Username'] = "";
		//header("Location: index.php");
		
	}

	public function Register($Username, $Password, $Pw2, $Email, $Phone, $Name) {
		
			if(JoEmail($Email)) {
				$query = "INSERT INTO user (ID, Username, Password, Email, Phone, Name) VALUES (NULL, $Username, MD5($Password), $Email, $Phone, $Name);";
				$link = mysql_query($query);
				if(!$link) {
					print("Hiba");
				}
			} else { print("Hibás Email Formátum"); }
			
			
			
		
		
	}

	public function UpPost($author, $text){
			
				if(!empty($text)) {
					$link = "INSERT INTO `post` (`ID`, `Author`, `Text`, `Likes`, `Liked`) VALUES (NULL, '$author', '$text', '0', '');";
					$query = mysql_query($link);
					if($query) 
						return print("Sikerült"); 
					else 
							return print($_SESSION['Username']); 
				//	header("Location: index.php");
				} 
			
				
		}
		
	public function Like($MyID) {
		
		$query = "SELECT * FROM post WHERE 1;";
		$link = mysql_fetch_assoc(mysql_query($query));
		if($link) {
			
			$_SESSION['Like'] = $link['Like'];
			$_SESSION['Liked'] = $link['Liked'];
			
				return $_SESSION['Like'];
			
		} else { return "Hiba!"; }
		
	}
	
	public function ListPost() {
		
		
		$query = mysql_query("SELECT * FROM `post` ORDER BY `author` ASC;");	
		$result = mysql_query("SELECT COUNT(id) FROM post;");
		if($query) {
			$count = mysql_result($result, 0);  
				for($i = 0; $i < $count; $i++){
					$row =  mysql_fetch_row($query);
					
						print("<p>$row[1] <br>");
						print("$row[2] <br>");
						//print("<input type='submit' name='like value='$like'>$row[3] like </p>");
						print(Forum::Like($_SESSION['ID']));
				}
			
		}
		else 
			return print("hiba");
		
	}

	private static function JoEmail($email) {
		return preg_match('/^[\w.-]+@([\w.-]+\.)+[a-z]{2,6}$/is', $email);
	}
}
	?>
	
	
	
	
	
	
	
	
	