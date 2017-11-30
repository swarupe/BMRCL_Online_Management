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

	$admins = mysqli_query($con,"SELECT Admin_ID,Admin_Name,Age,Sex,Email FROM admin WHERE 1");

	?>


	<div class="container">

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Admin ID</th>
					<th>Admin Name</th>
					<th>Age</th>
					<th>Sex</th>
					<th>Email</th>
					<th>Operation</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($row = mysqli_fetch_assoc($admins))
				{
					echo '<tr>';
					foreach ($row as $key => $value) {
						echo '<td>',$value,'</td>';
					}
					echo "<td><a href='php/delete_admins.php?id=".$row['Admin_ID']."'><button type=\"button\" class=\"btn btn-link\">Delete</button></a></td>";
					echo '</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="container">
		<h2>Add New Admins</h2>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Admin Name</th>
					<th>Age</th>
					<th>Sex</th>
					<th>Email</th>
					<th>Password</th>
					<th>Operation</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<form action="php/add_new_admins.php" method="POST">
						<td><input name="a_name" type="text" class="form-control" required="required" data-error="Enter name" /></td>
						<td><input name="a_age" type="number" class="form-control" required="required" data-error="enter valid age"/></td>
						<td><input name="a_sex" type="text" class="form-control" required="required" data-error="Enter valid gender M,F,Male,Female "/></td>
						<td><input name="a_email" type="email" class="form-control" required="required" data-error="valid email is required"/></td>
						<td><input name="a_pass" type="password" class="form-control" required="required" data-error="enter valid password"/></td>
						<td><input type="submit" name="submit" class="btn btn-link" value="Add" /></td>
					</form>
				</tr>
			</tbody>
		</table>
	</div>
	<div style="margin-left: 9em; margin-right: 50em;">
		<p class="bg-danger">
			<?php

			if(!empty($_SESSION['error']))
			{
				echo $_SESSION['error'];
				unset($_SESSION['error']);
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