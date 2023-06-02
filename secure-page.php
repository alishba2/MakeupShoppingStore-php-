<?php
// secure-page.php

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

require('dbConnection.php'); // Assuming you have a separate file for database connection

$userID = $_SESSION['user_id'];

// Retrieve user details from the database
$sql = "SELECT * FROM `User` WHERE `id` = '$userID'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>

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

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
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
          <li><a href="./login-form.php">LOGIN</a></li>
        </ul>
      </div>
      <div class="navbar-right">
      <ul>
          <li>
            <a href="view-cart.php"
              ><i
                class="fa fa-shopping-cart"
                style="font-size: 30px; color: black"
              ></i
            ></a>
          </li>
        </ul>
      </div>
    </nav>
    <h1>Your Orders</h1>
    <table>
        <tr>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Shipping Address</th>
            <th>Billing Method</th>
            <th>Total Bill</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Display user details
            while ($row = $result->fetch_assoc()) {
                $email = $row['email'];
                $firstName = $row['first_name'];
                $lastName = $row['last_name'];
                $shippingAddress = $row['shipping_address'];
                $billingMethod = $row['billing_method'];
                $totalBill = $row['total_bill'];

                // Display the user details in a table row
                echo "<tr>";
                echo "<td>$email</td>";
                echo "<td>$firstName</td>";
                echo "<td>$lastName</td>";
                echo "<td>$shippingAddress</td>";
                echo "<td>$billingMethod</td>";
                echo "<td>$totalBill</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No user details found.</td></tr>";
        }
        ?>
    </table>
</body>

</html>


