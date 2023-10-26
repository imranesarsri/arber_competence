<?php

class DB
{

    const SERVERNAME     = "localhost";
    const DBNAME         = "protorype_project_2.1";
    const USERNAME       = "root";
    const PASSWORD       = "";

    public static function connect()
    {
        try {
            $db = new PDO('mysql:host=' . self::SERVERNAME . ';dbname=' . self::DBNAME, self::USERNAME, self::PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
        } catch (PDOException $e) {
            die("error : not connecte" . $e->getMessage());
        }
        return $db;
    }
}
