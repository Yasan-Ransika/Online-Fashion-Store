<?php require ("dbh.php");
?>
<?php
	//calling from btnSubmit button
	if(isset($_POST["submit"])){
		
		//variable declaration and initialition
		$name =$_POST["name"];
        $email =$_POST["email"];
        $username =$_POST["uid"];
        $pwd =$_POST["pwd"];
        $pwdRepeat = $_POST["pwdrepeat"] ;
		$LogInAs = $_POST["accType"];
		//selection

		$sql = "INSERT INTO users(Name, usersEmail, usersUid, usersPwd, UserType) VALUES ('$name','$email','$username','$pwd','$LogInAs')";
		
		//run query and validation
		if ($conn->query($sql)){
			echo '<script>alert("insert succeful")</script>';	//alert
		}
		else {
			echo "error: ". $conn->error;
		}
	}
		
	echo "<script>window.location.replace('../login.html')</script>";  //go back to sign in page 
?>

