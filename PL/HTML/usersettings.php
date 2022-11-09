
<?php
require_once("../../DTO/DTORequests/GetUserDTORequests.php");

session_start();
$ref = $_GET['ref'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <style>

        .invalid{
            color: red;
            position: static;

        }
        .error_hide{
            display: none;
            position: static;
            color: red;
            margin-top: -30px;
        }
        .error{
            position: static;
            color: red;
            margin-top: -30px;
        }
    </style>
    <title>Register Team Tia</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../Images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../CSS/util-register.css">
    <link rel="stylesheet" type="text/css" href="../CSS/main-register.css">
    <!--===============================================================================================-->
</head>
<body>
<form id="form" method="POST" action="usersettings-next.php">
    <div class="limiter">
        <div class="container-register100">
            <div class="wrap-register100">
                <div class="register100-form-title" style="background-image: url(../Images/bg-01.jpg);">
                            <span class="register100-form-title-1">
                                Update User
                            </span>
                </div>

                <div class="register100-form validate-form">

                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Username</span>
                        <input disabled id="username" class="input100"name="username" value="<?php
                        echo $_SESSION['loggeduser']->getUsername(); ?>">
                        <span class="focus-input100"></span>
                    </div>
                    <span id="username_error" class="error_hide"><i id="icon_username" class="fa fa-exclamation-circle" aria-hidden="true"></i>At least 3 letters</span>
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Email is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" id="mail" type="Email" name="email" value="<?php
                        echo $_SESSION['loggeduser']->getEmail(); ?>">
                        <span class="focus-input100"></span>
                    </div>
                    <span id="email_error" class="error_hide"><i id="icon_username" class="fa fa-exclamation-circle" aria-hidden="true"></i>Invalid email format! should include <@> and a domain</span>

                    <div  class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">Password</span>
                        <input id="pass" class="input100" type="password" name="pass" placeholder="Enter password">
                        <span class="focus-input100"></span>
                    </div>
                    <span id="password_error" class="error_hide"><br><i id="icon_username" class="fa fa-exclamation-circle" aria-hidden="true"></i>Your password should be at least 8 chars with:</span>
                    <span id="password_error2" class="error_hide"><br>Capital letters, small letters, numbers</span>
                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">Confirm Password</span>
                        <input id="confirm_pass" class="input100" type="password" name="conf-pass" placeholder="Re-enter password">
                        <span class="focus-input100"></span>
                    </div>
                    <span id="password_confirmation_error" class="error_hide"><br><i id="icon_username" class="fa fa-exclamation-circle" aria-hidden="true"></i>Passwords should match!<br></span>

                    <div class="container-register100-form-btn">
                        <button id="btn" class="register100-form-btn" name="submitBtn">
                            Update
                        </button>
                    </div>

                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">

                            <a <?php echo" href='$ref'" ?>class="txt1">
                                Go Back
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!--===============================================================================================-->
<script src="../Scripts/jquerysettings.js"></script>
<!--===============================================================================================-->

</body>
</html>