<?php

require_once('../../../BLL/joinRequestManager.php');
include_once ("../../../DTO/DTORequests/JoinRequestDTORequest.php");
require_once '../Mail/Mail2.php';
require_once("../../../DTO/DTORequests/GetUserDTORequests.php");

$target_dir = "RequestsUploaded/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    session_start();
    $iduser = $_SESSION['loggeduser']->getId();

// Check if file already exists
    if (file_exists($target_file)) {
        echo "<script type='text/javascript'>
              </script>";
        $uploadOk = 0;
    }

// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000000) {
        echo "<script type='text/javascript'>
              </script>";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script type='text/javascript'>
              </script>";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "<script type='text/javascript'>
              </script>";
        } else {
            echo "<script type='text/javascript'>
              </script>";
        }
    }

    $request = new JoinRequestDTORequest($name, $address, $age, $target_file, $iduser);
    $result = sendRequest($request);
    if ($result) {
        sendMail();
        echo "<script type='text/javascript'>"
        . " window.location.href='../Agency.html';
                        </script>";
    } else {
        echo "<script type='text/javascript'>"
        . "alert('Failed to send Message');"
        . " window.location.href='../Agency.html';
             </script> ";
    }
}
?>