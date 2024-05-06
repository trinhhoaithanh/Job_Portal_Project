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


    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page == 'home')
            include 'home.php';
        elseif ($page == 'login')
            include './login/login.php';
        elseif ($page == 'register')
            include './register/register.php';
        elseif ($page == 'company')
            include './company/company.php';
        // elseif ($page == 'dashboard')
        //     include './dashboard/dashboard.php';
        // elseif ($page == 'productform')
        //     include './product/product_form.php';
        // elseif ($page == 'updateproduct')
        //     include './product/update_product.php';
        // elseif ($page == 'ajax')
        //     include './ajax/ajax.php';
        // elseif ($page == 'product_detail')
        //     include './product/product_detail.php';
    } else {
        // Default to home.php
        include 'home.php';
    }
    ?>


    <?php
        include 'assets/utils/footer.php';
    ?>
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>