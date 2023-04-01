<?php
    include("database.php");
    include("functions.php");
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	$firsname=$_POST['first_name'];
	$middleInit=$_POST['middle_initial'];
	$lastname=$_POST['last_name'];
	
	mysqli_query($con,"INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `middleInit`, `lastname`, `role`, `archived`) VALUES (NULL, '$username', '$password', '$firsname', '$middleInit', '$lastname', 'patient', 'false');");
	header('location:adminMain.php');

?>