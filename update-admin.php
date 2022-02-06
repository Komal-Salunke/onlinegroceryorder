<?php include("menu.php")  
 ?>
 <div class="main-content">
     <div class="wrapper">
        <h1>Update Admin</h1>
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
		    
			$sql = "SELECT * FROM tbl_admin WHERE id ='$id'";

            $res = mysqli_query($conn, $sql);
			
			if($res==TRUE)
                {
	              $count = mysqli_num_rows($res);
				  
				  if($count==1)
				  {
					//echo "Admin Avaliable";
					$rows = mysqli_fetch_assoc($res);
					
					$full_name=$rows['full_name'];
					$username=$rows['username'];
						
				  }
				  else
				  {
					header("location:manage-admin.php"); 
				  }
                }
            


		?>
		
		<form action="" method="POST">
			<table class="tbl-full">
				<tr>
					<td>Full Name:</td>
					<td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
					
				</tr>
				
                <tr>
					<td>Username:</td>
					<td><input type="text" name="username"  value="<?php echo $username; ?>"></td>
					
				</tr>
				
				<tr>
					<td colspan="2">
					    <input type="hidden" name="id" value="<?php echo $id; ?>">
					    <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
					</td>
				</tr>
				
			</table>
		</form>
     </div>
 
 </div>
 
 <?php
    if(isset($_POST['submit']))
	{
		//echo "Button click";
		$id = $_POST['id'];
		$full_name = $_POST['full_name'];
		$username = $_POST['username'];
		
		$sql = "UPDATE tbl_admin SET
		full_name='$full_name',
		username='$username' WHERE id ='$id'";
		
		$res = mysqli_query($conn, $sql) or die(mysqli_error());
			
		if($res==TRUE)
		{
			
			
			$_SESSION['update'] = "<div class='success'>Admin Updated Successfully...</div>";
			
			//Redirect to manage-admin page
			//header("location:manage-admin.php");
			header('location:manage-admin.php');
		}
		else
		{
			
			
			$_SESSION['update'] = "<div class='error'>failed to update admin...</div>";
			
			//Redirect to add-admin page
			
			header('location:manage-admin.php');
		}
		
	}
 ?>
 
 <?php include("footer.php")  
    ?>
    