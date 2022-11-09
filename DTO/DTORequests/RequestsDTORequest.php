<?php


class RequestsDTORequest {
    private $id, $fullname, $address, $age, $filename, $userId;
    

        
    function getId() {
        return $this->id;
    }

    function getFullname() {
        return $this->fullname;
    }

    function getAddress() {
        return $this->address;
    }

    function getAge() {
        return $this->age;
    }

    function getFilename() {
        return $this->filename;
    }

    function getUserId() {
        return $this->userId;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFullname($fullname) {
        $this->fullname = $fullname;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setAge($age) {
        $this->age = $age;
    }

    function setFilename($filename) {
        $this->filename = $filename;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }


}
