<?php
$Title = "Add trainee";
ob_start();
?>


<div class="container mx-auto ">
    <form method="POST">
        <div class="mb-3">
            <label for="fullName">full Name</label><br>
            <input class="form-control" type="text" id="fullName" name="fullName" placeholder="Your full name.."
                required>
        </div>
        <div class="mb-3">
            <label for="Email"> Email</label><br>
            <input class="form-control" type="email" id="Email" name="email" placeholder="Your Email.." required>
        </div>
        <div class="mb-3 ">
            <label for="PhoneNumber"> Phone Number</label><br>
            <input class="form-control" type="number" id="PhoneNumber" name="phoneNumber"
                placeholder="Your Phone Number.." required>
        </div>
        <div class="mb-3 ">
            <label for="Address">Address</label><br>
            <input class="form-control" type="text" id="Address" name="address" placeholder="Your Address.." required>
        </div>

        <div class="mb-3 ">

            <label for="Address">City</label><br>
            <select name="city" class="form-select">
                <?php foreach ($datatCity as $city) {  ?>
                <option value="<?php echo $city->getdICity() ?>">
                    <?php echo $city->getCity() ?>
                </option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" name='btnAdd' class="btn btn-primary">Add</button>
        <button href="./index.php" class="btn btn-secondary">Cancel</button>
    </form>

</div>


<?php
$Content = ob_get_clean();
include_once "./Client/Layout.php";