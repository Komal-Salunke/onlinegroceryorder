<?php include("menu.php")  
 ?>
 
 
      <div class="main-content">
     <div class="wrapper">
        <h1>Manage Category</h1>
			<br><br>
			
			 <?php
		     
			if(isset($_SESSION['add']))
			{
				echo $_SESSION['add'];
				unset($_SESSION['add']);
			}
			//it will dispaly msg if we fail to remove image
			if(isset($_SESSION['remove']))
			{
				echo $_SESSION['remove'];
				unset($_SESSION['remove']);
			}
			if(isset($_SESSION['delete']))
			{
				echo $_SESSION['delete'];
				unset($_SESSION['delete']);
			}
			if(isset($_SESSION['no-category-found']))
			{
				echo $_SESSION['no-category-found'];
				unset($_SESSION['no-category-found']);
			}
			
			if(isset($_SESSION['update']))
			{
				echo $_SESSION['update'];
				unset($_SESSION['update']);
			}
			
			if(isset($_SESSION['upload']))
			{
				echo $_SESSION['upload'];
				unset($_SESSION['upload']);
			}
			
			if(isset($_SESSION['falied-remove']))
			{
				echo $_SESSION['falied-remove'];
				unset($_SESSION['falied-remove']);
			}
			?>
		<br><br>
		 <!--  button to Add admin -->
		 
<a href="add-category.php" class="btn-primary">Add Category</a>
		<br/> <br/> <br/>
		<table class="tbl-full">
	<tr>
		<th>S.N.</th>
			<th>Title</th>
				<th>Image</th>
				<th>Featured</th>
				<th>Active</th>
					<th>Actions</th>
	</tr>
	
	
            <?php
			
			    //query to get all categories from database
			        $sql = "SELECT * FROM tbl_categories";
					
					// execute query
					
					$res = mysqli_query($conn, $sql);
					
			        //count rows 
					 $count = mysqli_num_rows($res);
					 
					 //create serial number variable 
					 $sn = 1;
					 
					 
					 //check whether data in database or not
					 
					  if($count>0)
				  {
					//we have data in database;
					//get data and display
					while($rows = mysqli_fetch_assoc($res))
					{
					
                        $id=$rows['id'];
						$title=$rows['title'];
					    $image_name=$rows['image_name'];
                        $featured=$rows['featured'];
					    $active=$rows['active'];	

                        ?>
                              <tr>
		                        <td><?php echo $sn++; ?></td>
		                        <td><?php echo $title; ?></td>
								
		                        <td>
						<?php 
									 
									 
									 //check whether image name is available or not
									 if($image_name!='')
									 {
										 //display image
										 ?>
               <img src="http://techstudio82/<?php echo $image_name; ?>" width="100px">
										 
										 
										 <?php
									 }
									 else
									 {
										 //just display massage 
										 echo "<div class='error'>image not addedd</div>";
									 }
									 
									 
									 ?>
						
						</td>
		                        <td><?php echo $featured; ?></td>
		                        <td><?php echo $active; ?></td>
		                        <td>
			    <a href="update-category.php?id=<?php  echo $id;?>&image_name=<?php echo $image_name; ?>" class="btn-secondary">Update Category</a>
                <a href="delete-category.php?id=<?php  echo $id;?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Category</a>
		                        </td>
	                           </tr>
                        <?php
						
					}
					
					
						
				  }
				  else
				  {
					  //we do not have data in database;
					//we will display the message inside table
                    
                     ?>
                       <tr>
					        <td colspan="6"><div class='error'>NO category added</div></td>
					   </tr>
                    <?php
					
				  }
			?>	
	
	
	
	
	
</table>
			
			<div class="clearfix"></div>
     	</div>
     </div>
 
 
 <?php include("footer.php")  
    ?>
        