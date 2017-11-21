<?php

include("connect.php");

$con = OpenCon();

session_start();

$smartcard_no = $_POST['id'];
$admin_id = $_SESSION['Admin_Id'];
$new_status = $_POST['new_status'];


echo $smartcard_no."<br>".$admin_id."<br>".$new_status;

$sql = "UPDATE `smartcard` SET `Card_Status` = '$new_status', `Admin_Id` = '$admin_id' WHERE `smartcard`.`Card_No` = '$smartcard_no'";

if(mysqli_query($con, $sql))
{
	header('Location: ../admin_approve_cards.php');
}

CloseCon($con);

?>