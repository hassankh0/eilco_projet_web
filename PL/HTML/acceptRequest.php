<?php

require_once("../../BLL/userManager.php");
require_once ("../../DTO/DTORequests/UpdateUserStatusDTORequest.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $userReq = new UpdateUserStatusDTORequest();
    $userReq->setId($id);

    if (makeAdmin($userReq)) {
        echo "<script type='text/javascript'>"
        . " window.location.href='superadminRequests.php';"
        . " </script> ";
    } else {
        echo "<script type='text/javascript'>"
        . " window.location.href='superadminRequests.php;"
        . "alert('makin user admin Failed');"
        . " </script> ";
    }
}