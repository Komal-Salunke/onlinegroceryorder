<?php include("menu.php")  
 ?>
       <div class="main-content">
     <div class="wrapper">
        <h1>Manage Items</h1>
		
		 <br> 
				
				 <?php
		     
			if(isset($_SESSION['add']))
			{
				echo $_SESSION['add'];
				unset($_SESSION['add']);
			}
			
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
		
		
		
				<br/> <br/>
		
		
		 <!--  button to Add admin -->
		 
<a href="add-items.php" class="btn-primary">Add Items</a>
		<br/> <br/> <br/>
		<table class="tbl-full">
	    <tr>
		            <th>S.N.</th>
			        <th>Title</th>
				    <th>Price</th>
					<th>Image</th>
					<th>Featured</th>
					<th>Active</th>
					<th>Action</th>
	    </tr>
		
		 <?php
			
			    //query to get all categories from database
			        $sql = "SELECT * FROM tbl_items";
					
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
						$price=$rows['price'];
					    $image_name=$rows['image_name'];
                        $featured=$rows['featured'];
					    $active=$rows['active'];	
						
						?>
						
						<tr>
		                <td><?php echo $sn++; ?></td>
		                <td><?php echo $title; ?></td>		
		                <td><?php echo $price; ?></td>
						
                        <td>
						<?php 
									 
									 
									 //check whether image name is available or not
									 if($image_name!='')
									 {
										 //display image
										 ?>
               <img src="http://techstudio82/items-img/<?php echo $image_name; ?>" width="100px">
										 
										 
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
			    <a href="update-items.php?id=<?php  echo $id;?>&image_name=<?php echo $image_name; ?>" class="btn-secondary">Update Category</a>
                <a href="delete-items.php?id=<?php  echo $id;?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Category</a>
		               </td>
	                   </tr>
				
						<?php
					}
				  }
				  else
				  {
					 echo "<tr><td colspan='6' class='error'>Items not added.</td></tr>";
				  }

                        ?>
		
	
	
	
</table>
			
			<div class="clearfix"></div>
     	</div>
     </div>
 
 <?php include("footer.php")  
    ?>
        