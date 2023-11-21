<?php require ("dbh.php");
?>

<?php
		//calling from Ysubmit button
		if(isset($_POST["Ysubmit"])){
			
		//varible declartion and initializing

		$Yname = $_POST["Yname"];
		$Yemail = $_POST["Yemail"];
		$Ymobile = $_POST["Ynumber"];
		$Yrequest_type = $_POST["Yrequest_type"];
		
		
		//creating the query
		$sql = "INSERT INTO support_center (Name,MobileNumber, Email, RequsetType) 
				VALUES ( '$Yname', '$Ymobile','$Yemail', '$Yrequest_type')";
		
		//run query and validation		
		if ($conn->query($sql)){
			echo '<script>alert("insert succeful")</script>';
			}
		else {
			echo "error: ". $conn->error;
			}
		}
	
	//close the connection
	$conn->close();
		
?>