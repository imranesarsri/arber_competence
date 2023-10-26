<?php
define('Root', dirname(__FILE__));
error_reporting(E_ALL);

require_once Root . '../Application/DatabaseConnection.php';
require_once Root . '../Application/DAL/StudentDAO.php';
require_once Root . '../Application/BLL/StudentBLO.php';
require_once Root . '../Application/Entities/Student.php';
