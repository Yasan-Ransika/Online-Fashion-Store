<?php

?>

<style>
  body {
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
  }

  footer {
    background-color: #222;
    color: #fff;
    padding: 30px 0;
    flex-shrink: 0;
  }

  .container {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .footer-content {
    text-align: center;
  }

  h2 {
    font-size: 24px;
    margin-bottom: 10px;
  }

  p {
    font-size: 16px;
    margin-bottom: 20px;
  }

  .social-icons a {
    color: #fff;
    font-size: 24px;
    margin-right: 10px;
    text-decoration: none;
    transition: color 0.3s ease;
  }

  .social-icons a:hover {
    color: #00bcd4;
  }
</style>

<body>
  <div class="content">
    <!-- Your page content here -->
  </div>

  <footer>
    <div class="container">
      <div class="footer-content">
        <h2>KOSMO</h2>
        <p>Fashion Store</p>
        <div class="social-icons">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
  </footer>
</body>
