<?php
include '../php/config.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    Downgrade($id);
   header('location:../adminpack/index.php');
}

?>