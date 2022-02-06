<!DOCTYPE html>
<?php require_once("config.php");
if (isset($_SESSION["login_sess"]))
 {
	header("location:account.php");
}
  
 ?>
<html>
<head>
	<title>Forget Password - Grocery Website</title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href='style.css'>

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				
			</div>
			<div class="col-md-4">
				
<form action="forget_process.php" method="POST">
			<div class='login_form'>
			
  <div class="mb-3">
    <label class="label_txt">Username or Email </label>
    <input type="text" name="login_var" value="<?php if(!empty($err))
        { echo $loginerror; } ?>" class="form-control" >

    </div>

 
 
  <button type="submit" name="subforget" class="form_btn btn btn-primary">Send Link</button>
</form>
<br>

	<p>Have an account?<a href="login.php">Log in</a></p>
<p>Don't have an account?<a href="signup.php">Sign up</a></p>


			</div>
			<div class="col-md-4">
				
			</div>
			
		</div>
		
	</div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</html>