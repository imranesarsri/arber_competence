<?php

class StagiairesDAO
{

    // ================================================================================= //
    // ============================= Get All Stagiaiers ================================ //
    // ================================================================================= //

    public function GetAllStagiaiers()
    {
        $sql = "SELECT * FROM `stagiaires`";
        $result = Connect::DB()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $Stagiaiers = [];
        foreach ($result as $row) {
            $Stagiaire = new Stagiaires($row['id'], $row['full_name'], $row['email'], $row['phone_number'], $row['address'], $row['idCity']);
            array_push($Stagiaiers, $Stagiaire);
        }
        return $Stagiaiers;
    }


    // ================================================================================= //
    // ================================= Add Stagiaiers ================================ //
    // ================================================================================= //

    public function AddStagiaiers($Stagiaiers)
    {
        $sql = Connect::DB()->prepare("INSERT INTO stagiaires (`full_name`, `email`, `phone_number`, `address`, `idCity`) 
        VALUES (:FN, :Em, :Ph, :Ad ,:CT)");
        $fullName       = $Stagiaiers->GetFullName();
        $email          = $Stagiaiers->GetEmail();
        $phoneNumber    = $Stagiaiers->GetPhone_number();
        $address        = $Stagiaiers->GetAddress();
        $idCity         = $Stagiaiers->GetIdCity();

        $sql->execute([
            'FN' => $fullName,
            'Em' => $email,
            'Ph' => $phoneNumber,
            'Ad' => $address,
            'CT' => $idCity
        ]);

        $lastInsertId = Connect::DB()->lastInsertId();
        return $lastInsertId;
    }

    // ================================================================================= //
    // =============================== Delete Stagiaiers =============================== //
    // ================================================================================= //

    public function DeleteStagiaire($ID)
    {
        $sql = "DELETE FROM `stagiaires` WHERE `id` = $ID";
        Connect::DB()->query($sql);
    }

    // ================================================================================= //
    // ============================= get Stagiares By Id =============================== //
    // ================================================================================= //
    public function getStagiaresById($ID)
    {
        $sql = "SELECT * FROM `stagiaires` WHERE `id` = $ID";
        $result = Connect::DB()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $Stagiaire = new Stagiaires($row['id'], $row['full_name'], $row['email'], $row['phone_number'], $row['address'], $row['idCity']);
        }
        return $Stagiaire;
    }

    // ================================================================================= //
    // ========================== Update Stagiares By Id =============================== //
    // ================================================================================= //

    public function UpdateTrainee($Stagiaiers)
    {
        $updateQuery = "UPDATE stagiaires
                            SET
                                full_name = :full_name,
                                email = :email,
                                phone_number = :phone_number,
                                address = :address,
                                idCity = :idCity
                            WHERE id = :id";

        $stm = Connect::DB()->prepare($updateQuery);

        $stm->bindValue(':full_name', $Stagiaiers->getFullName());
        $stm->bindValue(':email', $Stagiaiers->getEmail());
        $stm->bindValue(':phone_number', $Stagiaiers->GetPhone_number());
        $stm->bindValue(':address', $Stagiaiers->GetAddress());
        $stm->bindValue(':idCity', $Stagiaiers->GetIdCity());
        $stm->bindValue(':id', $Stagiaiers->GetId());

        $stm->execute();

        return $stm->rowCount();
    }


    // ================================================================================= //
    // ========================= VALIDATION required Input ============================= //
    // ================================================================================= //



    public function requiredInput($Stagiaiers)
    {
        $Errors = [];
        if (empty($Stagiaiers->GetFullName())) {
            $massegFullName = "full name is requird";
            array_push($Errors, $massegFullName);
        }

        if (empty($Stagiaiers->GetEmail())) {
            $massegEmail = " Email is requird";
            array_push($Errors, $massegEmail);
        }

        if (empty($Stagiaiers->GetPhone_number())) {
            $massegPhoneNumber = " Phone Number  is requird";
            array_push($Errors, $massegPhoneNumber);
        }

        if (empty($Stagiaiers->GetAddress())) {
            $massegAdderss = " Address  is requird";
            array_push($Errors, $massegAdderss);
        }

        return $Errors;
    }

    // ================================================================================= //
    // ============================= VALIDATION Email  ================================= //
    // ================================================================================= //

    public function isEmailExists($email, $id, $email_exist)
    {
        if ($email_exist == false) {
            $sql = "SELECT * FROM `stagiaires` WHERE `email` = :email";
            $stm = Connect::DB()->prepare($sql);
            $stm->bindValue(':email', $email);
        } else {
            $sql = "SELECT * FROM `stagiaires` WHERE `email` = :email AND `id` != :id ";
            $stm = Connect::DB()->prepare($sql);
            $stm->bindValue(':email', $email);
            $stm->bindValue(':id', $id);
        }


        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return count($result) > 0 ? false : true;
    }
}
