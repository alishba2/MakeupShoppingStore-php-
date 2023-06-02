<?php
// Retrieve the email address from the form submission
require("dbConnection");
$email = $_POST['email'];
$id = mt_rand(1000, 9999);


// Insert the email address into the "subscribe" table
$sql = "INSERT INTO `subscribe`(`id`, `email`) VALUES ('$id','$email')";

if ($conn->query($sql) === TRUE) {
    echo "Email subscribed successfully!";
    header('Location: home.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>