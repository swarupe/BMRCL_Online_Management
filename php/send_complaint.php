<?php

include("connect.php");

$con = OpenCon();

if(isset($_POST['submit']))
{
	$subject = $_POST['subject'];
	$description = $_POST['message'];
	$uname = $_SESSION['username'];


	$add_complaint = mysqli_query($con,"INSERT INTO `complaint`(`Comp_Subject`, `Comp_Desc`, `Username`) VALUES ('$subject','$description','$uname')");
	session_start();
	$_SESSION['comp_sent'] = "Complaint Sent Successfully";
	header("location: ../complaint.php");
}

CloseCon($con);

?>