<?php
$showalert = false;
$showerror = false;
include 'initialise.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	include 'connect.php';

	$u_name = $_POST["user_name"]; 
	$u_pass = $_POST["pass"];
	$u_phone = $_POST["phone"];
	$u_mail = $_POST["email"];
	
	$psw = md5($u_pass);

	$query = "SELECT * from `User_Data` WHERE `Email`='$u_mail'";
	$result = mysqli_query($mysqli, $query);
	$num = mysqli_num_rows($result);
	if($num == 1)
	{
		echo '<script>alert("Email-ID Already Exists.")</script>';
	}
	else{
		$statement = "INSERT INTO User_Data (Name, Email, Phone, Password, Admin_Access) 
						VALUES('$u_name', '$u_mail', '$u_phone', '$psw', 'No')"; 
			
		if ($mysqli->query($statement) === TRUE) {
			$showalert = "UserName: $u_mail<br/>Phone Number: $u_phone";
		} 
		else {
			echo "Error: " . $statement . "<br>" . $mysqli->error;
		}
	}
	
	$mysqli->close();
}
?>

<html>
	<head>
		<title>Registration Page</title>
		<link rel="stylesheet" href="Styling/style.css">
		<style>
		body {
		  background : url("Background/3.jpg");
		  background-size: cover;
		  background-repeat: no-repeat;
		}
		</style>
		<script src="Validation/script.js"></script>
	</head>
	<body>
		<?php
			if($showalert){
			   echo '<div class="success" style=" width: 300px; text-align: center;    background-color: rgb(158, 219, 45);margin : 20px auto;">
				<strong>Success! </strong> Your account is Created Successfully.</br>'.$showalert.'</div>';}
			if($showerror){
			   echo '<div class="success" style=" width: 300px; text-align: center;    background-color: rgb(255,0,0);margin : 20px auto;">
				<strong>Error! </strong>'.$showerror.'</div>';}
		?>
	
		<h1>SuperCabbie.com</h1>
		<center>
		<fieldset>
		<h2><u>Registration Form</u></h2>
		<form name="myForm" method="POST" action="register.php" onsubmit="return validateForm()">
		<label>Name: </label><input type="text" name="user_name" placeholder="Enter Your Name"><br><br>
		<label>Email: </label><input type="text" name="email" placeholder="Enter Your Email Address"><br><br>
		<label>Phone: </label><input type="text" name="phone" placeholder="Enter Your Phone Number"><br><br>
		<label>Password: </label><input type="password" name="pass" placeholder="Enter Your Password"><br><br>
		<button class="button" type="submit">Submit</button>&nbsp;&nbsp;
		<button class="button" type="reset">Reset</button>
		<br/><br/>
		<a href="login.php">Already Registered? Click Here to Login!</a><br/></div>
		</fieldset>
		</center>
	</body>
</html>