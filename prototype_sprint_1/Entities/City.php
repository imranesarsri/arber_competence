<?php

class City
{
    private $idCity;
    private $city_name;

    public function __construct($IdCity, $City_name)
    {
        $this->idCity = $IdCity;
        $this->city_name = $City_name;
    }

    public function getIdCity()
    {
        return $this->idCity;
    }

    public function getCityName()
    {
        return $this->city_name;
    }
}
