<?php ob_start(); ?>
<?php
    require_once("create_job.php");
    require_once("db_connect.php");

$jobTitle = $jobLocation = $employmentType = $specific = $agreement = $min = $max = $jobDescription = $companyName = $employees = $companyDescription = $contactPerson = $companyLocation = $displayContactPerson = $email = $web = $typeReceive = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $name = test_input($_POST["name"]);
    $jobTitle = test_input($_POST["jobtitle"]);
    $jobLocation = test_input($_POST["joblocation"]);
    $employmentType = test_input($_POST["employmenttype"]);
    if (isset($_POST["salary_type"]) && $_POST["salary_type"] == "Specific") {
        $specific = test_input($_POST["salary_type"]);
    }
    if (isset($_POST["salary_type"]) && $_POST["salary_type"] == "agreement") {
        $agreement = test_input($_POST["salary_type"]);
    }
    $min = test_input($_POST["min"]);
    $max = test_input($_POST["max"]);
    $jobDescription = test_input($_POST["jobdescription"]);
    $companyName = test_input($_POST["companyname"]);
    $employees = test_input($_POST["employees"]);
    $companyDescription = test_input($_POST["companydescription"]);
    $contactPerson = test_input($_POST["contactperson"]);
   // echo '<script>alert(' .  $contactPerson . ')</script>';
    $companyLocation = test_input($_POST["companylocation"]);
    if (isset($_POST["displayContactPerson"])) {
        $displayContactPerson = test_input($_POST["displayContactPerson"]);
    }
    if (isset($_POST["receive_via"]) && $_POST["receive_via"] == "email") {
        $email = test_input($_POST["receive_via"]);
    }
    if (isset($_POST["receive_via"]) && $_POST["receive_via"] == "web") {
        $web = test_input($_POST["receive_via"]);
    }
    $typeReceive = test_input($_POST["typeReceive"]);
    $escapedJobTitle = mysqli_real_escape_string($conn, $jobTitle);
    $escapedJobLocation = mysqli_real_escape_string($conn, $jobLocation);
    $escapedEmploymentType = mysqli_real_escape_string($conn, $employmentType);
    $escapedSpecific = mysqli_real_escape_string($conn, $specific);
    $escapedAgreement = mysqli_real_escape_string($conn, $agreement);
    $escapedJobDescription = mysqli_real_escape_string($conn, $jobDescription);
    $escapedCompanyName = mysqli_real_escape_string($conn, $companyName);
    $escapedEmployees = mysqli_real_escape_string($conn, $employees);
    $escapedCompanyDescription = mysqli_real_escape_string($conn, $companyDescription);
    $escapedContactPerson = mysqli_real_escape_string($conn, $contactPerson);
    $escapedCompanyLocation = mysqli_real_escape_string($conn, $companyLocation);
    $escapedDisplayContactPerson = mysqli_real_escape_string($conn, $displayContactPerson);
    $escapedEmail = mysqli_real_escape_string($conn, $email);
    $escapedWeb = mysqli_real_escape_string($conn, $web);
    $escapedTypeReceive = mysqli_real_escape_string($conn, $typeReceive);
    $sql = "INSERT INTO jobs (jobTitle, jobLocation, employmentType, specifics, agreement, min, max, jobDescription, companyName, employees, companyDescription, contactPerson, companyLocation, displayContactPerson, email, web, typeReceive) VALUES ('$escapedJobTitle', '$escapedJobLocation', '$escapedEmploymentType', '$specific', '$agreement', '$min', '$max', '$escapedJobDescription', '$escapedCompanyName', '$escapedEmployees', '$escapedCompanyDescription', '$escapedContactPerson', '$escapedCompanyLocation', '$escapedDisplayContactPerson', '$escapedEmail', '$escapedWeb', '$escapedTypeReceive')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $selectSql = "SELECT * FROM job WHERE id = LAST_INSERT_ID()"; // Assuming 'id' is your auto-increment primary key column
        $selectResult = mysqli_query($conn, $selectSql);
        $row = mysqli_fetch_assoc($selectResult);
    } else {
        // Error in SQL query
        echo '<script>alert("Error in SQL query")</script>';
    }
}

function test_input($data) {
    // Remove leading and trailing whitespace
    $data = trim($data);
    // Remove backslashes
    $data = stripslashes($data);
    // Convert special characters to HTML entities
    $data = htmlspecialchars($data);
    return $data;
}
?>
<?php ob_end_flush(); ?>