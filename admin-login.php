<?php

//include("menu.php");
include("config-admin.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login - Grocery Website</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href='style.css'>
</head>
<body>
<div class='container'>
<div class='row '>
		<div class='col-md-4'>
			
		</div>
		<div class='col-md-4 '>
 <Br> <Br> 
       

			<form action="" method="POST">
			<div class='login_form'>
			<br>
			 <?php
		     
			if(isset($_SESSION['login']))
			{
				echo $_SESSION['login'];
				unset($_SESSION['login']);
			}
			
			if(isset($_SESSION['no-login-msg']))
			{
				echo $_SESSION['no-login-msg'];
				unset($_SESSION['login']);
			}
		?>
  <br>
  <div class="mb-3">
  
    <label class="label_txt">Username</label>
    <input type="text" name="username"  class="form-control" >

    </div>

  <div class="mb-3">
    <label class="label_txt">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
 
  <button type="submit" name="submit" class="form_btn btn btn-primary">Login</button>
</form>
 <!--<p style="font-size: 12px; text-align: center; margin-top: 10px;"><a href="forget-password.php" style="color: #00376b"></a></p> 
	<br>
	<p>Don't have an account?<a href="signup.php">Sign up</a></p>
-->

		</div>

		<div class='col-md-4'>
			
		</div>
		
	

</div>
</div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</html>

<?php 
    if(isset($_POST['submit']))
	{
		$username = $_POST['username'];
	    $password = md5($_POST['password']);
		
		//sql to check wheather the user with username and password exist or not.

        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        $res = mysqli_query($conn, $sql) or die(mysqli_error());
		
		$count = mysqli_num_rows($res);
		    
			 if($count==1)
				  {
					$_SESSION['login'] = "<div class='success'>Admin Login Successfully...</div>";  

					$_SESSION['user'] = $username;// To check wheather user lonin or not
					 header('location:admin.php');  
				  }
			else
			      {
				    $_SESSION['login'] = "<div class='error'>Username and password did not match.</div>";      
					 header('location:admin-login.php');  
			      }
	}
	
?>