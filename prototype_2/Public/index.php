<?php

include "../Management/traineeManagement.php";

$Trainee = new TraineeManagement;
$traineeData = $Trainee->getAll();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prptotype 2</title>
    <link rel="stylesheet" href="../Public/Assets/style.css">
</head>

<body>

    <h1>Prototype 2</h1>

    <table id="customers">
        <tr>
            <th>Id</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        <?php foreach ($traineeData as $trainee) { ?>
        <tr>
            <td><?php echo $trainee->getId(); ?></td>
            <td><?php echo $trainee->getFullName(); ?></td>
            <td><?php echo $trainee->getEmail(); ?></td>
            <td><?php echo $trainee->getPhoneNumber(); ?></td>
            <td><?php echo $trainee->getAddress(); ?></td>
            <td class="btns">
                <a class="button buttonUpdate"
                    href="../Views/Update.php?traiee=<?php echo $trainee->getId() ?>">Update</a>
                <a class="button buttonDelete"
                    href="../Views/Delete.php?traiee=<?php echo $trainee->getId() ?>">Delete</a>
            </td>

        </tr>
        <?php } ?>

    </table>
    <a href="../Views/Add.php" class="button buttonAdd">Add</a>


</body>

</html>