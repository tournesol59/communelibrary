<?php
namespace model;

class publicatmod {
	// fred: the following shall be grouped into one class 'xxxmod.php',

   private string $db_host = "localhost"; 
   private string $db_name = "usercpp";
   private string $db_user = "root";
   private string $db_passwd = "";
   public string $table = "publicat";

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

   public function findAll($pubslug) : array {
      $contacts=[];
      try {
         $sql = 'SELECT id, title, slug, thesdate, location FROM '. $this->table;
         $query = $this->_connection->prepare($sql, [\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY]);
         $query->execute();
		 $results = $query->fetchAll();
         $publicates = [];
 		 foreach ($results as $result) {
			 $keywds=str_replace($pubslug, '-', ')(');
			 $keywds= '('.$keywds.')';
			 preg_match_all($keywds, $result, $matches);
			 if (isset($matches[1]) {
				 /// TBC 28-12-2025
			    
			 }
		 }
         return $publicates;

      } catch (PDOException $exception) {
         echo "Erreur de connexion : " .$exception->getMessage();
         return [];
      }
   }

   public function findBySlug($contactname) : array {
      $contacts=[];
      try {
         $sql = 'SELECT id, name, email, birthdate, useroption, contact, address, city FROM '. $table .' LEFT JOIN address ON '.$this->table.'.address = address.id WHERE name= :contactame';
         $query = $_connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
         $query->execute(['contactname' => $contactname]);
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
