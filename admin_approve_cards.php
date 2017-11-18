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
					<a href="adminlogin.php" class="btn btn-info btn-lg">
						<span class="glyphicon glyphicon-log-out"></span> Log out
					</a>
				</div>
			</div>
		</div>
	</div>



    <?php

    $cards = mysqli_query($con,"SELECT Username, Card_No, Card_Status FROM smartcard WHERE Card_Status NOT IN (SELECT Card_Status FROM smartcard where Card_Status = 'Issued')");

    ?>


    <div class="container">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Customer Username</th>
                    <th>Smart Card Number</th>
                    <th>Card Status</th>
                    <!--<th>New Status</th>-->
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($cards))
                {
                    echo '<tr>';
                    foreach ($row as $key => $value) {
                        echo '<td style="word-wrap: break-word;min-width: 10px;max-width: 300px;">',$value,'</td>';
                    }
                    //echo '<form action="php/issue_card.php" method="GET"><td><input name="new_status" type="text" class="form-control" required="required" data-error="Enter status" /></td><td><input name="'.$row['Cust_Id'].'" type="submit" class="btn btn-link" value="Update Status"/></td></form>';

                    //echo '<form action="php/issue_card.php" method="GET"><td><input name="new_status" type="text" class="form-control" required="required" data-error="Enter status" /></td>';
                    echo "<td><a href='php/issue_card.php?cardno=".$row['Card_No']."'><button type=\"button\" class=\"btn btn-link\">Status Update</button></a></td></form>";
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
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
