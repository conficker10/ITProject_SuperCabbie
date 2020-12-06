<html>
<head>
<title>My Postings</title>
<link rel="stylesheet" href="Styling/style2.css">
<style>
	label {
    color: white;
    font-size: 20px;
    font-family: "museo-sans", Arial, Verdana;
    letter-spacing: 1px;
}
</style>
</head>
<body>
	<header>
	<h1>&nbsp;&nbsp;SuperCabbie.com</h1>
	<div class="centerright">
		<label><?php
	  session_start();
	  echo "Welcome, ".$_SESSION['variable_name']."&nbsp;&nbsp;&nbsp;";
	  $uid = $_SESSION['variable_id'];
	  ?></label>
		<a href='home.php'>Return to HomePage</a>&nbsp;&nbsp;
		<a href="insertData.php">Rent Car</a>&nbsp;&nbsp;
		<a href="login.php">Log Out</a><br/>
	</div>
</header>
<h1>&nbsp;&nbsp;<u>My Postings</u></h1>
<?php
	$con = mysqli_connect('localhost','root','','CarRentDB');
	if (!$con) {
	die('Could not connect: ' . mysqli_error($con));
	}
	$sql="SELECT * FROM Car_Data WHERE Owner = '".$uid."'";
	$result = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($result)) {
		echo "<div id='img_div' style=background-color:#D3D3D3;>";
      	echo "<img src='images/".$row['Image']."' >";
      	echo "<p><b>&nbsp;Brand: </b>".$row['Brand']."</p>";
		echo "<p><b>&nbsp;Model: </b>".$row['Model']."</p>";
		echo "<p><b>&nbsp;Variant: </b>".$row['Variant']."</p>";
		echo "<p><b>&nbsp;Fuel Type: </b>".$row['Fuel']."</p>";
		echo "<p><b>&nbsp;Transmission: </b>".$row['Transmission']."</p>";
		echo "<p><b>&nbsp;Year: </b>".$row['Year']."</p>";
		echo "<p><b>&nbsp;Rent (Per Day): </b>".$row['Rent']." Ruppees.</p>";
      echo "</div>";
}
if(mysqli_num_rows($result) == 0)
	echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><center><h1>No Result Found</h1></center>";
mysqli_close($con);
?>
</body>
</html>