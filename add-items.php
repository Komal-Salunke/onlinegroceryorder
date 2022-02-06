<?php include("menu.php")  
 ?>
 
 <div class="main-content">
	<div class="wrapper">
		 <h1>Add Items</h1>
		 <br>
		 
		 
		         <?php
			
			if(isset($_SESSION['upload']))
			{
				echo $_SESSION['upload'];
				unset($_SESSION['upload']);
			}
			
			if(isset($_SESSION['add']))
			{
				echo $_SESSION['add'];
				unset($_SESSION['add']);
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
					<td>Description:</td>
		         <td>
	 <textarea name="description" cols="30" rows="5" placeholder="Description of the items"></textarea>
				 </td>
				 
				</tr>
				
				<tr>
					<td>Price:</td>
					<td>
					<input type="number" name="price"> 
					</td>
				</tr>
				
				<tr>
					<td> Select Image:</td>
					<td><input type="file" name="image_name" placeholder="image"> </td>
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
									$id = $row['id'];
									$title = $row['title'];
									
									?>
									
									<option value="<?php echo $id; ?>"><?php echo $title;?></option>
									
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
						<input type="submit" name="submit" value="Add Items" class="btn-primary">
						
						
					</td>
				</tr>
				
			</table>
		</form>
		
		<?php
            //check whether button is click or not
			if(isset($_POST['submit']))
			{
				//echo "add ";
				//1.get the data from form
				$title = $_POST['title'];
				$description = $_POST['description'];
				$price = $_POST['price'];
				$category = $_POST['category'];
				
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
				
                //2.upload image if selected
				
				//check whether the select image is click or not and upload only if image is selected
				
				 if(isset($_FILES['image_name']['name']))
			  {
				    //upload image
				    //To upload image we need image name and source path and destination path
				
				$image_name = $_FILES['image_name']['name'];
				
				if($image_name != "")
				{
				
				
				//auto rename our image 
				//get the extension of our image 
				
				//$ext = end(explode(".", $image_name));
				
				//rename the image 
				
				//$image_name = "Items-Name-".rand(0000,9999).".".$ext;
				
				
				
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
					
				}
			  }
			  else
			  {
				  //don't upload image
				  
				  $image_name="";
			  }
			   
				
                //3.insert into database
				
				//create a sql query to save or add items
				
				$sql2 = "INSERT INTO tbl_items SET 
				title = '$title',
				description = '$description',
				price = $price,
				image_name = '$image_name',
				categories_id = $category,
				featured = '$featured',
			    active = '$active'
				";

              $res2 = mysqli_query($conn, $sql2);
			  
			   if($res2==TRUE)
			   {
				   //QUERY EXECUTED AND CATEGORY ADDED
				   $_SESSION['add'] = "<div class='success'>Items Added Successfully...</div>";
				   
				   //Redirect to manage-categories page
				   
				   header('location:manage-items.php');
			   }
			   else
			   {
				   //fail to add category
				   
				   $_SESSION['add'] = "<div class='error'>failed to add items...</div>";
			       
				     //Redirect to add-categories page
				   
				   header('location:add-items.php');
			   }
			   
               
			}
		
		?>

	</div>
</div>


<?php include("footer.php")  
    ?>
       