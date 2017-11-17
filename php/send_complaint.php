<?php

include("connect.php");

$con = OpenCon();

if(isset($_POST['submit']))
{
	$subject = $_POST['subject'];
	$description = $_POST['message'];
	$cust_id = $_SESSION['Cust_Id'];


	$add_complaint = mysqli_query($con,"INSERT INTO `complaint`(`Comp_Name`, `Comp_Desc`) VALUES ('$subject','$description')");

	$com_id = mysqli_insert_id($con);

	$reg_comp = mysqli_query($con,"INSERT INTO `register_complaint`(`Comp_Id`, `Cust_Id`) VALUES ('$com_id','$cust_id')");

	$_SESSION['comp_sent'] = "Complaint Sent Successfully";
	header("location: ../complaint.php");
}

CloseCon($con);

?>