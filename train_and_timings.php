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

        <title> Metro Online Management</title>
        <style type="text/css">

        .demo-content{
        	padding: 50px;
        	font-size: 18px;
        	text-align: center;
        	background: #8eccc6;
        	margin:50px 22em 50px 22em;

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
					<li><a href="admin_login.php">Admin Login</a></li>
					<li><a href="smart_card_request_page.html">Smart Card Request</a></li>
					<li><a href="smart_card_login.php">Smart Card Login</a></li>
					<li  class="active"><a href="#">Trains and Timings</a></li>
					<li><a href="routes_and_stations.php">Routes and Stations</a></li>
				</ul>
			</div>
		</div>
	</div>


	<div class = "demo-content">
		<form class="form-horizontal" method="POST" action="train_details_page.php">
			<div class="form-group">
				<label class="control-label col-xs-2">Route</label>
				<div class="col-xs-10">
					<select name="route" class="form-control" id="sel1">
						<?php

						$sql = "SELECT Route_Name FROM `route`";

						$routes = mysqli_query($con, $sql);

						while ($rows = mysqli_fetch_assoc($routes)) {
							foreach ($rows as $key => $value) {
								echo "<option>".$value."</option>";
							}
						}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-xs-2">From</label>
				<div class="col-xs-10">
					<input type="text" name="from" class="form-control" placeholder="From Location">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-xs-2">To</label>
				<div class="col-xs-10">
					<input type="text" name="to" class="form-control" placeholder="To Location">
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-offset-2 col-xs-10">
					<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</form>
		<p class="bg-danger">
			<?php
			if(!empty($_SESSION['error_station']))
			{
				echo $_SESSION['error_station'];
				unset($_SESSION['error_station']);
			}

			?>
		</p>
		
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