<?php
ob_start()
?>
<img src="./dist/img/pageNotFound.png" class="img-fluid" alt="this page is not found">

<?php
$Content = ob_get_clean();
include_once "./Client/Layout.php";
