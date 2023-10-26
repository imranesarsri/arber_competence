<?php
require_once "./loader.php";


if (isset($_GET["Page"])) {
    $Page   = $_GET["Page"];
    $Pages  = ['Ajouter', 'Error404', 'Modifier', 'Supprimer'];
    if (in_array($Page, $Pages)) {
        include_once "./Client/" . $Page . ".php";
    } else {
        include "./Client/Error404.php";
    }
} else {
    include_once "./Client/Home.php";
}
