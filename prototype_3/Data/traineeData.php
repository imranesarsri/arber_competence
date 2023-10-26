<?php

include_once "../Db/connect.php";
include_once "../Entity/Person.php";

$directory1 = "PresonData.php";
$directory2 = "../Data/PresonData.php";

if (is_dir($directory1)) {
    include_once $directory1;
} else {
    include_once $directory2;
}



class TraineeData extends PresonData
{

    public function getAll()
    {
        $sql = "SELECT * FROM `persson`";
        $result = DB::connect()->query($sql);
        $Trinees = [];
        foreach ($result as $row) {
            $Trinee = new Person;
            $Trinee->setId($row['id']);
            $Trinee->setFullNameId($row['full_name']);
            $Trinee->setEmail($row['email']);
            $Trinee->SetphoneNumber($row['phone_number']);
            $Trinee->setAddress($row['address']);
            $Trinee->setIdCity($row['id_city']);
            array_push($Trinees, $Trinee);
        }
        return $Trinees;
    }



    public function AddTrainee($Add)
    {
        $db = DB::connect();
        $sql = $db->prepare("INSERT INTO persson (`full_name`, `email`, `phone_number`, `address`, `id_city`) 
            VALUES (:FN, :Em, :Ph, :Ad ,:CT)");
        $fullName       = $Add->getFullName();
        $email          = $Add->getEmail();
        $phoneNumber    = $Add->getPhoneNumber();
        $address        = $Add->getAddress();
        $idCity         = $Add->getdICity();

        $sql->execute([
            'FN' => $fullName,
            'Em' => $email,
            'Ph' => $phoneNumber,
            'Ad' => $address,
            'CT' => $idCity
        ]);
    }


    public function DeleteTrainee($ID)
    {
        $db = DB::connect();
        $sql = "DELETE FROM `persson` WHERE `id` = $ID";
        $db->query($sql);
    }

    public function getById($ID)
    {
        $db             = DB::connect();
        $sql            = " SELECT * FROM `persson`  WHERE `id` = $ID";
        $result         = $db->query($sql);
        $resultFetch    = $result->fetch();

        $Trainee = new Person;
        $Trainee->setId($resultFetch['id']);
        $Trainee->setFullNameId($resultFetch['full_name']);
        $Trainee->setEmail($resultFetch['email']);
        $Trainee->SetphoneNumber($resultFetch['phone_number']);
        $Trainee->setAddress($resultFetch['address']);
        $Trainee->setIdCity($resultFetch['id_city']);
        return $Trainee;
    }

    public function UpdateDataTrainee($id, $fullName, $email, $phoneNumber, $address, $cityId)
    {
        $db         = DB::connect();
        $Update     = " UPDATE `persson` 
                        SET `full_name`='$fullName',`email`='$email',
                            `phone_number`='$phoneNumber',`address`='$address',`id_city` = '$cityId' 
                        WHERE `id` = $id ";
        $db->query($Update);
    }
}
