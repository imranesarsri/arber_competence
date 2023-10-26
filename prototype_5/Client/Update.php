<?php
$Title = "Update profile";
ob_start();
?>


<div class="container mx-auto">
    <form method="POST">
        <div class="mb-3">
            <label for="fullName">full Name</label><br>
            <input class="form-control" type="text" id="fullName" name="fullName" value="<?php echo $dataTrainee->getFullName() ?>" placeholder="Your full name.." required>
        </div>
        <div class="mb-3">
            <label for="Email"> Email</label><br>
            <input class="form-control" type="email" id="Email" name="email" value="<?php echo $dataTrainee->getEmail() ?>" placeholder="Your Email.." required>
        </div>
        <div class="mb-3 ">
            <label for="PhoneNumber"> Phone Number</label><br>
            <input class="form-control" type="number" id="PhoneNumber" value="<?php echo $dataTrainee->getPhoneNumber() ?>" name="phoneNumber" placeholder="Your Phone Number.." required>
        </div>
        <div class="mb-3 ">

            <label for="Address">Address</label><br>
            <input class="form-control" type="text" id="Address" value="<?php echo $dataTrainee->getAddress() ?>" name="address" placeholder="Your Address.." required>
            <?php echo $dataTrainee->getdICity() ?>
        </div>

        <div class="mb-3 ">

            <label for="Address">City</label><br>
            <select name="cityId" class="form-select" id="city">
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
        </div>

        <div class="btns">
            <button type="submit" name='btnUpdate' class="btn btn-primary">Update</button>
            <button href="../Public/index.php" class="btn btn-secondary">Cancel</button>

        </div>
    </form>

</div>




<?php
$Content = ob_get_clean();
include_once "./Client/Layout.php";
