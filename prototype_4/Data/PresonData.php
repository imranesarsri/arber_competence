<?php
include_once "./Entity/Person.php";
abstract class PresonData extends Person
{

    abstract public function getAll();
    abstract public function AddTrainee($Add);
    abstract public function DeleteTrainee($ID);
    abstract public function getById($ID);
    abstract public function UpdateDataTrainee($id, $fullName, $email, $phoneNumber, $address, $city);
}
