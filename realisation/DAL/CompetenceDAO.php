<?php


class CompetenceDAO
{

    // ========================================================
    // ================== GET ALL COMPETENCE ==================
    // ========================================================

    public function GetAllCompetence()
    {
        $sql = "SELECT * FROM `competences` ";
        $result = Connect::DB()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $Competences = [];
        foreach ($result as $row) {
            $Competence = new Competence($row['ID'], $row['REFERENCE'], $row['CODE'], $row['NOM'], $row['DESCREPTION']);
            array_push($Competences, $Competence);
        }
        return $Competences;
    }

    // ========================================================
    // ================= GET COMPETENCE BY ID =================
    // ========================================================

    public function GetCompetenceByID($ID)
    {
        $sql = "SELECT * FROM `competences` WHERE `ID` = $ID ";
        $result = Connect::DB()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $Competence = new Competence($row['ID'], $row['REFERENCE'], $row['CODE'], $row['NOM'], $row['DESCREPTION']);
        }
        return $Competence;
    }

    // ========================================================
    // ==================== ADD COMPETENCE ====================
    // ========================================================

    public function AddCompetence($Competence)
    {
        $Insert = Connect::DB()->prepare("INSERT INTO competences (`REFERENCE`, `CODE`, `NOM`, `DESCREPTION`) 
        VALUES (:RE, :CO, :NO, :DE )");

        $Reference          = self::Clen($Competence->getReference());
        $Code               = self::Clen($Competence->getCode());
        $Nom                = self::Clen($Competence->getNom());
        $Description        = self::Clen($Competence->getDescription());

        $Insert->execute([
            'RE' => $Reference,
            'CO' => $Code,
            'NO' => $Nom,
            'DE' => $Description
        ]);
    }

    // ========================================================
    // ================== DELETE COMPETENCE ===================
    // ========================================================

    public function DeleteCompetence($ID)
    {
        $Delete = "DELETE FROM `competences` WHERE `ID` = $ID";
        Connect::DB()->query($Delete);
    }

    // ========================================================
    // ================== UPDATE COMPETENCE ===================
    // ========================================================

    public function UpdateCompetence($Competence)
    {
        $Update = "UPDATE competences
                            SET
                            REFERENCE = :REFERENCE,
                            CODE = :CODE,
                            NOM = :NOM,
                            DESCREPTION = :DESCREPTION
                            WHERE ID = :ID";

        $stm = Connect::DB()->prepare($Update);

        $stm->bindValue(':REFERENCE', self::Clen($Competence->getReference()));
        $stm->bindValue(':CODE', self::Clen($Competence->getCode()));
        $stm->bindValue(':NOM', self::Clen($Competence->getNom()));
        $stm->bindValue(':DESCREPTION', self::Clen($Competence->getDescription()));
        $stm->bindValue(':ID', self::Clen($Competence->getId()));

        $stm->execute();

        return $stm->rowCount();
    }


    // ========================================================
    // ====================== VALIDATION ======================
    // ===================* Required Input *===================
    // ========================================================

    public function requiredInput($Competence)
    {
        $Competences = [
            'getReference'    => 'Reference',
            'getNom'          => 'Nom',
        ];

        $errors = [];

        foreach ($Competences as $Getter => $Massegs) {
            $value = $Competence->{$Getter}();

            if (empty($value)) {
                $errors[] = "$Massegs est requise";
            }
        }
        return $errors;
    }




    // ========================================================
    // ====================== VALIDATION ======================
    // ======================* is Exists *=====================
    // ========================================================

    private function isValueExists($Column, $Value, $ID, $AlreadyExist)
    {
        $sql = "SELECT * FROM `competences` WHERE `$Column` = :value";

        if ($AlreadyExist) {
            $sql .= " AND `ID` != :ID";
        }

        $stm = Connect::DB()->prepare($sql);
        $stm->bindValue(':value', self::Clen($Value));

        if ($AlreadyExist) {
            $stm->bindValue(':ID', $ID);
        }

        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return count($result) > 0 ? true : false;
    }

    // ========================================================
    // ====================== VALIDATION ======================
    // ================* REFERENCE is Exists *=================
    // ========================================================

    public function isReferenceExists($REFERENCE, $ID, $AlreadyExist)
    {
        return $this->isValueExists('REFERENCE', $REFERENCE, $ID, $AlreadyExist);
    }


    // ========================================================
    // ====================== VALIDATION ======================
    // ===================* NOM is Exists *====================
    // ========================================================

    public function isNomExists($NOM, $ID, $AlreadyExist)
    {
        return $this->isValueExists('NOM', $NOM, $ID, $AlreadyExist);
    }


    // ========================================================
    // ====================== VALIDATION ======================
    // =====================* Clen value *=====================
    // ========================================================

    public static function Clen($InputValue)
    {
        // Remove leading and trailing whitespace
        $InputValue = trim($InputValue);

        // Convert special characters to HTML entities
        $InputValue = htmlspecialchars($InputValue, ENT_QUOTES, 'UTF-8');

        // Remove HTML and PHP tags
        $InputValue = strip_tags($InputValue);

        // Convert to ucwords
        $InputValue = ucwords($InputValue);

        return $InputValue;
    }
}
