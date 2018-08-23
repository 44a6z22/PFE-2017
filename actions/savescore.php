<?php
include'../php/config.php';
if(isset($_COOKIE['username']) || $_SESSION['username']){
    
 
if (isset($_GET['score']))
{
   
         $id=$_GET['score'];
     
        $sql1="select GameId FROM games Where GameName = 'SNACK' ";
        $rslt = mysql_query($sql1)or die("erreur de connection".mysql_error());
        $data = mysql_fetch_array($rslt)or die("erreur de connection".mysql_error());
         $sql2="select id FROM users Where Pseudo = '{$_COOKIE['username']}' ";
        $rslt2 = mysql_query($sql2)or die("erreur de connection".mysql_error());
        $data2 = mysql_fetch_array($rslt2) or die("erreur de connection".mysql_error());
      
        
    $sql ="insert into played(PlayId,GameId,UserId,HighScore) values(NULL,'{$data['GameId']}','{$data2['id']}','$id')";
    mysql_query($sql) or die("erreur de connection".mysql_error());
     header('location:../Games/Snack/');
    
   
}

    }else{
        header('location:../../index.php');
}
?>
