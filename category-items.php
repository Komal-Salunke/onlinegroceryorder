

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
	<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <!-- Important to make website responsive -->
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Grocery Website-Category_items</title>
	

	    <!-- Link our CSS file -->
	    <link rel="stylesheet" href="sty.css">
	</head>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />	

	<body>
	    <!-- Navbar Section Starts Here -->
	   <section class="Navbar">
		<div class="container">
		<div class="logo">
            <img src="download.png" alt="Grocery Logo" class="img-responsive">
		</div>
		<div class="menu text-right">
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
	    <!-- Navbar Section Ends Here -->
	
        <?php
		
		        //check whether id is passed or not
				
				if(isset($_GET['categories_id']))
				{
					//category id is set and get the id 
					$categories_id = $_GET['categories_id'];
					
					//get the category title based on category id 
					
					$sql = "SELECT title FROM tbl_categories WHERE id=$categories_id";
					
					//execute the query
					$res = mysqli_query($conn, $sql);
					
					//get the value from database
					$row = mysqli_fetch_assoc($res);
					
					//get the title
					
					$categories_title = $row['title'];
				}
				else
				{
					//category not passed
					header("location:index.php"); 

				}
		?>
	    <!-- items sEARCH Section Starts Here -->
	    <section class="food-search text-center">
	        <div class="container">
	            
	            <h2>Groceries on <a href="#" class="text-white">"<?php echo $categories_title; ?>"</a></h2>
	

	        </div>
	    </section>
	    <!-- items sEARCH Section Ends Here -->
	

	

	

	    <!-- items MEnu Section Starts Here -->
	    <section class="food-menu">
	        <div class="container">
	            <h2 class="text-center">Grocery Items</h2>
	

	            <?php
					       
					//create sql query to get items based on selected category
					//this 'categories_id' is obtained from homepage
					
					$sql = "SELECT * FROM tbl_items WHERE categories_id=$categories_id";
				//execute the query
				
				    $res = mysqli_query($conn, $sql);
				
				 //count rows
				    $count = mysqli_num_rows($res);
				//check whether items available or not
				
				    if($count>0)
				        {
					        //items available
					        while($row=mysqli_fetch_assoc($res)) //get all the data from database
						
						        {
							        //get all the values
						            $id = $row['id'];
						            $title = $row['title'];
				                    $price = $row['price'];
		     	                    $description = $row['description'];
				                    $image_name = $row['image_name'];
						
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

	    </section>
	    <!-- Grocery items Section Ends Here -->
	

	   
 // <?php
//	  include("social-footer.php")  
 //?>
	
