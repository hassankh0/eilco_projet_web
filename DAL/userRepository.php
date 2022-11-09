<?php

require_once("../../DTO/DTORequests/GetUserDTORequests.php");
//include_once("../DTO/DTORequests/GetUserDTOResponse.php");
//include_once("../DTO/DTORequests/DeleteUserDTORequest.php");
include_once("../../DTO/DTORequests/UpdateUserDTORequest.php");
include_once("../../DTO/DTOResponses/UpdateUserDTOResponse.php");
require_once("../../DTO/DTOResponses/DeleteUserDTOResponse.php");
require_once '../../DTO/DTOResponses/SignupDTOResponse.php';
require_once '../../DTO/DTORequests/SignupDTORequest.php';
require_once '../../DTO/DTOResponses/LoginDTOResponse.php';
require_once '../../DTO/DTORequests/LoginDTORequest.php';
require_once '../../DTO/DTOResponses/UpdateUserStatusDTOResponse.php';
require_once 'connection.php';

function getUserQuer($getReq) {
    $conn = openConnection();
    $query = "SELECT * FROM user where id= '" . $getReq->getId() . "';";
    $result = mysqli_query($conn, $query);

    if ($result->num_rows > 0) {
        $profile = new GetUserDTORequests();
        if ($row = $result->fetch_assoc()) {
            $profile->setUsername($row["username"]);
            $profile->setEmail($row["email"]);
            $profile->setId($row["id"]);
            $profile->setIs_admin($row["is_admin"]);
            
        }
    }
    closeConnection($conn);
    return $profile;
}

function login($user) {
    $conn = openConnection();
    $loginResponse = new LoginDTOResponse();
    $loginResponse->setStatus(false);
    try {
        $sql = "SELECT * FROM user WHERE username=? AND password=?"; // SQL with parameters
        $stmt = $conn->prepare($sql);
        $un = $user->getUsername();
        $pass = $user->getPassword();
        $stmt->bind_param("ss", $un, $pass);
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        if ($result->num_rows > 0)
            $loginResponse->setStatus(true);
        closeConnection($conn);
    } catch (Exception $ex) {
        
    }
    return $loginResponse->getStatus();
}

function getUserByUsername($username) {
    $conn = openConnection();
    $userResponse = null;
    
    try {
        $sql = "SELECT * FROM user WHERE username=? "; // SQL with parameters
        $stmt = $conn->prepare($sql);
        
        
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        if ($result->num_rows > 0) {
        $userResponse = new GetUserDTORequests();
        if ($row = $result->fetch_assoc()) {
            $userResponse->setUsername($row["username"]);
            $userResponse->setEmail($row["email"]);
            $userResponse->setPassword($row["password"]);
            $userResponse->setId($row["id"]);
            $userResponse->setIs_admin($row["is_admin"]);
            
        }
        }
        closeConnection($conn);
    } catch (Exception $ex) {
        
    }
    return $userResponse;
}

function search($search) {
    $conn = openConnection();
    $query = "SELECT * FROM user where email like '%" . $search . "%';";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == false) {
        closeConnection($conn);
        return null;
    }

    $i = 0;
    while ($row = mysqli_fetch_array($result)) {
        $profile = new GetUserDTORequests();
        $profile->setId($row["id"]);
        $profile->setUsername($row["username"]);
        $profile->setEmail($row["email"]);
        $profiles[$i] = $profile;
        $i++;
    }
    closeConnection($conn);
    return $profiles;
}

function getAllUsersQuer() {
    $conn = openConnection();
    $query = "SELECT * FROM user;";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == false) {
        closeConnection($conn);
        return null;
    }
    $i = 0;
    while ($row = mysqli_fetch_array($result)) {
        $profile = new GetUserDTORequests();
        $profile->setId($row["id"]);
        $profile->setUsername($row["username"]);
        $profile->setEmail($row["email"]);
        $profiles[$i] = $profile;
        $i++;
    }
    closeConnection($conn);
    return $profiles;
}

