<?php
session_start();
error_reporting(0);
include('includes/config.php');
// Code for Product deletion from wishlist	
$wid = intval($_GET['del']);
if (isset($_GET['del'])) {
    $query = mysqli_query($con, "DELETE FROM wishlist WHERE id='$wid'");
}

if (isset($_GET['action']) && $_GET['action'] == "add") {
    $id = intval($_GET['id']);
    $query = mysqli_query($con, "DELETE FROM wishlist WHERE productId='$id'");
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $sql_p = "SELECT * FROM products WHERE id={$id}";
        $query_p = mysqli_query($con, $sql_p);
        if (mysqli_num_rows($query_p) != 0) {
            $row_p = mysqli_fetch_array($query_p);
            $_SESSION['cart'][$row_p['id']] = array("quantity" => 1, "price" => $row_p['productPrice']);
            header('location: my-wishlist.php');
            exit; // Add this line to prevent further code execution
        } else {
            $message = "Product ID is invalid";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>My Wishlist</title>
	    
		<link rel="stylesheet" href="Styles/home.css">
    <script defer src="js/home.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css">
	   
        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
	</head>

  <script src="home.js"></script>
  <section id="header">
  <a href="#"><img src="img/Kosmo!_logo_2020.png" style="width:200px" class="logo"> </a>
  <div>
      <ul id="navbar">
        <li><a class="active" href="customer.html">Home</a></li>
        <li><a href="category.php">Category</a></li>
        <!-- <li><a href="addtocart.html"><i class="fas fa-shopping-cart"></i></a></li> -->
        <li><a href="my-cart.php"><i class="fas fa-shopping-cart"></i></a></li>
        <li><a href="my-wishlist.php"><i class="far fa-bookmark"></i></a></li>
        <li><a href="about.html">About Us</a></li>
        <li><a href="support.html">Support Center</a></li>
        <li><div class="dropdown">
          <button onclick="myFunction()" class="dropbtn">Account</button>
          <div id="myDropdown" class="dropdown-content">
            <a href="login.html">Log Out</a>
            <a href="DeleteAcc.html">Delete Account</a>
          </div>
        </div></li>
        <script>
          /* When the user clicks on the button, 
          toggle between hiding and showing the dropdown content */
          function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
          }
          
          // Close the dropdown if the user clicks outside of it
          window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
              var dropdowns = document.getElementsByClassName("dropdown-content");
              var i;
              for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                  openDropdown.classList.remove('show');
                }
              }
            }
          }
          </script>
        <li><a href = "account.php"><image src="img/user-solid.svg" width="40" height="40"/></a></li>
        <li><a href="Admin -Asal/index.php">Admin</a></li>
        <li><a href="reviws.php">Reviws</a></li>
      </ul>
    </div>
  </section>
  
  <section > 
    <div class="search-box">
      <input class="search-txt" type=""text >
    <a class = "seatch-btn" href="#">
      <i class="fas fa-search"></i>
    </a>
    </div>
  </section>
    <body class="cnt-home">

</header>

<!-- ============================================== TOP MENU : END ============================================== -->

	<!-- ============================================== NAVBAR ============================================== -->

<div class="body-content outer-top-bd">
	<div class="">
		<div class="my-wishlist-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12 my-wishlist">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th colspan="4">my wishlist</th>
				</tr>
			</thead>
			<tbody>
