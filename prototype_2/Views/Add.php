<?php
include "../Management/traineeManagement.php";
if (isset($_POST['btnAdd'])) {

    $fullName       =  $_POST['fullName'];
    $email          =  $_POST['email'];
    $phoneNumber    =  $_POST['phoneNumber'];
    $address        =  $_POST['address'];

    $Add = new  Trainee;
    $Add->setFullNameId($fullName);
    $Add->setEmail($email);
    $Add->SetphoneNumber($phoneNumber);
    $Add->setAddress($address);

    $addTrainee = new TraineeManagement;
    $addTrainee->AddTrainee($Add);

    header("location:../Public/index.php");
} else {
    echo "walllo";
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


            <div class="btns">
                <input type="submit" name='btnAdd' class="button buttonAdd">
                <a href="../Public/index.php" class="button buttonCancel">Cancel</a>
            </div>

        </form>
    </div>

</body>

</html>