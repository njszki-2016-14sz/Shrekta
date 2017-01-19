<?php

$db_username = 'root';
$db_password = '';
$db_name = 'termekek';
$db_host = 'localhost';
                
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);                       
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_error .') '. $mysqli->connect_error);
}

?>
