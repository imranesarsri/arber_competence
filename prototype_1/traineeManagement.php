<?php

include "connect.php";
include "trainee.php";

class TraineeManagement
{


    public function getAll()
    {
        $sql = "SELECT * FROM `stagiaires` ";
        $result = DB::connect()->query($sql);
        $Trainees = [];
        while ($row = $result->fetch()) {
            $Trainee = new Trainee();
            $Trainee->setId($row['id']);
            $Trainee->setFullNameId($row['full_name']);
            $Trainee->setEmail($row['email']);
            $Trainee->SetphoneNumber($row['phone_number']);
            $Trainee->setAdress($row['adress']);
            array_push($Trainees, $Trainee);
        }
        return $Trainees;
    }
}


