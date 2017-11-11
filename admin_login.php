<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- Optional Bootstrap theme -->
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
        	margin-bottom: 10px;
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
        /* Fix alignment issue of label on extra small devices in Bootstrap 3.2 */
        .form-horizontal .control-label{
        	padding-top: 7px;
        }  
    </style>

</head>

<body>

	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/bootstrap.js"></script>


	<div id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="container-fluid bg-color">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
					<span class="sr-only">BMRCL Online Management</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="HomePage.html">BMRCL Online Management</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="nav navbar-nav">
					<li><a href="HomePage.html">Home</a></li>
					<li class="active"><a href="#" target="_blank">Admin Login</a></li>
					<li><a href="#">Smart Card Request</a></li>
					<li><a href="smart_card_login.php">Smart Card Login</a></li>
					<li><a href="#">Trains and Timings</a></li>
					<li><a href="#">Routes and Stations</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class = "container">


		<div class="demo-content">
			
			<div class="container">
				<div class="row">
					<div class="Absolute-Center is-Responsive">
						<div id="logo-container"></div>
						<div class="col-sm-12 col-md-10 col-md-offset-1">
							<form action="" id="loginForm">
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input class="form-control" type="text" name='admin_id' placeholder="Admin-ID" required />          
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									<input class="form-control" type="password" name='password' placeholder="Password" required />     
								</div>
								<div class="form-group">
									<div class="col-xs-offset-2 col-xs-6">
										<button type="submit" class="btn btn-primary">Login</button>
									</div>
								</div>
							</form>        
						</div>  
					</div>    
				</div>
			</div>

		</div>


	</div>

	<footer class="footer-basic-centered">

		<p class="footer-links">
			<a href="HomePage.html">Home</a>
			|
			<a href="#">Contact Us</a>
			|
			<a href="#">Support</a>
		</p>

	</footer>



</body>
</html>