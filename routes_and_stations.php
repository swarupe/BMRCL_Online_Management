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
           width: wrap-content;
           text-align: center;
           font-size: 20px;
           position: relative;
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
         <li><a href="admin_login.php">Admin Login</a></li>
         <li><a href="smart_card_request_page.html">Smart Card Request</a></li>
         <li><a href="smart_card_login.php">Smart Card Login</a></li>
         <li><a href="train_and_timings.php">Trains and Timings</a></li>
         <li  class="active"><a href="routes_and_stations.php">Routes and Stations</a></li>
       </ul>
     </div>
   </div>
 </div>

 <nav>
  <div class="container">
    <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" href="#collapse1">Green Line</a>
          </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse">
          <ul class="list-group">
            <?php
            include("php/connect.php");
            $con = OpenCon();
            $stations = mysqli_query($con,"SELECT Station_Name FROM station");
            //$row = $stations->fetch_array();
            $row_cnt = mysqli_num_rows($stations);

            while ( $rows = $stations->fetch_row() ) {
              foreach ($rows as $key => $value) {
                echo '<li class="list-group-item">',$value,'</li>';
              }
            }
            $stations->free();

            Closecon($con);
            ?>
          </ul>
        </div>
      </div>
    </div>

    <div class="panel-group">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" href="#collapse2">Purple Line</a>
          </h4>
        </div>
        <div id="collapse2" class="panel-collapse collapse">
          <ul class="list-group">
            <li class="list-group-item">One</li>
            <li class="list-group-item">Two</li>
            <li class="list-group-item">Three</li>
            <li class="list-group-item">One</li>
            <li class="list-group-item">Two</li>
            <li class="list-group-item">Three</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>


<footer class="footer-basic-centered">

  <p class="footer-links">
    <a href="HomePage.html">Home</a>
    |
    <a href="contact_us.html">Contact Us</a>
    |
    <a href="support.html">Support</a>
  </p>

</footer>



</body>
</html>