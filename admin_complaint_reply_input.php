<?php

include("php/connect.php");

$con = OpenCon();


?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script src="js/html5shiv-printshiv.js"></script>
        <![endif]-->

        <title> BMRCL Online Management</title>
        <style type="text/css">

        .demo-content{
        	padding: 30px;
        	font-size: 18px;
        	text-align: center;
        	min-height: 100px;
        	background: #8eccc6;
        	margin-bottom: 30px;
        }
        .demo-content.bg-alt{
        	background: #abb1b8;
        }
        body{
        	padding-top: 128px;
        }

        .navbar-header {
        	height: 80px;
        }
        .navbar-brand {

        	padding-top: 0;
        	padding-bottom: 0;
        	line-height: 80px;
        	font-size: 30px;
        }

        .nav.navbar-nav > li > a {
        	padding-top: 30px;
        	padding-bottom: 30px;
        }


        .footer-basic-centered{
        	background-color: #232426;
        	box-sizing: border-box;
        	width: wrap-content;
        	text-align: center;
        	font-size: 20px;
        	position: absolute;
        	right: 0;
        	bottom: 0;
        	left: 0;
        }


        .footer-basic-centered .footer-links{
        	list-style: none;
        	font-weight: bold;
        	color:  #ffffff;
        	padding: 20px;
        }

        .footer-basic-centered .footer-links a{
        	display:inline-block;
        	text-decoration: none;
        	color: inherit;
        }

        .bs-example{
        	margin: 10px;
        }

        .form-horizontal .control-label{
        	padding-top: 7px;
        }
        .margins {
        	margin-right: 5px;
        	margin-top: 17px;
        }

    </style>

</head>

<body>

	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/bootstrap.js"></script>


	<div id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid bg-color">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
					<span class="sr-only">BMRCL Online Management</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="HomePage.html">BMRCL Online Management</a>
			</div>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="nav navbar-nav">
					<li><a href="HomePage.html">Home</a></li>
					<li class="active"><a href="#"><?php echo $_SESSION['Admin_Name']; ?></a></li>
				</ul>
				<div class="navbar-right margins">
					<a href="admin_login.php" class="btn btn-info btn-lg">
						<span class="glyphicon glyphicon-log-out"></span> Log out
					</a>
				</div>
			</div>
		</div>
	</div>

    <?php
    $id = $_GET['id'];
    $admin_id = $_SESSION['Admin_Id'];
    $_SESSION['Comp_Id'] = $id;

    $sql = "SELECT * FROM complaint WHERE Comp_Id = '$id'";

    $complaint = mysqli_query($con,$sql);

    $row = mysqli_fetch_assoc($complaint);
    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <form id="contact-form" method="post" action="php/reply_to_complaints.php" role="form">
                    <div class="controls">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Complaint Subject : </label><?php echo($row['Comp_Subject']); ?>
                                </div>
                                <div class="form-group">
                                    <label>Complaint Description : </label><?php echo($row['Comp_Desc']); ?>
                                </div>
                                <div class="form-group">
                                    <label>Reply Message</label>
                                    <textarea name="reply_msg" class="form-control" placeholder="Enter reply message" rows="4" required="required" data-error="Please,enter the message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" name="submit" class="btn btn-success btn-send" value="Send Reply">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="footer-basic-centered">

      <p class="footer-links">
         <a href="HomePage.html">Home</a>
         |
         <a href="contact_us.html">Contact Us</a>
     </p>

 </footer>

</body>
</html>