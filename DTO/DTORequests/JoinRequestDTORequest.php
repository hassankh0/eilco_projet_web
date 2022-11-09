<?php


class JoinRequestDTORequest
{
    private $name;
    private $address;
    private $age;
    private $filename;
    private $userId;


    public function __construct($name, $address, $age, $filename, $userId)
    {
        $this->name = $name;
        $this->address = $address;
        $this->age = $age;
        $this->filename = $filename;
        $this->userId = $userId;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
    }


    public function getAddress()
    {
        return $this->address;
    }


    public function setAddress($address)
    {
        $this->address = $address;
    }


    public function getAge()
    {
        return $this->age;
    }


    public function setAge($age)
    {
        $this->age = $age;
    }


    public function getFilename()
    {
        return $this->filename;
    }


    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    public function getUserId()
    {
        return $this->userId;
    }


    public function setUserId($userId)
    {
        $this->userId = $userId;
    }



}