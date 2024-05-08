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
        .card {
        width: 1100px;
        height: 800px;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        margin: 0 auto;
        font-family: Arial, sans-serif;
    } 
    .card-1 {
        width: 1100px;
        height: 450px;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        margin: 0 auto;
        font-family: Arial, sans-serif;
    } 
    .card-2 {
        width: 1100px;
        height: 250px;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        margin: 0 auto;
        font-family: Arial, sans-serif;
    } 
    .card-3 {
        width: 1100px;
        height: 250px;
        padding: 10px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        margin: 0 auto;
        font-family: Arial, sans-serif;
    } 
        .save-button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
        }
        #submit {
            margin-right: 20px; /* Add spacing between elements */
        }
        footer {
    clear: both;
    position: relative;
    height: 350px;
    margin-top: -150px;
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
    <h2>Post a new job</h2> <br><br>
    <div style="width: 22%; float:left">
        <a href="#scrollJob">Job Info</a><br><br>
        <a href="#scrollCompany">Company Info</a><br><br>
        <a href="#scrollContact">Contact Info</a><br><br>
        <a href="#scrollReceive">Receive application</a>
    </div>

    <div style="width: 78%; float:right">
            <form class="createJobInfo" id="jobInfoForm" method="post" action="create_job_processing.php">
            <div class="card">
                <h4 id="scrollJob">Job Information</h4><br>
                <div class="mb-3">
                    <label for="exampleInputJobTitle1" class="field-name form-label">Job title (required)</label>
                    <input name="jobtitle" placeholder="Computer Engineer" type="text" class="form-control" style="width: 95%"
                        id="jobtitle" required>
                </div><br>
                <div style="width: 50%; float:left">
                    <div class="mb-3">
                        <label for="exampleInputJobLocation1" class="field-name form-label">Job location (city) (required)</label>
                        <input name="joblocation" placeholder="District 10, Ho Chi Minh City" type="text" class="form-control"
                            id="joblocation" style="width: 95%" required>
                    </div>
                </div>
                <div style="width: 50%; float:right">
                    <div class="mb-3">
                        <label for="exampleInputEmploymentType1" class="field-name form-label">Employment type (required)</label>
                        <input name="employmenttype" placeholder="Full time" type="text" class="form-control" style="width: 95%"
                            id="employmenttype" required>
                    </div>
                </div><br>
                <div class="mb-3">
                    <label for="exampleInputSalaryRange1" class="field-name form-label">Salary range</label><br>
                    <input type="radio" id="specific" name="salary_type" value="Specific">
                    <label for="specific">Specific salary</label>
                    <input type="radio" id="agreement" name="salary_type" value="agreement">
                    <label for="agreement">Wage agreement</label><br><br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="exampleInputMin1" class="field-name form-label">Minimum salary ($/month)</label>
                            <input name="min" placeholder="7000" type="text" class="form-control" style="width: 95%" id="min">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputMax1" class="field-name form-label">Maximum salary ($/month)</label>
                            <input name="max" placeholder="9000" type="text" class="form-control" style="width: 95%" id="max">
                        </div>
                    </div>
                </div><br>
                <div class="mb-3">
                    <label for="exampleInputJobDescription1" class="field-name form-label">Job description (required)</label><br>
                    <textarea id = "jobdescription" name="jobdescription" rows="5" cols="125" required></textarea>
                </div>
</div><br><br><br><br><br>
            <div class="card-1">
                <h4 id="scrollCompany">Company Information</h4><br>
                <div class="mb-3">
                    <label for="exampleInputCompanyName1" class="field-name form-label">Company name (required)</label>
                    <input name="companyname" placeholder="VNPT" type="text" class="form-control" style="width: 95%"
                        id="companyname" required>
                </div><br>
                <div style="width: 50%; float:left">
                    <div class="mb-3">
                        <label for="exampleInputEmployees1" class="field-name form-label">Number of Employees (required)</label>
                        <input name="employees" placeholder="100-200" type="text" class="form-control"
                            id="employees" style="width: 95%" required>
                    </div>
                </div>
                <div style="width: 50%; float:right">
                    <div class="mb-3">
                        <label for="exampleInputCompanyLocation1" class="field-name form-label">Company location (city) (required)</label>
                        <input name="companylocation" placeholder="270 Ly Thuong Kiet, Ward 14, District 10, Ho Chi Minh City" type="text" class="form-control" style="width: 95%"
                            id="companylocation" required>
                    </div>
                </div><br>
                <div class="mb-3">
                    <label for="exampleInputCompanyDescription1" class="field-name form-label">Company description (required)</label><br>
                    <textarea id="companydescription" name="companydescription" rows="5" cols="125" required></textarea>
                </div>
                </div><br><br><br><br><br>
                <div class="card-2">
                <h4 id="scrollContact">Contact Information</h4><br>
                <div class="mb-3">
                    <label for="exampleInputContactPerson1" class="field-name form-label">Contact person (required)</label>
                    <input name="contactperson" type="text" class="form-control" style="width: 95%"
                        id="contactperson" required>
                </div>
                <input type="checkbox" id="displayContactPerson" name="displayContactPerson" value="display">
                <label for="display">Display contact person in company information</label>
            </div><br><br><br><br><br><br><br>
            <div class="card-3">
                <h4 id="scrollReceive">Receive Application</h4><br>
                <div style="width: 17%; float:left">
                    <input type="radio" id="email" name="receive_via" value="email">
                    <label for="email">Email</label>
                </div>
                <div style="width: 83%; float:right">
                    <input type="radio" id="web" name="receive_via" value="web">
                    <label for="web">External Web</label>
                </div><br><br>
                <input name="typeReceive" placeholder="sample@gmail.com" type="text" class="form-control" style="width: 95%"
                    id="typeReceive" required><br><br><br><br><br>

                   <!-- <input id="submitCancel" type="submit" name="submit" value="Cancel">
                    <input id="submitSave" type="submit" name="submit" value="Save">
                    <input id="submitPublish" type="submit" name="submit" value="Save & Publish"> -->
                </div><br><br><br>
                    <input id="submit" type="submit" name="submit" value="Save">
            </form>
    </div>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/map.js"></script>
</body>
<footer>
    <?php
        include 'assets/utils/footer.php';
    ?>
</footer>
</html>
