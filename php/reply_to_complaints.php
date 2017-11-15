<?php

include("connect.php");

$con = OpenCon();

$id = $_GET['id'];
$admin_id = $_SESSION['Admin_Id'];

$sql = "UPDATE complaint SET Comp_Status = 'Replied', Admin_id = '$admin_id' WHERE complaint.Comp_Id = $id";

if (mysqli_query($con, $sql)) {
	header('Location: ../admin_reply_complaints.php');
	exit;
}
else {
	echo "Error updating values";
}


Closecon($con);

?>