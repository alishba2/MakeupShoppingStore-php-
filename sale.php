<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./eye.css">
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
  </style>

  
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
    <?php
// Start the session
session_start();

require_once("dbConnection.php");

// Initialize variables for filters
$filterBy = '';
$searchQuery = '';

// Check if the filter parameter is provided
if (isset($_GET['filter'])) {
    $filterBy = $_GET['filter'];
}

// Check if the search parameter is provided
if (isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
}

// SQL query
$sql = "SELECT * FROM `Product` WHERE onSale=1";


// Apply sorting filter
if ($filterBy == 'lowest_price') {
    $sql .= " ORDER BY price ASC";
} elseif ($filterBy == 'highest_price') {
    $sql .= " ORDER BY price DESC";
}

// Apply search filter
if (!empty($searchQuery)) {
    $sql .= " AND name LIKE '%$searchQuery%'";
}

// Execute query
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // Output filter dropdown and search form
    echo '<div style="display:flex; justify-content:space-between; padding:30px" class="filter-search-container">';
    echo '<form action="sale.php" method="get">';
    echo '<label for="filter">Sort by: </label>';
    echo '<select name="filter" id="filter" onchange="this.form.submit()">';
    echo '<option value="">Select</option>';
    echo '<option value="lowest_price" ' . ($filterBy == 'lowest_price' ? 'selected' : '') . '>Lowest Price</option>';
    echo '<option value="highest_price" ' . ($filterBy == 'highest_price' ? 'selected' : '') . '>Highest Price</option>';
    echo '</select>';
    echo '</form>';
    echo '<form action="sale.php" method="get">';
    echo ' <i class="fa fa-search" style="font-size: 20px"></i><input style=" border: none;
    border-bottom:  1px solid black;"  type="text" name="search" placeholder="Search by name" value="' . $searchQuery . '">';
    // echo '<button type="submit">Search</button>';
    echo '</form>';
    echo '</div>';


    // Output container for cards
    echo '<div class="card-container">';
    
    // Fetch data and loop through the results
    while ($row = $result->fetch_assoc()) {
        // Access the columns by name
        $id = $row["id"];
        $name = $row["fullname"];
        $image = $row["image"];
        $price = $row["price"];
        $rating = $row["rating"];
        
        // Generate card HTML
        echo '<section class="product">';
        echo '<a href="product-details.php?id=' . $id . '"><img  src="' . $image . '" alt="' . $name . '" height="450" width="340" /></a>';
        echo '<div>';
        echo '<span style="font-size: 16px">'.$rating.'<i class="fa fa-star" aria-hidden="true" style="font-size: 15px; padding-left: 5px"></i></span>';
        echo '<span style="font-size: 16px">' . $name . '</span>';
        // echo '<a href="product-details.php?id=' . $id . '">View Details</a>';

        echo '<div style="display: flex; flex-direction: row; justify-content: space-between;">';
        echo '<span style="font-size: 16px">' . $price . '/-</span>';
        echo '</div>';
        
        echo '<button type="submit" class="cartButton"><a style="text-decoration:none; color:black;" href="cart.php?PID='. $id .'">Add to cart</a></button>';
        
        echo '</div>';
        echo '</section>';
    }
    
    // Close the container
    echo '</div>';
    
} else {
    echo "No products found.";
}

// Close the connection
$conn->close();
?>


    
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


