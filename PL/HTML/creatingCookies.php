<?php

require_once("../../DTO/DTOResponses/GetUserDTORequests.php");

session_start();
setcookie("username", $_SESSION['loggeduser']->getUsername(), time() + 3600, "/", "", 0); //30 days



