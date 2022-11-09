<?php

require_once("../../BLL/requestsManager.php");
require_once ("../../DTO/DTORequests/DeleteRequestDTORequest.php");

 if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $deleteReq = new DeleteRequestDTORequest();
                    $deleteReq->setId($id);
                    
                    if(rejectRequest($deleteReq))
                    {  echo 'success';
                      echo "<script type='text/javascript'>"
            . " window.location.href='superadminRequests.php';"
            
            . " </script> ";
                    }
                 else
                 {
                    echo "<script type='text/javascript'>"
            . " window.location.href='superadminRequests.php';"
            
            . " </script> ";
                     
                 }
 }
