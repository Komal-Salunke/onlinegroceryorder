<?php include("menu.php")  
 ?>
 
 <div class="main-content">
     <div class="wrapper">
        <h1>Update Category</h1>
		
		 <br> <br>	
		 
		     <?php 
		 

             //1.get the id of admin to be updated
           if(isset($_GET['id']))
            {
	            $id = $_GET['id'];
           
		    
			$sql = "SELECT * FROM tbl_categories WHERE id ='$id'";

            $res = mysqli_query($conn, $sql);
			
			
	              $count = mysqli_num_rows($res);
				  
				  if($count==1)
				  {
					//echo "Admin Avaliable";
					$rows = mysqli_fetch_assoc($res); //it will get all data from database and save in row
					
					//$id=$rows['id'];
						$title=$rows['title'];
					    $current_name=$rows['image_name'];
                        $featured=$rows['featured'];
					    $active=$rows['active'];
					
						
				  }
				  else
				  {
					$SESSION['no-category-found'] = "<div class='error'>Category not found</div>";
					header("location:manage-categories.php");
				  }
				 
                }
				  else
				  {
					header("location:manage-categories.php"); 
				  }
               
            


		?>
		
		    
		 
			 <form action="" method="POST" enctype="multipart/form-data"> 
	<table class="tbl-full">
			<table class="tbl-full">
				<tr>
					<td>Title:</td>
					<td><input type="text" name="title" value="<?php echo $title; ?>"> </td>
				</tr>
				
				<tr>
					<td> Current Image:</td>
					
					<td>
					<?php 
									 
									 
									 //check whether image name is available or not
									 if($current_name!= "")
								   {
										 //display image
										 ?>
						 <img src="http://techstudio82/<?php echo $current_name; ?>" width="100px">
										 
										 
										 <?php
										 
									}
									 else
									 {
										 //just display massage 
										 echo "<div class='error'>image not addedd</div>";
									 }
									 
									 
									 ?>
									 
					</td>
				</tr>
				
				<tr>
					<td> New Image:</td>
					<td><input type="file" name="image_name" value=""> </td>
				</tr>
				
				 <tr>
				 
					<td>Featured:</td>
					
					<td>
					
	<input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes" > Yes
						
	<input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No" > No
						
				     </td>
				</tr>
                
				<tr>
					<td>Active:</td>
					<td>
	<input <?php if($active=="Yes"){echo "checked";} ?>  type="radio" name="active" value="Yes" > Yes
	
	<input <?php if($active=="No"){echo "checked";} ?>  type="radio" name="active" value="No" > No
				     </td>
				</tr>
				
				<tr>
					<td colspan="2">
					
					   <input type="hidden" name="current_image" value="">
					   
					    <input type="hidden" name="id" value="<?php echo $id; ?>">
					   
						<input type="submit" name="submit" value="Update Category" class="btn-primary">
						
						
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
		//1.get all the values from our form
		
		$id = $_POST['id'];
		$title = $_POST['title'];
		$current_image = $_POST['current_image'];
		//$new_name = $_POST['image_name'];
		$featured = $_POST['featured'];
		$active = $_POST['active'];
		
		//2.updating new image 
		
		
		if(isset($_FILES['image_name']['name']))
		{
			$image_name = $FILES['image_name']['name'];
			
			if($image_name != "")
			{
			             

                    //auto rename our image 
				//get the extension of our image 
				
				$ext = end(explode('.', $image_name));
				
				//rename the image 
				
				$image_name = "Fruits_category_".rand(000,999).''.$ext;
				
				
				
				$source_path = $_FILES['image_name']['tmp_name'];
				
				$destination_path = "D:/images/".$image_name;
				
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
					
					if($current_image !="")
					{
						$remove_path="D:/images/".$current_image;
				 
                        $remove = unlink($remove_path);
				 
				          if($remove==false)
				           {
					      $_SESSION['falied-remove']="<div class='error'>failed to remove image...</div>";
					          header('location:manage-categories.php');
					         die();
				           }
        				 
			        }
			    }
			}		
                 
			else
			{
				$image_name=$current_image;
			}
		}
		else
		{
			$image_name=$current_image;
		}
		
		//3.update the database
		$sql2 = "UPDATE tbl_categories SET
		title='$title',
		image_name='$image_name',
		featured='$featured',
		active='$active';
		WHERE id ='$id'";
		
		$res2=mysqli_query($conn, $sql2);
			
		//check whether executed or not
		
		if($res2==TRUE)
		{
			
			
			$_SESSION['update'] = "<div class='success'>category Updated Successfully...</div>";
			
		
			header('location:manage-categories.php');
		}
		else
		{
			
			
			$_SESSION['update'] = "<div class='error'>failed to update Category...</div>";
			
			//Redirect to manage-categories page
			
			header('location:manage-categories.php');
		}
		//4. redirect to manage categories
		
		
		
		
	}
	
	?>
 

<?php include("footer.php")  
    ?>
    