<?php

require_once('loader.php');
$errorMessage = '';

if (isset($_POST['studentSubmitButton']) && $_POST['studentSubmitButton'] == 'Add Student') {

    $studentBllObj = new StudentBLO();
    $studentName = $_POST['studentName'];
    $studentRoll = $_POST['studentRoll'];
    $studentEmail = $_POST['studentEmail'];
    $studentDateOfBirth = $_POST['studentDateOfBirth'];

    $newStudent = new Student(0, $studentName, $studentEmail, $studentDateOfBirth);
    $addStudentResult = $studentBllObj->AddStudent($newStudent);
    print_r($addStudentResult);
    echo "ssssssssss";
    if ($addStudentResult > 0) {
        header("Location: edit.php?id=" . $addStudentResult . '&action=add');
    } else {
        if ($studentBllObj->errorMessage != '') {
            $errorMessage = $studentBllObj->errorMessage;
        } else {
            $errorMessage = 'Record can\'t be added. Operation failed.';
        }
    }
}

$pageTitle = 'Add New Student';
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



    <div class="page-header">
        <h1 class="container">Add New Student</h1>
    </div>

    <?php if ($errorMessage != '') : ?>
        <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
    <?php endif;



    ?>

    <?php include_once "./Templates/header.php"; ?>

    <form action="add.php" method="POST" name="studentInfoForm" id="studentInfoForm" class="form-horizontal">
        <div class="form-group">
            <label for="studentName" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-4">
                <input type="text" name="studentName" id="studentName" class="form-control" placeholder="Name" />
            </div>
        </div>
        <div class="form-group">
            <label for="studentEmail" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-4">
                <input type="email" name="studentEmail" id="studentEmail" class="form-control" placeholder="Email" />
            </div>
        </div>
        <div class="form-group">
            <label for="studentDateOfBirth" class="col-sm-2 control-label">Date Of Birth</label>
            <div class="col-sm-3">
                <input type="text" name="studentDateOfBirth" id="studentDateOfBirth" class="form-control" placeholder="Date Of Birth" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
                <input type="submit" name="studentSubmitButton" id="studentSubmitButton" value="Add Student" class="btn  btn-primary" />
            </div>
        </div>

    </form>


    <?php include_once "./Templates/footer.php"; ?>


    <!-- Bootstrap core JavaScript -->
    <script src="Assets/Scripts/jquery-1.11.3.min.js"></script>
    <script src="Assets/bootstrap-3.3.5/js/bootstrap.min.js"></script>

</body>

</html>