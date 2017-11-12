<?php

include("connect.php");

$con = OpenCon();

if(isset($_POST['submit']))
{
	$route = $_POST['route'];
	$from_addr = $_POST['from'];
	$to_addr = $_POST['to'];
	$details = mysqli_query($con," ");
	$row_cnt = mysqli_num_rows($details);
	$row = $details->fetch_assoc();
}

if($row_cnt > 0)
{
	session_start();

	header("Location: ../train_details_page.html");
}

$details->free();
Closecon($con);

?>