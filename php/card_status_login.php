<?php

include("connect.php");

$con = OpenCon();


if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$user = mysqli_query($con,"SELECT S.Card_No, S.Card_Status, C.Fname, C.Lname, S.Balance FROM smartcard S NATURAL JOIN customer C WHERE C.Username = '$username' AND C.Password = '$password' ");
	$row_cnt = mysqli_num_rows($user);
	$row = $user->fetch_array();
}

if($row_cnt > 0)
{
	session_start();

	$_SESSION['username'] = $username;
	$_SESSION['Card_Number'] = $row['Card_No'];
	$_SESSION['Card_Status'] = $row['Card_Status'];
	$_SESSION['Fname'] = $row['Fname'];
	$_SESSION['Lname'] = $row['Lname'];
	$_SESSION['Balance'] = $row['Balance'];
	header("Location: ../smart_card_homepage.php");
}
else {
	session_start();
	$_SESSION['error_message']="Wrong Username or Password";
	header("location: ../smart_card_login.php");
}
$user->free();

CloseCon($con);

?>