<?php session_start(); ?>
<?php require_once('inc/connections.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php  
	// checking is a user is logged in 
	if (!isset($_SESSION['user_id']))
	{
		header('Location: index.php');
	}

	$user_list = '';
	$search = '';

	// getting the list of users
	if ( isset($_GET['search']) ) {
		$search = mysqli_real_escape_string($connection, $_GET['search']);
		$query = "SELECT * FROM user WHERE (first_name LIKE '%{$search}%' OR last_name LIKE '%{$search}%' OR email LIKE '%{$search}%') AND is_deleted=0 ORDER BY first_name";					
	} else {
		$query = "SELECT * FROM user WHERE is_deleted=0 ORDER BY first_name";
	}

	$users_get = mysqli_query($connection, $query);

	// calling verify_query function to check wheather the queary is succesful or not 
	// this function contain all if else checks so no need else part also.

	verify_query($users_get);

	// new $user variavle for get the data in $user_get variable through while loop
		while ($user = mysqli_fetch_assoc($users_get))
		{
			$user_list.= "<tr>";
			$user_list.= "<td>{$user['first_name']}</td>";
			$user_list.= "<td>{$user['last_name']}</td>";
			$user_list.= "<td>{$user['last_login']}</td>";
			$user_list.= "<td><a href= \"modify.php?user_id={$user['id']}\">Edit</a></td>";
			$user_list.= "<td><a href= \"delete-user.php?user_id={$user['id']}\">Delete</a></td>"; 
			$user_list.="</tr>";	
		}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Administrators</title>
	<link rel="stylesheet" href="style/main.css">
</head>
<body>

	<header>
			
		<div class="appname"><h2>Admin Management System</h2></div>
	
		<div class="loggedin">Welcome <?php echo $_SESSION['first_name']; ?> ! <a href="logout.php">Log Out</a></div>
	</header>
	

	<div class="sidenav">
 		 <a href="../../IWT/customer.html">View Store</a><br>
		  <a href="users.php">Admins</a><br>
 		 <a href="#contact">Contact</a><br>
	</div>

	<main>
		<br><br>
	<h1>Admins <span><a href="add-admin.php">+ Add New</a> | <a href="users.php">Refresh</a></span></h1>

	<div class="search">
			<form action="users.php" method="get">
				<p>
					<input type="text" name="search" id="" placeholder="Type First Name, Last Name or Email Address and Press Enter" value="<?php echo $search; ?>" required autofocus>
				</p>
			</form>
		</div>

	<table class="masterlist">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Last Login</th>
			<th>Edit</th>
			<th>Delet</th>
		</tr>

		<?php echo $user_list; ?>


	</table>

		
	</main>
	<?php include('footer1.php'); ?>
</body>

</html>