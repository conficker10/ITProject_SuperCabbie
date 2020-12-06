<html>
<head>
<title>Checkout</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="Styling/style.css">
<style type="text/css">
body {
  background : url("Background/3.jpg");
  background-size: cover;
  background-repeat: no-repeat;
}
.button {
  background-color: #E50914; color: white;
}
fieldset {
  margin-top: 100px;
}
select { 
                width: 100%; 
                height: 5%;  
                cursor: pointer; 
                border:2px solid #ccc; 
                border-radius:4px;  
				font-size: 18px;
            }
</style>
</head>
<body>
<h1>SuperCabbie.com</h1>
<?php
$q = $_GET['q'];
$con = mysqli_connect('localhost','root','','CarRentDB');
if (!$con) {
die('Could not connect: ' . mysqli_error($con));
}
$sql="SELECT * FROM Car_Data WHERE id = ".$q."";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$val = $row['Rent'];
$id = $row['id'];
?>

<center>
<fieldset>
      	<label><b>&nbsp;Brand: </b><?php  echo"".$row['Brand']."" ?></label><br>
		<label><b>&nbsp;Model: </b><?php  echo"".$row['Model']."" ?></label><br>
		<label><b>&nbsp;Variant: </b><?php  echo"".$row['Variant']."" ?></label><br>
		<label><b>&nbsp;Fuel Type: </b><?php  echo"".$row['Fuel']."" ?></label><br>
		<label><b>&nbsp;Transmission: </b><?php  echo"".$row['Transmission']."" ?></label><br>
		<label><b>&nbsp;Year: </b><?php  echo"".$row['Year']."" ?></label><br>
		<label><b>&nbsp;Rent (per Day): </b><?php  echo"".$row['Rent']."" ?></label><br><br>
			<select name="day" id="day" onchange="myFunction()">
			  <option value="">Select No. of Days</option>
			  <option value="01">1</option>
			  <option value="02">2</option>
			  <option value="03">3</option>
			  <option value="04">4</option>
			  <option value="05">5</option>
			  <option value="06">6</option>
			  <option value="07">7</option>
			  <option value="08">8</option>
			  <option value="09">9</option>
			  <option value="10">10</option>
			  <option value="11">11</option>
			  <option value="12">12</option>
			  <option value="13">13</option>
			  <option value="14">14</option>
			  <option value="15">15</option>
			  <option value="16">16</option>
			  <option value="17">17</option>
			  <option value="18">18</option>
			  <option value="19">19</option>
			  <option value="20">20</option>
			  <option value="21">21</option>
			  <option value="22">22</option>
			  <option value="23">23</option>
			  <option value="24">24</option>
			  <option value="25">25</option>
			  <option value="26">26</option>
			  <option value="27">27</option>
			  <option value="28">28</option>
			  <option value="29">29</option>
			  <option value="30">30</option>
			  <option value="31">31</option>
		 </select>
<p style="color:white; font-size:20px;" id="demo"></p>
<p id="demo2"></p>
      </fieldset>
	  
</center>
<script type="text/javascript">
function myFunction() {
  var x = document.getElementById("day").value;
  var val = '<?php echo $val; ?>';
  var id = '<?php echo $id; ?>';
  document.getElementById("demo").innerHTML = "<b>Total:</b> " + x*val;
  document.getElementById("demo2").innerHTML = '<a href=orderPlace.php?q='+id+' class="button">Book Now</a>';
}
</script>
</body>
</html>