<?php

class City
{
    private $city;
    private $idCity;



    public function getCity()
    {
        return $this->city;
    }

    public function getdICity()
    {
        return $this->idCity;
    }




    public function setCity($City)
    {
        return $this->city = $City;
    }


    public function setIdCity($IdCity)
    {
        return $this->idCity = $IdCity;
    }
}
