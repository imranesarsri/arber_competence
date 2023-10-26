<?php

// ========================= Connect to databases ========================= //

class DatabaseConnection
{

   private $host = "localhost";
   private $user = 'root';
   private $dbname = 'stdinfo';
   private $password = 'solicoders';

   public function connect()
   {
      try {
         $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
         $db = new PDO($dsn, $this->user, $this->password);
         $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
         return $db;
      } catch (PDOException $e) {
         echo 'connection failed' . $e->getMessage();
      }
   }
}
