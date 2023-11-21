<!DOCTYPE html>
<html>
<head>
  <title>Customer Reviews</title>
  <link rel="stylesheet" href="Styles/feedback.css">
  <link rel="stylesheet" href="Styles/home.css">
</head>
<body>

    <h1><b>Customer Reviews</b></h1>
    <div class="container">
        <div class="review-card">
          <div class="review-header">
            <div class="review-info">
              <h2>John Doe</h2><br>
              <p>Rating: <span class="rating">4.5/5</span></p><br>
            </div>
          </div>
          <div class="review-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse bibendum neque ac lectus fringilla, ac venenatis elit laoreet. Sed nec blandit metus. In non pharetra quam. Ut sollicitudin quam eu aliquam elementum.</p><br><br>
          </div>
        </div>
        <div class="review-card">
          <div class="review-header">
            <div class="review-info">
              <h2>Jane Smith</h2><br>
              <p>Rating: <span class="rating">5/5</span></p><br>
            </div>
          </div>
          <div class="review-content">
            <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse a mi at nunc sollicitudin hendrerit. Nullam pharetra sapien nec elit fermentum commodo.</p><br><br>
          </div>
        </div>
        <div class="review-card">
          <div class="review-header">
            <div class="review-info">
              <h2>Michael Johnson</h2><br>
              <p>Rating: <span class="rating">4/5</span></p><br>
            </div>
          </div>
          <div class="review-content">
            <p>Nullam id sapien nec odio consectetur tristique. Ut feugiat ipsum sed turpis volutpat lacinia. Duis rhoncus mauris nec vulputate suscipit. Morbi facilisis tellus vel felis commodo cursus.</p><br><br>
          </div>
        </div><br>
        <div class="review-card">
            <div class="review-header">
              <div class="review-info">
                <h2>Kyles Mayers</h2><br>
                <p>Rating: <span class="rating">3/5</span></p><br>
              </div>
            </div>
            <div class="review-content">
              <p>Nullam id sapien nec odio consectetur tristique. Ut feugiat ipsum sed turpis volutpat lacinia. Duis rhoncus mauris nec vulputate suscipit. Morbi facilisis tellus vel felis commodo cursus.</p><br><br>
            </div>
          </div><br>
          <div class="review-card">
            <div class="review-header">
              <div class="review-info">
                <h2>Ben stark </h2><br>
                <p>Rating: <span class="rating">2/5</span></p><br>
              </div>
            </div>
            <div class="review-content">
              <p>Nullam id sapien nec odio consectetur tristique. Ut feugiat ipsum sed turpis volutpat lacinia. Duis rhoncus mauris nec vulputate suscipit. Morbi facilisis tellus vel felis commodo cursus.</p><br><br>
            </div>
          </div><br>
      </div>
    </div>

    <?php
require_once('inc/connections.php');

// Retrieve reviews from the database
$query = "SELECT * FROM reviews";
$result = $connection->query($query);

// Check if there are any reviews
if ($result->num_rows > 0) {
  // Loop through each review and display it
  while ($row = $result->fetch_assoc()) {
    $name = $row['FirstName'] . ' ' . $row['lastName'];
    $review = $row['Message'];

    echo '
    <div class="review-card">
      <div class="review-header">
        <div class="review-info">
          <h2>' . $name . '</h2><br>
         
        </div>
      </div>
      <div class="review-content">
        <p>' . $review . '</p><br><br>
      </div>
    </div>';
  }
} else {
  echo 'No reviews found.';
}

$connection->close();
?>

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

    </body>
    </html>
