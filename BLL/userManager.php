<?php
require_once '../../DAL/userRepository.php';

function getUser($getReq) {
    return getUserQuer($getReq);
}
function loginUser($user) {
    return login($user);
}
function getUserbyname($username){
   return getUserByUsername($username) ;   
}
 
//function searchUsers($input) {
//    return search($input);
//}
function getAllUsers() {
    return getAllUsersQuer();
}

function getAllUsersForSuperAdmin() {
    return getAllUsersQuer_SuperAdminDisplay();
}
function deleteUser($deleteReq) {
    return deleteUserQuer($deleteReq);
}
function updateUser($user) {
    return updateUserQuer($user);
}
function updateUser2($user) {
    return updateUserQuer2($user);
}

function signupUser($user) {
    return insertUserQuer($user);
}

function makeAdmin($user){
    return acceptUserQuer($user);
}