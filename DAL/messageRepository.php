<?php

require_once '../../DTO/DTOResponses/MessageDTOResponse.php';
require_once '../../DTO/DTORequests/MessageDTORequest.php';
require_once '../../DTO/DTOResponses/DeleteMessageDTOResponse.php';
require_once '../../DTO/DTORequests/DeleteMessageDTORequest.php';
require_once 'connection.php';

function insertMessageQuer($message) {
    $conn = openConnection();
    $messageResponse = new MessageDTOResponse();
    $messageResponse->setStatus(false);
    try {
        $sql = "INSERT INTO message (title,content,budget,filename,idUser) VALUES(?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $ti = $message->getTitle();
        $cont = $message->getContent();
        $budget = $message->getBudget();
        $fn = $message->getFilename();
        $iu = $message->getIduser();
        $stmt->bind_param("ssdsi", $ti, $cont, $budget, $fn, $iu);
        if ($stmt->execute())
            $messageResponse->setStatus(true);
        $stmt->close();
        closeConnection($conn);
    } catch (Exception $ex) {
        
    }
    return $messageResponse->getStatus();
}

function getAllMessages() {
    $conn = openConnection();
    $query = "SELECT * FROM message;";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == false) {
        closeConnection($conn);
        return null;
    }
    $i = 0;
    while ($row = mysqli_fetch_array($result)) {
        $message = new MessageDTORequest($row["title"],$row["content"],$row["budget"],$row["filename"],$row["idUser"]);
       $message->setId($row["id"]);
    /*    $message->setContent($row["content"]);
        $message->setBudget($row["budget"]);
        $message->setFilename($row["filename"]);*/
        $messages[$i] = $message;
        $i++;
    }
    closeConnection($conn);
    return $messages;
}

function getMessage($id) {
    $conn = openConnection();
    $messageResponse = null;
    
    try {
        $sql = "SELECT * FROM message WHERE id=? "; // SQL with parameters
        $stmt = $conn->prepare($sql);
        
        
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        if ($result->num_rows > 0) {
       
        if ($row = $result->fetch_assoc()) {
            
             $messageResponse = new MessageDTORequest($row["title"],$row["content"],$row["budget"],$row["filename"],$row["idUser"]);
            $messageResponse->setId($row["id"]);
            
           
            
        }
        }
        closeConnection($conn);
    } catch (Exception $ex) {
        
    }
    return $messageResponse;
}

function deletemessageQuer($MessageReq) {
    $deleteResponse = new DeleteMessageDTOResponse();
    $deleteResponse->setStatus(false);
    $conn = openConnection();
    try {
        $sql = "DELETE FROM message where id = '" . $MessageReq->getId() . "'";
        if ($conn->query($sql) === TRUE)
            echo "Message Record deleted successfully.<br>";
        closeConnection($conn);
        $deleteResponse->setStatus(true);
    } catch (Exception $e) {
        echo "Error deleting record: " . $conn->error;
        echo $e->getMessage();
    } finally {
        return $deleteResponse->getStatus();
    }
}