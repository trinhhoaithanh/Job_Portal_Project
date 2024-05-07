<?php
    if(isset($_GET['name'])) {
        // Assign the value of the 'name' parameter to $searchForCompany
        $searchForCompany = $_GET['name'];
    } else {
        // If 'name' parameter is not set, set $searchForCompany to null or an empty string
        $searchForCompany = null;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobNest - A best place to start a job</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        footer {
    clear: both;
    position: relative;
    height: 350px;
    margin-top: -150px;
        }
        .search-container {
            display: flex;
            align-items: center;
            width: 300px; /* Adjust width as needed */
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
        }

        /* Style for the search input */
        .search-input {
            flex: 1;
            border: none;
            padding: 10px;
            font-size: 16px;
        }

        /* Style for the search button */
        .search-button {
            background-color: #4CAF50; /* Green background color */
            border: none;
            color: white;
            cursor: pointer;
            padding: 10px 20px; /* Adjust padding as needed */
            transition: background-color 0.3s;
        }
        /* Change background color of the button on hover */
        .search-button:hover {
            background-color: #45a049;
        }
        select {
            margin-right: 50px; /* Add spacing between elements */
            width: 200px;
        }
        
    </style>
</head>

<body>
    <!-- Header -->
    <?php
    session_start();
    if (isset($_SESSION['username'])) {
        include 'assets/utils/nav-bar-signed-in.php';
    } else {
        include 'assets/utils/navbar.php';
    }
    ?>
    <h2>Search Jobs</h2>
    <?php
        require_once 'db_connect.php';
    ?>
    <div style="width: 25%; float:left">
    <form method="post" action="search_job_processing.php">
        <div class="search-container">
        <!-- Search input -->
            <input type="text" name="searchCompany" id="searchCompany" placeholder="Enter company name" class="search-input">
            <!-- Search button with magnifying glass icon -->
                <button type="submit" class="search-button">
                    <!-- Magnifying glass icon (font-awesome used here) -->
                    <i class="fa fa-search"></i>
                </button>
        </div>
    </form>
    </div>
    <div style="width: 75%; float:right">
        <select id="location">
            <option value="location">Location</option>
            <?php
                $sql = "SELECT DISTINCT jobLocation FROM jobs";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['id'] . '">' . $row['jobLocation'] . '</option>';
                }
            ?>
        </select>
        <select id="jobtype">
            <option value="jobtype">Job type</option>
            <?php
                $sql = "SELECT DISTINCT jobTitle FROM jobs";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['id'] . '">' . $row['jobTitle'] . '</option>';
                }
            ?>
        </select>
        <select id="empType">
            <option value="empType">Employment type</option>
            <?php
                $sql = "SELECT DISTINCT employmentType FROM jobs";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['id'] . '">' . $row['employmentType'] . '</option>';
                }
            ?>
        </select>
        <select id="minWage">
            <option value="minWage">Minimum wage</option>
            <?php
                $sql = "SELECT DISTINCT min FROM jobs";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['id'] . '">' . $row['min'] . '</option>';
                }
            ?>
        </select>
    </div><br><br><br>
    <div style="width: 25%; float:left">
        <?php
            function searchCompanies($searchCompany, $conn) {
                // Include database connection
            
                // Query to search for companies
                $sql = "SELECT * FROM jobs WHERE companyName LIKE '%$searchCompany%'";
                $result = mysqli_query($conn, $sql);
            
                // Check if there are any results
                if (mysqli_num_rows($result) > 0) {
                    // Loop through the results and print each company
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="company">';
                        if ($row['companyName'] !== null) {
                            echo '<h3>' . $row['companyName'] . '</h3>';
                        }
                        // You can print other details of the company here
                        if ($row['min'] !== '0' && $row['max'] !== '0') {
                            echo '<h6>Salary: $' . $row['min'] . ' - $' . $row['max'] . '</h6>';
                        }
                        if ($row['jobLocation'] !== null) {
                            echo '<h8>Address: ' . $row['jobLocation'] . '</h8><br>';
                        }
                        if ($row['employees'] !== null) {
                            echo '<h8>Company size: ' . $row['employees'] . '</h8><br>';
                        }
                        if ($row['employmentType'] !== null) {
                            echo '<h8>Employment type: ' . $row['employmentType'] . '</h8><br>';
                        }
                        echo '</div>';
                    }
                } else {
                    echo 'No companies found.';
                }
            }
            searchCompanies($searchForCompany, $conn);
        ?>
    </div>
    <div style="width: 75%; float:right">
        <?php
            $sql = "SELECT * FROM jobs WHERE companyName LIKE '%$searchForCompany%'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                if ($row = mysqli_fetch_assoc($result)) {
                    if ($row['companyName'] !== null) {
                        echo '<center><h1>' . $row['companyName'] . '</h1></center><br><br>';
                    }
                    if ($row['jobTitle'] !== null) {
                        echo '<h3>Job type: ' . $row['jobTitle'] . '</h3><br>';
                    }
                        if ($row['specifics'] === "Specific" && $row['min'] !== '0' && $row['max'] !== '0') {
                            echo '<span style="color: red;"><h3>Salary: $' . $row['min'] . ' - $' . $row['max'] . '</h3></span><br>';
                        }
                    else if ($row['agreement'] === "agreement") {
                        echo '<span style="color: blue;"><h3>Salary: will be contracted</h3></span>';
                    }
                    if ($row['jobLocation'] !== null) {
                        echo '<h5>Address: ' . $row['jobLocation'] . '</h5><br>';
                    }
                    if ($row['employmentType'] !== null) {
                        echo '<h5>Employment type: ' . $row['employmentType'] . '</h5><br><br><br><br><br>';
                    }
                    if ($row['displayContactPerson'] === 'display') {
                        echo '<h3>Contact recruiter</h3>';
                        echo '<h5>' . $row['contactPerson'] . '</h5>';
                        if ($row['email'] === 'email') {
                            echo '<h5>Email address: ' . $row['typeReceive'] . '</h5>';
                        }
                        if ($row['web'] === 'web') {
                            echo '<h5>Web address: ' . $row['typeReceive'] . '</h5>';
                        }
                        echo '<h7>Hiring manager</h7><br><br><br><br><br>';
                    }
                    if ($row['jobDescription'] !== null) {
                        echo '<h3>Job description</h3>';
                        echo '<h5>' . $row['jobDescription'] . '</h5><br><br><br><br><br>';
                    }
                    echo '<button id="viewProfileBtn">View Company Profile</button>';
                    echo '</div>';
                }
            }
        ?>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
    // Get the button element by its id
    var viewProfileBtn = document.getElementById("viewProfileBtn");

    // Add a click event listener to the button
    viewProfileBtn.addEventListener("click", function() {
        // Redirect to the desired page when the button is clicked
        window.location.href = "company_profile.php"; // Replace "company_profile.php" with the URL of the page you want to navigate to
    });
    </script>
</body>
<footer>
    <?php
        include 'assets/utils/footer.php';
    ?>
</footer>
</html>