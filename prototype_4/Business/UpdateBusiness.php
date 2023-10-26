<?php
include_once "./Data/TraineeData.php";
include_once "./Data/CityData.php";

if (isset($_GET['traiee'])) {
    $id = $_GET['traiee'];
    $Update     = new TraineeData;
    $dataTrainee = $Update->getById($id);


    $CityData   = new CityData;
    $cities = $CityData->getAllCity();



    if (isset($_POST['btnUpdate'])) {

        $fullName       = $_POST['fullName'];
        $email          = $_POST['email'];
        $phoneNumber    = $_POST['phoneNumber'];
        $address        = $_POST['address'];
        $cityId           = $_POST['cityId'];
        $Update->UpdateDataTrainee($id, $fullName, $email, $phoneNumber, $address, $cityId);
        header("location:./index.php");
    }
}
include_once "./Client/Update.php";
