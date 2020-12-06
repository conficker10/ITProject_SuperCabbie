<?php
session_start();
$showerror = false;
include 'initialise.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	include 'connect.php';	
	
	
	$u_mail = $_POST["email"];
	$u_pass = $_POST["password"];

	$psw = md5($u_pass);
	
	$query = "SELECT * from `User_Data` WHERE `Email`='$u_mail' AND  `Password`='$psw' ";
    $result = mysqli_query($mysqli, $query);
    $num = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
$_SESSION['variable_name']=$row['Name'];
$_SESSION['variable_id']=$row['id'];
	
	if($num == 1)
	{
		header("Location: home.php");
	}
	else
	{
		$showerror = "Invalid Login Credentials.";
	}
	$mysqli->close();
}
?>


<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="Styling/style.css">
<style type="text/css">
body {
  background : url("Background/3.jpg");
  background-size: cover;
  background-repeat: no-repeat;
}
</style>
</head>
<body>
<?php
    if($showerror){
       echo '<div class="success" style=" width: 300px; text-align: center;    background-color: rgb(255,0,0);margin : 20px auto;">
        <strong>Error! </strong>'.$showerror.'</div>';}
?>
	<h1>SuperCabbie.com</h1>
	<center>
	<fieldset>
		<h2><u>Login</u></h2>
		<form name="myForm" method="post" action="login.php">
			<label>Email-ID : </label><input type="text" name="email" placeholder="Enter Your Email-ID"  /><br/><br/>
			<label>Password : </label><input type="password" name="password" placeholder="Enter Your Password" /><br/><br/>
			<button class="button" type="submit" value="Login" >Login</button>
			<br/><br/>
			<a href="register.php">New User? Register Here!</a><br/>
			<a href="forgot.php">Forgot Password? Click Here!</a><br/>
		</form>
	</fieldset>
	</center>
</body>
</html>