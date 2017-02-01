<?php
//connect to mysql database
$con = mysqli_connect("localhost", "root", "", "autojavitas") or die("Error " . mysqli_error($con));
mysqli_query($con, "set names 'utf8'");  
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Autó</title>

</head>
<body>
 

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        
        </div>
        <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
                
                
                <li><a href="index.php?action=javitas">Javítások adatai</a></li>
                <li><a href="index.php?action=export">Adatexportálás</a></li>
               
            </ul>
        </div>
    </div>
</nav> 
	<?php 
		function Lista($con){
			$auto = mysqli_query($con, "SELECT `nev`, `rendszam`, `telefon`  FROM autosok LIMIT 1;");
			$szerelo = mysqli_query($con, "SELECT `nev` FROM szerelok LIMIT 1; ");
			$tipus = mysqli_query($con, "SELECT `tipusnev` FROM tipusok LIMIT 1;");
			$javitas = mysqli_query($con, "SELECT `datum`, `javido`, `iranyar` FROM javitasok LIMIT 1;");
			if($auto && $szerelo && $tipus && $javitas){
				$car = mysqli_fetch_array($auto);
				$mech = mysqli_fetch_array($szerelo);
				$tip = mysqli_fetch_array($tipus);
				$javit = mysqli_fetch_array($javitas);
				
				for($n = 1;$n < 2; $n++){
					echo "<div >";
					echo "<div >Név: ";	echo $car['nev'];echo "</div>";
					echo "<div >Rendszám: ";	echo $car['rendszam'];echo "</div>";
					echo "<div >Tipus: ";	echo $tip['tipusnev'];echo "</div>";
					echo "<div >Telefon: ";	echo $car['telefon'];echo "</div>";
					echo "<div >Szerelő: ";	echo $mech['nev'];echo "</div>";
					echo "<div >Dátum: ";	echo $javit['datum'];echo "</div>";
					echo "<div >Javitás ideje: ";	echo $javit['javido'];echo "</div>";
					echo "<div >Ár: ";	echo $javit['iranyar'];echo " Ft</div>";
					
				}
			}
		}


	?>

			<?php 
				if(isset($_GET['action'])) {
							switch ($_GET['action'])
							{	
										case 'javitas': Lista($con);
										?> <input type="submit" name="next" value="Next" /> <?php
										 break;
							}
				}
			?>