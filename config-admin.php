
<?php
    //start the session
	
	session_start();

    //create contants to store non expeating values.
	
	define('SETURL', 'index.php');
	//define('LOCALHOST','localhost');
	//define('DB_USERNAME', 'root');
	//define('DB_PASSWORD', '');
	//define('DB_NAME', 'mydb');
		
        $conn = mysqli_connect('localhost','root','') or die(mysqli_error());
        $db_select = mysqli_select_db($conn,'mydb') or die(mysqli_error());		
		
		?>