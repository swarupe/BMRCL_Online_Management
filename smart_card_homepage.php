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
        .top_padding {
            padding-top: 30px;
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
                </button>
                <a class="navbar-brand" href="HomePage.html">Metro Online Management</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="nav navbar-nav">
                 <li><a href="HomePage.html">Home</a></li>
                 <li class="active"><a href="#">Smart Card</a></li>
                 <li> <a href="complaint.php">Complaint</a></li>
             </ul>
             <div class="navbar-right margins">
                <a href="php/logout_smartcard.php" class="btn btn-info btn-lg">
                  <span class="glyphicon glyphicon-log-out"></span> Log out
              </a>
          </div>
      </div>
  </div>
</div>

<div class="container">

    <div class="col-md-10">
        <h4>Card Number : <?php echo $_SESSION['Card_Number']; ?> </h4>

    </div>

    <div class="col-md-12">
        <h4>Name : <?php echo $_SESSION['Fname']," ", $_SESSION['Lname'];?> </h4>
    </div>
    <div class="col-md-12">
        <h4>Card Status : <?php echo $_SESSION['Card_Status']; ?> </h4>
    </div>

    <div class="col-md-12">
        <h4>Balance : <?php echo $_SESSION['Balance']; ?> </h4>
    </div>
</div>


<div class = "container top_padding">
    <form action="php/recharge.php" method="POST">
        <div class="col-md-6">
            <div class="form-group">
                <label>Recharge Amount</label>
                <input type="number" name="amount" class="form-control" placeholder="Please enter amount">
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="col-md-12">
            <input type="submit" name="submit" class="btn btn-success btn-send" value="Recharge">
        </div>

    </form>

</div>
<div style="margin-left: 9em; margin-right: 50em;">
    <p class="bg-success" style="margin-top: 20px;">
        <?php
        if(!empty($_SESSION['successfull']))
        {
            echo $_SESSION['successfull'];
            unset($_SESSION['successfull']);
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