<?php
$Title = "Chart Trainee";
ob_start();
?>
<div class="container">
    <canvas id="myChart"></canvas>
</div>

<?php
$chartData = $CityData->CountCity();
?>
<!-- chart js -->
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
<?php
$Content = ob_get_clean();
include_once "./Client/Layout.php";