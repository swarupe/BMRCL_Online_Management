<?php 
include("connect.php");
$con = OpenCon();

$amount = $_POST['amount'];
$cardno = $_SESSION['Card_Number'];
if(isset($_POST['submit'])) {
	mysqli_query($con, " UPDATE smartcard SET Balance = Balance + $amount WHERE Card_No = '$cardno' "); 
	$balance = mysqli_query($con, "SELECT Balance FROM smartcard WHERE Card_No = '$cardno' ");  
	$row = $balance->fetch_array();
	$_SESSION['Balance'] = $row['Balance'];
}
$_SESSION['successfull']="Successfully Recharged your Card";
header("Location: ../smart_card_homepage.php");
$balance->free();
Closecon($con);
?>