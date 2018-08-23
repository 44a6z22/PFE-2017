<?php
    include '../php/config.php';
   
     if(isset($_COOKIE['username'])){
        $sql = "select * from users where Pseudo = '{$_COOKIE['username']}' ";
        $rslt = mysql_query($sql);
        $data = mysql_fetch_array($rslt);

        $fullname = $data['Full_Name'];
       
        $Email = $data['Email'];
        $age = $data['age'];
        $ids = $data['id'];
        
        $data2 = mysql_fetch_array(mysql_query("SELECT * FROM city WHERE City_id = {$data['City_id']}"));
        
        $game = "SNACK";
        if ( isset($_POST['RIP'])){
          updateuser($ids,$_POST['username'],md5($_POST['password']),$_POST["Email"],$_POST["Citys"]);
        }
      }else {
        header('location:../home.php');
      }





?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo"$fullname"?></title>
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/updateprofile.css" type="text/css">
</head>
<body>
    
      <form class="" action="" method="post">
            <div  class="container-fluid ">
                  
              <div class="col-md-6 col-xs-12 offset-md-3 profile"  >
                  <h1 align="center"> Profile Info </h1>
                  <div class="row">

                        <div class="col-md-6 col-xs-12 ">
                            <div class='col-md-6 col-xs-12  ' >
                              <img src='../img/profile-pic.jpg' 
                                   class='rounded-circle' id='profile-pic'
                                   style="margin-left: 50%;margin-top: 20%; width: 170%;height: 150%;">
                            </div>
                        </div>


                       <div class="col-md-6 col-xs-12" align="center">
                                    
                           
                            
                             <div  >
                                 <label> User Name : </label>
                                 <input type="text" name="username" value="<?php echo"$fullname" ?>" style="width: 100%">
                             </div>

                             <div  >
                               <label>Email: </label>
                               <input type="text" name="Email" value="<?php echo"$Email" ?>" style="width: 100%">
                             </div>

                             <div >
                                 <label> City  : </label>
                                 <select  name='Citys'align='center' style="width: 100%">
                                    <?php 
                                      citys();
                                     ?>
                                    </select>
                             </div>

                             <div class="">
                               <label for="password">password :</label>
                               <input type="password" name="password" id="password" value="" style="width: 100%">
                             </div>

                             <div>
                              <br>
                                <input type="submit" name="RIP" style="width: 100%; margin-bottom:10px;" value="Update" >
                             </div>
                        </div>                  
                     </div>
             
            </div> 
          </div>
                          </form>


</body>
</html>
