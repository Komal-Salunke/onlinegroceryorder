<?php
 include("config-admin.php");
   session_destroy(); //unset $_session 
   header("location:admin-login.php");
?>