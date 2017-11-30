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
        input {
        	float: left;

        }
        .bttn {
        	margin-left: 5px;
        	margin-right: 0px;
        }

        table {
        	width:100%;
        	padding: 0;
        	margin: 0;
        	border: 0;
        	border-collapse: collapse;
        }

        td {
        	width:176px;
        	padding: 0 10px 0 0;
        	margin: 0;
        	border: 0;
        }

    </style>
    <script>
    	document.addEventListener('DOMContentLoaded',function(e){

    		/* Obtain a reference to the FORM element */
    		var form=document.forms['status-updates'];

    		/* Hidden fields which will be POSTed to php/issue_card.php */
    		var id=form.querySelector('input[type="hidden"][name="id"]');
    		var status=form.querySelector('input[type="hidden"][name="new_status"]');



    		/* Create a nodelist collection of ALL buttons within table of class "bttn" */
    		var col=Array.prototype.slice.call( form.querySelectorAll('input[type="button"].bttn') );

    		/* Assign event handler to each button */
    		col.forEach( function( bttn ){
    			bttn.onclick=function(e){/* - event handler - */

    				/* Assign values to hidden fields */
    				id.value=this.dataset.id;
    				status.value=this.parentNode.querySelector('input[type="text"]').value;

    				/* submit the form with values for this row */
    				form.submit();
    			}.bind( bttn );
    		});
    	},false );
    </script>
    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/bootstrap.js"></script>
</head>
<body>
	<div id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid bg-color">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
					<span class="sr-only">Metro Online Management</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="HomePage.html">Metro Online Management</a>
			</div>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="nav navbar-nav">
					<li><a href="HomePage.html">Home</a></li>
					<li class="active"><a href="#"><?php echo $_SESSION['Admin_Name']; ?></a></li>
				</ul>
				<div class="navbar-right margins">
					<a href="php/logout_admin.php" class="btn btn-info btn-lg">
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
		<form name='status-updates' method='post' action='php/issue_card.php'>
			<!-- two hidden fields -->
			<input type='hidden' name='id' />
			<input type='hidden' name='new_status' />

			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Customer Username</th>
						<th>Smart Card Number</th>
						<th>Card Status</th>
						<th>New Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while( $row = mysqli_fetch_assoc( $cards ) ) {
						echo "<tr>";

						foreach( $row as $key => $value )
							echo "<td class='wrap' style=\"word-wrap: break-word;min-width: 10px;max-width: 100px;\">{$value}</td>";

						echo "<td>
						<input type='text' class='feild1 form-control' style=\"width: 200px;\" required='required' />
						<input type='button' value='Status Update' class='bttn btn' data-id='{$row['Card_No']}' />
						</td>
						</tr>";
					}
					?>
				</tbody>
			</table>
		</form>
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