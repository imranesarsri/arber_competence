<?php
include "../Management/traineeManagement.php";

if (isset($_GET['traiee'])) {
    $id = $_GET['traiee'];
    $delete = new TraineeManagement;
    $delete->DeleteTrainee($id);
    header("location:../Public/index.php");
}