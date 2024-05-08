<header class="header">
    <div class="container-header">
        <div class="header-inner">
            <div class="logo">
                <a href="/">
                    <img style="width:100%" class="logo-image" src="./assets/images/logo.png" alt="">
                </a>

            </div>

            <div class="nav">
                <ul class="nav-list">
                    <li class="nav-item"><a href="./index.php?page=home">Home</a>
                    </li>
                    <li class="nav-item"><a href="./index.php?page=job">All Jobs</a>
                    </li>
                    <li class="nav-item"><a href="./index.php?page=company">Companies</a>
                    </li>
                
                    <li class="nav-item"><a href="./index.php?page=candidate">Candidates</a>
                    </li>
                    <li class="nav-item"><a href="./index.php?page=profile"><a href="#"> 
                        <!-- link candidate profile -->
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo "<p>" . $_SESSION['username'] . "</p>";
                            }
                            ?>
                        </a>
                    </li>
                    
                    <li class="nav-item"><a href="assets/utils/logout.php">Log out</a></li>
                </ul>
            </div>

            <div class="contact">
                <ul class="contact-list">

                    <li class="contact-item">
                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    </li>

                    <li class="contact-item">
                        <a href="#"><i class="fa-brands fa-twitter"></i></i></a>
                    </li>

                    <li class="contact-item">
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>

    </div>

</header>