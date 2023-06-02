<!DOCTYPE html>
<html>

<head>
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
    <title>Insert Page</title>
    <style>
        .note {
            background-color: #f7f7f7;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            text-align: left;
            width: 600px;
            letter-spacing: 1;
            font-family: 'Source Sans Pro', sans-serif;

        margin: 0 auto;
        }
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
    <center>
        <h1 style="  font-family:'Barlow Semi Condensed', sans-serif; letter-spacing:1px">Confirm Order</h1>
       
        <?php
      
        require('dbConnection.php'); // Assuming you have a separate file for database connection
        session_start(); // Start the session

        if (isset($_SESSION['totalPrice'])) {
            $totalPrice = $_SESSION['totalPrice'];
            // You can use the $totalPrice variable here or perform any other actions
        } 
        else{
            $totalPrice = '5000';
        }
        // echo $totalPrice;
        $id = mt_rand(1000, 9999);
        $email = $_POST["email"]; // Use $_POST instead of $_REQUEST for security purposes
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $shipping_address = $_POST["address"];
        $billing_method = $_POST["billing_method"];
        $total_bill = $totalPrice; // Assuming a fixed value for testing purposes
        $password = $_POST["password"];
        $PhoneNumber = $_POST["PhoneNumber"];
        
        
     

        echo '   <div class="note">';
        echo'<p><strong>First Name:</strong> ' . $first_name . '</p>';
        echo'<p><strong>Last Name:</strong> '. $last_name .'</p>';
        echo'<p><strong>Phone Number:</strong> '. $PhoneNumber .'</p>';
        echo'<p><strong>Password:</strong>'. $password .'</p>';
        echo'<p><strong>Shipping Address:</strong>'. $shipping_address .'</p>';
        echo'<p><strong>Billing Method:</strong>'. $billing_method .'</p>';
        echo '<p><strong>Total Bill:</strong> '. $total_bill .'</p>';
        echo '<a href="eye.php"><button style="padding: 10px 20px; background: black; color: white; border: 1px solid; margin-left: 260px;">Continue shopping</button></a>';
        echo '</div>'
        ;


        // Prepare and execute the SQL query
      
   // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `User` (`id`, `email`, `first_name`, `last_name`, `PhoneNumber`, `shipping_address`, `billing_method`, `total_bill`, `password`) 
        VALUES ('$id', '$email', '$first_name', '$last_name', '$PhoneNumber', '$shipping_address', '$billing_method', '$total_bill', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the statement and database connection
        $stmt->close();
        $conn->close();
        ?>
    </center>
</body>

</html>


