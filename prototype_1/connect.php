<?php

class DB
{

    const SERVERNAME     = "localhost";
    const DBNAME         = "prototype_1_2_arber_competence";
    const USERNAME       = "root";
    const PASSWORD       = "solicoders";

    public static function connect()
    {
        try {
            $db = new PDO('mysql:host=' . self::SERVERNAME . ';dbname=' . self::DBNAME, self::USERNAME, self::PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
        } catch (PDOException $e) {
            die("error : not connecte " . $e->getMessage());
        }
        return $db;
    }
}
