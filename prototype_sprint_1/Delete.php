<?php

include "./loader.php";
if (isset($_GET['Page'])) {
    $ID = $_GET['Page'];
    $StagiairesBLO = new StagiairesBLO;
    $StagiairesBLO->DeleteStagiaire($ID);
    header("location:index.php");
}
