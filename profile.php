<?php 
    include 'php/config.php';
        include 'php/Upload.php';

     if(!isset($_COOKIE['username'])){
           if (isset($_GET['id'])){
                $id = $_GET['id'];
                $data = mysql_fetch_array(mysql_query("select * from users where id = '$id' "));
               


            }else{
               header('location:404/404.php');
           }
     }else{
                 $sql = "select * from users where Pseudo = '{$_COOKIE['username']}' ";
                $rslt = mysql_query($sql);
                $data = mysql_fetch_array($rslt);


        }


    $fullname = $data['Full_Name'];
    $Pseudo = $data['Pseudo'];
    $Email = $data['Email'];
    $age = $data['age'];
    $ids = $data['id'];
    $idC = $data['City_id'];
    $city = mysql_fetch_array(mysql_query("select City_name from city where City_id = '$idC' "));
    $city = $city['City_name'];
    $game = "SNACK";


?>
<!Doctype html>
<html>
  <head>
    <title><?php echo " $fullname"?></title>
    <link rel="stylesheet" type="text/css" href="css/updateProfile.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  </head>

  <body >
    <div class="container-fluid">

        <div class="row">
      
          <div class="col-md-6 col-xs-12 offset-md-3 profile">
           
             <div class="row">
                <div class="col-md-12 col-xs-12 " align="center">
                  <h3><?php echo " $fullname"?> </h3>
                </div>
              </div>
                    <!-- Image and Some basic info -->
                <div class="row info" align="center">
                 
                  <?php
                                    if(isset($_COOKIE['username'])){
                                             $sql = "select * from users where Pseudo = '{$_COOKIE['username']}' ";
                                                $rslt = mysql_query($sql);
                                                $darori = mysql_fetch_array($rslt);
                                        if(!isset($_GET['id']) || $_GET['id'] == $darori['id']  ){

                                                echo" <div class='col-md-4 col-xs-12 offset-md-1 ' align='center'>
                                                        <a target='_blank' href='actions/edit.php'>
                                                           <img src='img/profile-pic.jpg' class='rounded-circle' id='profile-pic'>
                                                        </a>
                                                      </div>";
                                            }else{

                                               echo"  <div class='col-md-4 col-xs-12 offset-md-1 ' align='center'>
                                                        <img src='img/profile-pic.jpg' class='rounded-circle' id='profile-pic'>
                                                      </div>";
                                        }   
                                    }

                    ?>   
                    
                    <!-- 
                        ..........................................................................
                        . you gonna see Sooo many useless divs (the ones without classes) ughh,  .
                        . i'm just avoiding using "<br>" :(                                      .
                        . i don't like it                                                        .  
                        ..........................................................................
                        . Ps : Doesn't hurt to use divs though                                   .
                        .......................................................................... 
                     -->
                    <div class="col-md-6 col-xs-12 ">
                      <div class="col-md-12 col-xs-6">
                        <label>Username :</label>
                        <a href="profile.php"> <?php echo "$Pseudo"?></a>
                      </div>
                      <div class="col-md-12 col-xs-6">
                        <label>Email :</label>
                        <a href=""><?php echo "$Email"?></a>
                      </div>
                       
                        
                      </div>
                 
                  </div>
                
               
                <div class="row">
                  <!--
                     here where we talk about Some more info
                       ==> Account section 
                   -->
                    <div class="col-md-5 offset-md-1  col-xs-12 skills" >
                        <div class="row" align="center">
                          <h5 class="col-md-12" align="center">Account Info</h5>
                          

                           <div class="col-md-12 col-xs-6">
                          <label> City : </label>
                          <a href="#"><?php echo " $city"?></a>
                        </div>
                        <div class="col-md-12 col-xs-6">
                          <label>Age : </label>
                          <a href="#"><?php echo " $age"?></a>
                        </div>
                        
                        </div>
                   </div>
                   <!-- 
                        ==> Playing section
                    -->
                  <div class="col-md-5 col-xs-12 projects" align="center">
                    <h5>Games  : </h5>
                      <div class="col-md-12 col-xs-6">
                        <label>Last game :</label>
                        <a href=""> <?php lastone($data['id']);?></a>
                      </div>
                       <div class="col-md-12 col-xs-6">
                        <label>Last game :</label>
                        <a href=""> <?php hightscore($ids,$game);?></a>
                        </div>
                  </div>       

               </div>
                  <!-- 
                  ................................................................
                  . Not even a Web Designer/Developper (trying to learn though), .
                  . but it's kinda fun giving credit to yourself ...             .
                  ................................................................ 
                   -->
             <footer class="col-md-6 offset-md-6 col-xs-6 text-right">
              <p>Designed by <a href="https://gitlab.com/44a2z2">Mz</a></p>
            </footer>
          
          </div>
          
        </div>
  
    </div>
  </body>
</html>
