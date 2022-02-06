<?php

//include("menu.php");
include("config-admin.php");


if(isset($_GET['id']) AND isset($_GET['image_name']))
 {
	$id = $_GET['id'];
	$image_name = $_GET['image_name'];
	
	//remove physical image file available
	
	if($image_name != "")
	{
		$path = "C:/wamp64/www/TechStudio82/items-img/".$image_name;
		
		//remove the image 
		$remove = unlink($path);
	}
	
	//if fail to remove image 
	
	if($remove==false)

	{
		$SESSION['remove'] = "<div class='error'>fail to remove image</div>";
		header("location:manage-items.php");
		die();
	}	
	
	
	
	//delete data from database
	
	$sql = "DELETE FROM tbl_items WHERE id='$id'";
	
	$res = mysqli_query($conn, $sql);
	
	If($res==TRUE)
	{
		//SET SUCCESS MSG 
		$_SESSION['delete'] = "<div class='success'>category deleted successfully</div>";
		header("location:manage-items.php");
	}
	else
	{
		$_SESSION['delete'] = "<div class='error'> fail to delete category</div>";
		header("location:manage-items.php");
	}
	
	//redirect to manage category 
	
 }
  else
  {
	  header("location:manage-items.php");
  }
  
  

?>