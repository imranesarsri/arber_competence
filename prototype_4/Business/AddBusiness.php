<?php
include_once "./Data/TraineeData.php";
include_once "./Data/CityData.php";
$CityData = new CityData;

$datatCity = $CityData->getAllCity();

if (isset($_POST['btnAdd'])) {


    $fullName       =  $_POST['fullName'];
    $email          =  $_POST['email'];
    $phoneNumber    =  $_POST['phoneNumber'];
    $address        =  $_POST['address'];
    $city           =  $_POST['city'];

    $Add = new  Person;
    $Add->setFullNameId($fullName);
    $Add->setEmail($email);
    $Add->SetphoneNumber($phoneNumber);
    $Add->setAddress($address);
    $Add->setIdCity($city);

    $addTrainee = new TraineeData;
    $addTrainee->AddTrainee($Add);

    header("location:./index.php");
}
include_once "./Client/Add.php";
