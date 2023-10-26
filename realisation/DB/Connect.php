<?php

class Connect
{
    private static $conn;
    const SERVERNAME        = "localhost";
    const USERNAME          = "root";
    const PASSWORD          = "solicoders";
    const DATABASENAME      = "arber_competence";

    public static function DB()
    {

        try {
            self::$conn = new PDO("mysql:host=" . self::SERVERNAME . ";dbname=" . self::DATABASENAME, self::USERNAME, self::PASSWORD);
            // set the PDO error mode to exception
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
            return self::$conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
