<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prptotype 3</title>
    <link rel="stylesheet" href="../Public/Assets/style.css">
</head>

<body>
    <h1>Update profile</h1>

    <div>
        <form method="POST">
            <label for="fullName">full Name</label>
            <input type="text" id="fullName" name="fullName" value="<?php echo $dataTrainee->getFullName() ?>" placeholder="Your full name.." required>

            <label for="Email"> Email</label>
            <input type="email" id="Email" name="email" value="<?php echo $dataTrainee->getEmail() ?>" placeholder="Your Email.." required>


            <label for="PhoneNumber"> Phone Number</label>
            <input type="number" id="PhoneNumber" value="<?php echo $dataTrainee->getPhoneNumber() ?>" name="phoneNumber" placeholder="Your Phone Number.." required>

            <label for="Address">Address</label>
            <input type="text" id="Address" value="<?php echo $dataTrainee->getAddress() ?>" name="address" placeholder="Your Address.." required>
            <?php echo $dataTrainee->getdICity() ?>


            <label for="Address">City</label>
            <select name="cityId" id="city">
                <option value="<?php echo $dataTrainee->getdICity() ?>">
                    <?php echo $CityData->getCityById($dataTrainee->getdICity()) ?>
                </option>

                <?php
                $cityName =  $CityData->getCityById($dataTrainee->getdICity());
                foreach ($cities as $city) {
                    if ($cityName !== $city->getCity()) {
                        echo $city->getCity();
                ?>
                        <option value="<?php echo $city->getdICity() ?>"><?php echo $city->getCity() ?></option>
                <?php
                    }
                }
                ?>

            </select>

            <div class="btns">
                <input type="submit" name='btnUpdate' value="Update" class="button buttonAdd">
                <a href="../Public/index.php" class="button buttonCancel">Cancel</a>
            </div>

        </form>
    </div>


</body>

</html>