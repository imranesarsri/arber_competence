<?php

class CompetenceBLO
{
    private $CompetenceDAO;
    private array $ErrorsMassegs = [];

    public function getErrorsMassegs()
    {
        return $this->ErrorsMassegs;
    }

    public function setErrorsMassegs($Massegs)
    {
        $this->ErrorsMassegs[] = $Massegs;
    }



    public function __construct()
    {
        $this->CompetenceDAO = new CompetenceDAO;
    }

    // ========================================================
    // ================== GET ALL COMPETENCES =================
    // ========================================================

    public function GetAllCompetence()
    {
        return $this->CompetenceDAO->GetAllCompetence();
    }

    // ========================================================
    // ================= GET COMPETENCE BY ID =================
    // ========================================================

    public function GetCompetenceByID($ID)
    {
        return $this->CompetenceDAO->GetCompetenceByID($ID);
    }

    // ========================================================
    // ==================== ADD COMPETENCEs ===================
    // ========================================================


    public function AddCompetence($Competence)
    {
        try {
            $this->Validation(
                $Competence,
                function ($Competence) {
                    return [
                        'Reference' => $this->isReferenceExists($Competence->getReference(), null, false),
                        'Nom' => $this->isNomExists($Competence->getNom(), null, false),
                    ];
                },
                function ($Competence) {
                    $this->CompetenceDAO->AddCompetence($Competence);
                }
            );
        } catch (Exception $e) {
            // Handle the exception, log it, or rethrow if needed
            $this->setErrorsMassegs($e->getMessage());
        }
    }
    // ========================================================
    // ================== DELETE COMPETENCE ===================
    // ========================================================

    public function DeleteCompetence($ID)
    {
        return $this->CompetenceDAO->DeleteCompetence($ID);
    }

    // ========================================================
    // ================== UPDATE COMPETENCE ===================
    // ========================================================

    public function UpdateCompetence($Competence)
    {
        try {

            $this->Validation(
                $Competence,
                function ($Competence) {
                    return [
                        'Reference'     => $this->isReferenceExists($Competence->getReference(), $Competence->getId(), true),
                        'Nom'           => $this->isNomExists($Competence->getNom(), $Competence->getId(), true),
                    ];
                },
                function ($Competence) {
                    $this->CompetenceDAO->UpdateCompetence($Competence);
                }
            );
        } catch (Exception $e) {
            // Handle the exception, log it, or rethrow if needed
            $this->setErrorsMassegs($e->getMessage());
        }
    }




    // ========================================================
    // ====================== VALIDATION ======================
    // ===================* Required Input *===================
    // ========================================================

    public function requiredInput($Competence)
    {
        return $this->CompetenceDAO->requiredInput($Competence);
    }



    // ========================================================
    // ====================== VALIDATION ======================
    // =================* Reference is Exists *================
    // ========================================================

    public function isReferenceExists($REFERENCE, $ID, $AlreadyExist)
    {
        return $this->CompetenceDAO->isReferenceExists($REFERENCE, $ID, $AlreadyExist);
    }


    // ========================================================
    // ====================== VALIDATION ======================
    // ===================* NOM is Exists *====================
    // ========================================================

    public function isNomExists($NOM, $ID, $AlreadyExist)
    {
        return $this->CompetenceDAO->isNomExists($NOM, $ID, $AlreadyExist);
    }


    // ========================================================
    // ====================== VALIDATION ======================
    // =====================* Validation *=====================
    // ========================================================

    private function Validation($Competence, $isExistenceChecksCallback, $actionCallback)
    {
        $requiredInput = $this->requiredInput($Competence);

        if (empty($requiredInput)) {
            $isExistenceChecks = $isExistenceChecksCallback($Competence);
            // $errors = [];

            foreach ($isExistenceChecks as $Masseg => $exists) {
                if ($exists) {
                    // Instead of accumulating errors, throw an exception
                    throw new Exception("Ce $Masseg existe déjà dans la base de données.");
                }
            }


            $actionCallback($Competence);
        } else {
            foreach ($requiredInput as $Error) {
                // Instead of accumulating errors, throw an exception
                throw new Exception($Error);
            }
        }
    }
}
