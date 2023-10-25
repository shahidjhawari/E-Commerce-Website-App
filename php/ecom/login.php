<?php include('top.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Registration Page</title>
    <style>
        .myh1 {
            margin-top: 30px;
        }
        .mybtn {
            margin-bottom: 30px;
        }
        .field_error {
            color: red;
        }
    </style>
</head>
<body>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4 mt-10 myh1">Sign Up</h2>
                <form id="register-form" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required><br>
                        <span class="field_error" id="name_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email"  placeholder="Enter your email" required>
                        <small>Please enter valid email</small><br>
                        <span class="field_error" id="email_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="tel" class="form-control" name="mobile" id="mobile"  placeholder="Enter your phone number" required>
                        <small>etc. 03001234567</small><br>
                        <span class="field_error" id="mobile_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password"  placeholder="Enter a password" required>
                        <small>Password must be at least 8 characters</small><br>
                        <span class="field_error" id="password_error"></span>
                    </div>
                    <button type="button" class="btn btn-primary mybtn" onclick="user_register()">Sign Up</button>
                </form>
                <div class="form-output register_msg">
									<p class="form-messege field_error"></p>
								</div>
            </div>
        </div>
    </div>
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4 myh1">Login</h2>
                <form id="login-form" method="$_POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="login_email" id="login_email" placeholder="Enter your email" required>
                        <span class="field_error" id="login_email_error"></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="login_password" id="login_password" placeholder="Enter your password" required>
                        <span class="field_error" id="login_password_error">
                    </div>
                    <button type="button" class="btn btn-primary mybtn" onclick="user_login()">Login</button>
                </form>
                <div class="form-output login_msg">
									<p class="form-messege field_error"></p>
								</div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php include('footer.php') ?>