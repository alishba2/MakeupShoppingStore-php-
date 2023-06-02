<?php
session_start();

// Add
if (isset($_GET["PID"])) {
    $PID = (int)$_GET["PID"];

    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = [];
    }

    if (!in_array($PID, $_SESSION["cart"])) {
        array_push($_SESSION["cart"],$PID);
        // $_SESSION["cart"][] = $PID;
        echo "<br>Product added to Cart successfully<br>";
        echo "No of products in cart " . count($_SESSION["cart"]);

        // Redirect to a different page
        header('Location: view-cart.php');
        exit;
    } else {
        echo "Product already exists in the cart";
    }
}
?>
