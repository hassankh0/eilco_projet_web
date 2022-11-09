<?php

require_once '../../DTO/DTOResponses/AddWorkDTOResponse.php';
require_once '../../DTO/DTOResponses/UpdateWorkDTOResponse.php';
require_once '../../DTO/DTORequests/AddWorkDTORequest.php';
require_once '../../DTO/DTORequests/WorkDTORequest.php';
require_once 'connection.php';

function insertWorkQuer($work) {
    $conn = openConnection();
    $workResponse = new AddWorkDTOResponse();
    $workResponse->setStatus(false);
    try {
        $sql = "INSERT INTO work (content,budget,filename,iduser,Idadmin,Title,isdone) VALUES(?,?,?,?,?,?,0)";
        $stmt = $conn->prepare($sql);
        $cont = $work->getContent();
        $budget = $work->getBudget();
        $fn = $work->getFilename();
        $iu = $work->getIduser();
        $ia = $work->getIdadmin();
        $ti = $work->getTitle();

        $stmt->bind_param("sdsiis", $cont, $budget, $fn, $iu, $ia, $ti);
        if ($stmt->execute())
            $workResponse->setStatus(true);
        $stmt->close();
        closeConnection($conn);
    } catch (Exception $ex) {
        
    }
    return $workResponse->getStatus();
}
function updateDone($id){
    $conn = openConnection();
    $updateworkResponse = new UpdateWorkDTOResponse();
    $updateworkResponse->setStatus(false);
    try {
        $stmt = $conn->prepare("update work set isdone = 1 where id = ?");

        $stmt->bind_param("i",$id);
        if($stmt->execute()){
            $updateworkResponse->setStatus(true);
        $stmt->close();
        echo "work Done successfully.<br>";}
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
        closeConnection($conn);
    } finally {
        closeConnection($conn);
        return $updateworkResponse->getStatus();
    }
}

function getAllWorksQuer($idadmin) {
    $conn = openConnection();
    $query = "SELECT * FROM work where isdone=0 AND Idadmin='" . $idadmin . "'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == false) {
        closeConnection($conn);
        return null;
    }
    $i = 0;
    while ($row = mysqli_fetch_array($result)) {
        $work = new WorkDTORequest($row["content"], $row["budget"], $row["Filename"], $row["Iduser"], $row["Idadmin"], $row["Title"]);
        $work->setId($row["Id"]);
        $work->setIsdone($row["isdone"]);
        $works[$i] = $work;
        $i++;
    }
    closeConnection($conn);
    return $works;
}

function getWork($id) {
    $conn = openConnection();
    $work = null;

    try {
        $sql = "SELECT * FROM work WHERE id=? "; // SQL with parameters
        $stmt = $conn->prepare($sql);


        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        if ($result->num_rows > 0) {

            if ($row = $result->fetch_assoc()) {

                $work = new WorkDTORequest($row["content"], $row["budget"], $row["Filename"], $row["Iduser"], $row["Idadmin"], $row["Title"]);
                $work->setId($row["Id"]);
                $work->setIsdone($row["isdone"]);
            }
        }
        closeConnection($conn);
    } catch (Exception $ex) {
        
    }
    return $work;
}
