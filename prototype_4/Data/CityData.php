<?php
include_once "./Db/Connect.php";
include_once "./Entity/City.php";

class CityData extends City
{




    public function getAllCity()
    {
        $sql = "SELECT `id_city`, `city_name` FROM `city`";
        $result = DB::connect()->query($sql);
        $Cities = [];
        foreach ($result as $row) {
            $City = new City;
            $City->setIdCity($row['id_city']);
            $City->setCity($row['city_name']);
            array_push($Cities, $City);
        }
        return $Cities;
    }

    public function getCityById($ID)
    {
        $sql = "SELECT `city_name` FROM `city` WHERE `id_city` = $ID";
        $result = DB::connect()->query($sql);
        $Cities = $result->fetch();
        return $this->setCity($Cities['city_name']);
    }

    public function CountCity()
    {
        $sql = "SELECT city.id_city AS CityID ,city.city_name AS CityName , COUNT(persson.id) AS CityCount 
                FROM persson
                INNER JOIN city ON persson.id_city = city.id_city 
                GROUP BY city.id_city , city.city_name;";
        $result = DB::connect()->query($sql);
        $Count = $result->fetchAll(PDO::FETCH_ASSOC);
        return $Count;
    }
}
