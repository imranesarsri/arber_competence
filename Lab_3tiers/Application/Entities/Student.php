<?php

class Student
{

    private $id;
    private $name;
    private $email;
    private $dateOfBirth;

    function __construct($id, $name, $email, $dateOfBirth)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->dateOfBirth = $dateOfBirth;
    }

    public function GetId()
    {
        return $this->id;
    }
    public function GetName()
    {
        return $this->name;
    }
    public function GetEmail()
    {
        return $this->email;
    }
    public function GetDateOfBirth()
    {
        return $this->dateOfBirth;
    }
}
