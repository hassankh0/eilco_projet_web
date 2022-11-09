<?php

require_once '../../../DTO/DTOResponses/JoinRequestDTOResponse.php';
require_once '../../../DTO/DTORequests/JoinRequestDTORequest.php';
require_once 'connection.php';

function insertRequest($request)
{
    $conn = openConnection();
    $joinRequestResponse = new JoinRequestDTOResponse();
    $joinRequestResponse->setStatus(false);
    try {
        $sql = "INSERT INTO request (fullname,address,age,filename,userId) VALUES(?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $fullname=$request->getName();
        $address=$request->getAddress();
        $age=$request->getAge();
        $filename=$request->getFilename();
        $userId=$request->getUserId();

        $stmt->bind_param("ssisi", $fullname, $address, $age, $filename, $userId);
        if ($stmt->execute())
            $joinRequestResponse->setStatus(true);
        $stmt->close();
        closeConnection($conn);
    } catch (Exception $ex) {

    }
    return $joinRequestResponse->getStatus();
}