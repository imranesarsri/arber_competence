<?php
$Title = "table the Trainee";
ob_start()
?>
<table class="table table-striped table-hover container">
    <tr>
        <th>Id</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th>ِCity</th>
        <th>Action</th>
    </tr>
    <?php foreach ($traineeData as $trainee) { ?>
    <tr>
        <td><?php echo $trainee->getId(); ?></td>
        <td><?php echo $trainee->getFullName(); ?></td>
        <td><?php echo $trainee->getEmail(); ?></td>
        <td><?php echo $trainee->getPhoneNumber(); ?></td>
        <td><?php echo $trainee->getAddress(); ?></td>
        <td><?php echo $CityData->getCityById($trainee->getdICity()) ?></td>
        <td class="btns">
            <a class="btn btn-primary" href="./index.php?Page=Update&traiee=<?php echo $trainee->getId() ?>">Update</a>
            <a class="btn btn-danger" href="./index.php?Page=Delete&traiee=<?php echo $trainee->getId() ?>">Delete</a>

        </td>

    </tr>
    <?php } ?>

</table>

<?php
$Content = ob_get_clean();
include_once "./Client/Layout.php";