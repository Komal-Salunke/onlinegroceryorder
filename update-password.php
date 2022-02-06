<?php include("menu.php")  
 ?>
 
 <div class="main-content">
    <div class="wrapper">
        <h1>Change password</h1>
		<br><br>
		<?php 
		  //include("config-admin.php");

//1.get the id of admin to be deleted
           if(isset($_GET['id']))
            {
	            $id = $_GET['id'];
            }
           else
            {
	             $id = "id not get in GET method";
            }
			
			if(isset($_GET['current_password']))
            {
	            $current_password = $_GET['current_password'];
            }
			 else
            {
	             $current_password = "current password not get in GET method";
            }
			
			if(isset($_GET['new_password']))
            {
	            $new_password = $_GET['new_password'];
            }
			 else
            {
	             $new_password = "new password not get in GET method";
            }
			
			
			if(isset($_GET['confirm_password']))
            {
	            $confirm_password = $_GET['confirm_password'];
            }
			 else
            {
	             $confirm_password = "confirm password not get in GET method";
            }
			
			?>
		
		<form action="" method="POST">
	<table class="tbl-full">
				<tr>
					<td>Current Password</td>
					<td><input type="password" name="current_password" placeholder="Enter Current Password"> </td>
				</tr>
				
				<tr>
					<td>New Password</td>
					<td><input type="password" name="new_password" placeholder="Enter new Password"> </td>
				</tr>
				
				<tr>
			<td>Confirm Password</td>
			<td><input type="password" name="confirm_password" placeholder="Confirm Your Password"> </td>
				</tr>
				
				<tr>
					<td colspan="22">
						<input type="submit" name="submit" value="Change Password" class="btn-primary">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
						
					</td>
				</tr>
				
			</table>
	
</form>
	</div>
 </div>
 
 <?php 
    if(isset($_POST['submit']))
	{
		//echo "clicked";
		$id = $_POST['id'];
		$current_password = md5($_POST['current_password']);
		$new_password = md5($_POST['new_password']);
		$confirm_password = md5($_POST['confirm_password']);
		
		
		$sql = "SELECT * FROM tbl_admin WHERE id ='$id' AND password = '$current_password'";
		
		$res = mysqli_query($conn, $sql) or die(mysqli_error());
		
        if($res==TRUE)
                {
	              $count = mysqli_num_rows($res);
				  
				  if($count==1)
				  {
					
					//echo "user found";
                        if($new_password==$confirm_password)
						{
							//echo "pass match";
							$sql2 = "UPDATE tbl_admin SET password='$new_password' WHERE id ='$id'";
							$res2 = mysqli_query($conn, $sql2) or die(mysqli_error());
							
							if($res2==TRUE)
		                        {
			
			
			                       $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully...</div>";
			
			
			                          header('location:manage-admin.php');
		                        }
		                    else
		                       {
			
			
			                        $_SESSION['change-pwd'] = "<div class='error'>failed to change password...</div>";
			 
			
			                        header('location:manage-admin.php');
		                         }
		
						}	
                    else
					{
						$_SESSION['pwd-not-match'] = "Password does not match...";
					    header("location:manage-admin.php"); 
					}						
				  }
				  else
				  {
					$_SESSION['user-not-found'] = "User not found...";
					header("location:manage-admin.php"); 
				  }
                }
            		
	}
 ?>
 
<?php include("footer.php");
    ?>
       