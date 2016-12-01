<?php 
	include_once 'Dbconnect.php';
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


























