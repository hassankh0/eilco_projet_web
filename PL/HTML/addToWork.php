<?php

require_once('../../BLL/messageManager.php');
require_once('../../BLL/workManager.php');
require_once ("../../DTO/DTORequests/AddWorkDTORequest.php");
require_once ("../../DTO/DTORequests/LoginDTORequest.php");
require_once ("../../DTO/DTORequests/GetUserDTORequests.php");

session_start();
$getReq = getMessageById($_SESSION['targetid']);

$getwork = new AddWorkDTORequest($getReq->getContent(), $getReq->getBudget(), $getReq->getFilename(), $getReq->getIduser(), $_SESSION['loggeduser']->getId(), $getReq->getTitle());
if (addToWork($getwork)) {
    deleteMessage($getReq);
}

echo "<script type='text/javascript'>"
 . " window.location.href='adminPage.php';
                        </script>";


