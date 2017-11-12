<?php

include("connect.php");

$con = OpenCon();

if(isset($_POST['submit']))
{
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$phone = $_POST['phone'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$address = $_POST['address'];

	$add_new_request = mysqli_query($con,"INSERT INTO `customer`(`Address`, `Phone_No`, `Fname`, `Lname`, `Password`, `Username`) VALUES ('$address','$phone','$fname','$lname','$password','$username')"); 

	header("location: ../smart_card_login.php");
}

Closecon($con);

?>