<?php
$mysql_host = "localhost";
$mysql_username = "root";
$mysql_password = "";
$mysql_database = "CarRentDB";
	
$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

if ($mysqli->connect_error) 
{
	die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
	
?>