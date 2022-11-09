<?php

require_once('../../BLL/userManager.php');
include_once ("../../DTO/DTORequests/SignupDTORequest.php");
if (isset($_POST['submitBtn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $passC = $_POST['conf-pass'];

    if (!ValidateSignup($username, $email, $pass, $passC)) {
        echo "<script type='text/javascript'>
                alert ('Please check entered values');
              </script>";
    } else {
        try {
            $pass = md5($pass);
            $user = new SignupDTORequest($username, $email, $pass);
            $result = signupUser($user);
            if ($result) {
                echo "<script type='text/javascript'>"
                . " window.location.href='../login.php';
                            alert ('Sign up Successfully');
                        </script>";
            } else {
                echo "<script type='text/javascript'>"
                . " window.location.href='register.html';"
                . "alert('Email or Username already  used');"
                . " </script> ";
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}

function ValidateSignup($username, $email, $pass, $passC) {
    if (!usernameValidation($username) || isEmpty($username) || isEmpty($email) || isEmpty($pass) || isEmpty($passC) ||
            !isConfirmPassword($pass, $passC) || !emailValidate($email) || !passValidate($pass)) {
        echo "<script type='text/javascript'> "
        . "alert('Fields are missing or invalid');"
        . " </script> ";
        return false;
    } else {
        return true;
    }
}

function isEmpty($str) {
    return empty($str);
}

function usernameValidation($str) {
    if (strlen($str) >= 3)
        return true;
    return false;
}

function isConfirmPassword($pass, $passC) {
    if (strcmp($pass, $passC) == 0)
        return true;
    return false;
}

function emailValidate($email) {
    if (!preg_match(' /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email))
        return false;
    return true;
}

function passValidate($pass) {
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/', $pass))
        return false;
    return true;
}
?>


