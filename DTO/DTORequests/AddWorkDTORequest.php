<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AddWorkDTORequest
 *
 * @author atwii
 */
class AddWorkDTORequest {
    
    private $id;
    private $content;
    private $budget;
    private $filename;
    private $iduser;
    private $idadmin;
    private $title;
    
    
    function __construct($content, $budget, $filename, $iduser, $idadmin,$title) {
    
        $this->content = $content;
        $this->budget = $budget;
        $this->filename = $filename;
        $this->iduser = $iduser;
        $this->idadmin = $idadmin;
        $this->title = $title;
        
    }

    


    function getId() {
        return $this->id;
    }

    function getContent() {
        return $this->content;
    }

    function getBudget() {
        return $this->budget;
    }

    function getFilename() {
        return $this->filename;
    }

    function getIduser() {
        return $this->iduser;
    }
    
    function getTitle() {
        return $this->title;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    
    function setId($id) {
        $this->id = $id;
    }

    function setContent($content) {
        $this->content = $content;
    }
    function getIdadmin() {
        return $this->idadmin;
    }

    function setIdadmin($idadmin) {
        $this->idadmin = $idadmin;
    }

        function setBudget($budget) {
        $this->budget = $budget;
    }

    function setFilename($filename) {
        $this->filename = $filename;
    }

    function setIduser($iduser) {
        $this->iduser = $iduser;
    }
    
}
