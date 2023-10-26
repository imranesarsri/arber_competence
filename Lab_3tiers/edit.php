<?php

require_once('loader.php');

$addSuccess = false;
$updateSuccess = false;
$errorMessage = '';

if (isset($_POST['studentSubmitButton']) && $_POST['studentSubmitButton'] == 'Update Student') {

    $studentBllObj = new StudentBLO();
    $studentId = $_POST['studentId'];
    $studentName = $_POST['studentName'];
    $studentEmail = $_POST['studentEmail'];
    $studentDateOfBirth = $_POST['studentDateOfBirth'];

    $aStudent = new Student($studentId, $studentName, $studentEmail, $studentDateOfBirth);
    $updateResult = $studentBllObj->UpdateStudent($aStudent);

    if ($updateResult > 0) {
        $updateSuccess = true;
    } else {
        if ($studentBllObj->errorMessage != '') {
            $errorMessage = $studentBllObj->errorMessage;
        } else {
            $errorMessage = 'Record can\'t be updated. Operation failed.';
        }
    }
} elseif (isset($_GET['id']) && (int)$_GET['id'] > 0) {

    $studentId = (int)$_GET['id'];
    $action = '';
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    }
    $studentBllObj = new StudentBLO();
    $aStudent = $studentBllObj->GetStudent($studentId);

    if ($action == 'add') {
        $addSuccess = true;
    }
} else {
    header("Location: index.php");
}


$pageTitle = "Edit Student";
include_once("Templates/header.php");

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is a simple implementation of OOP in PHP. This application is created for educational purpose." />
    <meta name="author" content="Arif Uddin" />

    <!-- Bootstrap core CSS -->
    <link href="Assets/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom styles for this application -->
    <link href="Assets/Styles/Styles.css" rel="stylesheet" />
    <title>List of Students</title>
</head>

<body>
    <?php include_once "./Templates/header.php"; ?>


    <div class="page-header">
        <h1 class="container">Edit Student</h1>
    </div>


    <?php if ($addSuccess === true) : ?>
        <div class="alert alert-success">Record added successfully.</div>
    <?php endif; ?>
    <?php if ($updateSuccess === true) : ?>
        <div class="alert alert-success">Record updated successfully.</div>
    <?php endif; ?>
    <?php if ($errorMessage != '') : ?>
        <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
    <?php endif; ?>


    <form action="edit.php" method="post" name="studentInfoForm" id="studentInfoForm" class="form-horizontal">

        <div class="form-group">
            <label for="studentName" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-4">

            <input type="text" value="<?php echo $aStudent->GetName(); ?>" name="studentName" id="studentName" class="form-control" placeholder="Name" />
            </div>
        </div>
        <div class="form-group">
            <label for="studentEmail" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-4">
                <input type="email" value="<?php echo $aStudent->GetEmail(); ?>" name="studentEmail" id="studentEmail" class="form-control" placeholder="Email" />
            </div>
        </div>
        <div class="form-group">
            <label for="studentDateOfBirth" class="col-sm-2 control-label">Date Of Birth</label>
            <div class="col-sm-3">
                <input type="text" value="<?php echo $aStudent->GetDateOfBirth(); ?>" name="studentDateOfBirth" id="studentDateOfBirth" class="form-control" placeholder="Date Of Birth" />
            </div>
        </div>

        <input type="hidden" value="<?php echo $aStudent->GetId(); ?>" name="studentId" id="studentId" />
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
                <input type="submit" name="studentSubmitButton" id="studentSubmitButton" value="Update Student" class="btn  btn-primary" />
            </div>
        </div>

    </form>

    <?php include_once "./Templates/footer.php"; ?>


    <!-- Bootstrap core JavaScript -->
    <script src="Assets/Scripts/jquery-1.11.3.min.js"></script>
    <script src="Assets/bootstrap-3.3.5/js/bootstrap.min.js"></script>

</body>

</html>