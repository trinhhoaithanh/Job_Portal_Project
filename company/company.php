<div class="company">
        <div class="container">
            <div class="inner-wrap">
                <div class="company-header">
                    <h2 class="company-heading">List of companies</span></h2>
                    <p class="company-desc">
                        Exercitation dolore reprehenderit fugi
                    </p>
                </div>

                <div class="company-list">
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

                        $sql = "SELECT * FROM companies";
                        $result = $conn->query($sql);


                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "
                                <a class='company-item' href='./index.php?page=company-detail&id=" . $row['company_id'] . "'>
                                    <div class='company-image'>
                                        <img src='" . $row['company_image'] . "'>
                                    </div>
        
                                    <h3 class='company-name'>" . $row['company_name'] . "</h3>
            
                                    <p class='job-info'><span>" . $row['company_quantity_job'] . "</span> | " . $row['company_address'] . "</p>
                            </a>  ";
                            }
                        } else {
                            echo "0 results";
                        }

                        // Close the database connection
                        $conn->close();



                    } 
                    else {
                        echo "<script>alert('You need to login to view the list of products'); window.location.href = './login/login.php';</script>";
                    }


                    ?>

                </div>
            </div>
        </div>
    </div>