<?php


class Stagiaires
{
    private $id;
    private $fullName;
    private $email;
    private $phone_number;
    private $address;
    private $idCity;



    public function __construct($ID, $FullName, $Email, $Phone_number, $Address, $IdCity)
    {
        $this->id = $ID;
        $this->fullName = $FullName;
        $this->email = $Email;
        $this->phone_number = $Phone_number;
        $this->address = $Address;
        $this->idCity = $IdCity;
    }


    public function GetId()
    {
        return $this->id;
    }

    public function GetFullName()
    {
        return $this->fullName;
    }

    public function GetEmail()
    {
        return $this->email;
    }

    public function GetPhone_number()
    {
        return $this->phone_number;
    }

    public function GetAddress()
    {
        return $this->address;
    }

    public function GetIdCity()
    {
        return $this->idCity;
    }
}
