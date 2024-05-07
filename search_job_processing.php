<?php ob_start(); ?>
<?php
    require_once("search_job.php");
    require_once("db_connect.php");

$searchCompany = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchCompany = test_input($_POST["searchCompany"]);
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
header("Location: search_job.php?name=$searchCompany");
?>