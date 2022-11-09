<?php

require_once('../../BLL/messageManager.php');
include_once ("../../DTO/DTORequests/MessageDTORequest.php");
require_once 'Mail/Mail.php';
require_once("../../DTO/DTORequests/GetUserDTORequests.php");

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
if (isset($_POST['submit'])) {
    $content = $_POST['Message'];
    $budget = $_POST['budget'];
    $title = $_POST['title'];
    session_start();
    $iduser = $_SESSION['loggeduser']->getId();

// Check if file already exists
    if (file_exists($target_file)) {
        echo "<script type='text/javascript'>
                alert ('Sorry, file already exists.');
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
                alert ('The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.');
              </script>";
        } else {
            echo "<script type='text/javascript'>
              </script>";
        }
    }
    $message = new MessageDTORequest($title,$content, $budget, $target_file, $iduser);
    $result = sendMessage($message);
    if ($result) {
        sendMail();
        echo "<script type='text/javascript'>"
        . " window.location.href='Agency.html';
                        </script>";
        
    } else {
        echo "<script type='text/javascript'>"
        . " window.location.href='Agency.html';"
        . " </script> ";
    }
}
?>