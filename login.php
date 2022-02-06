<!DOCTYPE html>
<html>
<head>
	<title>Login - Grocery Website</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href='style.css'>
</head>
<body>
<div class='container'>
<div class='row'>
		<div class='col-md-4'>
			
		</div>
		<div class='col-md-4'>

              <?php
        if(isset($_GET['loginerror'])){
            $loginerror=$_GET['loginerror'];

          }
            if(!empty($loginerror)){ echo '<p class="errmsg">Invalid login
              credentials, please Try Again...</p>';} ?>
              


			<form action="login_process.php" method="POST">
			<div class='login_form'>
			
  <div class="mb-3">
    <label class="label_txt">Username or Email </label>
    <input type="text" name="login_var" value="<?php if(!empty($loginerror))
        { echo $loginerror; } ?>" class="form-control" >

    </div>

  <div class="mb-3">
    <label class="label_txt">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
 
  <button type="submit" name="sublogin" class="form_btn btn btn-primary">Login</button>
</form>
 <p style="font-size: 12px; text-align: center; margin-top: 10px;"><a href="forget-password.php" style="color: #00376b"></a></p> 
	<br>
	<p>Don't have an account?<a href="signup.php">Sign up</a></p>


		</div>

		<div class='col-md-4'>
			
		</div>
		
	

</div>
</div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</html>