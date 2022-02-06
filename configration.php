<?php
	$conn = new mysqli("localhost","root","","testdb");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
?>
