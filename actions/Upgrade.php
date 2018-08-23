<?php
include '../php/config.php';
 if(isset($_GET['id'])){
     $id = $_GET['id'];
     UpgradeUser($id);
 }
header('location:../adminpack/index.php');
?>