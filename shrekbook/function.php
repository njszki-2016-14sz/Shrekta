<?php
session_start();



function Login ($Username, $Password) {
	
		$query = "(SELECT * FROM user WHERE Username = '$Username', Password = '$Password');";
		$link = mysql_query($query);
		if(!$link) {
			print("Hibás felhasználónév vagy jelszó!");
			
		} else { 
			$_SESSION['Username'] = $row['Username'];
			$_SESSION['Logged'] = true;		
			header("Location: index.php?is_logged_in=1?");
		}
	
	
}

function Register($Username, $Password, $Email, $Phone, $Name) {
	
		if(JoEmail($Email)) {
			$query = "INSERT INTO user (ID, Username, Password, Email, Phone, Name) VALUES (NULL, $Username, MD5($Password), $Email, $Phone, $Name);";
			$link = mysql_query($query);
			if(!$link) {
				print("Hiba");
			}
		} else { print("Hibás Email Formátum"); }
		
		
		
	
	
}



function UpPost($author, $text){
	
		if(!empty($text)) {
		$query = mysql_query("INSERT INTO `post` (`ID`, `Author`, `Text`, `Likes`) VALUES (NULL, '$author', '$text', '0');");
		header("Location: index.php \n");
		} 
	
		
}
	
	function ListPost() {
		
		$query = mysql_query("SELECT * FROM `post` ORDER BY `author` ASC;");	
		$result = mysql_query("SELECT COUNT(id) FROM post;");
		if($query) {
			$count = mysql_result($result, 0);  
				for($i = 0; $i < $count; $i++){
					$row =  mysql_fetch_row($query);
					
					
					
						print("<div id=\"chat\">");
						print("<p>$row[1] ");
						print("$row[2] ");
						print("$row[3] </p>");
						print("</div>");
				}
			
		}
		else 
			return print("hiba");
		
	}
	
	function JoEmail($email) {
		return preg_match('/^[\w.-]+@([\w.-]+\.)+[a-z]{2,6}$/is', $email);
	}
	?>