<?php

include "./loader.php";

$StagiairesBLO = new StagiairesBLO;
$Stagiaires = $StagiairesBLO->GetAllStagiaiers();
$CityBLO = new CityBLO;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Assets/bootstrap.min.css">
</head>

<body>
    <?php include_once "./Templates/Navbare.php"; ?>

    <div class="container">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Stagiaires as $Stagiaire) { ?>
                    <tr>
                        <th scope="row">
                            <?= $Stagiaire->GetId() ?>
                        </th>
                        <th scope="row">
                            <?= $Stagiaire->GetFullName() ?>
                        </th>
                        <th>
                            <?= $Stagiaire->GetEmail() ?>
                        </th>
                        <th>
                            <?= $Stagiaire->GetPhone_number() ?>
                        </th>
                        <th>
                            <?= $Stagiaire->GetAddress() ?>
                        </th>
                        <th>
                            <?= $CityBLO->getCityById($Stagiaire->GetIdCity()) ?>
                        </th>
                        <th>
                            <a class="btn btn-danger" name="deleteStagiaire" href="Delete.php?Page=<?= $Stagiaire->GetId() ?>">Delete</a>
                            <a class="btn btn-light" href="Update.php?Page=<?= $Stagiaire->GetId() ?>">Update</a>
                        </th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="./Assets/bootstrap.min.js"></script>
</body>

</html>