<?php

require_once '../../DAL/workRepository.php';

function addToWork($work){
    
    return insertWorkQuer($work);
    
}

function getAllworks($idadmin){
    return getAllWorksQuer($idadmin);
}
function getWorkById($id){
    return getWork($id);
}

function makedone($id){
    return updateDone($id);
}