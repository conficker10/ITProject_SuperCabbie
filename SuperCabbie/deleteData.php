<?php
	$id = $_GET['q'];
	$imgPath = $_GET['p'];
	$imgdelete = 'images/'.$imgPath;
	
	
	include 'connect.php';
	$sql="delete from Car_Data where id = '".$id."'";
	$result = mysqli_query($mysqli,$sql);
	if($result)
	{
		unlink($imgdelete);
		header("Location: home.php");
	}
?>