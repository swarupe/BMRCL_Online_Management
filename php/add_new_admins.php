<?php

include("connect.php");

$con = OpenCon();

session_start();

if(isset($_POST['submit']))
{
	$a_name = $_POST['a_name'];
	$a_age = $_POST['a_age'];
	$a_sex = $_POST['a_sex'];
	$a_email = $_POST['a_email'];
	$a_pass = $_POST['a_pass'];

	$sql = "INSERT INTO `admin`(`Admin_Name`, `Age`, `Sex`, `Email`, `Password`) VALUES ('$a_name','$a_age','$a_sex','$a_email','$a_pass')";
	if (mysqli_query($con, $sql)) {
		header('Location: ../admin_manage_admins.php');
		exit;
	} else {
		$_SESSION['error'] = mysqli_error($con);
		header('Location: ../admin_manage_admins.php');
	}
}

CloseCon($con);

?>