<?php


include_once "./Data/TraineeData.php";
include_once "./Data/CityData.php";
$Trainee = new TraineeData;
$traineeData = $Trainee->getAll();
$CityData   = new CityData;


include_once "./Client/Home.php";
