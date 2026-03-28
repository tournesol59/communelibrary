<?php
namespace model;

class registermod {
	// fred: the following shall be grouped into one class 'xxxmod.php',

   private string $db_host = "localhost"; 
   private string $db_name = "usercpp";
   private string $db_user = "root";
   private string $db_passwd = "";
   public string $table = "user";
   public string $contactname = "";

// propriete qui contiendra l instance de connexion
   protected $_connection;

   public function __construct() {
      $this->getConnection();
   }

   public function getConnection() {
   // on supprime la connecxion precedente
      $this->_connection = null;
      try {
         $this->_connection = new \PDO("mysql:host=" .$this->db_host .";dbname=". $this->db_name, $this->db_user, $this->db_passwd);

         $this->_connection->exec("set names utf8");
         $this->_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $exception) {
         echo "Erreur de connexion : ". $exception->getMessage();
      }
   }

   public function save($dto) : void {
	   
     $lastuserid = 1; // set in the following insert operation
     try{
      $this->getConnection();
      $sql = "INSERT INTO user (name,email,publication,birthdate,useroption,password) VALUES(?,?,?,?,?,?)";
      var_dump($sql);
      $query = $this->_connection->prepare($sql);
      $query->bindValues($dto->name, $dto->email, $dto->site, $dto->birthdate, $dto->option, $dto->password);
      $query->execute();
      $lastuserid = $_connection->lastInsertId();
     } catch (PDOException $exception) {
      echo "Erreur de connexion : " .$exception->getMessage();
     }

     try {
       $this->getConnection();
       $this->_connection->exec("set names utf8");
       $this->_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
       $sql = "INSERT INTO address (userid,city) VALUES (?,?)";
       $query = $this->_connection->prepare($sql);
	   
       $query->bindValues($lastuserid, $dto->city);
       $query->execute();
       
     } catch (PDOException $exception) {
      echo "Erreur de connexion : " .$exception->getMessage();
     } 
   }

}

?>
