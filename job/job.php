<div class="lastest" style="padding:50px;">
        <div class="container">
            <div class="inner-wrap">
                <div class="lastest-header">
                    <h2 class="lastest-heading">List of recruiting jobs</h2>
                    <p class="lastest-desc">
                        Exercitation dolore reprehenderit fugi
                    </p>
                </div>

                <div class="lastest-list">
                    <?php
                    if (isset($_SESSION['username'])) {
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "db_job_portal";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);

                        }

                        $sql = "SELECT Jobs.job_id, Jobs.job_title, Jobs.job_salary, Jobs.job_location, Jobs.job_mode, Companies.company_name, Companies.company_image
        FROM Jobs
        JOIN Companies
        ON Jobs.company_id = Companies.company_id";
                        $result = $conn->query($sql);


                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "
                            <div class='lastest-item'>
                        <div class='job-info'>
                            <div class='job-info-logo'>
                                <img src='" . $row['company_image'] . "'>
                            </div>
                            <div class='job-info-detail'>
                                <h3 class='job-info-detail-name'>" . $row['job_title'] . "</h3>
                                <p class='job-info-detail-salary'>" . $row['job_salary'] . "</p>
                            </div>
                        </div>
                        <div class='job-address'>
                            <i class='fa-solid fa-house'></i>
                            " . $row['company_name'] . "
                        </div>

                        <div class='job-address'>
                            <i class='fa-solid fa-location-dot'></i>
                            " . $row['job_location'] . "
                        </div>

                        <div class='job-address'>
                            <i class='fa-regular fa-bookmark'></i>
                            " . $row['job_mode'] . "
                        </div>
                    </div> ";
                            }
                        } else {
                            echo "0 results";
                        }

                        // Close the database connection
                        $conn->close();



                    } 
                    else {
                        echo "<script>alert('You need to login to view the list of products'); window.location.href = './index.php?page=login';</script>";
                    }


                    ?>
                </div>
            </div>
        </div>
    </div>