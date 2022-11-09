<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DeleteRequestDTORequest
 *
 * @author atwii
 */
class DeleteRequestDTORequest {
private $id;
    
    function getId() {
        return $this->id;
    }

    function setId($id){
        $this->id = $id;
    }
}
