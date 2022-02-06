
<?php include("menu-page.php")  
 ?>
	 <section class="food-search text-center">
	        <div class="container">
	            
	            <h2>Explore Groceries</h2>
	

	        </div>
	    </section>

	
	    <!-- CAtegories Section Starts Here -->
	    <section class="categories">
	        <div class="container">
	            <h2 class="text-center"></h2>
	
                <?php
				
				include("config-admin.php");
				        //Display all categories that are active
						
						$sql = "SELECT * FROM tbl_categories WHERE active='Yes'";
						
						//execute the query
						
						$res = mysqli_query($conn,$sql);
						
			// count rows to check whether the categories is available or not
			$count = mysqli_num_rows($res);
			
			if($count>0)
			{
				//categories available
				while($row=mysqli_fetch_assoc($res))
				{
					//Get the values like title image name id 
					$id = $row['id'];
					$title = $row['title'];
					$image_name = $row['image_name'];
					
					//now we display this in HTML format
				?>
				
	            <a href="category-items.php?categories_id=<?php echo $id; ?>">
	            <div class="box-3 float-container">
				
				<?php
						    if($image_name == "")
							{
								echo "<div class='error'>Image Not Available</div>";
							}
							else
							{
								//image available
								?>
								<img src="http://techstudio82/<?php echo $image_name; ?>" alt="Fruits"  class="img-re img-curve">
								
								<?php
							}
						 ?>
						 
			          
	            <h3 class="float-text text-white"><?php echo $title; ?></h3>
		             </div>
		             </a>
		
					<?php
				}
			}
			else
			{
				//category not available
				echo "<div class='error'>Categories Not Available</div>";
			}
		
		?>

	            

	            <div class="clearfix"></div>
	        </div>
	    </section>
	    <!-- Categories Section Ends Here -->
	

	
<?php include("social-footer.php")  
 ?>
	