<?php


class Trainee
{
    // properties
    private $id;
    private $fullName;
    private $email;
    private $phoneNumber;
    private $adress;



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
        return $this->adress;
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


    public function setAdress($Adress)
    {
        return $this->adress = $Adress;
    }
}


// `id`, `full_name`, `email`, `phone_number`, `adress`