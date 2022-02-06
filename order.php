 <?php
				
				include("config-admin.php");
?>
<!DOCTYPE html>
	<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <!-- Important to make website responsive -->
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Grocery Website-Order</title>
	

	    <!-- Link our CSS file -->
	    <link rel="stylesheet" href="sheet.css">
	</head>
	

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
			</ul>
		</div>
		<div class="clearfix">
        </div>
		</div>
	</section>
	    <!-- Navbar Section Ends Here -->
	
        
		<?php
		
		            //check whether items id is set or not 
					if(isset($_GET['categories_id']))
					{
						//get the items id and details at the selected items
						
						$items_id = $_GET['categories_id'];
						
						//get the details of the selected items
						
						$sql = "SELECT * FROM tbl_items WHERE id=$items_id";
				        
						//execute the query
				
				        $res = mysqli_query($conn, $sql);
						
						//count rows
				        
						$count = mysqli_num_rows($res);
				        
						//check whether items available or not
				        if($count==1)
				            {
					            //get data from database
					            
								$row=mysqli_fetch_assoc($res); //get all the data from database
						
						            
									   //get all the values
						               // $id = $row['id'];
						                $title = $row['title'];
						                $price = $row['price'];
						                //$description = $row['description'];
				                        $image_name = $row['image_name'];
									
							}
						else
						{
							//items not available
							header('location:index.php');
							
						}
						
					}
					else
					{
						header('location:index.php');
					}
		?>
		
		
		
	    <!-- items sEARCH Section Starts Here -->
	    <section class="food-search">
	        <div class="container">
	            
	            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>
	

	            <form action="" method="POST" class="order">
	                <fieldset>
	                    <legend>Selected Items</legend>
	

	                    <div class="food-menu-img">

						    <?php
							        //check whether image is available or not
									
									if($image_name=="")
									{
										//image not available
										echo "<div class='error'>Image Not Available</div>";
									}
									else
									{
										//image is available
							?>
										
						<img src="http://techstudio82/items-img/<?php echo $image_name; ?>" alt="Apple" class="img-responsive img-curve">
	                                  
							<?php
										
									}
							
							?>
						       </div>
	    
						
	                        
	                  
	    
	                    <div class="food-menu-desc">
	                        <h3><?php echo $title; ?></h3>
							<input type="hidden" name="items" value="<?php echo $title; ?>">
							<br>
	                        <p class="Item-price"><?php echo $price; ?></p>
							<input type="hidden" name="price" value="<?php echo $price; ?>">
	                        <br>

	                        <div class="order-label">Quantity</div>
	                        <input type="number" name="qty" class="input-responsive" value="1" required>
	                        
	                    </div>
	

	                </fieldset>
	                
	                <fieldset>
	                    <legend>Delivery Details</legend>
	                    <div class="order-label">Full Name</div>
	                    <input type="text" name="full-name" placeholder="E.g. Anuradha Sankpal" class="input-responsive" required>
	

	                    <div class="order-label">Phone Number</div>
	                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>
	

	                    <div class="order-label">Email</div>
	                    <input type="email" name="email" placeholder="E.g. anusankpal@gmail.com" class="input-responsive" required>
	

	                    <div class="order-label">Address</div>
	                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>
	

	                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
	                </fieldset>
	

	            </form>
	
                
				<?php
				
				        if(isset($_POST['submit']))
						{
							//get the details from the form
							
							$items = $_POST['items'];
							$price = $_POST['price'];
							$qty = $_POST['qty'];
							
							$total = $price * $qty;
							
							$order_date = date("Y-m-d h:i:sa");
							
						    $status = "ordered"; // ordered, on delivery, delivered, cancel
						
						    $customer_name = $_POST['full-name'];
							$customer_contact = $_POST['contact'];
							$customer_email = $_POST['email'];
							$customer_address = $_POST['address'];
							
							//save order in database
							
							$sql2 = "INSERT INTO tbl_order SET 
							items = '$items',
							price = '$price',
							qty = '$qty',
							total = '$total',
							order_date = '$order_date',
							status = '$status',
							customer_name= '$customer_name',
							customer_contact= '$customer_contact',
							customer_email= '$customer_email',
							customer_address= '$customer_address'";
							
							$res2 = mysqli_query($conn, $sql2);
							
							if($res2==TRUE)
							{
								
								$_SESSION['order'] = "<div class='success'>Items ordered successfully.</div>";
								
								header('location:index.php');

							}
							else
							{
								
								$_SESSION['order'] = "<div class='error'>Failed To  Order items.</div>";
								
								header('location:index.php');

							}
							
						}
				
				?>
				
	        </div>
	    </section>
	    <!--   Section Ends Here -->
	
  
	   <?php include("social-footer.php")  
 ?>
	
