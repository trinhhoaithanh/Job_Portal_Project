
    <!-- Carousel -->
    <section class="carousel">
        <div class="container">
            <div class="inner-wrap">
                <div class="carousel-left ">
                    <h1 class="carousel-heading">
                        <span>16,780 Jobs</span>
                        For You

                    </h1>
                    <p class="carousel-desc">Non enim eu excepteur cupidatat consectetur do ea est reprehenderit
                        incididunt irure veniam cupidatat est non amet. Enim duis aute tempor laboris ipsum dolore non.
                    </p>
                    <button class="button button-1">Explore now</button>
                </div>

                <div class="carousel-right">
                    <div class="rectangle"></div>
                    <img class="avatar1" src="./assets/images/avatar1.jpg" alt="">
                    <img class="avatar2" src="./assets/images/avatar2.jpg" alt="">
                    <div class="job-card-1">
                        <img src="./assets/images/logo-job-1.png" alt="">
                        <div class="job-card-info">
                            <h6 class="job-card-title">Java Developer</h6>
                            <p class="job-card-salary">$120K - $130K</p>
                        </div>

                    </div>

                    <div class="job-card-2">
                        <img src="./assets/images/logo-job-2.png" alt="">
                        <div class="job-card-info">
                            <h6 class="job-card-title">UI / UX Designer</h6>
                            <p class="job-card-salary">$100K - $110K</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End carousel -->

    <!-- Explore -->
    <div class="explore">
        <div class="container">
            <div class="inner-wrap">
                <h2 class="explore-heading">Explore more jobs</h2>
                <div class="search-form">
                    <form id="searchForm" action="" method="post" class="input-group mb-3">
                        <input id="searchInput" name="keyword" type="search" class="form-control"
                            placeholder="Input the job's name" aria-label="Recipient's username"
                            aria-describedby="button-addon2">
                        <button class="button-search btn btn-outline-success" type="submit"
                            id="button-addon2">Search</button>
                    </form>
                </div>

                <div class="job-field">
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

                        $sql = "SELECT * FROM categories";
                        $result = $conn->query($sql);


                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "
                            <div class='job-field-item'>
                            <h6 class='job-field-title'>" . $row['category_name'] . "</h6>

                        </div>  ";
                            }
                        } else {
                            echo "0 results";
                        }

                        // Close the database connection
                        $conn->close();



                    } else {
                        echo "<script>alert('You need to login to view the list of products'); window.location.href = './index.php?page=login';</script>";
                    }


                    ?>

                </div>
            </div>
        </div>
    </div>

    <!-- End Explore -->

    <!-- Lastest -->
    <div class="lastest">
        <div class="container">
            <div class="inner-wrap">
                <div class="lastest-header">
                    <h2 class="lastest-heading">Latest job</h2>
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
        ON Jobs.company_id = Companies.company_id LIMIT 3";
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



                    } else {
                        echo "<script>alert('You need to login to view the list of products'); window.location.href = './index.php?page=login';</script>";
                    }


                    ?>
                </div>
            </div>
        </div>
    </div>

   <!-- End Lastest -->

    <!-- Companies -->
    <div class="company">
        <div class="container">
            <div class="inner-wrap">
                <div class="company-header">
                    <h2 class="company-heading">Top <span>IT companies</span></h2>
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

                        $sql = "SELECT * FROM companies LIMIT 4";
                        $result = $conn->query($sql);


                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "
                                <div class='company-item'>
                                    <div class='company-image'>
                                        <img src='" . $row['company_image'] . "'>
                                    </div>
        
                                    <h3 class='company-name'>" . $row['company_name'] . "</h3>
            
                                    <p class='job-info'><span>" . $row['company_quantity_job'] . "</span> | " . $row['company_address'] . "</p>
                            </div>  ";
                            }
                        } else {
                            echo "0 results";
                        }

                        // Close the database connection
                        $conn->close();



                    } else {
                        echo "<script>alert('You need to login to view the list of products'); window.location.href = './login/login.php';</script>";
                    }


                    ?>

                </div>
            </div>
        </div>
    </div>

    <!-- End Companies -->

    <!-- Build profile -->
    <div class="build-profile">
        <div class="container">
            <div class="inner-wrap">
                <div class="build-profile-left">
                    <h2 class="build-profile-title">Build a great profile</h2>
                    <p class="build-profile-desc">Do consectetur proident proident id eiusmod deserunt consequat
                        pariatur ad ex velit do Lorem reprehenderit.</p>
                    <button class="button-create">Create</button>
                </div>

                <div class="build-profile-right">
                    <div class="profile-image-1">
                        <img src="./assets/images/build-1.jpg" alt="">
                    </div>

                    <div class="profile-image-2">
                        <img src="./assets/images/build-2.png" alt="">
                    </div>

                    <div class="build-rectangle"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Build profile -->

    <!-- Career Advice -->
    <div class="career-advice">
        <div class="container">
            <div class="inner-wrap">
                <div class="career-advice-header">
                    <h2 class="career-advice-title">Career advices from HR Insiders</h2>
                    <p class="career-advice-desc">
                        Exercitation dolore reprehenderit fugi
                    </p>
                </div>

                <div class="advice-list">
                    <div class="advice-item">
                        <div class="advice-item-image">
                            <img src="./assets/images/advice-1.jpg" alt="">
                        </div>
                        <div class="advice-item-content">
                            <p class="advice-item-content-sub-title">Do consectetur</p>
                            <h5 class="advice-item-content-title">Aliqua Irure Tempor Lorem Occaecat Volup</h5>
                            <div class="advice-item-content-info">
                                <p class="advice-item-content-info-date">Dec 22, 2022</p>
                                <p class="advice-item-content-info-read-duration">5 mins read</p>
                            </div>
                        </div>
                    </div>

                    <div class="advice-item">
                        <div class="advice-item-image">
                            <img src="./assets/images/advice-2.jpg" alt="">
                        </div>
                        <div class="advice-item-content">
                            <p class="advice-item-content-sub-title">Consequat labore</p>
                            <h5 class="advice-item-content-title">Commodo Deserunt Ipsum Occaecat Qui</h5>
                            <div class="advice-item-content-info">
                                <p class="advice-item-content-info-date">Dec 22, 2022</p>
                                <p class="advice-item-content-info-read-duration">15 mins read</p>
                            </div>
                        </div>
                    </div>

                    <div class="advice-item">
                        <div class="advice-item-image">
                            <img src="./assets/images/advice-3.jpg" alt="">
                        </div>
                        <div class="advice-item-content">
                            <p class="advice-item-content-sub-title">Do consectetur</p>
                            <h5 class="advice-item-content-title">Eu labore ex nostrud fugiat sit non nulla</h5>
                            <div class="advice-item-content-info">
                                <p class="advice-item-content-info-date">Dec 22, 2022</p>
                                <p class="advice-item-content-info-read-duration">5 mins read</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="see-more-button">
                    <button>See more articles</button>
                </div>
            </div>
        </div>
    </div>

    <!-- End Career Advice -->