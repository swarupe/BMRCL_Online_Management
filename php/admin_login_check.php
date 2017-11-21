<?php

include("connect.php");

$con = OpenCon();


if(isset($_POST['submit']))
{
	$admin_id = $_POST['admin_id'];
	$password = $_POST['password'];
	$admin = mysqli_query($con,"SELECT Admin_Id,Admin_Name FROM admin WHERE Email = '$admin_id' AND Password = '$password' ");
	$count = mysqli_num_rows($admin);
	$row = $admin->fetch_array();
}

if($count > 0)
{
	session_start();
	$_SESSION['Admin_Id'] = $row['Admin_Id'];
	$_SESSION['Admin_Name'] = $row['Admin_Name'];
	header("Location: ../admin_homepage.php");
}
else {
	session_start();
	$_SESSION['error_message']="Wrong Admin ID or Password";
	header("location: ../admin_login.php");
}
$admin->free();

CloseCon($con);

?>