<?php

include("connect.php");

$con = OpenCon();

session_start();

if(isset($_POST['submit']))
{
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$phone = $_POST['phone'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$address = $_POST['address'];

	$add_new_request = mysqli_query($con,"INSERT INTO `customer`(`Address`, `Phone_No`, `Fname`, `Lname`, `Password`, `Username`) VALUES ('$address','$phone','$fname','$lname','$password','$username')");
	$cust_id = mysqli_insert_id($con);

	$smartcard_no = rand(1111111111,1999999999);

	$add_new_card = mysqli_query($con,"INSERT INTO `smartcard`(`Card_No`,`Username`) VALUES ('$smartcard_no','$username')");

	$_SESSION['request_sent'] = "Your request has been sent successfully login to check the status";
	header("location: ../smart_card_login.php");
}

CloseCon($con);

?>