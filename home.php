<?php
session_start();/////////

   include 'php/config.php';

     if (isset($_SESSION['username']) || isset($_COOKIE['username']) ){}
     else{
          header('location:404/404.html');
        }
        // disconected
        if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                     if(isset($_SESSION['username']) || isset($_COOKIE['username']) )
                        {
                            disconected($id);
                          }
                }
        $sql = "select id from users where Pseudo = '{$_COOKIE['username']}'";
            $rslt=mysql_fetch_array(mysql_query($sql));

?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/grid.css">
     <link rel="icon" type="image/png" href="img/Ts.png">
    <script type="text/javascript" src="js/myscript.js"></script>
    <title> Home </title>



</head>
<body>
  <div class="container_12 header " >

      <div class="grid_8">
        <?php echo"<p>  Loged in as :<a href='profile.php' class='Psdo'>{$_COOKIE['username']}</a>  </p>";
          showd($_COOKIE['username']);?>
      </div>

      <div class="grid_4">
          <?php
          echo"<a href='home.php?id={$_COOKIE['username']}' class='logouth'>Log out</a>";
          ?>
        </div>

  </div>

    <div class="container_12 bodyy" id="cont" >

            <div class="grid_4 " >

               <?php echo"<a href='Games/Snack/index.php?id={$rslt['id']}' > <img id='pic' class='images' onmouseover='zoomin(this.id)' onmouseout='zoomout(this.id)' src='img/snack.jpg'></a>"?>
            </div>

        </div>


</body>
</html>
