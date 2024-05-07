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
<div class="login">
    <div class="container">
        <div class="inner-login">
            <div class="card">
                <h1>Hello.</h1>
                <p>Welcome back</p>
                <form class="mb-3" id="loginForm" action="./login/login_processing.php" autocomplete="off"
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
                    <div style="text-align:center">
                        <button type="submit" name="login" value="login" class="btn-login btn btn-success">Sign
                            In</button>

                    </div>
                </form>
                <p>Don't have an account? <a style="font-size: 14px; 
                                                    line-height: 22px; 
                                                    font-weight: 700; 
                                                    color: #0EA89BFF;" href="./index.php?page=register">Sign up</a></p>
            </div>

        </div>
    </div>
</div>