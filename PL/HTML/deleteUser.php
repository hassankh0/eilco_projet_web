<?php

require_once("../../BLL/userManager.php");
require_once ("../../DTO/DTORequests/DeleteUserDTORequest.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleteReq = new DeleteUserDTORequest();
    $deleteReq->setId($id);

    if (deleteUser($deleteReq)) {
        echo "<script type='text/javascript'>"
        . " window.location.href='superadminPage.php';"
        . " </script> ";
    } else {
        echo "<script type='text/javascript'>"
        . " window.location.href='superadminPage.php';"
        . "alert('Delete Failed');"
        . " </script> ";
    }
}
