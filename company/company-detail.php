<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_job_portal";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $companyId = $_GET['id'];

    // Fetch product details based on product ID
    $sql = "SELECT * FROM companies WHERE company_id = $companyId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display product details
        echo "
        <div class='company-detail'>
        <div class='container'>
            <div class='inner-wrap'>
                <div class='company-detail-header'>
                    <div class='company-detail-image'>
                        <div class='cover-image'>
                            <img src='./assets/images/cover-image.jpg'>
                        </div>
        
                        <div class='avatar-image'>
                            <img src='" . $row['company_image'] . "'>
                        </div>
                    </div>
                    <div class='company-detail-name'>
                        <div class='company-detail-left'>
                            <h2>" . $row['company_name'] . "</h2>
                            <p>" . $row['company_job_field'] . "</p>
                        </div>
                        <div class='company-detail-right'>
                            <div class='company-detail-button'>
                                <button class='company-detail-button-left'><i class='fa-solid fa-share-nodes'></i> Share</button>
                                <button class='company-detail-button-right'><i class='fa-solid fa-plus'></i> Follow</button>
                            </div>
                        </div>
                    </div>

                    <div class='company-detail-info'>
                        <div class='company-detail-info-item'>
                            <p><i class='fa-solid fa-globe'></i> " . $row['company_website'] . "</p>
                            <p><i class='fa-solid fa-location-dot'></i> " . $row['company_address'] . "</p>
                            <p><i class='fa-solid fa-users'></i> " . $row['company_quantity_employer'] . " employees</p>
                        </div>

                        <div class='company-detail-info-item'>
                            <p>" . $row['company_quantity_follower'] . " followers</p>
                        </div>
                    </div>
                </div>

                <div class='company-detail-content'>
                    <h3 class='company-detail-content-title'>About us</h3>
                    <p class='company-detail-content-desc'>" . $row['company_desc'] . "</p>

                    <h3 class='company-detail-content-title'>Why choosing us</h3>
                    <p class='company-detail-content-desc'>" . $row['company_reason'] . "</p>
                </div>

                <div class='company-detail-preview'>
                    <h3 class='preview-title'>Preview</h3>
                    <div class='preview-card'>
                        <div class='preview-card-info'>
                            <div class='preview-card-info-left'>
                                <img src='./assets/images/preview_avatar.jpg'>
                            <span class='preview-card-info-name ms-2 fw-bold'>Jay Rutherford</span>
                            </div>
                            
                            <p class='preview-card-info-date'>06-05-2024</p>
                        </div>
                        <p class='preview-card-content'>The compensation & benefit are amazing 😍😍😍.</p>
                    </div>

                    <div class='preview-card'>
                        <div class='preview-card-info'>
                            <div class='preview-card-info-left'>
                                <img src='./assets/images/cover-image-1.jpg'>
                            <span class='preview-card-info-name ms-2 fw-bold'>Jay Rutherford</span>
                            </div>
                            
                            <p class='preview-card-info-date'>06-05-2024</p>
                        </div>
                        <p class='preview-card-content'>It's a high growth company & an amazing workplace in term of culture, mission and interesting work.</p>
                    </div>

                    <div class='preview-card'>
                        <div class='preview-card-info'>
                            <div class='preview-card-info-left'>
                                <img src='./assets/images/cover-image-2.jpg'>
                            <span class='preview-card-info-name ms-2 fw-bold'>Jay Rutherford</span>
                            </div>
                            
                            <p class='preview-card-info-date'>06-05-2024</p>
                        </div>
                        <p class='preview-card-content'>I'm fresh graduate & I receive great leadership & guidedance from seniors</p>
                    </div>

                </div>

                <div class='premium-update'>
                    <div class='inner-wrap'>
                        <div class='premium-update-left'>
                            <h3 class='premium-update-title'>Unlock more company insights</h3>
                            <p class='premium-update-desc'>Laborum est minim id cillum </p>
                            <button class='button-premium'>Upgrade to Premium</button>
                        </div>
    
                        <div class='premium-update-right'>
                            <img style='width: 120px; 
                            height: 143px; ' src='./assets/images/premium-update.svg'>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
        
            
        ";
        // Output other product details as needed
    } else {
        echo "Product not found";
    }
}

$conn->close();
?>