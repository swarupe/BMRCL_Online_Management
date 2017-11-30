<?php

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
        	margin:50px 20em 50px 20em;
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
    </style>

</head>

<body>

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
					<li class="active"><a href="#" target="_blank">Admin Login</a></li>
					<li><a href="smart_card_request_page.html">Smart Card Request</a></li>
					<li><a href="smart_card_login.php">Smart Card Login</a></li>
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
						<form action="php/admin_login_check.php" method="POST" id="loginForm">
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input class="form-control" type="email" name='admin_id' placeholder="Admin-Email" required />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input class="form-control" type="password" name='password' placeholder="Password" required />
							</div>
							<div class="form-group">
								<div class="col-xs-offset-2 col-xs-6">
									<input type="submit" name="submit" value="Login" class="btn btn-primary"/>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<p class="bg-danger">
				<?php

				if(!empty($_SESSION['error_message']))
				{
					echo $_SESSION['error_message'];
					unset($_SESSION['error_message']);
				}

				?>
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