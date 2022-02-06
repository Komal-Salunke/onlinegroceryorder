<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "techstudio82";

$connn = mysqli_connect($servername,$username,$password,$db_name);

if(!$connn)
{
   die("techstudio82 connection failed:" .mysqli_connect_error());
}
 echo "techstudio82!! You have connected Successfully";
?>