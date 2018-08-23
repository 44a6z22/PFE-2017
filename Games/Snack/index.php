<?php
 include '../../php/config.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Snake Game</title>
      <link type="text/css" rel="stylesheet" href="style/style.css">
      <link type="text/css" rel="stylesheet" href="../../css/style.css">
      <link rel="stylesheet" type="text/css" href="../../css/grid.css">
       <link rel="icon" type="image/png" href="../../img/Ts.png">
  </head>
  <body align="center">
      <?php
       if (isset($_SESSION['username']) || isset($_COOKIE['username']) ){
             echo" <div class='container_12 header'>";
             echo"<div class='grid_8'>";
             echo"<p>  Loged in as :<a href='profile.php' class='Psdo'>{$_COOKIE['username']}</a>  </p>";
            showd($_COOKIE['username']);
             echo"</div>";
             echo"<div class='grid_4'>";
             echo"<a href='../../home.php?id={$_COOKIE['username']}' class='logouth'>Log out</a>";
             echo "</div>";
             echo "</div>";

       }else{

       }

      ?>
        <p>your score : <span id="score"></span></p>
      <div class="sketch">
            <script src="libraries/p5.js" type="text/javascript"></script>
            <script src="libraries/p5.dom.js" type="text/javascript"></script>
            <script src="libraries/p5.sound.js" type="text/javascript"></script>
            <script src="sketch.js" type="text/javascript"></script>
            <script src="snake.js" type="text/javascript"></script>
      </div>

  </body>
</html>
