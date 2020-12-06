<?php
session_start();
$uid = $_SESSION['variable_id'];
$showalert = false;
$showerror = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	include 'connect.php';
	
	$brand = $_POST["brand"]; 
	$model = $_POST["model"];
	$variant = $_POST["variant"];
	$fuel = $_POST["fuel"];
	$transmission = $_POST["transmission"];
	$year = $_POST["year"];
	$rent = $_POST["rent"];
	
	$image =  $_FILES["image"]["name"];
	$tempname = $_FILES["image"]["tmp_name"];	
	$target = "images/".basename($image);
	
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
	
	$statement = "INSERT INTO Car_Data (Brand, Model, Variant, Fuel, Transmission, Year, Image, Rent, Owner, Rented_By) 
					VALUES('$brand', '$model', '$variant', '$fuel', '$transmission', '$year', '$image', $rent, $uid, '0')"; 
			
	$mysqli->query($statement);
	if (move_uploaded_file($tempname, $target))  { 
        $showalert = "Content uploaded successfully"; 
    }else{ 
        $showerror = "Failed to upload Image/No Image Attached."; 
    } 
	
	$mysqli->close();
}
?>

<html>
	<head>
		<title>Upload Page</title>
		<link rel="stylesheet" href="styling/style.css">
		<style>
			body {
			  background : url("Background/3.jpg");
			  background-size: cover;
			  background-repeat: no-repeat;
			}
			fieldset {
			  background-color: grey;
			  width:550px;
			  opacity: 0.93;
			}
		</style>
		<script src="Validation/datascript.js"></script>
	</head>
	<body>
	<div id="content">
		<?php
			if($showalert){
			   echo '<div class="success" style=" width: 300px; text-align: center;    background-color: rgb(158, 219, 45);margin : 20px auto;">
				<strong>Success! </strong> Success.</br>'.$showalert.'</div>';}
			if($showerror){
			   echo '<div class="success" style=" width: 300px; text-align: center;    background-color: rgb(255,0,0);margin : 20px auto;">
				<strong>Error! </strong>'.$showerror.'</div>';}
		?>
	
		<h1>SuperCabbie.com</h1>
		<center>
		<fieldset>
		<h2><u>Upload Details</u></h2>
		<form name="myForm" method="POST" action="insertData.php" enctype="multipart/form-data" onsubmit="return validateForm()">
		
		<label>Brand: </label><input type="text" name="brand" placeholder="Brand"><br><br>
		<label>Model: </label><input type="text" name="model" placeholder="Model"><br><br>
		<label>Variant: </label><input type="text" name="variant" placeholder="Variant"><br><br>
		<label>Fuel Type: </label>
		<select name="fuel" id="fuel">
		  <option value="Petrol">Petrol</option>
		  <option value="Diesel">Diesel</option>
		  <option value="CNG">CNG</option>
		</select>
		<br><br>
		<label>Transmission: </label>
		<select name="transmission" id="transmission">
		  <option value="Automatic">Automatic</option>
		  <option value="Manual">Manual</option>
		</select><br><br>
		<label>Year: </label><input type="text" name="year" placeholder="Year of Manufacture"><br><br>
		<label>Rent (Per Day): </label><input type="text" name="rent" placeholder="Rent (in Ruppees)"><br><br>
		<input type="hidden" name="size" value="1000000">
		<div>
			<label>Upload Image: </label><input type="file" name="image">
		</div>
		<br/><br/>
		<button class="button" type="submit">Submit</button>&nbsp;&nbsp;
		<button class="button" type="reset">Reset</button>
		<br/><br/>
		<a href='home.php'>Return to HomePage</a><br/>
		
		</fieldset>
		<center>
	</body>
</html>