<?php

include("connect.php");

$con = OpenCon();

$smartcard_no = $_GET['cardno'];
$admin_id = $_SESSION['Admin_Id'];

if(isset($_GET['cardno']))
{
	echo $new_status;
	echo $admin_id;
	echo $smartcard_no;
}



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