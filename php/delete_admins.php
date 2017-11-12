<?php

include("connect.php");

$con = OpenCon();


$id = $_GET['id'];

$sql = "DELETE FROM admin WHERE Admin_ID = $id"; 

if (mysqli_query($con, $sql)) {
	mysqli_close($con);
    header('Location: ../admin_manage_admins.php'); //If book.php is your main page where you list your all records
    exit;
} else {
	echo "Error deleting record";
}

Closecon($con);

?>