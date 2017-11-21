<?php

include("connect.php");

$con = OpenCon();

if(isset($_POST['submit']))
{
	$t_id = $_POST['t_id'];
	$r_id = $_POST['r_id'];
	$a_id = $_SESSION['Admin_Id'];

	$sql = "INSERT INTO `train`(`Train_Id`, `Admin_Id`, `Route_Id`) VALUES ('$t_id','$a_id','$r_id')";

	if (mysqli_query($con, $sql)) {
		header('Location: ../admin_manage_trains.php');
		exit;
	} else {
		session_start();
		$_SESSION['error'] = mysqli_error($con);
		header('Location: ../admin_manage_trains.php');
	}
}

CloseCon($con);

?>