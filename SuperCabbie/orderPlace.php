<html>
<head>
<title>Thank You</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="Styling/style.css">
<style type="text/css">
body {
  background : url("Background/3.jpg");
  background-size: cover;
  background-repeat: no-repeat;
}
.button {
	background-color: #E50914;
  color: white;
}
fieldset {
  margin-top: 100px;
}

</style>
</head>
<body>
<?php
session_start();
$val = $_SESSION['variable_id'];
$q = $_GET['q'];
$con = mysqli_connect('localhost','root','','CarRentDB');
if (!$con) {
die('Could not connect: ' . mysqli_error($con));
}
$sql="UPDATE Car_Data SET Rented_By= ".$val." WHERE id = ".$q."";
$result = mysqli_query($con,$sql);
?>
<h1>SuperCabbie.com</h1>
<body>
<center>
<fieldset>
      	<label>Thank You for choosing SuperCabbie.<br/>Your order has been booked.<br/><br/>Your Driving License will be verified on<br/>Pick-Up/Delivery.</label><br>
		<br><a href='home.php' class='button'>Go to HomePage</a>
</fieldset>
	  
</center>";}

</body>
</html>