<?php
$ret=mysqli_query($con,"select products.productName as pname,products.productName as proid,products.productImage1 as pimage,products.productPrice as pprice,wishlist.productId as pid,wishlist.id as wid from wishlist join products on products.id=wishlist.productId where wishlist.userId='".$_SESSION['id']."'");
$num=mysqli_num_rows($ret);
	if($num>0)
	{
while ($row=mysqli_fetch_array($ret)) {

?>

				<tr>
					<td class="col-md-2"><img src="admin/productimages/<?php echo htmlentities($row['pid']);?>/<?php echo htmlentities($row['pimage']);?>" alt="<?php echo htmlentities($row['pname']);?>" width="60" height="100"></td>
					<td class="col-md-6">
						<div class="product-name"><a href="product-details.php?pid=<?php echo htmlentities($pd=$row['pid']);?>"><?php echo htmlentities($row['pname']);?></a></div>
<?php $rt=mysqli_query($con,"select * from productreviews where productId='$pd'");
$num=mysqli_num_rows($rt);
{
?>

						<div class="rating">
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star non-rate"></i>
							<span class="review">( <?php echo htmlentities($num);?> Reviews )</span>
						</div>
						<?php } ?>
						<div class="price">Rs. 
							<?php echo htmlentities($row['pprice']);?>.00
							<span>$900.00</span>
						</div>
					</td>
					<td class="col-md-2">
						<a href="my-wishlist.php?page=product&action=add&id=<?php echo $row['pid']; ?>" class="btn-upper btn btn-primary">Add to cart</a>
					</td>
					<td class="col-md-2 close-btn">
						<a href="my-wishlist.php?del=<?php echo htmlentities($row['wid']);?>" onClick="return confirm('Are you sure you want to delete?')" class=""><i class="fa fa-times"></i></a>
					</td>
				</tr>
				<?php } } else{ ?>
				<tr>
					<td style="font-size: 18px; font-weight:bold ">Your Wishlist is Empty</td>

				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
	
</div>
</div>


<footer class="footer-distributed">

			<div class="footer-l">

				<h3>KOSMO<span> logo</span></h3>

				<p class="footer-links">
					<a href="customer.html" class="link-1">Home</a>
				
					<a href="privacy.html">Privacy and policy</a>
				
					<a href="terms.html">Terms and Condition</a>
					
					<a href="Faq.html">Faq</a>
					
					<a href="contact.html">Contact Us</a>
				</p>

				<p class="footer-c-n">Company Name © 2023</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="addres"></i>
					<p><span>444 Kirulapana</span> Colombo, Sri Lanka</p>
				</div>

				<div>
					<i class="phone"></i>
					<p>+</p>94 779020959
				</div>

				<div>
					<i class="email"></i>
					<p><a href="kosmo@company.com">kosmo@company.com</a></p>
				</div>

			</div>

			<div class="footer-r">

				<p class="footer-company-about">
					<span>About the company</span>
					We are a fashion store offering stylish clothing and accessories for all ages. Quality products and personalized service help customers express their unique style.
				</p>

				<div class="footer-icons">

					<a href = "https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwiK5qaCsPf6AhWmcGwGHRfMCpQQFnoECBIQAQ&url=https%3A%2F%2Fwww.instagram.com%2Fcapellau%2F%3Fhl%3Den&usg=AOvVaw3LIQPdrRdi-My3NXlgUxIC"><image src="img/insta.jpeg" width="20" height="20"/><i class="fa fa-instagram"></i></a>
					<a href = "https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwj3iYzQw4P7AhW3SmwGHSJUAz0QFnoECBYQAQ&url=https%3A%2F%2Ftwitter.com%2Fcapellau&usg=AOvVaw1EYA48gsgmCHIb9sdwLNaF"><image src="img/Twiter.jpeg" width="20" height="20"/><i class="fa fa-twitter"></i></a>
					<a href = "https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwiOlrumsPf6AhXUTmwGHbSRBNgQFnoECBAQAQ&url=https%3A%2F%2Fwww.facebook.com%2FCapellaUniversity%2F&usg=AOvVaw3V_WhKWLHszJmygSkbcH16"><image src="img/fb.jpeg" width="20" height="20"/><i class="fa fa-facebook"></i></a>
					<a href = "https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjR5ayAxIP7AhX9R2wGHbSAAJoQFnoECAkQAQ&url=https%3A%2F%2Fwww.youtube.com%2Fchannel%2FUCzICfNoGvU6qRQjl9xwZT7Q&usg=AOvVaw3Q4gOQMIob9DvFBrVNwpIk"><image src="img/youtube.jpeg" width="20" height="20"/><i class="fa fa-youtube"></i></a>

				</div>

			</div>
</footer>

	
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
</body>
</html>
