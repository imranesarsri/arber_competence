<?php

include_once "./Db/Connect.php";
include_once "./Entity/Person.php";
include_once "./Clen/Clen.php";

$directory1 = "PresonData.php";
$directory2 = "./Data/PresonData.php";

if (is_dir($directory1)) {
    include_once $directory1;
} else {
    include_once $directory2;
}



class TraineeData extends PresonData
{

    public function getAll($firstNumber, $lastNumber)
    {
        $sql = "SELECT * FROM `stagiaires` LIMIT $firstNumber,$lastNumber";
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

    public function countData()
    {
        $sql = "SELECT * FROM `stagiaires`";
        $result = DB::connect()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return count($result);
    }



    public function AddTrainee($Add)
    {
        $db = DB::connect();
        $sql = $db->prepare("INSERT INTO stagiaires (`full_name`, `email`, `phone_number`, `address`, `id_city`) 
            VALUES (:FN, :Em, :Ph, :Ad ,:CT)");
        $fullName = Clen::Clen($Add->getFullName());
        $email = Clen::Clen($Add->getEmail());
        $phoneNumber = Clen::Clen($Add->getPhoneNumber());
        $address = Clen::Clen($Add->getAddress());
        $idCity = Clen::Clen($Add->getdICity());

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
        $sql = "DELETE FROM `stagiaires` WHERE `id` = $ID";
        $db->query($sql);
    }

    public function getById($ID)
    {
        $db = DB::connect();
        $sql = " SELECT * FROM `stagiaires`  WHERE `id` = $ID";
        $result = $db->query($sql);
        $resultFetch = $result->fetch();

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
        $db = DB::connect();
        $Update = " UPDATE `stagiaires` 
                        SET `full_name`='$fullName',`email`='$email',
                            `phone_number`='$phoneNumber',`address`='$address',`id_city` = '$cityId' 
                        WHERE `id` = $id ";
        $db->query($Update);
    }

    public function SearchWhere($Where)
    {
        $sql = "SELECT * FROM `stagiaires` $Where ";
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
}