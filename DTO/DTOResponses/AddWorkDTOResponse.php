<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AddWorkDTOResponse
 *
 * @author atwii
 */
class AddWorkDTOResponse {
    
     private $status;
   
    function getStatus() {
        return $this->status;
    }

    function setStatus($status){
        $this->status = $status;
    }
}
