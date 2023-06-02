<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>

    <!-- Stylesheet -->

    <link rel="stylesheet" href="./home.css" />

    <!-- Fonts -->
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
    <link
      rel="stylesheet"
      href="path/to/font-awesome/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>
    <!-- top bar -->
   
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
    .section {
            height: 700px;
            width: 100%;
            margin-top: 6em;
            
        }

        .div-container {
            display: flex;
        }

        .div-container > div {
            flex: 1;
            text-align: center;
          
        }

        .div-container > div img {
            max-width: 100%;
            height: auto;
        }
        .saleTxt{
         background: #fff1f0;
          padding: 6em 4em;
        }
        .saleTxt h3{
          padding-top:1em;
    font-family:'Barlow Semi Condensed', sans-serif;
    letter-spacing:2px;
  
  }
  .saleTxt h1{
    font-family:'Barlow Semi Condensed', sans-serif;
    letter-spacing:2px;
  }
  .saleTxt p{
    font-family:'Barlow Semi Condensed', sans-serif;
    letter-spacing:2px;
  }
  .saleTxt a button{
    background: black;
    color:white;
    border: 1px solid black;
    padding: 10px 30px;
    margin-top: 3em;
  }
</style>

    <div class="top-bar">
      <span class="top-bar-text"
        >Free Shipping Over $50 + 3 Free Samples With Every Order</span
      >
    </div>
    <div class="topbar">
      <span class="topbar-text">Blossom Beauty</span>
    </div>

    <!-- navbar -->



    <nav class="navbar">
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
        </ul>
      </div>
      <div class="navbar-right">
        <span style="padding-right: 20px">
        <a href="view-cart.php"
              ><i
                class="fa fa-shopping-cart"
                style="font-size: 30px; color: black"
              ></i
            ></a>
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
    <div class="PosterImg">
      <div class="text-overlay">
        <h3>DISCOVER YOUR NEW ADDICTION</h3>
        <h1>Devoted to true beauty</h1>
        <!-- <p>Inspired by natural and true femininity, we designed makeup for all skin types.</p> -->
      </div>
    </div>

    <!-- portion for categories-->

    

    
  
        <?php
// Start the session
session_start();


require_once("dbConnection.php");

// SQL query
$sql = "SELECT * FROM `Product` WHERE rating>4.5";

// Execute query
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // Output container for cards
    echo '<section class="latestCollection">';
    echo'<span>BLOSSOM BEAURYS MOST WANTED</span>';
    echo '<p>CHECK OUT OUR BESTSELLERS + LATEST DROPS</p>';
    echo '<div>';
    
    // Fetch data and loop through the results
    while ($row = $result->fetch_assoc()) {
        // Access the columns by name
        $id = $row["id"];
        $productName = $row["fullname"];
        $imageUrl = $row["image"];
        $price = $row["price"];
        $rating = $row["rating"];
        
        // Generate card HTML
        echo '<section class="product">';
        echo '<img src="' . $imageUrl . '" alt="' . $productName . '" height="450" width="340" />';
        echo '<div>';
        echo '<span style="font-size: 16px">'.$rating.'<i class="fa fa-star" aria-hidden="true" style="font-size: 15px; padding-left: 5px"></i></span>';
        echo '<span style="font-size: 16px">' . $productName . '</span>';
        echo '<div style="display: flex; flex-direction: row; justify-content: space-between;">';
        echo '<span style="font-size: 16px">' . $price . '/-</span>';
        echo '</div>';
        echo '<button type="submit" class="cartButton"><a style="text-decoration:none; color:black;" href="cart.php?PID='. $id .'">Add to cart</a></button>';
        echo '</div>';
        echo '</section>';
    }
    
    // Close the container
    echo '</div>';
    echo '    </section>';
    
} else {
    echo "No products found.";
}


// Close the connection
$conn->close();
?>

<div class="section">
        <div class="div-container">
            <div>
                <img src="https://cdn.shopify.com/s/files/1/0341/3458/9485/files/FB442500-FS_FB_MDW-UP_TO_50_OFF_SELECT_SKUS_052423-053023_HPBanner_Slider_FB-01_900x.jpg?v=1684364939" alt="First Image">
            </div>
             <div class="saleTxt">
        <h3>THE SUMMER WARM UP</h3>
        <h1>HOT DEAL TO KICK OFF THE SZN</h1>
        <p>UPTO 50% OFF SELECT ITEMS</p>
        <p>ENDS 5/30</p>
        <a href="sale.php"> <button>SHOP THE SALE</button></a>
        <!-- <p>Inspired by natural and true femininity, we designed makeup for all skin types.</p> -->
      </div>
            <div>
                <img src="https://cdn.shopify.com/s/files/1/0341/3458/9485/files/FB442500-FS_FB_MDW-UP_TO_50_OFF_SELECT_SKUS_052423-053023_HPBanner_Slider_FB-03_900x.jpg?v=1684364947" alt="Third Image">
            </div>
        </div>
    </div>

    <!-- ON Sale -->

    <!-- newsle3tter -->
    <div style="display:flex; flex-direction:column; justify-content: center; align-items: center; background-color: black; color:white; height: 400px;" class="newsletter">
  <h2>DOWN FOR MORE, WE GOT YOU</h2>
  <p>All the latest product drops, limited offers, in-store event info–straight to your inbox.</p>
 
  <input
    type="email"
    name="email"
    placeholder="Enter your email address"
    required
    style="width: 40%; padding: 10px; margin-bottom: 10px; border: none; border-bottom: 1px solid white; background-color: black; color: white;"
  />
  
  <button type="submit" style=" margin-top:2em;background-color: white; color: black; padding: 10px; border: none; cursor: pointer; width: 20%;">Subscribe</button>
</div>


    <!-- footer -->
  </body>
  <footer style="margin-top:12em" class="footer">
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
