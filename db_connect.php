<?php
// Database connection parameters
$servername = "localhost";
$username = 'root';
$password = '';
$database = "job_database";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql_create = "CREATE DATABASE IF NOT EXISTS $database";

// Select database
$conn->select_db($database);

$sql = "CREATE TABLE IF NOT EXISTS jobs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jobTitle VARCHAR(255),
    jobLocation TEXT,
    employmentType VARCHAR(255),
    specifics VARCHAR(255),
    agreement VARCHAR(255),
    min INT,
    max INT,
    jobDescription TEXT,
    companyName VARCHAR(255),
    employees VARCHAR(255),
    companyDescription TEXT,
    contactPerson VARCHAR(255),
    companyLocation TEXT,
    displayContactPerson VARCHAR(255),
    email VARCHAR(255),
    web VARCHAR(255),
    typeReceive VARCHAR(255)
)";
$result = mysqli_query($conn, $sql);
?>