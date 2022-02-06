<?php include("menu.php"); 
 ?>
 
 
 <?php
    //check whether id is set or not
	
	 //1.get the id of admin to be updated
           if(isset($_GET['id']))
            {
	            $id = $_GET['id'];
           
		    
			$sql2 = "SELECT * FROM tbl_items WHERE id ='$id'";

            $res2 = mysqli_query($conn, $sql2);
			
			
	              $count = mysqli_num_rows($res2);
				  
				  if($count==1)
				  {
					//echo "Admin Avaliable";
					$rows = mysqli_fetch_assoc($res2); //it will get all data from database and save in row
					
					//$id=$rows['id'];
						$title=$rows['title'];
						$description=$rows['description'];
						$price=$rows['price'];
					    $current_name=$rows['image_name'];
						$current_category=$rows['categories_id'];
                        $featured=$rows['featured'];
					    $active=$rows['active'];
					
						
				  }
				  else
				  {
					$SESSION['no-category-found'] = "<div class='error'>Category not found</div>";
					header("location:manage-items.php");
				  }
				 
                }
				  else
				  {
					header("location:manage-items.php"); 
				  }
               
            
 ?>
 
 
 
 
 <div class="main-content">
    <div class="wrapper">
        <h1>Update Items</h1>
		
		 <br> <br>	
		 
		 
		  <form action="" method="POST" enctype="multipart/form-data"> 
	<table class="tbl-full">
			<table class="tbl-full">
				<tr>
					<td>Title:</td>
					<td><input type="text" name="title" value="<?php echo $title; ?>"> </td>
				</tr>
				<tr>
				    <td>Description:</td>
				     <td>
	            	<textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
					 </td>
				</tr>
				<tr>
					<td>Price:</td>
					<td>
					<input type="number" name="price"  value="<?php echo $price; ?>">
					</td>
				</tr>
				<tr>
					<td>Current Image:</td>
					<td>
					
					<?php
					    if($current_name=='')
						{
							echo "<div class='error'>image not available</div>";
						}
						else
						{
							?>
			<img src="http://techstudio82/items-img/<?php echo $current_name; ?>" width="100px">
							
							<?php
						}
					?>
					
					
					</td>
				</tr>
				
				<tr>
					<td> New Image:</td>
					<td><input type="file" name="image_name" value=""> </td>
				</tr>
				
				<tr>
					<td>Categories:</td>
					<td>
					<select name="category">
					        <?php
							//creatae php code to display categories from database
							//crate sql query to get all active categories from database
							
							$sql = "SELECT * FROM tbl_categories WHERE active='Yes'";
							$res = mysqli_query($conn, $sql);
							
							//count rows whether we have categories or not
							
							$count = mysqli_num_rows($res);
							
							//if count is grater then o we have categoris else not
							
							if($count>0)
							{
								//we have categoris
								while($row=mysqli_fetch_assoc($res))
								{
									//get the details of categories
									 $category_title=$row['title'];
                                     $category_id=$row['id'];
									
									?>
									
						<option value="<?php echo $category_id; ?>"><?php echo $category_title;?></option>
									
									<?php
								}
							}
							else
							{
								//we do not have categories
								?>
								
								<option value="0">No categories found</option>
								
								<?php
								
							}
							
							
							//display on dropdown
							?>
						  
                        
    
                    </select>
					</td>
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
		
		           <input type="hidden" name="current_name" value="<?php echo $current_name; ?>">
				   <input type="hidden" name="id" value="<?php echo $id; ?>">
				   <input type="submit" name="submit" value="Update Items" class="btn-primary">
						
						
					</td>
				</tr>
			</table>
		</form>
		
		
		
  <?php
    if(isset($_POST['submit']))
	{
		//echo "Button click";
		//1.get all the values from our form
		$id = $_POST['id'];
		$title = $_POST['title'];
        $description = $_POST['description'];
	    $price = $_POST['price'];
		$current_name = $_POST['current_name'];
		$category = $_POST['category'];		
		$featured = $_POST['featured'];
		$active = $_POST['active'];
		
		//2.updating new image 
		
	if(isset($_FILES['image_name']['name']))
			  {
				    //upload image
				    //To upload image we need image name and source path and destination path
				
				$image_name = $_FILES['image_name']['name'];
				
				if($image_name != "")
				{
				
				
				//auto rename our image 
				//get the extension of our image 
				
				$ext = end(explode(".", $image_name));
				
				//rename the image 
				
				$image_name = "Items-Name-".rand(0000,9999).".".$ext;
				
				
				
				$src = $_FILES['image_name']['tmp_name'];
				
				$det = "C:/wamp64/www/TechStudio82/items-img/".$image_name;
				
				//finally upload image
				
				$upload = move_uploaded_file($src, $det);
				
				}
				
				//check wheather the image uploaded or not
				//if image not uploaded then we will stop process and redirect error msg 
				
				if($upload==false)
				{
					$_SESSION['upload'] = "<div class='error'>failed to upload image...</div>";
					//Redirect to add-categories page
				   
				   header('location:add-items.php');
				   
				   die();
				   
				   if($current_image !="")
					{
						$remove_path="C:/wamp64/www/TechStudio82/items-img/".$current_image;
				 
                        $remove = unlink($remove_path);
				 
				          if($remove==false)
				           {
					      $_SESSION['falied-remove']="<div class='error'>failed to remove image...</div>";
					          header('location:manage-items.php');
					         die();
				           }
        				 
			        }
					
				}
			  }
			  else
			  {
				  //don't upload image
				  
				  $image_name=$current_image;
			  }
			  
		//3.update the database
		$sql3 = "UPDATE tbl_items SET
		title='$title',
		description='$description',
		price='$price',
		image_name='$image_name',
		categories_id='$category',
		featured='$featured',
		active='$active';
		WHERE id ='$id'";
		
		$res3=mysqli_query($conn, $sql3);
			
		//check whether executed or not
		
		if($res3==TRUE)
		{
			
			
			$_SESSION['update'] = "<div class='success'>category Updated Successfully...</div>";
			
		
			header('location:manage-items.php');
		}
		else
		{
			
			
			$_SESSION['update'] = "<div class='error'>failed to update Category...</div>";
			
			//Redirect to manage-categories page
			
			header('location:manage-items.php');
		}
		//4. redirect to manage categories
		
		
		
		
	}
	
	?>
 
		
		
	</div>
</div>

<?php 
include("footer.php"); 
?>
   