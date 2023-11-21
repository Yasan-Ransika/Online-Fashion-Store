<?php
session_start();
error_reporting(0);
include('includes/config.php');
$cid=intval($_GET['cid']);
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
				echo "<script>alert('Product has been added to the cart')</script>";
		echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
		}else{
			$message="Product ID is invalid";
		}
	}
	
}
// COde for Wishlist
if (isset($_GET['pid']) && $_GET['action'] == "wishlist") {
    mysqli_query($con, "insert into wishlist(userId, productId) values('guest', '" . $_GET['pid'] . "')");
    echo "<script>alert('Product added to wishlist');</script>";
    header('location: my-wishlist.php');
    exit; // Add this line to prevent further code execution
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

	    <title>Product Category</title>


      <link rel="stylesheet" href="Styles/home.css">
    <script defer src="js/home.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css">
	

	</head>
  <script src="home.js"></script>
  <section id="header">
    <a href="#"><img src="img/Kosmo!_logo_2020.png" class="logo"> </a>

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
	
<header class="header-style-1">

	<!-- ============================================== NAVBAR ============================================== -->
<?php include('includes/menu-bar.php');?>
<!-- ============================================== NAVBAR : END ============================================== -->

</header>


			<div class='col-md-9'>
					<!-- ========================================== SECTION – HERO ========================================= -->



				
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane active " id="grid-container">
							<div class="category-product  inner-top-vs">
								<div class="row">									
			<?php
$ret=mysqli_query($con,"select * from products where category='$cid'");
$num=mysqli_num_rows($ret);
if($num>0)
{
while ($row=mysqli_fetch_array($ret)) 
{?>							
		<div   style="margin-left: 70px;display:grid;"class="col-sm-6 col-md-3 wow fadeInUp">
			<div class="products">				
	<div class="product">		
		<div class="product-image">
		<div class="image">
    <?php
    $imagePath = "admin/productimages/" . htmlentities($row['id']) . "/" . htmlentities($row['productImage1']);
    if (file_exists($imagePath)) {
        ?>
        <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
            <img src="<?php echo $imagePath; ?>" alt="" width="200" height="300">
        </a>
        <?php
    } else {
        echo "Image not found";
    }
    ?>
</div><!-- /.image -->
		                      		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['productName']);?></a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					Rs. <?php echo htmlentities($row['productPrice']);?>			</span>
										     <span class="price-before-discount">Rs. <?php echo htmlentities($row['productPriceBeforeDiscount']);?></span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						<li class="add-cart-button btn-group">
						
								<?php if($row['productAvailability']=='In Stock'){?>
										<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
								<i class="fa fa-shopping-cart"></i>													
							</button>
							<a href="category.php?page=product&action=add&id=<?php echo $row['id']; ?>">
							<button class="btn btn-primary" type="button">Add to cart</button></a>
								<?php } else {?>
							<div class="action" style="color:red">Out of Stock</div>
					<?php } ?>
													
						</li>
	                   
		                <li class="lnk wishlist">
							<a class="" href="category.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist"  title="Wishlist">
								 <i class="icon fa fa-heart"></i>
							</a>
						</li>

						
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div>
			</div>
		</div>
	  <?php } } else {?>
		</div>
		
<?php } ?>	
										</div><!-- /.row -->
							</div><!-- /.category-product -->
						
						</div><!-- /.tab-pane -->
						
				

				</div><!-- /.search-result-container -->

			</div><!-- /.col -->
		</div></div>
		
</div>
</div>

  <section>
    <div class="container">
        <div class="box">
          <img src="img/b2.jpg"  style="width: 100%; height: 100%; margin: auto;"> 
          <div class="card-body">
            <p class="card-text"><a href="" style="color: white;">WOMEN</a></p>
          </div>
        </div>
        <div class="box">
        <img src="img/b3.jpg"  style="width: 100%; height: 100%; margin: auto;"> 
        <div class="card-body">
          <p class="card-text"><a href="" style="color: white;">MEN</a></p>
        </div>
        </div>
        <div class="box">
        <img src="img/b5.jpg" style="width: 100%; height: 100%; margin: auto;">
        <div class="card-body">
          <p class="card-text">CHILDREN</p>
        </div>
        </div>

        <div class="box" >
        <img src="img/b1.jpg" style="width: 100%; height: 100%; margin: auto;" >
        <div class="card-body">
        <p class="card-text">ACCESSORIES</p>
      </div>
  </section>

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
	<!-- For demo purposes – can be removed on production : End -->

	

</body>
</html>