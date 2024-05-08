<?php
include '../assets/utils/config.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function hashPassword($password)
{
    return password_hash($password, PASSWORD_DEFAULT);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $useremail = $_POST['useremail'];
    $userrole = $_POST['userrole'];


    // Check if username already exists
    $sql_check = "SELECT * FROM users WHERE user_name = '$username'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        echo '<script type="text/javascript">alert("Username already exists. Please choose a different username.\n");</script>';
    } else {
        // Insert the user if the username doesn't exist
        $sql_insert = "INSERT INTO users (user_name, user_password, user_email, user_role) VALUES ('$username', '$password','$useremail', '$userrole')";
        if ($conn->query($sql_insert) === TRUE) {
            echo '<script type="text/javascript">alert("User created successfully\n");</script>';
            echo '<script type="text/javascript">window.location.href = "../index.php?page=login";</script>';
        } else {
            echo '<script type="text/javascript">alert("Error: " . $sql_insert . "<br>" . $conn->error);</script>';
        }
    }

    $conn->close();
}
?>