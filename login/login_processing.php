<?php

include '../assets/utils/config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM users WHERE user_name = '$username'";
    $result = $conn->query($sql);


    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if ($password == $row["user_password"]) {
            // Login successful
            session_start();
            $_SESSION["username"] = $username;

            //Set cookie
            $cookie_name = "username";
            $cookie_value = $username;
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            if (!isset($_COOKIE[$cookie_name])) {
                echo "<script>alert('The cookie is not set');</script>";
            } else {
                echo "<script>alert('The cookie is set');</script>";
            }

            // Redirect to appropriate dashboard
            // if($role == 'admin'){
            //     echo "<script>alert('Login successfully'); window.location.href = './index.php?page=dashboard';</script>";
            // }
            // else{
            //     echo "<script>alert('Login successfully'); window.location.href = './index.php?page=home';</script>";
            // }

            echo "<script>alert('Login successfully'); window.location.href = '../index.php?page=home';</script>";

            exit(); 
        } else {
            // Login failed
            echo "<script>alert('Invalid username or password. Please try again.'); window.location.href = './index.php?page=login';</script>";

            exit();
        }
    } else {
        // User not found
        // Redirect back to login form
        echo "<script>alert('User not found. Please register first.'); window.location.href = './index.php?page=register';</script>";

        exit();
    }
    $conn->close();
}
?>