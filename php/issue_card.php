<?php

include("connect.php");

$con = OpenCon();

$smartcard_no = $_GET['id'];
$admin_id = $_SESSION['Admin_Id'];
$new_status = $_GET['status'];

$sql = "UPDATE smartcard SET Card_Status = '$new_status', Admin_Id = '$admin_id' WHERE smartcard.smartcard_no = $smartcard_no";

mysqli_query($con, $sql);




//$sql = "UPDATE complaint SET Comp_Status = 'Replied', Admin_id = '$admin_id' WHERE complaint.Comp_Id = $id";

/*if (mysqli_query($con, $sql)) {
	header('Location: ../admin_approve_cards.php');
	exit;
}
else {
	echo "Error updating values";
}*/


CloseCon($con);

?>