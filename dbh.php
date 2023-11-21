<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "iwt_login";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);
	
	// Check connection
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
	else
	{
		//echo "Connected to DB"
		echo '<script>alert("Connected to DB")</script>';
	}
?>