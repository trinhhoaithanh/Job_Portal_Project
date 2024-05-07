<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .card {
            width: 300px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            margin: 0 auto;
            font-family: Arial, sans-serif;
        }

        .card h1 {
            margin-bottom: 10px;
        }

        .card p {
            margin-bottom: 20px;
        }

        .card input[type=email],
        .card input[type=password] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .card button {
            width: 100%;
            padding: 10px;
            background: #0EA89BFF;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .login {
            padding: 50px 0;
        }
    </style>
</head>

<body>
    <div class="login">
        <div class="container">
            <div class="inner-login">

                <!-- <form id="loginForm" action="./register/register_processing.php" autocomplete="off" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="field-name form-label">Username</label>
                            <input name="username" placeholder="Enter your user name" type="text" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="field-name form-label">Password</label>
                            <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Password must contain at least one number, one uppercase letter, and be at least 8 characters long"
                                required name="password" placeholder="Enter your password" type="password"
                                class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3 form-check">
                        </div>
                        <div style="text-align:center">
                            <button type="submit" name="login" value="login"
                                class="btn-login btn btn-success">Register</button>

                        </div>
                    </form> -->



                <div class="card">
                    <h1>Welcome.</h1>
                    <p>Create an account</p>
                    <form class="mb-3" id="loginForm" action="./register/register_processing.php" autocomplete="off"
                        method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="field-name form-label">Username</label>
                            <input name="username" placeholder="Enter your user name" type="text" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="field-name form-label">Password</label>
                            <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Password must contain at least one number, one uppercase letter, and be at least 8 characters long"
                                required name="password" placeholder="Enter your password" type="password"
                                class="form-control" id="exampleInputPassword1">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="field-name form-label">Email</label>
                            <input name="useremail" placeholder="Enter your email name" type="text" class="form-control"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>

                        <div style="text-align:center">
                            <button type="submit" name="login" value="login"
                                class="btn-login btn btn-success">Register</button>

                        </div>
                    </form>
                    <p>Already have an account? <a style="font-size: 14px; 
  line-height: 22px; 
  font-weight: 700; 
  color: #0EA89BFF;" href="./index.php?page=login">Sign in</a></p>
                </div>

            </div>
        </div>
    </div>
</body>

</html>