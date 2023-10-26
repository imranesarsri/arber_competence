<?php
include "./loader.php";

// Create instances of StagiairesBLO and CityBLO
$StagiairesBLO = new StagiairesBLO;
$CityBLO = new CityBLO;

// Get all cities
$Cities = $CityBLO->getAllCity();

// Check if the form is submitted
if (isset($_POST['AddStagiaire'])) {

    // Get form data
    $FullName      = $_POST['FullName'];
    $Email         = $_POST['Email'];
    $PhoneNumber   = $_POST['PhoneNumber'];
    $Address       = $_POST['Address'];
    $City          = $_POST['City'];

    // Create a new Stagiaires object
    $Stagiaires = new Stagiaires(0, $FullName, $Email, $PhoneNumber, $Address, $City);

    // Add Stagiaires using StagiairesBLO
    $StagiairesBLO->AddStagiaiers($Stagiaires);

    // Check for errors
    if (empty($StagiairesBLO->ErrorMasseg)) {
        // Redirect to the index page if successful
        header("location:index.php");
    } else {
        // Store errors if any
        $Errors = $StagiairesBLO->ErrorMasseg;
    }
}
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
        <?php if (isset($Errors)) { ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?php

                    foreach ($Errors as $Error) {
                    ?>
                        <li><?= $Error ?></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        <?php } ?>


        <form method="POST">
            <div class="mb-3">
                <label for="FullName" class="form-label">Full Name</label>
                <input name="FullName" type="text" class="form-control" id="FullName" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input name="Email" type="email" class="form-control" id="Email">
            </div>
            <div class="mb-3">
                <label for="PhoneNumber" class="form-label">Phone Number</label>
                <input name="PhoneNumber" type="number" class="form-control" id="PhoneNumber">
            </div>

            <div class="mb-3">
                <label for="Address" class="form-label">Address</label>
                <input name="Address" type="text" class="form-control" id="Address">
            </div>


            <label for="City" class="form-label">City</label>
            <select class="form-select" name="City" id="City" aria-label="Default select example">
                <?php foreach ($Cities as $City) : ?>
                    <option value="<?= $City->getIdCity() ?>">
                        <?= $City->getCityName() ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit" name="AddStagiaire" class="btn btn-primary mt-3">Add</button>
            <a href="index.php" class="btn btn-secondary mt-3">Cancel</a>

        </form>
    </div>


    <script src="./Assets/bootstrap.min.js"></script>
</body>

</html>