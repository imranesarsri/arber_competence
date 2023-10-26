<?php
require_once('loader.php');

$studentBlo = new StudentBLO();
$all_students_html = '';
$all_students = $studentBlo->GetAllStudents();

$studentBllObj = new StudentBLO();
$deleteSuccess = false;
$errorMessage = '';

if (isset($_REQUEST['delete']) && $_REQUEST['delete'] == 'yes') {

    $studentId = (int) $_REQUEST['id'];
    $deleteResult = $studentBllObj->DeleteStudent($studentId);

    if ($deleteResult > 0) {
        $deleteSuccess = true;
    } else {
        if ($studentBllObj->errorMessage != '') {
            $errorMessage = $studentBllObj->errorMessage;
        } else {
            $errorMessage = 'Record can\'t be deleted. Operation failed.';
        }
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="This is a simple implementation of OOP in PHP. This application is created for educational purpose." />
    <meta name="author" content="Arif Uddin" />

    <!-- Bootstrap core CSS -->
    <link href="Assets/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom styles for this application -->
    <link href="Assets/Styles/Styles.css" rel="stylesheet" />
    <title>List of Students</title>
</head>

<body>
    <?php include_once "./Templates/header.php"; ?>

    <header class="page-header container">
        <h1>List of Students</h1>
    </header>
    <?php if ($deleteSuccess === true) : ?>
    <div class="alert alert-success">Record deleted successfully.</div>
    <?php endif; ?>
    <?php if ($errorMessage != '') : ?>
    <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
    <?php endif; ?>

    <!-- Begin page content -->
    <section class="container">

        <table class="table table-bordered">

            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th class="center" colspan="2">Action</th>
            </tr>

            <?php foreach ($all_students as $student) { ?>
            <tr>
                <td><?php echo $student->GetName() ?></td>
                <td><?php echo $student->GetEmail() ?></td>
                <td><?php echo $student->GetDateOfBirth() ?></td>
                <td class="center"><a href="edit.php?id=<?php echo $student->GetId() ?>'">Edit</a></td>
                <td class="center"><a onclick="return confirm('Do you really want to delete this record?')"
                        href="index.php?id=<?php echo $student->GetId() ?>&delete=yes">Delete</a></td>
            </tr>
            <?php
            } ?>

        </table>

    </section>


    <?php include_once "./Templates/footer.php"; ?>


    <!-- Bootstrap core JavaScript -->
    <script src="Assets/Scripts/jquery-1.11.3.min.js"></script>
    <script src="Assets/bootstrap-3.3.5/js/bootstrap.min.js"></script>

</body>

</html>