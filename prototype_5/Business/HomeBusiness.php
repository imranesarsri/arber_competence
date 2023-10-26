<?php
include_once "./Data/TraineeData.php";
include_once "./Data/CityData.php";
include_once "./Clen/Clen.php";

$firstNumber    = 0;
$itemsPerPage   = 5;
if (isset($_POST['pagination'])) {
    $firstNumber = ($_POST['pagination'] * 5) - 5;
}

$Trainee = new TraineeData;
$CityData   = new CityData;
$DataCities = $CityData->getAllCity();


if (isset($_POST['Search'])) {
    $cityFilter = Clen::Clen($_POST['City']) ?? '0';
    $fullNameFilter = Clen::Clen($_POST['fullName']) ?? '';

    if ($cityFilter !== '0' && $fullNameFilter !== '') {
        $traineeData = $Trainee->searchWhere("WHERE `full_name` LIKE '%{$fullNameFilter}%' AND `id_city` = '{$cityFilter}'");
        $pages = ceil(count($traineeData) / $itemsPerPage);
    } elseif ($cityFilter !== '0') {
        $traineeData = $Trainee->searchWhere("WHERE `id_city` = '{$cityFilter}'");
        $pages = ceil(count($traineeData) / $itemsPerPage);
    } elseif ($fullNameFilter !== '') {
        $traineeData = $Trainee->searchWhere("WHERE `full_name` LIKE '%{$fullNameFilter}%'");
        $pages = ceil(count($traineeData) / $itemsPerPage);
    } else {
        $traineeData = $Trainee->getAll($firstNumber, $itemsPerPage);
        $pages = ceil($Trainee->countData() / $itemsPerPage);
    }
} else {
    $traineeData = $Trainee->getAll($firstNumber, $itemsPerPage);
    $pages = ceil($Trainee->countData() / $itemsPerPage);
}




include_once "./Client/Home.php";
