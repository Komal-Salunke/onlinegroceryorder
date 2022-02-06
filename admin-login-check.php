<?php 
    
 // To check wheather user lonin or not
 
  if(!isset($_SESSION['user']))
  {
	$_SESSION['no-login-msg'] = "<div class='error'>Please login to access Admin Panel.</div>" ;
	
	header("location:admin-login.php");
  }
 ?>
 