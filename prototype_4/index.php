<?php

if (isset($_GET['Page'])) {
    $Page = $_GET['Page'];

    $Pages = ['Home', 'Add', 'Update', 'Chart', 'Delete'];
    if (in_array($Page, $Pages)) {
        include_once "./Business/" . $Page . "Business.php";
    } else {
        include_once "./Business/Error404.php";
    }
} else {
    include_once "./Business/HomeBusiness.php";
}

// include_once "./Client/Layout.php";