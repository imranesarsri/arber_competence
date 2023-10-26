<?php
include "./loader.php";

if (isset($_GET['Page'])) {
    $ID = $_GET['Page'];


    $StagiairesBLO = new StagiairesBLO;
    $Stagiaires = $StagiairesBLO->getStagiaresById($ID);


    $CityBLO = new CityBLO;
    $Cities = $CityBLO->getAllCity();


    if (isset($_POST['btnUpdate'])) {



        $FullName      = $_POST['FullName'];
        $Email         = $_POST['Email'];
        $PhoneNumber   = $_POST['PhoneNumber'];
        $Address       = $_POST['Address'];
        $City          = $_POST['City'];

        $Stagiaires = new Stagiaires($ID, $FullName, $Email, $PhoneNumber, $Address, $City);
        $StagiairesBLO->UpdateTrainee($Stagiaires);



        if (empty($StagiairesBLO->ErrorMasseg)) {
            header("location:index.php");
        } else {
            $Errors = $StagiairesBLO->ErrorMasseg;
        }
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
                <input name="FullName" value="<?php echo $Stagiaires->GetFullName() ?>" type="text" class="form-control" id="FullName" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input name="Email" value="<?php echo $Stagiaires->getEmail() ?>" type="email" class="form-control" id="Email">
            </div>
            <div class="mb-3">
                <label for="PhoneNumber" class="form-label">Phone Number</label>
                <input name="PhoneNumber" value="<?php echo $Stagiaires->GetPhone_number() ?>" type="number" class="form-control" id="PhoneNumber">
            </div>

            <div class="mb-3">
                <label for="Address" class="form-label">Address</label>
                <input name="Address" value="<?php echo $Stagiaires->GetAddress() ?>" type="text" class="form-control" id="Address">
            </div>


            <label for="City" class="form-label">City : <?= $Stagiaires->GetIdCity() ?></label>
            <select class="form-select" name="City" id="City" aria-label="Default select example">


                <option value="<?php echo $Stagiaires->GetIdCity() ?>">
                    <?= $CityBLO->getCityById($Stagiaires->GetIdCity()) ?>
                </option>


                <?php
                foreach ($Cities as $City) {

                    if ($Stagiaires->GetIdCity() !== $City->getIdCity()) {
                ?>
                        <option value="<?= $City->getIdCity() ?>">
                            <?= $City->getCityName() ?>
                        </option>
                <?php
                    };
                };
                ?>

            </select>
            <button type="submit" name="btnUpdate" class="btn btn-primary mt-3">Update</button>
            <a href="index.php" class="btn btn-secondary mt-3">Cancel</a>
        </form>
    </div>


    <script src="./Assets/bootstrap.min.js"></script>
</body>

</html>