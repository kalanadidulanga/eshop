<?php

include "connection.php";

?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>eShop</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.svg" />

</head>

<body class="main-body">

    <div class="container-fluid vh-100 d-flex justify-content-center">
        <div class="row align-content-center">

            <!-- header -->

            <div class="col-12">
                <div class="row">
                    <div class="col-12 logo"></div>
                    <div class="col-12">
                        <p class="text-center title01">Hi, Welcome to eShop</p>
                    </div>
                </div>
            </div>

            <!-- header -->

            <!-- content -->

            <div class="col-12 p-3">
                <div class="row">

                    <div class="col-6 d-none d-lg-block background"></div>
                    <!-- signupbox -->

                    <div class="col-12 col-lg-6" id="signUpBox">
                        <div class="row g-2">

                            <div class="col-12">
                                <p class="title02">Create New Account</p>
                            </div>

                            <div class="col-12 d-none" id="msgdiv">
                                <div class="alert alert-danger" role="alert" id="msg">

                                </div>
                            </div>

                            <div class="col-6">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" placeholder="ex:- John" id="fname" />
                            </div>

                            <div class="col-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" placeholder="ex:- Doe" id="lname" />
                            </div>

                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="ex:- john@gmail.com" id="email" />
                            </div>

                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="ex:- **********" id="password" />
                            </div>

                            <div class="col-6">
                                <label class="form-label">Mobile</label>
                                <input type="text" class="form-control" placeholder="ex:- 0771234568" id="mobile" />
                            </div>

                            <div class="col-6">
                                <label class="form-label">Gender</label>
                                <select class="form-control" id="gender">

                                    <option value="0">Select</option>

                                    <?php

                                    $rs = DataBase::search("SELECT * FROM `gender`");
                                    $num = $rs->num_rows;

                                    for ($i = 0; $i < $num; $i++) {
                                        $data = $rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $data["gender_id"] ?>">
                                            <?php echo $data["name"] ?>
                                        </option>
                                    <?php
                                    }

                                    ?>


                                </select>
                            </div>

                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary" onclick="signUp();">Sign Up</button>
                            </div>

                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-dark" onclick="changeView();">Already have an account? Sign In</button>
                            </div>

                        </div>
                    </div>

                    <!-- signupbox -->

                    <!-- signinbox -->

                    <div class="col-12 col-lg-6 d-none" id="signInBox">
                        <div class="row g-2">
                            <div class="col-12">
                                <p class="title02">Sign In</p>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="email2" value="" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" id="password2" value="" />
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rememberme" />
                                    <label class="form-check-label">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <a href="#" class="link-primary">Forgot Password?</a>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary">Sign In</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-danger" onclick="changeView();">New to eShop? Join Now</button>
                            </div>
                        </div>
                    </div>

                    <!-- signinbox -->

                </div>
            </div>

            <!-- content -->

            <!-- footer -->
            <div class="col-12 fixed-bottom d-none d-lg-block">
                <p class="text-center">&copy; 2022 eShop.lk || All Rights Reserved</p>
            </div>
            <!-- footer -->

        </div>

    </div>


    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>