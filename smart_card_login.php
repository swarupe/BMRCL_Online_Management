<?php
include("php/connect.php");
$con = OpenCon();
session_start();
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

        <title> Metro Online Management</title>
        <style type="text/css">

        .demo-content{
        	padding: 50px;
        	font-size: 18px;
        	text-align: center;
        	background: #8eccc6;
        	margin:10px 20em 50px 20em;
        }
        .demo-content.bg-alt{
        	background: #abb1b8;
        }
        body{
        	padding-top: 90px;
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
        .padding {
        	padding-left: 16em;
        	padding-bottom: 10px;
        }
    </style>

</head>

<body>


	<h2 class="padding">Smart card users login page</h2>

	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/bootstrap.js"></script>


	<div id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid bg-color">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
					<span class="sr-only">Metro Online Management</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="HomePage.html">Metro Online Management</a>
			</div>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="nav navbar-nav">
					<li><a href="HomePage.html">Home</a></li>
					<li><a href="#" target="_blank">Admin Login</a></li>
					<li><a href="smart_card_request_page.html">Smart Card Request</a></li>
					<li class="active"><a href="#">Smart Card Login</a></li>
					<li><a href="train_and_timings.php">Trains and Timings</a></li>
					<li><a href="routes_and_stations.php">Routes and Stations</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class = "container">
		<div class="demo-content">
			<div class="row">
				<div class="Absolute-Center is-Responsive">
					<div id="logo-container"></div>
					<div class="col-sm-12 col-md-10 col-md-offset-1">
						<form action="php/card_status_login.php" id="loginForm" method="POST">
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input class="form-control" type="text" name='username' placeholder="Username" required />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input class="form-control" type="password" name='password' placeholder="Password" required />
							</div>
							<div class="form-group">
								<div class="col-xs-offset-2 col-xs-6">
									<button type="submit" name="submit" class="btn btn-primary">Login</button>
								</div>
							</div>

						</form>

					</div>

				</div>
			</div>


		</div>

	</div>
	<div class="container">
		<p class="bg-danger">
			<?php

			if(!empty($_SESSION['error_message']))
			{
				echo $_SESSION['error_message'];
				unset($_SESSION['error_message']);
			}

			?>
		</p>

		<p class="bg-success">
			<?php

			if(!empty($_SESSION['request_sent']))
			{
				echo $_SESSION['request_sent'];
				unset($_SESSION['request_sent']);
			}

			?>
		</p>
	</div>


	<footer class="footer-basic-centered">

		<p class="footer-links">
			<a href="HomePage.html">Home</a>
			|
			<a href="conatct_us.html">Contact Us</a>
		</p>

	</footer>



</body>
</html>