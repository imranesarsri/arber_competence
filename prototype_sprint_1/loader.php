<?php
define('Root', dirname(__FILE__));
error_reporting(E_ALL);

require_once Root . '../DB/Connect.php';
require_once Root . '../Entities/Stagiaires.php';
require_once Root . '../Entities/City.php';
require_once Root . '../DAL/StagiairesDAO.php';
require_once Root . '../DAL/CityDAO.php';
require_once Root . '../BLL/CityBLO.php';
require_once Root . '../BLL/StagiairesBLO.php';
