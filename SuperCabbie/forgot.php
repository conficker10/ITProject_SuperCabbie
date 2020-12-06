<?php
$showerror = false;
$showalert = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){		
		include 'connect.php';						
		
        $email = $_POST["email"];			
        $phone = $_POST["phone"];				
        $newpassword = $_POST["newpass"];						
		
        $sql = "SELECT * from `User_Data` WHERE `Email`='$email' AND  `Phone`='$phone' ";		
        $result = mysqli_query($mysqli,$sql);
        $num = mysqli_num_rows($result);			
 
        if($num == 1){								
            $newpass = md5($newpassword);			
            $update = "UPDATE `User_Data` SET `Password` = '$newpass' WHERE `User_Data`.`Email` = '$email'";	
            $retval = mysqli_query($mysqli,$update);		
 
            if(!$retval ) {
				echo "Something is Wrong. Try Again.";
            }
            else{
                $showalert = "Password Reset.";
				
             }
		}
        else{
            $showerror = "Credentials do not match";						
        }
 
        mysqli_close($mysqli);				
	}
?>



<html>
<head>
<title>Reset Password Page</title>
<link rel="stylesheet" href="Styling/style.css">
<style type="text/css">
form {
    display: inline-block;
}
body {
		  background : url("Background/3.jpg");
		  background-size: cover;
		  background-repeat: no-repeat;
		}
fieldset {
  background-color: grey;
  width:450px;
  height: 350px;
  opacity: 0.93;
}
</style>
</head>
<body>
	<?php
	if($showalert){
			   echo '<div class="success" style=" width: 300px; text-align: center;    background-color: rgb(158, 219, 45);margin : 20px auto;">
				<strong>Success! </strong></br>'.$showalert.'</div>';}
    if($showerror){
       echo '<div class="success" style=" width: 300px; text-align: center;    background-color: rgb(255,0,0);margin : 20px auto;">
        <strong>Error! </strong>'.$showerror.'</div>';}
	?>
	<h1>SuperCabbie.com</h1>
	<center>
	<fieldset>
	<h2><u>Reset Password</u></h2>
		<form name="myForm" method="post" action="forgot.php">
			<label>Email-ID: </label><input type="text" name="email" placeholder="Enter Your Email-ID" /><br/><br/>
			<label>Mobile No.: </label><input type="text" name="phone" placeholder="Enter Your Phone Number" /><br/><br/>
			<label>New Password : </label><input type="password" name="newpass" placeholder="Enter Your New Password" /><br/><br/>
			<button class="button" type="submit" value="Reset">Reset Password</button>
		</form>
		<br/>
		<a href="login.php">Click here to Login</a>
	</fieldset>
	<center>
</body>
</html>