<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="Styling/style2.css">
</head>
<body>
	<header>
	<h1>&nbsp;&nbsp;SuperCabbie.com</h1>
	
	<div class="centerright">
	<label class='l1'><?php
  session_start();
  echo "Welcome, ".$_SESSION['variable_name']."&nbsp;&nbsp;&nbsp;";
  ?></label>
		<a href="myPostings.php">My Postings</a>&nbsp;&nbsp;
		<a href="myBookings.php">My Bookings</a>&nbsp;&nbsp;
		<a href="insertData.php">Rent Car</a>&nbsp;&nbsp;
		<a href="login.php">Log Out</a><br/>
	</div>
</header>
	<?php include 'dataPrint.php' ?>
</body>
</html>