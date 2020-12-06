<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="Styling/style3.css">
</head>
<body>
<?php
session_start();
$id = $_SESSION['variable_id'];
$q = $_GET['q'];
$con = mysqli_connect('localhost','root','','CarRentDB');
if (!$con) {
die('Could not connect: ' . mysqli_error($con));
}
$sql="SELECT * FROM Car_Data WHERE Brand like '%".$q."%' OR Model like '%".$q."%'";
$result = mysqli_query($con,$sql);
$count = 0;
while($row = mysqli_fetch_array($result)) {
	if($row['Rented_By'] == '0'){
		$count++;
		echo "<div id='img_div' style=background-color:#D3D3D3;>";
      	echo "<img src='images/".$row['Image']."' >";
      	echo "<p><b>&nbsp;Brand: </b>".$row['Brand']."</label>";
		if($id == 1){
		echo"<a href='deleteData.php?q=".$row['id']."&p=".$row['Image']."' style='float: right; margin-right:20px; margin-top:-5px; font-size: 25px;'><i class='fa fa-trash'></i></a></p>";}
		echo "<p><b>&nbsp;Model: </b>".$row['Model']."</p>";
		echo "<p><b>&nbsp;Variant: </b>".$row['Variant']."</p>";
		echo "<p><b>&nbsp;Fuel Type: </b>".$row['Fuel']."</p>";
		echo "<p><b>&nbsp;Transmission: </b>".$row['Transmission']."</p>";
		echo "<p><b>&nbsp;Year: </b>".$row['Year']."</p><a href='bookOrder.php?q=".$row['id']."' style='float: right; margin-right:20px; margin-top:-25px; font-size: 25px;'>&nbsp;Book Now&nbsp;</a></p>";
		echo "<p><b>&nbsp;Rent (Per Day): </b>".$row['Rent']." Ruppees.</p>";
		echo "</div>";
	}
	
}
if(mysqli_num_rows($result) == 0 || $count == 0)
{
	echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><center><h1>No Result Found</h1></center>";
}
mysqli_close($con);
?>
</body>
</html>