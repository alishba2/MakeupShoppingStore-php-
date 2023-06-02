<?php
// login.php

session_start();

require('dbConnection.php');

$email = $_POST["email"]; // Assuming you added a field for email input in the login form
$password = $_POST["password"]; // Assuming you added a field for password input in the login form
echo $email;
echo $password;
// Retrieve the user record based on the provided email
$sql = "SELECT * FROM `User` WHERE `email` = '$email'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();
    echo $user['password'];
    // Verify the password using password_verify()
    if ($password == $user['password']){
        // Password is correct, set the user as logged in
        $_SESSION['user_id'] = $user['id'];
        
        // Redirect the user to a secure page or display a success message
        header('Location: secure-page.php');
        exit();
    } else {
        // Password is incorrect
        echo "Invalid email or password";
    }
} else {
    // User not found
    echo "user not found";
}
?>
