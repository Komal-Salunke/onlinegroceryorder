
<!DOCTYPE html

<?php require_once("config.php");
if (!isset($_SESSION["login_sess"]))
 {
	header("location:login.php");
}
  $email=$_SESSION["login_email"];
  $findresult = mysqli_query($dbc, "SELECT * FROM users WHERE email='$email'");

  if($res = mysqli_fetch_array($findresult))
  {
  	$username = $res['username'];
  	$fname = $res['fname'];
  	$lname = $res['lname'];
  	$email = $res['email'];
  }
 ?>

<html>
<head>
	<title> My Account - Grocery Website</title>
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
				<form action="login_process.php" method="POST">
					<div class="login_form">
					
						<p><a href="logout.php">
							<span style="color: red; float: right;">logout</span>
						</a></p>
						<p> Welcome! <span style="color: #33CC00"><?php echo $username; ?></span></p>
						<table class="table">
							<tr>
								<th>First Name</th>
								<td><?php echo $fname; ?></td>
		
							</tr>
							<tr>
								<th>Last Name</th>
								<td><?php echo $lname; ?></td>
		
							</tr>
							<tr>
								<th>Username</th>
								<td><?php echo $username; ?></td>
		
							</tr>
							<tr>
								<th>Email</th>
								<td><?php echo $email; ?></td>
		
							</tr>
						</table>
						
					</div>
					
				</form>
				
			</div>

			<div class="col-md-4">
				
			</div>
		</div>
		
	</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

</html>