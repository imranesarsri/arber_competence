<?php

class StagiairesBLO
{

    public $ErrorMasseg = [];
    private $studentDao;
    public function __construct()
    {
        $this->studentDao = new StagiairesDAO();
    }

    // ================================================================================= //
    // ============================= Get All Stagiaiers ================================ //
    // ================================================================================= //

    public function GetAllStagiaiers()
    {
        return $this->studentDao->GetAllStagiaiers();
    }

    // ================================================================================= //
    // ============================== Is Email Exists ================================== //
    // ================================================================================= //

    public function IsEmailExists($Email, $id, $email_exist)
    {
        return $this->studentDao->IsEmailExists($Email, $id, $email_exist);
    }

    // ================================================================================= //
    // =============================== Add Stagiaiers ================================== //
    // ================================================================================= //

    public function AddStagiaiers($Stagiaiers)
    {
        $requiredInput  = $this->studentDao->requiredInput($Stagiaiers);
        if (empty($requiredInput)) {

            if ($this->IsEmailExists($Stagiaiers->getEmail(), $Stagiaiers->GetId(), false)) {
                return $this->studentDao->AddStagiaiers($Stagiaiers);
            } else {
                $ErrorMassegeEmailExists = "Error Massege Email Exists";
                array_push($this->ErrorMasseg, $ErrorMassegeEmailExists);
            }
        } else {
            foreach ($requiredInput as $Error) {
                array_push($this->ErrorMasseg, $Error);
            }
        }
    }

    // ================================================================================= //
    // ============================== Delete Stagiaire ================================= //
    // ================================================================================= //

    public function DeleteStagiaire($ID)
    {
        return $this->studentDao->DeleteStagiaire($ID);
    }

    public function getStagiaresById($ID)
    {
        return $this->studentDao->getStagiaresById($ID);
    }


    // ================================================================================= //
    // ============================== Update Stagiaire ================================= //
    // ================================================================================= //

    public function UpdateTrainee($Stagiaiers)
    {

        $requiredInput  = $this->studentDao->requiredInput($Stagiaiers);
        if (empty($requiredInput)) {

            if ($this->IsEmailExists($Stagiaiers->getEmail(), $Stagiaiers->GetId(), true)) {
                return $this->studentDao->UpdateTrainee($Stagiaiers);
            } else {
                $ErrorMassegeEmailExists = "Error... Massege Email Exists";
                array_push($this->ErrorMasseg, $ErrorMassegeEmailExists);
            }
        } else {
            foreach ($requiredInput as $Error) {
                array_push($this->ErrorMasseg, $Error);
            }
        }
    }
}