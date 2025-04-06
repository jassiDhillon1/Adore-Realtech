<?php
session_start();
require_once '../include/connection.php';

if (isset($_POST['login_btn'])) {
    
    if ($_POST['email'] != "" || $_POST['password'] != "") {
        
        $email = $_POST['email'];
        $password = trim($_POST['password']);
        $query = $connect->prepare("SELECT * FROM `admin_users` WHERE `email`=? ");
        $query->execute([$email]);
        $row = $query->rowCount();
        $fetch = $query->fetch();
        
        if ($row > 0  && password_verify($password, $fetch['password'])) {
            $_SESSION['fname'] = $fetch['name'];
            header("location: ../index.php");
        } else {
            echo "
				<script>alert('Invalid Email or password')</script>
				<script>window.location = 'login.php'</script>
				";
        }
    } else {
        echo "
				<script>alert('Please complete the required field!')</script>
				<script>window.location = 'login.php'</script>
			";
    }
}
?>


<!doctype html>
<html lang="en">
<head>
        
        <meta charset="utf-8" />
        <title>Login | Adore Real Tech - Admin Dashboard </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Optus Realty - Admin Dashboard" name="description" />
        <meta content="Advert India" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="../assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="../assets/css/style.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="welcome_back">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-primary p-4">
                                            <h1 class="text-primary welcom text-white" style="font-size: 20px;">Welcome Back !</h1>
                                            <p class="text-white">Sign in to continue to Adore Real Tech</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div class="p-2">
                                    <form class="form-horizontal" action="<?= ($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
        
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="username" placeholder="Enter email" required>
                                        </div>
                
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" name="password" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>

                                        <!--<div class="form-check">-->
                                        <!--    <input class="form-check-input" type="checkbox" name="remember_me" id="remember-check">-->
                                        <!--    <label class="form-check-label" for="remember-check">-->
                                        <!--        Remember me-->
                                        <!--    </label>-->
                                        <!--</div>-->
                                        
                                        <div class="mt-3 d-grid">
                                            <button class="btn waves-effect waves-light" style="background: #2f4381;color: white" name="login_btn" type="submit">Log In</button>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            
                            <div>
                                <p>© <script>document.write(new Date().getFullYear())</script> Adore Real Tech. Crafted with <i class="mdi mdi-heart text-danger"></i> by Advert India</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
        <script src="../assets/libs/jquery/jquery.min.js"></script>
        <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="../assets/libs/simplebar/simplebar.min.js"></script>
        <script src="../assets/libs/node-waves/waves.min.js"></script>
        
        <!-- App js -->
        <script src="../assets/js/app.js"></script>
    </body>

<!-- Mirrored from themesbrand.com/skote/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Feb 2023 07:03:49 GMT -->
</html>
