<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
       <!-- <link href="css/reset.css" rel="stylesheet">  -->
        
        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script src="js/html5shiv-printshiv.js"></script>           
        <![endif]-->
        
        <title>Smart Card Request</title>
        
    </head>
    
    <body>




        
        <section>
                
            <header>
             
                 <h1>Smart Card Request Page</h1>
            
                 <nav>
                
              <ul>
                        <li><a href="#">Register</a></li>
                        <li><a href="#">Forgot UserID / Forgot Password?</a></li>
            </ul>

                
                
                </nav>
               
            </header>
        
            <div>
            	<div>
            	<h3>Login to Check Card Status</h3>
            	</div>
            	<div>
            	<form action = "php/card_status_login.php" method="POST">
            		<p> Username: <input type="text" name="username" > </p>
            		<p> Password:  <input type="password" name="password"> </p> <br>
            		<input type="submit" name="submit" >
            		<br>
            	</form>

                   <?php

                            session_start();

                            if(!empty($_SESSION['error_message']))
                            {
                                 echo $_SESSION['error_message'];
                                 unset($_SESSION['error_message']);
                            }

                    ?>

            	</div>
            
            </div>
        
            <footer>
            

            </footer>
        
        </section>
    
    </body>
</html>