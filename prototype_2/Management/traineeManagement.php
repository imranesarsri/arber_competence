<?php

include "../Db/connect.php";
include "../Entity/trainee.php";

class TraineeManagement
{

    public function getAll()
    {
        $sql = "SELECT * FROM `stagiaires`";
        $result = DB::connect()->query($sql);
        $Trinees = [];
        foreach ($result as $row) {
            $Trinee = new Trainee;
            $Trinee->setId($row['id']);
            $Trinee->setFullNameId($row['full_name']);
            $Trinee->setEmail($row['email']);
            $Trinee->SetphoneNumber($row['phone_number']);
            $Trinee->setAddress($row['adress']);
            array_push($Trinees, $Trinee);
        }
        return $Trinees;
    }




    public function AddTrainee($Add)
    {
        $db = DB::connect();
        $sql = $db->prepare("INSERT INTO stagiaires (`full_name`, `email`, `phone_number`, `adress`) 
            VALUES (:FN, :Em, :Ph, :Ad)");
        $fullName       = $Add->getFullName();
        $email          = $Add->getEmail();
        $phoneNumber    = $Add->getPhoneNumber();
        $address        = $Add->getAddress();

        $sql->execute([
            'FN' => $fullName,
            'Em' => $email,
            'Ph' => $phoneNumber,
            'Ad' => $address
        ]);
    }


    public function DeleteTrainee($ID)
    {
        $db = DB::connect();
        $sql = "DELETE FROM `stagiaires` WHERE `id` = $ID";
        $db->query($sql);
    }

    public function getById($ID)
    {
        $db             = DB::connect();
        $sql            = "SELECT * FROM `stagiaires` WHERE `id` = $ID";
        $result         = $db->query($sql);
        $resultFetch    = $result->fetch();

        $Trainee = new Trainee;
        $Trainee->setId($resultFetch['id']);
        $Trainee->setFullNameId($resultFetch['full_name']);
        $Trainee->setEmail($resultFetch['email']);
        $Trainee->SetphoneNumber($resultFetch['phone_number']);
        $Trainee->setAddress($resultFetch['adress']);
        return $Trainee;
    }

    public function UpdateDataTrainee($id, $fullName, $email, $phoneNumber, $address)
    {
        $db         = DB::connect();
        $Update     = " UPDATE `stagiaires` 
                        SET `full_name`='$fullName',`email`='$email',
                                    `phone_number`='$phoneNumber',`adress`='$address' 
                        WHERE `id` = $id ";
        $db->query($Update);
    }
}