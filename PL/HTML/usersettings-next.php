<?php

require_once('../../BLL/userManager.php');
require_once ("../../DTO/DTORequests/UpdateUserDTORequest.php");
require_once("../../DTO/DTORequests/GetUserDTORequests.php");
require_once ("../../DTO/DTOResponses/UpdateUserDTOResponse.php");
require_once ("../../DTO/DTORequests/LoginDTORequest.php");

if (isset($_POST['submitBtn'])) {

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $passC = $_POST['conf-pass'];

    if (!ValidateSignup( $email, $pass, $passC)) {
        echo "<script type='text/javascript'>
                alert ('Please check entered values');
              </script>";
    } else {
        try {
session_start();
            if(isEmpty($pass)){

                $user = new UpdateUserDTORequest($_SESSION['loggeduser']->getUsername(), $email, $pass);
                $result = updateUser2($user);
                $_SESSION['loggeduser']->setEmail($email);
            }else {
                echo $pass;
                $pass = md5($pass);
                $user = new UpdateUserDTORequest($_SESSION['loggeduser']->getUsername(), $email, $pass);
                $result = updateUser($user);
                
                $_SESSION['loggeduser']->setEmail($email);
                $_SESSION['loggeduser']->setPassword($pass);
            }
            if ($result) {
                if($_SESSION['loggeduser']->getIs_admin() ==3) {
                echo "<script type='text/javascript'>"
                    . " window.location.href='Agency.html';                  
                        </script>";
                } else {
                     echo "<script type='text/javascript'>"
                    . " window.location.href='adminPage.php';                  
                        </script>";
                }
            } else {
                echo "<script type='text/javascript'>"
                    . " window.location.href='usersettings.php';"
                    . " </script> ";
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}

function ValidateSignup( $email, $pass, $passC) {
    if ( isEmpty($email) ||
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



function isConfirmPassword($pass, $passC) {
    if(isEmpty($pass))
        return true;
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
    if(isEmpty($pass))
        return true;
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/', $pass))
        return false;
    return true;
}
?>


