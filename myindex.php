<!DOCTYPE html>
<html>
<head>
	 <meta charset='utf-8'>
     <meta http-equiv='X-UA-Compatible' content='IE=edge'>
     <meta name='viewport' content='width=device-width, initial-scale=1'>
	 <title>Grocery Website-Homepage</title>
	 <link rel="stylesheet" type="text/css" href="stylesheet.css">

</head>
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
					<a href="#">Contact</a>
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
	<section class="Grocery-Search text-center">
		<div class="container">
		<form action="">
			<input type="Search" name="Search" placeholder="Search For Grocery....">
			<input type="submit" name="submit" value="Search" class="btn btn-primary">
		</form>
	
		</div>
	</section>
	<section class="Categories">
		<div class="container cont">
		<h2 class="text-center">Explore Groceries</h2>
		
		<a href="#">
		<div class="box-3 float-container" >
			<img src="myf.jpg" alt="Fruits"  class="img-re img-curve">
            <h3 class="float-text text-white">Fruits</h3>
		</div>
		</a>
		
		<a href="#">
		<div class="box-3 float-container">
			<img src="veg.jfif" alt="Tomato"  class="img-re img-curve">
            <h3 class="float-text text-white">Vegtables</h3>	
			</div>
		</a>
		
		<a href="#">	
		<div class="box-3 float-container">
			<img src="gg.jfif" alt="Tomato"  class="img-re img-curve">
            <h3 class="float-text text-white">Food-grains</h3>
		</div>
		</a>
		
		<div class="clear"></div>
		</div>
	</section>
	<section class="Grocery-item">
		<div class="container contain">
		<h2 class="text-center">Grocery Items</h2>
		
		
		
		<div class="Grocery-items">
		<div class="Grocery-items-img">
		    <img src="ca.jfif" alt="Tomato"  class=" img-curve Grocery-item-img">
		</div>
			<div>
		    <h4> Fresho Carrot - Orange</h4>
			<p class="Grocery-price">200 g - Rs 17</p>
			<p class="Grocery-detail">
			
                A popular sweet-tasting root vegetable, Carrots are narrow and aromatic taste.
			</p>
			<br>
			<a href="#" class="btn btn-primary">Order Now</a>
		</div>
		<div class="clearfix"></div>
		</div>
		<div class="Grocery-items">
			
			<div class="Grocery-items-img">
		    <img src="oilimg.jfif" alt="Tomato"  class=" img-curve Grocery-item-img">
		</div>
			<div>
		    <h4> Tata Sampann Toor Dal/Togari Bele</h4>
			<p class="Grocery-price">Rs 140</p>
			<p class="Grocery-detail">
			  Dals or lentils are a staple in Indian cooking. 
			</p>
			<br>
			<a href="#" class="btn btn-primary">Order Now</a>
		</div>
		<div class="clearfix"></div>
		</div>
		<div class="Grocery-items">
			
			<div class="Grocery-items-img">
		    <img src="organge.jfif" alt="Tomato"  class=" img-curve Grocery-item-img">
		</div>
			<div>
		    <h4> Fresho Orange - Kinnow</h4>
			<p class="Grocery-price">1 kg - Rs 57.50</p>
			<p class="Grocery-detail">
			  Lovely, bright, reddish, glossy and smooth skinned oranges. 
			</p>
			<br>
			<a href="#" class="btn btn-primary">Order Now</a>
		</div>
		<div class="clearfix"></div>
		</div>
		<div class="Grocery-items">
			
			<div class="Grocery-items-img">
		    <img src="apple.jpg" alt="Tomato"  class=" img-curve Grocery-item-img">
		</div>
			<div>
		    <h4> Fresho Baby Apple Shimla</h4>
			<p class="Grocery-price">1 kg - Rs 169</p>
			<p class="Grocery-detail">
			 Baby Apples are the mini blush red apples.
			</p>
			<br>
			<a href="#" class="btn btn-primary">Order Now</a>
		</div>
		<div class="clearfix"></div>
		</div>
		
		<div class="Grocery-items">
			
			<div class="Grocery-items-img">
		    <img src="oil.jfif" alt="Tomato"  class=" img-curve Grocery-item-img">
		</div>
			<div>
		    <h4> Saffola Gold - Pro Healthy Lifestyle Edible Oil</h4>
			<p class="Grocery-price">Rs 160</p>
			<p class="Grocery-detail">
			  saffola Gold, Pro Healthy Lifestyle Edible Oil. 
			</p>
			<br>
			<a href="#" class="btn btn-primary">Order Now</a>
		</div>
		<div class="clearfix"></div>
		</div>
		
		<div class="Grocery-items">
			
			<div class="Grocery-items-img">
		    <img src="bri.jfif" alt="Tomato"  class=" img-curve Grocery-item-img">
		</div>
			<div>
		    <h4> Fresho Brinjal - Bharta, Organically Grown</h4>
			<p class="Grocery-price">500 g - Rs 23</p>
			<p class="Grocery-detail">
			
               Fresho Organic products are organically grown and handpicked by expert.
               
			</p>
			<br>
			<a href="#" class="btn btn-primary">Order Now</a>
		</div>
		<div class="clearfix"></div>
		</div>
		</div>
		
	<?php include("social-footer.php")  
 ?>
	