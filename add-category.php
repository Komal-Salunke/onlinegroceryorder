<?php include("menu.php")  
 ?>
 
 <div class="main-content">
	<div class="wrapper">
		 <h1>Add Category</h1>
		 
		        <br> 
				
				 <?php
		     
			if(isset($_SESSION['add']))
			{
				echo $_SESSION['add'];
				unset($_SESSION['add']);
			}
			
			if(isset($_SESSION['upload']))
			{
				echo $_SESSION['upload'];
				unset($_SESSION['upload']);
			}
			
		?>
			 <br> <br>	
				<form action="" method="POST" enctype="multipart/form-data">
	<table class="tbl-full">
			<table class="tbl-full">
				<tr>
					<td>Title:</td>
					<td><input type="text" name="title" placeholder="Category Title"> </td>
				</tr>
				
				<tr>
					<td> Select Image:</td>
					<td><input type="file" name="image_name" placeholder="Category Title"> </td>
				</tr>

				 <tr>
					<td>Featured:</td>
					<td>
						<input type="radio" name="featured" value="Yes" > Yes
						<input type="radio" name="featured" value="No" > No
				     </td>
				</tr>
                
				<tr>
					<td>Active:</td>
					<td>
						<input type="radio" name="active" value="Yes" > Yes
						<input type="radio" name="active" value="No" > No
				     </td>
				</tr>
				
				<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Add Category" class="btn-primary">
						
						
					</td>
				</tr>
				
			</table>
		</form>

      <?php
	  
	     if(isset($_POST['submit']))
	       {
		       //echo "Button click";
			   
			   $title = $_POST['title'];
			   
			   if(isset($_POST['featured']))
			   {
				   $featured = $_POST['featured'];
			   }
			   else
			   {
				    $featured = "No";
			   }
			   
			   if(isset($_POST['active']))
			   {
				   $active = $_POST['active'];
			   }
			   else
			   {
				    $active = "No";
			   }
			   
			   //check wheather the image is selected or not and set value fro image name accordingly
			   
			   //print_r($_FILES['image_name']);
			   
			  // die();//break the code here
			  
			  if(isset($_FILES['image_name']['name']))
			  {
				  //upload image
				//To upload image we need image name and source path and destination path
				
				$image_name = $_FILES['image_name']['name'];
				
				//auto rename our image 
				//get the extension of our image 
				
				//$ext = end(explode('.', $image_name));
				
				//rename the image 
				
				//$image_name = "Fruits_category_".rand(000,999).''.$ext;
				
				
				
				$source_path = $_FILES['image_name']['tmp_name'];
				
				$destination_path = "C:/wamp64/www/techstudio82/".$image_name;
				
				//finally upload image
				
				$upload = move_uploaded_file($source_path, $destination_path);
				
				//check wheather the image uploaded or not
				//if image not uploaded then we will stop process and redirect error msg 
				
				if($upload==false)
				{
					$_SESSION['upload'] = "<div class='error'>failed to upload image...</div>";
					//Redirect to add-categories page
				   
				   header('location:add-category.php');
				   
				   die();
					
				}
			  }
			  else
			  {
				  //don't upload image
				  
				  $image_name="";
			  }
			   
			   //2.create sql query to insert category into database
			   
			   $sql = "INSERT INTO tbl_categories SET 
			   title = '$title',
			   image_name = '$image_name',
			   featured = '$featured',
			   active = '$active'";
			   
			   //execute the query and save in database
			   $res = mysqli_query($conn, $sql);
			   
			   //check wheather query executed or not or data added or not
			   
			   if($res==TRUE)
			   {
				   //QUERY EXECUTED AND CATEGORY ADDED
				   $_SESSION['add'] = "<div class='success'>category Added Successfully...</div>";
				   
				   //Redirect to manage-categories page
				   
				   header('location:manage-categories.php');
			   }
			   else
			   {
				   //fail to add category
				   
				   $_SESSION['add'] = "<div class='error'>failed to add category...</div>";
			       
				     //Redirect to add-categories page
				   
				   header('location:add-category.php');
			   }
			   
		   }
	  
	  
       ?>
	</div>
</div>

 <?php include("footer.php")  
    ?>
       