<?php

session_start();
include '../php/config.php';
         if(isset( $_SESSION['admin']) ) {
             header('location:home.php');
         }else{

             if (isset($_POST['submit'])){
               
                 if (isset($_POST['username']) && isset($_POST['password']))
                { 
                    $pseudo = strtoupper($_POST['username']);
                    $pass = md5($_POST['password']);
                    AdminLogin($pseudo,$pass);
                }
            } 
         }

?>



<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
 <link rel="icon" type="image/png" href="../img/Ts.png">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<!-- //web font -->
</head>
<body>
<h1>Login</h1>
<div class="main-agileits">
<!--form-stars-here-->
		<div class="form-w3-agile">
			<h2>login</h2>
			<form method="post">
				<div class="form-sub-w3">
					<input type="text" name="username" placeholder="Username " required="" />
                        <div class="icon-w3">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
				</div>
				<div class="form-sub-w3">
					<input type="password" name="password" placeholder="Password" required="" />
                            <div class="icon-w3">
                                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                            </div>
				</div>
			
				<div class="submit-w3l">
					<input type="submit" name="submit" value="Login">
				</div>
			</form>
		</div>
<!--//form-ends-here-->
</div>
	
</body>
</html>