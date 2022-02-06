<?php 

    include("config-admin.php");

	//session_start();
	if(isset($_SESSION['cart']))
	{
		$cart_count=count($_SESSION['cart']);
	}
	else{
		$cart_count=0;
	}
?>
<!DOCTYPE html>
<html>
<head>
	 <meta charset='utf-8'>
     <meta http-equiv='X-UA-Compatible' content='IE=edge'>
     <meta name='viewport' content='width=device-width, initial-scale=1'>
	 <title>Grocery Website-Homepage</title>
	 <link rel="stylesheet" type="text/css" href="stylesheet.css">
	 <link rel="stylesheet" href="sty.css">

</head>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
<body>
	<section class="Navbar">
		<div class="container">
		<div class="logo">
            <img src="download.png" alt="Grocery Logo" class="img-responsive">
		</div>
		<div class="menu text-rignt">
			<ul>
				<li>
					<a href="index.php">Home</a>
				</li>
				
				<li>
					<a href="categories.php">Categories</a>
				</li>
				<li>
					<a href="items.php">Items</a>
				</li>
				
				<li>
					<a href="signup.php">Registration</a>
				</li>
				<li>
					<a href="login.php">LogIn</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-light"><?php echo $cart_count;?></span></a>
				</li>
			</ul>
		</div>
		<div class="clearfix">
        </div>
		</div>
	</section>
	<section class="Grocery-Search text-center">
		<div class="container">
		<form action="items-search.php" method="POST">
			<input type="search" name="search" placeholder="Search For Grocery....">
			<input type="submit" name="submit" value="search" class="btn btn-primary">
		</form>
	
		</div>
	</section>
	
	  <?php
	  
	      //Here we will be dispaly the message at top 
		    //check whether the variable is set or not by using isset function
		    //if value is set then display the message
		
			if(isset($_SESSION['order']))
			{
				echo $_SESSION['order'];
				unset($_SESSION['order']);
			}
	  ?>
	
	
	<section class="Categories">
		<div class="container cont">
		<h2 class="text-center">Explore Groceries</h2>
		
		
		<?php
		    
			
			//create sql query to display categories from database
			
			$sql = "SELECT * FROM tbl_categories WHERE active='Yes' AND featured='Yes' LIMIT 3";
			
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
		             <div class="box-3 float-container" >
					     
						 <?php
						    if($image_name == "")
							{
								echo "<div class='error'>Image Not Available</div>";
							}
							else
							{
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
		
		
		
		<div class="clear"></div>
		</div>
	</section>
	
	
	<section class="food-menu">
	    <div class="container">
	        <h2 class="text-center">Grocery Items</h2>
	
		        <?php
					        
				//create sql query to display grocery items from database 
					
				    $sql2 = "SELECT * FROM tbl_items WHERE active='yes' AND featured='Yes' LIMIT 6";
				
				//execute the query
				
				    $res2 = mysqli_query($conn, $sql2);
				
				 //count rows
				    $count2 = mysqli_num_rows($res2);
				//check whether items available or not
				    if($count2>0)
				        {
					        //items available
					        while($row=mysqli_fetch_assoc($res2)) //get all the data from database
						
						        {
								    //get all the values
						            $id = $row['id'];
						            $title = $row['title'];
						            $price = $row['price'];
						            $description = $row['description'];
						            $image_name = $row['image_name'];
						
						//now we display this in HTML format
				?>
											
		            <div class="food-menu-box">
												   
	                    <div class="food-menu-img">
														
														
						    <?php
							
							    //check whether image available or not
								if($image_name == "")
							        {
								//image not availabel
								        echo "<div class='error'>Image Not Available</div>";
							        }
							    else
							        {
								//image available
							?>
						
	                                 <img src="http://techstudio82/items-img/<?php echo $image_name; ?>" alt="apples" class="img-responsive img-curve">
	                                                </div>
	                                   <?php
							        }
								
							            ?>

	                                <div>
		                                <h4><?php echo $title; ?></h4>
							
			                            <p class="Grocery-price"><?php echo $price; ?></p>
							
			                            <p class="Grocery-detail">
                                                <?php echo $description; ?>
			                            </p>
							
			                         <br>
			                <a href="order.php?categories_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
							
							<a onclick="add_to_cart('<?php echo $id; ?>')"> <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                  cart</button></a>
							
		                            </div>
					                <div class="clearfix"></div>
		                    </div>
		
						<?php
					                    }
				                }
							else
							{
								//items not available
					            echo "<div class='error'>Items Not Available</div>";
							}
					
					?>

	         <div class="clearfix"></div>

	           
	</div>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>	
	<script>
	function add_to_cart(id)
	{
		console.log(id);
		$.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          id: id,
        },
		success: function(response) {
         location.reload();
        }
		});
	}
	</script>	
		
	<?php include("social-footer.php")  
 ?>
	