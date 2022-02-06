<?php include("menu.php")  
 ?>

 <div class="main-content">
	<div class="wrapper">
		<h1>Add Admin</h1>
		</br>
		
		<?php
		
		//Here we will be dispaly the message at top 
		//check whether the variable is set or not by using isset function
		//if value is set then display the message
		
		  if(isset($_SESSION['add']))
		  {
			echo $_SESSION['add'];  //displaying session msg
			unset($_SESSION['add']); //removing session msg
		  }
		?>
		
		<form action="" method="POST">
			<table class="tbl-full">
				<tr>
					<td>Full Name:</td>
					<td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
					
				</tr>
				
                <tr>
					<td>Username:</td>
					<td><input type="text" name="username" placeholder="Enter Your username"></td>
					
				</tr>
				
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" placeholder="Enter Your password"></td>
					
				</tr>
				<tr>
					<td colspan="2">
					    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
 
 
 <?php include("footer.php")  
    ?>

 <?php 
    //process the value from Form and Save it in Database
	
	//check whether the submit button is clicked or not
	
	if(isset($_POST['submit']))
	{
		//button clicked
		//echo "Button clicked";
		
		//get data from Form
		
		$full_name = $_POST['full_name'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		
		//sql query to save data into database
		
		$sql = "insert into tbl_admin set 
		full_name='$full_name',
		username='$username',
		password='$password'";
		
		//Executing query and saving data into database
		
		$res = mysqli_query($conn, $sql) or die(mysqli_error());
		
		// check wheather the is inserted or not and dispaly the massage
		
		if($res==TRUE)
		{
			//data inserted
			//echo "data inserted";
			
			//create a session variable to display message
			$_SESSION['add'] = "<div class='success'>Admin Added Successfully...</div>";
			
			//Redirect to manage-admin page
			//header("location:manage-admin.php");
			header('location:manage-admin.php');
		}
		else
		{
			//data in not inserted
			//echo "data  not inserted";
			
			$_SESSION['add'] = "<div class='error'>failed to add admin...</div>";
			
			//Redirect to add-admin page
			
			header("location:".SITURL."add-admin.php");
		}
	}
	
 ?>
