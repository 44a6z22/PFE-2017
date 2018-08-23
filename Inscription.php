<?php
   include 'php/config.php';
       if(isset( $_SESSION['username']) || isset($_COOKIE['username']) ) {
             header('location:home.php');
         }
 	    if ( isset( $_POST['go'] ) ){
                $Pseudo=$_POST["Un"];
                $Pass=md5($_POST["pw"]);
                $pass_c=md5($_POST['pw_c']);
                $fullname = $_POST['fullname'];
                $Email=$_POST["Email"];
                $SQ=$_POST["SQ"];  /* SECURITY QUESTION */
             $QR=$_POST["QR"];      /* La Reponse */
                $City=$_POST['Citys'];
                $Age = $_POST['Age'];
            if ($Pseudo == '' || $pass_c == '' || $fullname == '' ||$Pass == '' || $Email == ''|| $City =='City' || $Age == 'Age' || $SQ == "Your Question" || $QR =='') {
                    header("location:Inscription.php");
                    echo 'check ';
                }
                else{
                    if ($Pass == $pass_c){
                    AddUser($Pseudo,$fullname,$Pass,$Email,$City,$Age,$SQ,$QR);
                    header("location:SignupSucced.php");
}
                        else {
                    echo "passwords ain't the same";
                        $_POST["Un"]=$Pseudo;
                        $_POST["Email"] = $Email;
                        $_POST["Citys"] = $City;
                    }
                    }
		}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/grid.css">
    <link rel="stylesheet" type="image/png" href="img/Ts.png">
	<title>Inscription</title>
</head>
<body >
    <form class="forms " method="POST" style="margin-top: 80px;">
        <div class="login-info ">
            <div class="group_form ">
                <input class="form_control" type="text" name="Un" id="usrname"  placeholder="Username ..." > 
            </div>
            <div class="group_form has-border" >
                <input class="form_control" type="Email" name="Email" id="Email" placeholder="Email ...">
            </div>	
            <div class="group_form has-border" >

               <?php Age();?>

               <select  name='Citys' class="form_control form_select" >                
                 <?php 
                  citys();
                 ?>        
             </select>
            </div>	
            <div class="group_form has-border" >
                <input class="form_control" type="Password" name="pw" pattern=".{6,}" id="Password" placeholder="Password (Min 6 ) ...">
            </div>	
            <div class="group_form has-border" >
                <input class="form_control" type="Password" name="pw_c" id="Password_C"  placeholder="Password (Confirmation) ...">
            </div>	
        </div>

        <!------------ Personale info -------------->

        <div class="General-info margin">
                <div class="group_form">
                    <input type="text" name="fullname" class="form_control" placeholder="FullName"  >
                </div>
            <div class="group_form " >
                <select required name='SQ'  class='form_control' align='center'>
                    <option>Your Question</option>
                    <option>HAHAHAHAHAHAHAHAHA</option>
                    <option>HAHAHAHAHAHAHAHAHA</option>
                    <option>HAHAHAHAHAHAHAHAHA</option>
                    <option>HAHAHAHAHAHAHAHAHA</option>
                </select>
            </div>
            <div class="group_form">
                    <input type="text" name="QR" class="form_control" placeholder="Answer"  >
                </div>

        </div>

        <input type="submit" name="go" class="buttons" value="Sign Up" >
    </form>
</body>
</html>