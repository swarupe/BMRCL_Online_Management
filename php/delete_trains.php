<?php

include("connect.php");

$con = OpenCon();


$id = $_GET['id'];

$sql = "DELETE FROM train WHERE Train_Id = $id";

if (mysqli_query($con, $sql)) {
	mysqli_close($con);
	header('Location: ../admin_manage_trains.php');
	exit;
} else {
	echo "Error deleting record";
}

CloseCon($con);

?>