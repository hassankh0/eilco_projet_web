<?php

class DeleteMessageDTOResponse{
    private $status;
   
    function getStatus() {
        return $this->status;
    }

    function setStatus($status){
        $this->status = $status;
    }
}

