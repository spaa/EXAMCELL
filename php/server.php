<?php

   //connect to database

   $db = mysqli_connect('localhost', 'root', '', 'examcell');
   
   if(!$db){
   	die("Connection Failed: ".msqli_connect_error());
   }
?>

