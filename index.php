<?php session_start(); ?>
<?php require_once('inc/connections.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php

	//check for  form submission 
	if (isset($_POST['submit']))
	{
		$errors = array();

		// check if the usernamae and password has been entered
		if ( !isset($_POST['Email']) || strlen(trim($_POST['Email'])) < 1 )
		{
			$errors[] = 'Username is Missing / Invalid';
		}

		if ( !isset($_POST['Password']) || strlen(trim($_POST['Password'])) < 1 )
		{
			$errors[] = 'Password is Missing / Invalid';
		}

		//check if there is no errors in form 
		if (empty($errors))
		{
			// Save username and password into variables
			$email_set = mysqli_real_escape_string($connection, $_POST['Email']);
			$password_set  = mysqli_real_escape_string($connection, $_POST['Password']);
		

			// Prepare database query
			$query = "SELECT * FROM user
						WHERE Email = '{$email_set}'
						AND Password = '{$password_set}'
						LIMIT 1 ";

			$result_set = mysqli_query($connection, $query);

			verify_query($result_set);
			
				//Query succesful

				if (mysqli_num_rows($result_set) == 1)
				{
					// Valid user found 
					$user = mysqli_fetch_assoc($result_set);
					$_SESSION['user_id'] = $user['id'];
					$_SESSION['first_name'] = $user['first_name'];

					//updating last loggings
					$query = "UPDATE user SET last_login = NOW() " ;
					$query .= "WHERE id = {$_SESSION['user_id']} LIMIT 1";

					$result_set = mysqli_query($connection, $query);

					verify_query($result_set);

					// redeirect to users.php

					header('Location: users.php');
				}

				else
				{
					// Use name and password invalid 
					$errors[] = 'Invalid username / Password ';

				}	
		}
		
		
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Log In - User Management System</title>
	<link rel="stylesheet" href="style/login.css">
	<link rel="stylesheet" href="style/main.css">

	
</head>
<body>
		<div class="logo">
			<img src="img/logo.png" alt="Logo">
		</div>
		<center>
		<h1>Welcome Back </h1>
		<p >Loging to the Administation Pannel.</p>
		</center>
	<div class="login">

		<form action="index.php" method="post">
			
			<fieldset>
				
				<legend><h1>Log-In</h1></legend>

				 <?php  
				 	 if (isset($errors) && !empty($errors))
				 	 {
				 	 	echo '<div class="error">Invalid Username / Password</div>';
				 	 }
				 ?>

				 <?php 

				 	// in users page we pass the data of logout = yes throguh link and its $_GET method
				 	// so we using $_GET function to display logut msg when he logout !!

				 	if (isset($_GET['logout'])) 
				 	{
				 		echo '<div class="info"> Succuesfully Logged out! </div>';
				 	}

				  ?>
 
				<div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="Email" placeholder="Email Address">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" id="password" name="Password" placeholder="Password">
    </div>
    <div class="form-group">
      <button type="submit" name="submit">Log In</button>
    </div>
  </fieldset>
		</form>

	</div><!-- login -->
	<?php include('footer.php'); ?> 
</body>
</html>
<?php mysqli_close($connection); ?>