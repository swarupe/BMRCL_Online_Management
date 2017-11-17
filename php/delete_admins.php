<?php

include("connect.php");

$con = OpenCon();


$id = $_GET['id'];

$sql = "DELETE FROM admin WHERE Admin_ID = $id";

if (mysqli_query($con, $sql)) {
	mysqli_close($con);
	header('Location: ../admin_manage_admins.php');
	exit;
} else {
	echo "Error deleting record";
}

CloseCon($con);

?>