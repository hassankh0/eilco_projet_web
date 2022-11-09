<?php

class MessageDTORequest {

    private $id;
    private $content;
    private $budget;
    private $filename;
    private $iduser;
    private $title;
    
    function __construct($title, $content, $budget, $filename, $iduser) {
        $this->content = $content;
        $this->budget = $budget;
        $this->filename = $filename;
        $this->iduser = $iduser;
        $this->title = $title;
    }
    
   
    function getTitle() {
        return $this->title;
    }

    function setTitle($title) {
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

    function setId($id) {
        $this->id = $id;
    }

    function setContent($content) {
        $this->content = $content;
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
