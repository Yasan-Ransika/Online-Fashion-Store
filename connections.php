<?php 

	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'iwt_login';

	$connection = mysqli_connect('localhost','root','','iwt_login');

	//checling the connection 
	if (mysqli_connect_errno()){
		die('Database connection fail'. mysqli_connect_error());
	}else {
		//echo "Connection Succesfull";
	}


?>