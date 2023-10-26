<?php

include_once "../Data/TraineeData.php";
include_once "../Data/CityData.php";
$Trainee = new TraineeData;
$traineeData = $Trainee->getAll();
$CityData   = new CityData;


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prptotype 3</title>
    <link rel="stylesheet" href="../Public/Assets/Css/style.css">

</head>

<body>

    <h1>Prototype 3</h1>

    <table id="customers">
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
                    <a class="button buttonUpdate" href="../Business/UpdateBusiness.php?traiee=<?php echo $trainee->getId() ?>">Update</a>
                    <a class="button buttonDelete" href="../Client/Delete.php?traiee=<?php echo $trainee->getId() ?>">Delete</a>
                </td>

            </tr>
        <?php } ?>

    </table>
    <a href="../Business/AddBusiness.php" class="button buttonAdd">Add</a>
    </div>
    <div class="container">
        <canvas id="myChart"></canvas>
    </div>





    <div class="container">
        <canvas id="myChart"></canvas>
    </div>

    <?php
    $chartData = $CityData->CountCity();
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>


    <script>
        // Function to generate random RGB color
        function getRandomColor() {
            let R = Math.floor(Math.random() * 256);
            let G = Math.floor(Math.random() * 256);
            let B = Math.floor(Math.random() * 256);
            return `rgb(${R}, ${G}, ${B})`;
        }

        // Get chart data from PHP
        let chartData = <?php echo json_encode($chartData); ?>;
        let cityNames = chartData.map(item => item.CityName); // Array of city names
        let counts = chartData.map(item => item.CityCount);

        // Generate random colors for each city
        let backgroundColors = cityNames.map(() => getRandomColor());

        // Chart initialization
        let ctx = document.getElementById('myChart').getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: cityNames, // Use city names as labels
                datasets: [{
                    data: counts,
                    backgroundColor: backgroundColors,
                }]
            },
        });
    </script>
</body>

</html>