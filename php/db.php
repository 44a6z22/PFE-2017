<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
mysql_connect("127.0.0.1","root","") or die("erreur de connection".mysql_error());
mysql_select_db("test") or die("Nom de db invalide".mysql_error());

 ?>