
<?php

//include("menu.php");
include("config-admin.php");

//1.get the id of admin to be deleted
 if(isset($_GET['id']))
 {
	$id = $_GET['id'];
 }
  else
  {
	  $id = "id not get in GET method";
  }

//2.create sql querey to delete admin

$sql = "DELETE FROM tbl_admin WHERE id ='$id'";

$res = mysqli_query($conn, $sql);

if($res==TRUE)
{
	//echo "Admin Deleted";
	$_SESSION['delete'] = "Admin Deleted Successfully";
	
	header("location:manage-admin.php");
}
else
{
	//echo "Admin not Deleted";
	$_SESSION['delete'] = "Admin Failed To Deleted Admin ";
	header("location:manage-admin.php");

}

//3.Redirect to managee admin page with massage

?>