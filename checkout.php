
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>GFG- Store Data</title>
      <link rel="stylesheet" href="./home.css">
    <link
      rel="stylesheet"
      href="path/to/font-awesome/css/font-awesome.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Dancing+Script"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@600&family=Barlow:wght@100&family=Delicious+Handrawn&family=Fjalla+One&family=Heebo:wght@100;200&family=Montserrat:ital@1&family=Mukta:wght@200&family=Nunito+Sans:wght@300&family=Open+Sans:ital,wght@0,400;0,600;1,400&family=Passion+One&family=Pathway+Extreme:wght@200&family=Playfair+Display&family=Titillium+Web:ital,wght@1,200&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
</head>

<body>
  
    <nav class="navbar" style="border-bottom:1px solid black">
      <div class="navbar-left">
        <form action="home.php" method="GET">
     
        </form>
      </div>
      <div class="navbar-center">
        <ul class="menu">
        <li><a href="./home.php">HOME</a></li>
          <li><a href="./face.php">FACE</a></li>
          <li><a href="./eye.php">EYES</a></li>
          <li><a href="./lip.php">LIPS</a></li>
          <li><a href="./sale.php">SALE</a></li>
          <li><a href="./blog.php">BLOG</a></li>
        </ul>
      </div>
      <div class="navbar-right">
      <span style="padding-right: 20px">
          <i
            class="fa fa-shopping-cart"
            style="font-size: 30px; color: black"
          ></i>
        </span>

        <span>
        <div class="dropdown">
    <a href="#" class="dropdown-toggle" id="user-dropdown">
        <i class="fa fa-user" style="font-size: 30px; color: black"></i>
    </a>
    <div class="dropdown-content">
        <?php
        session_start();

        if (isset($_SESSION['user_id'])) {
            // User is logged in, display logout button
            echo '<a href="logout.php" style="color:black">Logout</a>';
        } else {
            // User is not logged in, display login button
            echo '<a href="login-form.php"  style="color:black">Login</a>';
        }
        ?>
    </div>
        </span>
      </div>
    </nav>
   <style>
  
      .dropdown {
        position: relative;
        display: inline-block;
    }
    
    .dropdown-content {
        display: none;
        position: absolute;
        /* min-width: 160px; */
        padding: 8px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        z-index: 1;
    }
    
    .dropdown:hover .dropdown-content {
        display: block;
    }
 
    form {
        width: 300px;
        margin: 0 auto;
    }
    label {
        display: block;
        margin-bottom: 10px;
    }
    input[type="text"],
    input[type="email"],
    textarea {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
    }
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
<div style="border: 1px solid #ccc; padding: 20px; width: 400px; margin: 0 auto; margin-top:30px">
    <h1 style="text-align: center;">Shipping Details</h1>
    <form action="confirmOrder.php" method="post">
        <div style="margin-bottom: 10px;">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" style="border: 1px solid #ccc; padding: 5px; width: 100%;" required>
        </div>
        <div style="margin-bottom: 10px;">
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" style="border: 1px solid #ccc; padding: 5px; width: 100%;" required>
        </div>
        <div style="margin-bottom: 10px;">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" style="border: 1px solid #ccc; padding: 5px; width: 100%;" required>
        </div>
        <div style="margin-bottom: 10px;">
            <label for="PhoneNumber">phone number:</label>
            <input type="PhoneNumber" name="PhoneNumber" id="PhoneNumber" style="border: 1px solid #ccc; padding: 5px; width: 100%;" required>
        </div>
        <div style="margin-bottom: 10px;">
            <label for="password">password:</label>
            <input type="password" name="password" id="password" style="border: 1px solid #ccc; padding: 5px; width: 100%;" required>
        </div>
        <div style="margin-bottom: 10px;">
            <label for="address">Address:</label>
            <textarea name="address" id="address" style="border: 1px solid #ccc; padding: 5px; width: 100%;" required></textarea>
        </div>
        <div style="margin-bottom: 10px;">
    <label for="billing_method">Billing Method:</label>
    <select name="billing_method" id="billing_method" style="border: 1px solid #ccc; padding: 5px; width: 100%;" required>
        <option value="">Select a billing method</option>
        <option value="COD">Cash on Delivery (COD)</option>
    </select>
</div>

        <div style="text-align: center;">
            <input type="submit" value="Submit" style="padding: 10px 20px; background: black; color: white; border: none; cursor: pointer;">
        </div>
    </form>
</div>



   </body>
   <footer style="margin-top:6em" class="footer">
    <div style="column-gap:50px" class="footer-content">
      <div class="footer-section">
        <h4>About Us</h4>
        <p>With a focus on innovation and research, we strive to develop products that not only deliver exceptional results but also prioritize the well-being of our customers. We are committed to using ethically sourced ingredients and sustainable practices, ensuring that our products are not only good for you but also for the environment.</p>
      </div>
      <div class="footer-section">
        <h4>Contact</h4>
        <p>Email: BlosoomB@gmail.com</p>
        <p>Phone: +1 123 456789</p>
      </div>
      <div class="footer-section">
        <h4>Categories</h4>
        <ul class="social-links">
        <li>
            <a href="#">Home</a>
          </li>
          <li>
            <a href="#">Face</a>
          </li>
          <li>
            <a href="#">Lips</a>
          </li>
          <li>
            <a href="#">Eye</a>
          </li>
          <li>
            <a href="#">Sale</a>
          </li>
        </ul>
      </div>
    </div>
    <hr style="margin-top:3em;height: 10px; color: black" />
    <div class="footer-bottom">
      <p>&copy; 2023 Your Website. All rights reserved.</p>
    </div>
  </footer>
</html>
  





