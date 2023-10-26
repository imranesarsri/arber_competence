<?php
include_once "../Data/traineeData.php";

if (isset($_GET['traiee'])) {
    $id = $_GET['traiee'];
    $delete = new TraineeData;
    $delete->DeleteTrainee($id);
    header("location:../Public/index.php");
}
