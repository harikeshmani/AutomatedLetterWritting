<?php 

 $link = mysqli_connect("localhost", "root", "root", "db_sms_sterlite");
 if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
 }


?>