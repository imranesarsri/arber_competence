<?php
$Title = "table the Trainee";
ob_start()
?>
<div class=" mb-2 d-flex align-items-center justify-content-end">
    <form action="" method="POST">

        <select name="City" class="px-3 py-1 rounded rounded-5 " name="City" id="">
            <option value="0">All City</option>
            <?php foreach ($DataCities as $city) {  ?>
                <option value="<?php echo $city->getdICity() ?>">
                    <?php echo $city->getCity() ?>
                </option>
            <?php } ?>
        </select>
        <input name="fullName" class="px-5 py-1 rounded rounded-5 ms-2 " type="text">
        <button name="Search" type="submit" class="btn btn-dark text-light ms-2">Search</button>
    </form>
</div>
<?php if (!empty($traineeData)) { ?>
    <table class="table table-striped table-hover">
        <tr>
            <th>Id</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>ِCity</th>
            <th>Action</th>
        </tr>
        <?php foreach ($traineeData as $trainee) : ?>
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
        <?php endforeach ?>

    </table>
    <form action="" method="post">
        <?php
        for ($Pg = 1; $Pg <= $pages; $Pg++) {
        ?>
            <button type="submit" name="pagination" value="<?= $Pg ?>" class="btn btn-primary"><?= $Pg ?></button>

        <?php
        }
        ?>
    </form>
<?php


} else {
?>
    <div class="text-center">
        <img src="./Client/Assets/images/notResult.jpg" alt="">
    </div>
<?php

}

?>

<?php
$Content = ob_get_clean();
include_once "./Client/Layout.php";
