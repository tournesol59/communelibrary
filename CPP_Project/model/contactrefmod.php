<?php
namespace model;

class contactrefmod {
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

   public function findAll() : array {
      $contacts=[];
      try {
		   $mode='1';
         $sql = 'SELECT id, name, email, birthdate, useroption, contact, publication FROM '. $this->table.' WHERE contact=:mode';
         $query = $this->_connection->prepare($sql, [\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY]);
            //$query->bindParam('mode', $mode , \PDO::PARAM_INT);
         $query->execute(array(':mode' => $mode));
		   $contacts = $query->fetchAll();
         return $contacts;

      } catch (PDOException $exception) {
         echo "Erreur de connexion : " .$exception->getMessage();
         return [];
      }
   }

   public function findByName($contactname) : array {
      $contacts=[];
      try {
		 echo "contactname: " .$contactname;
         $sql = 'SELECT user.id as id, user.name as name, email, birthdate, useroption, contact, city FROM '. $this->table .' as user LEFT JOIN address as address ON '.$this->table.'.address = address.id WHERE name= :contactname';
         $query = $this->_connection->prepare($sql, [\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY]);
		 //$query->bindParam();
         $query->execute(array(':contactname' => $contactname));
         $contacts = $query->fetchAll();
         if (isset($contacts)) {
            return $contacts[0];  // return a unique result
         }
         else {
            return [];
         }
      } catch (PDOException $exception) {
         echo "Erreur de connexion : " .$exception->getMessage();
         return [];
      }
   }

}

?>
