<?php
ob_start()
?>

<?php

if ($_GET['ID']) {

    $ID = $_GET['ID'];
    $CompetenceBLO = new CompetenceBLO;
    $CompetenceBLO->DeleteCompetence($ID);
    header("location:index.php");
}

?>


<?php
$Content = ob_get_clean();
include_once "./Client/Layout.php";
