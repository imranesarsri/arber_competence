<?php

class DB
{
    const SERVERNAME = "localhost:3306";
    const DBNAME = "prototype_project_2";
    const USERNAME = "root";
    const PASSWORD = "solicoders";

    /**
     * Establishes a database connection and returns the PDO object.
     *
     * @return PDO The PDO database connection object.
     */
    public static function connect()
    {
        try {
            $db = new PDO(
                'mysql:host=' . self::SERVERNAME . ';dbname=' . self::DBNAME,
                self::USERNAME,
                self::PASSWORD
            );

            // Set PDO attributes
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Display connection status (for debugging)
            $connectionStatus = $db->getAttribute(PDO::ATTR_CONNECTION_STATUS);
            // You might want to do something with $connectionStatus, e.g., log it.
            return $db;
        } catch (PDOException $e) {
            die("Error: Unable to connect to the database. " . $e->getMessage());
        }
    }
}
