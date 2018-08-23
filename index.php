<?php
    session_start();
    include 'php/config.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title> My Website </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" type="image/png" href="img/Ts.png">


</head>
<body>

    <!--Login Form -->
    <form class="forms "  method="POST">
      

             <div class="login-info">
                        <div class="group_form">
                            <input class="form_control" type="text" name="usernm" id="usrname" autofocus placeholder="Pseudo ..." required >
                        </div>
                        <div class="group_form has-border" >
                            <input class="form_control" type="Password" name="passwrd" id="Password" placeholder="Password ..." required>
                        </div>
             </div>
                 <a href="emailrecover.php" class="forgot_pass" target="">Forgot your password ?</a>
                 <input  class="buttons" type="submit" name="submit" value="Sign In" >

    </form>
   <!-- <div style="margin-top:-50px; margin-left:25px;">
             <?php    if(isset( $_SESSION['username']) || isset($_COOKIE['username']) ) {
             header('location:home.php');
         }else{

             if (isset($_POST['submit'])){

                 if (isset($_POST['usernm']) && isset($_POST['passwrd']))
                {
                    $pseudo = strtoupper($_POST['usernm']);
                    $pass = md5($_POST['passwrd']);
                    login($pseudo,$pass);
                }
             }
         }
            ?>
        </div>  <!--Login Verification -->



</body>
</html>
