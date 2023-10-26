<?php
include "../Management/traineeManagement.php";

if (isset($_GET['traiee'])) {
    $id = $_GET['traiee'];
    $Update = new TraineeManagement;
    $dataTrainee = $Update->getById($id);

    if (isset($_POST['btnUpdate'])) {

        $fullName       = $_POST['fullName'];
        $email          = $_POST['email'];
        $phoneNumber    = $_POST['phoneNumber'];
        $address        = $_POST['address'];

        $Update->UpdateDataTrainee($id, $fullName, $email, $phoneNumber, $address);
        header("location:../Public/index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prptotype 2</title>
    <link rel="stylesheet" href="../Public/Assets/style.css">
</head>

<body>
    <h1>Update profile</h1>

    <div>
        <form method="POST">
            <label for="fullName">full Name</label>
            <input type="text" id="fullName" name="fullName" value="<?php echo $dataTrainee->getFullName() ?>"
                placeholder="Your full name.." required>

            <label for="Email"> Email</label>
            <input type="email" id="Email" name="email" value="<?php echo $dataTrainee->getEmail() ?>"
                placeholder="Your Email.." required>


            <label for="PhoneNumber"> Phone Number</label>
            <input type="number" id="PhoneNumber" value="<?php echo $dataTrainee->getPhoneNumber() ?>"
                name="phoneNumber" placeholder="Your Phone Number.." required>

            <label for="Address">Address</label>
            <input type="text" id="Address" value="<?php echo $dataTrainee->getAddress() ?>" name="address"
                placeholder="Your Address.." required>


            <div class="btns">
                <input type="submit" name='btnUpdate' value="Update" class="button buttonAdd">
                <a href="../Public/index.php" class="button buttonCancel">Cancel</a>
            </div>

        </form>
    </div>


</body>

</html>