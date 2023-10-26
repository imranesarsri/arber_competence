<?php

class Person
{
    // properties
    private $id;
    private $fullName;
    private $email;
    private $phoneNumber;
    private $address;
    private $idCity;




    // Getter method to retrieve

    public function getId()
    {
        return $this->id;
    }

    public function getFullName()
    {
        return $this->fullName;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getdICity()
    {
        return $this->idCity;
    }



    // Setter method to retrieve

    public function setId($id)
    {
        return $this->id = $id;
    }


    public function setFullNameId($FullName)
    {
        return $this->fullName = $FullName;
    }


    public function setEmail($Email)
    {
        return $this->email = $Email;
    }


    public function SetphoneNumber($PhoneNumber)
    {
        return $this->phoneNumber = $PhoneNumber;
    }


    public function setAddress($Address)
    {
        return $this->address = $Address;
    }



    public function setIdCity($IdCity)
    {
        return $this->idCity = $IdCity;
    }
}


// `id`, `full_name`, `email`, `phone_number`, `Address` `id_city`, `city_name`