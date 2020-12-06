<?php
	$mysql_host = "localhost";
	$mysql_username = "root";
	$mysql_password = "";
	$mysql_database = "CarRentDB";
	
	$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password);
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
	
	$sql = "CREATE DATABASE IF NOT EXISTS CarRentDB";
	if($mysqli->query($sql) == TRUE)
	{
		$mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
		if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
		}
		$table = 
		"CREATE TABLE IF NOT EXISTS User_Data (id int(11) AUTO_INCREMENT,
														Name varchar(100) NOT NULL,
														Email varchar(100) NOT NULL,
														Phone varchar(10) NOT NULL,
														Password varchar(100) NOT NULL,
														Admin_Access varchar(40) NOT NULL,
														KEY (id),
														PRIMARY KEY (Email))";
						 
		$mysqli->query($table);
		
		$table2 = 
		"CREATE TABLE IF NOT EXISTS Car_Data (id int(11) AUTO_INCREMENT,
														Brand varchar(100) NOT NULL,
														Model varchar(100) NOT NULL,
														Variant varchar(100) NOT NULL,
														Fuel varchar(100) NOT NULL,
														Transmission varchar(100) NOT NULL,
														Year varchar(100) NOT NULL,
														Rent int(30) NOT NULL,
														Owner int(11),
														Rented_By int(11),
														Image varchar(100) NOT NULL,
														PRIMARY KEY (id),
														FOREIGN KEY (Rented_By) REFERENCES User_Data(id))";
		
		$mysqli->query($table2);
	}
	else
	{
		$showerror = "Error Creating DB";
	}
	$query = "SELECT * from `User_Data` WHERE `Email`='admin@supercabbie.com'";
	$result = mysqli_query($mysqli, $query);
	$num = mysqli_num_rows($result);
	$pass = "abcd1234";
	$psw = md5($pass);
	if($num == 0)
	{
		$statement = "INSERT INTO User_Data (Name, Email, Phone, Password, Admin_Access) 
						VALUES('Mr. Admin', 'admin@supercabbie.com', '8950626006', '$psw', 'Yes')";
		
		$mysqli->query($statement);
	}
?>