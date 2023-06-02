<?php
session_start();

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Retrieve cart data from the session
    if (isset($_SESSION["cart"])) {
        $cartItems = $_SESSION["cart"];

        // Find the index of the item to remove
        $index = array_search($id, $cartItems);

        if ($index !== false) {
            // Remove the item from the cart array
            unset($cartItems[$index]);

            // Reindex the array to maintain consecutive keys
            $cartItems = array_values($cartItems);

            // Update the cart in the session
            $_SESSION["cart"] = $cartItems;

            // Return success response
            $response = array('success' => true);
            echo json_encode($response);
            exit();
        }
    }
}

// Return error response if the item couldn't be removed
$response = array('success' => false);
echo json_encode($response);
exit();
?>
<script>
    // Inside the success block of the AJAX request in your previous HTML file
.success(function(response) {
    if (response.success) {
        // Refresh the page
        location.reload();
    } else {
        // Handle error case
        console.log('Error removing item from cart.');
    }
})

</script>