function getAllUsersQuer_SuperAdminDisplay() {
    $conn = openConnection();
    $query = "SELECT * FROM user where is_admin>1;";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == false) {
        closeConnection($conn);
        return null;
    }
    $i = 0;
    while ($row = mysqli_fetch_array($result)) {
        $profile = new GetUserDTORequests();
        $profile->setId($row["id"]);
        $profile->setUsername($row["username"]);
        $profile->setEmail($row["email"]);
        $profile->setIs_admin($row["is_admin"]);
        $profiles[$i] = $profile;
        $i++;
    }
    closeConnection($conn);
    return $profiles;
}

function insertUserQuer($user) {
    $conn = openConnection();
    $signupResponse = new SignupDTOResponse();
    $signupResponse->setStatus(false);
    try {
        $sql = "INSERT INTO user (username,password,email,is_admin) VALUES(?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $un = $user->getUsername();
        $em = $user->getEmail();
        $pass = $user->getPassword();
        $ad = 3;
        $stmt->bind_param("sssi", $un, $pass, $em, $ad);
        if ($stmt->execute())
            $signupResponse->setStatus(true);
        $stmt->close();
        closeConnection($conn);
    } catch (Exception $ex) {
        
    }
    return $signupResponse->getStatus();
}

function deleteUserQuer($deleteReq) {
    $deleteResponse = new DeleteUserDTOResponse();
    $deleteResponse->setStatus(false);
    $conn = openConnection();
    try {
        $sql = "DELETE FROM user where id = '" . $deleteReq->getId() . "'";
        if ($conn->query($sql) === TRUE)
            echo "User Record deleted successfully.<br>";
        closeConnection($conn);
        $deleteResponse->setStatus(true);
    } catch (Exception $e) {
        echo "Error deleting record: " . $conn->error;
        echo $e->getMessage();
    } finally {
        return $deleteResponse->getStatus();
    }
}

function updateUserQuer($user) {
    $conn = openConnection();
    $updateResponse = new UpdateUserDTOResponse();
    $updateResponse->setStatus(false);
    try {
        $stmt = $conn->prepare("update user set email = ?,password = ? where username = ?");
        $em = $user->getEmail();
        $pass = $user->getPassword();
        $un= $user->getUsername();
        echo $pass;
        echo $un;
        echo $em;

        $stmt->bind_param("sss", $em, $pass, $un);
        if($stmt->execute()){
            $updateResponse->setStatus(true);
        $stmt->close();
        echo "User Updated successfully.<br>";}
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
        closeConnection($conn);
    } finally {
        closeConnection($conn);
        return $updateResponse->getStatus();
    }
}

function updateUserQuer2($user) {
    $conn = openConnection();
    $updateResponse = new UpdateUserDTOResponse();
    $updateResponse->setStatus(false);
    try {
        $stmt = $conn->prepare("update user set email = ? where username = ?");
        $em = $user->getEmail();
        $un= $user->getUsername();


        echo $un;
        echo $em;

        $stmt->bind_param("ss", $em, $un);
        if($stmt->execute()){
            $updateResponse->setStatus(true);
            $stmt->close();
            echo "User Updated successfully.<br>";}
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
        closeConnection($conn);
    } finally {
        closeConnection($conn);
        return $updateResponse->getStatus();
    }
}


function acceptUserQuer($user) {
    $conn = openConnection();
    $updateResponse = new UpdateUserStatusDTOResponse();
    $updateResponse->setStatus(false);
    try {
        $stmt = $conn->prepare("update user set is_admin = 2 where id = ?");
        $stmt2 = $conn->prepare("delete from request where userId = ?");
        $id = $user->getId();
       

        $stmt->bind_param("i", $id);
        $stmt2->bind_param("i", $id);
        if($stmt->execute()){
           
            if($stmt2->execute())
            $updateResponse->setStatus(true);
            
            $stmt->close();
            echo "User Updated successfully.<br>";}
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
        closeConnection($conn);
    } finally {
        closeConnection($conn);
        return $updateResponse->getStatus();
    }
}
