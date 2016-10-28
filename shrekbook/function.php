<?php
session_start();

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
	
	function joemail($email) {
		return preg_match('/^[\w.-]+@([\w.-]+\.)+[a-z]{2,6}$/is', $email);
	}
	?>