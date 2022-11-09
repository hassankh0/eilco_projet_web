<?php

require_once('../../BLL/userManager.php');
include_once ("../../DTO/DTORequests/LoginDTORequest.php");

if (isset($_POST['submitBtn'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    try {

        $pass = md5($pass);

        $user = new LoginDTORequest($username, $pass);

        $result = loginUser($user);
        if ($result) {
            session_start();
            $_SESSION['loggeduser'] = getUserbyname($username);
            $cookie_name = "username";
            $cookie_value = $_SESSION['loggeduser']->getUsername();
//            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
            if (isset($_REQUEST['remember'])) {
                $cookie_time = 60 * 60 * 24 * 30; // 30 days
                $cookie_time_Onset = $cookie_time + time();
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
            }
            if ($_SESSION['loggeduser']->getIs_admin() == 3) {
                echo "<script type='text/javascript'>"
                . " window.location.href='Agency.html';
            </script>";
            } else if ($_SESSION['loggeduser']->getIs_admin() == 2) {
                echo "<script type='text/javascript'>"
                . " window.location.href='adminPage.php';
            </script>";
            } else if ($_SESSION['loggeduser']->getIs_admin() == 1) {
                echo "<script type='text/javascript'>"
                . " window.location.href='superadminPage.php';
            </script>";
            }
        } else {
            echo "<script type='text/javascript'>"
            . " window.location.href='../login.php';"
            . "alert('Login Failed');"
            . " </script> ";
        }
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}
