<?php

include("connect.php");

$con = OpenCon();


if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$status = mysqli_query($con,"SELECT S.Card_Status FROM smartcard S, customer C WHERE S.Cust_Id = C.Cust_Id AND C.Username = '$username' AND C.Password = '$password' ");
	$row_cnt = mysqli_num_rows($status);
	$row = $status->fetch_array();
}

if($row_cnt > 0)
{
	session_start();

	$_SESSION['username'] = $username;
	$_SESSION['Card_Status'] = $row;
	header("Location: ../HomePage.html");
}
else {

	$_SESSION['error_message']="Wrong Username or Password";
	header("location: ../smart_card_login.php");
}
$status->free();
Closecon($con);

?>