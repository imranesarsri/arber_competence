<?php


class Competence
{

    // =================================================================  
    // ================ Private properties of the class ================   
    // =================================================================

    private $Id;
    private $Reference;
    private $Code;
    private $Nom;
    private $Description;

    // =================================================================  
    // ========================== Getter methods =======================   
    // =================================================================

    public function getId()
    {
        return $this->Id;
    }

    public function getReference()
    {
        return $this->Reference;
    }

    public function getCode()
    {
        return $this->Code;
    }

    public function getNom()
    {
        return $this->Nom;
    }

    public function getDescription()
    {
        return $this->Description;
    }

    // =================================================================  
    // ========================== Setter methods =======================   
    // =================================================================


    public function __construct($ID, $REFERENCE, $CODE, $NOM, $DESCREPTION)
    {
        $this->Id           = $ID;
        $this->Reference    = $REFERENCE;
        $this->Code         = $CODE;
        $this->Nom          = $NOM;
        $this->Description  = $DESCREPTION;
    }
}



/*
ID              Id
REFERENCE       Reference
CODE            Code
NOM             Nom
DESCREPTION     Description 
*/