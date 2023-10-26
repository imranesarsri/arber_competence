<?php



// ================================================================================= //
// =========================== Connect To Databaese ================================ //
// ================================================================================= //

class Connect
{
  const SERVERNAME = "localhost:3306";
  const DATABASNAME = "prototypesprint1";
  const USERNAME = "root";
  const PASSWORD = "solicoders";


  public static function DB()
  {
    try {

      $conn = new PDO("mysql:host=" . self::SERVERNAME . ";dbname=" . self::DATABASNAME, self::USERNAME, self::PASSWORD);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Connected successfully";
      return $conn;
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }
}
