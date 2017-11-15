<?php

include("connect.php");

$con = OpenCon();

$id = $_GET['2'];
$admin_id = $_SESSION['Admin_Id'];
$new_status = $_GET['new_status'];

if(isset($_GET['2']))
{
	echo $new_status;
	echo $admin_id;
	echo $id;
}



//$sql = "UPDATE complaint SET Comp_Status = 'Replied', Admin_id = '$admin_id' WHERE complaint.Comp_Id = $id";

/*if (mysqli_query($con, $sql)) {
	header('Location: ../admin_approve_cards.php');
	exit;
}
else {
	echo "Error updating values";
}*/


Closecon($con);

?>