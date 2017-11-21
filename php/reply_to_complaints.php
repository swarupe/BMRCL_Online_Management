<?php

include("connect.php");

$con = OpenCon();

session_start();

$compid = $_POST['comp_id'];
$admin_id = $_SESSION['Admin_Id'];
$replymsg = $_POST['reply_msg'];

$sql = "UPDATE complaint SET Comp_Status = 'Replied' WHERE complaint.Comp_Id = $compid";

if (mysqli_query($con, $sql)) {
	mysqli_query($con, "INSERT INTO `reply`(`ReplyMessage`, `Admin_Id`, `Comp_Id`) VALUES ('$replymsg','$admin_id','$compid')");
	unset($_SESSION['Comp_Id']);
	header('Location: ../admin_reply_complaints.php');
	exit;
}
else {
	echo "Error updating values";
}

CloseCon($con);

?>