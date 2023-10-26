<?php
include_once "./Data/TraineeData.php";
include_once "./Data/CityData.php";
include_once "./Clen/Clen.php";

if (isset($_GET['traiee'])) {
    $id                 = $_GET['traiee'];
    $Update             = new TraineeData;
    $dataTrainee        = $Update->getById($id);
    $CityData           = new CityData;
    $cities             = $CityData->getAllCity();

    if (isset($_POST['btnUpdate'])) {

        $fullName       = Clen::Clen($_POST['fullName']);
        $email          = Clen::Clen($_POST['email']);
        $phoneNumber    = Clen::Clen($_POST['phoneNumber']);
        $address        = Clen::Clen($_POST['address']);
        $cityId         = Clen::Clen($_POST['cityId']);
        $Update->UpdateDataTrainee($id, $fullName, $email, $phoneNumber, $address, $cityId);
        header("location:./index.php");
    }
}
include_once "./Client/Update.php";
