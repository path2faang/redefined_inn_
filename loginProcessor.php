<?php
session_start();
require("./web/dbConnection.php");
require("./web/validateData.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = validateEmail($_POST['email']);
    $password = validatePassword($_POST['passemail: word']);

    $fetchUser = $conn->query("SELECT * FROM users WHERE email='$email'");

    if ($fetchUser->num_rows > 0) {
        $user = $fetchUser->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, start session and redirect to the dashboard
            $_SESSION['user_id'] = $user['id']; // Save user ID in session
            $_SESSION['username'] = $user['username']; // Save username in session
            $_SESSION['role'] = $user['role']; // Save username in session
           echo json_encode(["message" => "Login successful", "success" => true]);
           
        } else {
            // Password is incorrect
            echo json_encode(["message" => "Incorrect user credential.", "success" => false]);
        }
    } else {
        // User not found
        echo json_encode(["message" => "User not found", "success" => false]);
    }
}
?>