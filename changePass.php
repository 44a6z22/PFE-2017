<?php 
include 'php/config.php';


?>
<html>
<head>
    <title> Change Your password </title>
     <link rel="icon" type="image/png" href="img/Ts.png">
    <link type="text/css" rel="stylesheet" href="css/style.css">
    </head>
<body>

   <div class="index-login">
			 <form class="forms"  method="POST">
			 <div class="login-info">
				<div class="group_form">
					<input class="form_control" type="password" name="Passwrd_c1" autofocus placeholder="New Password ..."  >
 				</div>
	 			<div class="group_form has-border" >
					<input class="form_control" type="password" name="Passwrd_c2" autofocus placeholder="New Password ..."  >
	 			</div>
             </div>
            
             <input  class="buttons" type="submit" name="submit" value="Change" >
			</form>
               <p align="center">
                   <?php
                    if(isset( $_SESSION['username']) || isset($_COOKIE['username']) ) {
             header('location:home.php');
         }

    
    $pseudo = $_GET['id'];
    if (isset($_POST['submit'])){
    
    $pass1 = $_POST['Passwrd_c1'];
    $pass2 = $_POST['Passwrd_c2'];
    
        
    if($pass1 == $pass2){
         
       $data = mysql_fetch_array(mysql_query("select Password from users where id = '$pseudo'"));
       if (md5($pass1) == $data['Password'])
       {
           echo "It seems Like you remember your old password";
       }else{
           change_password($pass1,$pseudo);
       }
        
        
    }else{
        echo "they aint the same";
    }



   
}
                 ?>
                </p>
		</div>
</body>

</html>