<?php
session_start();
include '../php/config.php';
  if(isset( $_SESSION['admin']) ) {
             
         }else{header('location:cplogin.php');}
if(isset($_POST['submit'])){
    session_destroy();
   header('location:index.php');
}

?>
<html>
<head>
    <title>HOME</title>
    <link rel="icon" type="image/png" href="../img/Ts.png">
    <link type="text/css" href="css/stylehome.css" rel="stylesheet"> 
    <link type="text/css" href="css/grids.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            
            var trigger = $('#nav ul li a'),
                container = $('#hides');
            
            trigger.on('click',function(){
                var target = $(this).data('target');
                
                container.load(target);
               
                return false;
                
            })
            
            
            
        })
    </script>

</head>
<body>
    
    <div class="container_12 best">
        
        <div class="container_12">
                <div class="grid_4">
                    <?php echo"<h2>hello {$_SESSION['admin']}</h2>"?>
                </div>

                <div class="grid_8"> 
                      <form method="post">
                          <input type="submit" class="buttondeco" name ="submit" value="Log Out">
                      </form>
                </div>

        </div>
  
        <div class="container_12"> 
            <nav class="tasks grid_12" id="nav">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#" data-target="Users.php">Users</a></li>
                    <li><a href="#" data-target="Upload.php">Upload</a></li>
                    <li><a href="#" data-targer="#">Delete</a></li>

                </ul>
            </nav>
        </div>
       
        <div class="container_12">
            <div class="grid_13" id="hides">
           
            </div>
        

        </div>

    </div>

</body>
</html>
