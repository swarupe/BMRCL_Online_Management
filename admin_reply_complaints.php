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
	$query = "SELECT Comp_Id, Comp_Subject, Comp_Desc FROM complaint WHERE Comp_Status = 'Not_Replied'";
	$query_run = mysqli_query($con, $query);
	if($query_run){

		echo '<div class="container">
		<table class="table table-bordered">
		<thead>
		<tr>
		<th>Complaint ID</th>
		<th>Subject</th>
		<th>Complaint Description</th>
		<th>Operation</th>
		</tr>
		</thead>
		<tbody>';

		while($row = mysqli_fetch_assoc($query_run)){
			echo '<tr class="trCompID_' .$row['Comp_Id']. '">';
			echo '<td class="td_CompID">' . $row['Comp_Id'] . '</td>';
			echo '<td class="td_compsubject">' . $row['Comp_Subject'] . '</td>';
			echo '<td class="td_comp_desc">' . $row['Comp_Desc'] . '</td>';
			echo "<td><button class='td_btn btn btn-link btn-custom dis'>Reply</button> </td>";
			echo '</tr>';
		}
		echo '</tbody></table></div>';

	}?>

	<script>
		$(document).ready(function(){
			$('.td_btn').click(function(){
				var $row = $(this).closest('tr');
				var compID = $row.attr('class').split('_')[1];
				$('#comp_id').val(compID);
				$('#myModal').modal('show');
			});
		});
	</script>

	<div class="modal fade" id="myModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Enter Reply Message</h4>
				</div>
				<div class="modal-body">

					<form id="updateValues" action="php/reply_to_complaints.php" method="POST" class="form">
						<div class="form-group">
							<label for="name">Reply</label>
							<textarea type="text" class="form-control" name="reply_msg" id="frm_name"></textarea>
						</div>

						<input type="hidden" id="comp_id" name="comp_id">
						<input type="submit" class="btn btn-primary btn-custom" value="Reply">
					</form>

				</div>


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