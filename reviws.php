<?php require_once('inc/connections.php'); ?>
<?php 

if (isset($_POST['submit'])) {
    
    $first = $_POST["first"];
    $last = $_POST["last"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $message = $_POST["message"];


     $query1 = "INSERT INTO reviews (FirstName, lastName, Email, MobileNumber, Message) VALUES (?, ?, ?, ?, ?)";
$stmt = $connection->prepare($query1);
$stmt->bind_param("sssss", $first, $last, $email, $number, $message);

if ($stmt->execute()) {
  // Insert successful
  echo '<script>alert("Insert successful")</script>';
  header("Location: feedback.php"); // Redirect to feedback.php
  exit(); // Terminate the current script to prevent further execution
} else {
  // Error in insert query
  echo "Error: " . $stmt->error;
}

$stmt->close();




  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kosmo.lk</title>
    <link rel="stylesheet" href="Styles/home.css">
    <link rel="stylesheet" href="Styles/reviws.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
  
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

  
  <div class="rivus">
    <div class="title">
      <h2>Reviews Page</h2>    
    </div>
    <br>
    <div class="boxx">
      <div class="riv_form">
        <h3><b>Send a Review...<b></h3>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <div class="formbox">
            <div class="row50">
              <div class="inputBox">
                <span>First Name</span>
                <input type="text" name="first" placeholder="First Name" required>
              </div>
              <div class="inputBox">
                <span>Last Name</span>
                <input type="text" name="last" placeholder="Last Name" required>
              </div>
            </div>
            <div class="row50">
              <div class="inputBox">
                <span>Email</span>
                <input type="text" name="email" placeholder="example@email.com" required>
              </div>
              <div class="inputBox">
                <span>Mobile</span>
                <input type="text" name="number" placeholder="+947xxxxxxxx" required>
              </div>
            </div>
            <div class="row50">
              <div class="inputBox">
                <span>Message</span>
                <textarea placeholder="Write your message here..." name="message" required></textarea>
              </div>
            </div>
            <div class="row50">
              <div class="inputBox">
                <input type="submit" value="Send" name="submit">
              </div>
            </div>
          </div>
        </form>
      </div>
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

</body>
</html>

