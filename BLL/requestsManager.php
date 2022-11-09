<?php

require_once '../../DAL/RequestsRepository.php';

function getALLRequests(){
    
    return getRequests();
}

function makeAdmin($user){
    return upgradeUser($user);
}

function rejectRequest($deleteReq){
    deleteRequest($deleteReq);
}
