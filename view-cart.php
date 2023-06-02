
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<?php
session_start();

require('dbConnection.php');

// Retrieve cart data from the session
if (isset($_SESSION["cart"])) {
    $cartItems = $_SESSION["cart"];
    $arrayLength = sizeof($cartItems);

    $placeholdersArray = array(); // Declare an empty array outside the loop

    foreach ($_SESSION["cart"] as $item) {
        $placeholders = $item;
        $placeholdersArray[] = $placeholders; // Add each item to the array
    }
    
    
    $placeholders = implode(',', $placeholdersArray); // Convert array to comma-separated string
    $sql = "SELECT * FROM Product WHERE id IN ($placeholders)";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
      echo '<div style="display: flex;font-size:30px; padding:20px;     margin-top: 50px;   padding-left: 255px;;font-family: Barlow Semi Condensed, sans-serif">';
      echo '<span>SHOPPING BAG</span>';
      



      echo '</div>';
      echo '<table style="width: 100%;padding: 10px 250px;     margin-top: 54px;text-align: center; font-family: Barlow Semi Condensed, sans-serif">';
      echo '<thead>';
      echo '<tr>';
      echo '<th>No#</th>';
      echo '<th>Name</th>';
      echo '<th>Price</th>';
      echo '<th>Quantity</th>';
      echo '<th>Image</th>';
      echo '<th>Action</th>'; // Add a new column for the remove action
      echo '</tr>';
      echo '</thead>';
      echo '<tbody>';
      $count = 1;
      $totalPrice = 0;
  
      while ($row = $result->fetch_assoc()) {
          // Access the columns by name
          $id = $row["id"];
          $name = $row["name"];
          $fullname = $row["fullname"];
          $price = $row["price"];
          $image = $row["image"];
  
          echo '<tr>';
          echo '<td style="height: 70px; border-bottom: 1px solid #ccc;">' . $count . '</td>';
          echo '<td style="height: 70px; text-align:left; border-bottom: 1px solid #ccc;">' . $fullname . '</td>';
  
          // Set the default quantity to 1
          $quantity = 1;
  
          // Calculate the initial price based on quantity
          $initialPrice = $price * $quantity;
  
          echo '<td style="height: 70px; border-bottom: 1px solid #ccc;"><span id="price-' . $id . '">' . $initialPrice . '</span></td>';
          echo '<td style="height: 70px; border-bottom: 1px solid #ccc;">';
          echo '<span id="quantity-' . $id . '">' . $quantity . '</span>';
          echo '<i style="border:1px solid black; margin-left:5px; padding:2px 3px"  class="fa fa-plus" style="font-size:10px" onclick="incrementQuantity(' . $id . ', ' . $price . ')"></i>';
          echo '</td>';
  
          // Display the image
          echo '<td style="height: 70px; border-bottom: 1px solid #ccc;"><img src="' . $image . '" alt="' . $name . '" height="50" width="50" /></td>';
  
          // Add the remove action column
          echo '<td style="height: 70px; border-bottom: 1px solid #ccc;">';
          echo '<i class="fa fa-trash" style="font-size: 20px; color: red; cursor: pointer;" onclick="removeFromCart(' . $id . ')"></i>';
          echo '</td>';
  
          echo '</tr>';
          $count++;
  
          // Calculate the subtotal for the current item based on quantity
          $subtotal = $initialPrice * $quantity;
          $totalPrice += $subtotal;

$totalPrice += $subtotal;
$_SESSION['totalPrice'] = $totalPrice;
      }
  
      // Display the total price
      echo '<tr>';
      echo '<td></td>';
      echo '<td colspan="4" style="text-align: right; font-weight: bold;">Total Price:</td>';
      echo '<td style="font-weight: bold;"><span id="total-price">'.$totalPrice.'/-</span></td>';
      echo '</tr>';

      echo '</tbody>';
      echo '</table>';
  
      // Display the checkout button
      echo '<div style="display: flex; justify-content: space-between;     margin-right: 257px;
      margin-top: 30px;">';
      echo '<button style="padding: 10px 20px; background: black; color: white; border: 1px solid; margin-left: 260px;" onclick="goBack()">Continue shopping</button>';
      echo '<button style="padding: 10px 20px; background: black; color: white; border: 1px solid;" onclick="checkout()">Checkout</button>';
      echo '</div>';
  }
  else{
    echo '<div style="display: flex; justify-content: center; align-items: center; height: 200px; font-size: 24px;">';
    echo 'No items in the cart.';
    echo '</div>';
  }

    
}
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function incrementQuantity(id, price) {
    var quantityElement = $('#quantity-' + id);
    var priceElement = $('#price-' + id);

    var quantity = parseInt(quantityElement.text());
    quantity++;

    quantityElement.text(quantity);

    var totalPrice = price * quantity;
    priceElement.text(totalPrice.toFixed(2));

    updateTotalPrice(); // Call the function to update the total price
  }
 
function goBack() {
  history.back();
}

  function removeFromCart(id) {
  // Send an AJAX request to remove the item from the session cart
  $.post('removeFromCart.php', {id: id})
    .done(function(data) {
      if (data.success) {
        // Refresh the page to update the cart display
        location.reload();
      } else {
        console.log('Error removing item from cart.');
      }
    })
    .fail(function() {
      console.log('AJAX request failed.');
    });
    location.reload();
}


  function updateTotalPrice() {
    var totalPrice = 0;

    $('span[id^="price-"]').each(function() {
      var price = parseFloat($(this).text());
      totalPrice += price;
    });

    $('#total-price').text(totalPrice +'/-');
  }
  
  function checkout() {
    // Redirect to the checkout page
    window.location.href = 'checkout.php';
  }
</script>

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
