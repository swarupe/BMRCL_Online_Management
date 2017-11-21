<?php
session_start();
session_destroy();
header("Location: ../smart_card_login.php");
?>