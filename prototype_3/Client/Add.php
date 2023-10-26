<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prptotype 3</title>
    <link rel="stylesheet" href="../Public/Assets/Css/style.css">
</head>

<body>

    <h1>Add trainee</h1>

    <div>
        <form method="POST">
            <label for="fullName">full Name</label>
            <input type="text" id="fullName" name="fullName" placeholder="Your full name.." required>

            <label for="Email"> Email</label>
            <input type="email" id="Email" name="email" placeholder="Your Email.." required>


            <label for="PhoneNumber"> Phone Number</label>
            <input type="number" id="PhoneNumber" name="phoneNumber" placeholder="Your Phone Number.." required>

            <label for="Address">Address</label>
            <input type="text" id="Address" name="address" placeholder="Your Address.." required>


            <label for="Address">City</label>
            <select name="city">
                <?php foreach ($datatCity as $city) {  ?>
                    <option value="<?php echo $city->getdICity() ?>">
                        <?php echo $city->getCity() ?>
                    </option>
                <?php } ?>
            </select>



            <div class="btns">
                <input type="submit" name='btnAdd' class="button buttonAdd">
                <a href="../Public/index.php" class="button buttonCancel">Cancel</a>
            </div>


        </form>
    </div>

</body>

</html>