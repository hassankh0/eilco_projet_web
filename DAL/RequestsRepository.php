<?php
require_once 'connection.php';
require_once '../../DTO/DTORequests/RequestsDTORequest.php';
require_once '../../DTO/DTOResponses/DeleteRequestDTOResponse.php';

function getRequests(){
     $conn = openConnection();
    $query = "SELECT * FROM request;";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == false) {
        closeConnection($conn);
        return null;
    }
    $i = 0;
    while ($row = mysqli_fetch_array($result)) {
        $request = new RequestsDTORequest();
        $request->setId($row["id"]);
        $request->setFullname($row["fullname"]);
        $request->setAddress($row["address"]);
        $request->setAge($row["age"]);
        $request->setFilename($row["filename"]);
        $request->setUserId($row["userId"]);
        $requests[$i] = $request;
        $i++;
    }
    closeConnection($conn);
    return $requests;
}

function deleteRequest($deleteReq){
    
    $deleteResponse = new DeleteRequestDTOResponse();
    $deleteResponse->setStatus(false);
    $conn = openConnection();
    try {
        $sql = "DELETE FROM request where id = '" . $deleteReq->getId() . "'";
        if ($conn->query($sql) === TRUE)
            echo "request Record deleted successfully.<br>";
        closeConnection($conn);
        $deleteResponse->setStatus(true);
    } catch (Exception $e) {
        echo "Error deleting record: " . $conn->error;
        echo $e->getMessage();
    } finally {
        return $deleteResponse->getStatus();
    }
}