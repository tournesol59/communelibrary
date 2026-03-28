<?php
namespace model;

class publicatmod {
	// fred: the following shall be grouped into one class 'xxxmod.php',

   private string $db_host = "localhost"; 
   private string $db_name = "usercpp";
   private string $db_user = "root";
   private string $db_passwd = "";
   public string $table = "publication";

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
      try {
         $sql = 'SELECT id, userid, title, slug, publicdate, siteurl FROM '. $this->table;
         $query = $this->_connection->prepare($sql, [\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY]);
         $query->execute();
		 $results = $query->fetchAll();
         $publicates = [];
 		 foreach ($results as $result) {
			 $keywds=str_replace($pubslug, '-', ')(');
			 $keywds= '('.$keywds.')';
			 preg_match_all($keywds, $result['title'], $matches);
			 if (isset($matches[1]) {
				 /// completed
				 $publicates->append($result);
			 }
		 }
         return $publicates;

      } catch (PDOException $exception) {
         echo "Erreur de connexion : " .$exception->getMessage();
         return [];
      }
   }

   public function findBySlug($pubslug) : array {
      $contacts=[];
      try {
         $sql = 'SELECT id, userid, title, slug, publicdate, siteurl FROM '. $this->table
		     .' WHERE slug=:slug';
         $query = $_connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
         $query->execute(['slug' => $pubslug]);
         $publicates = $query->fetchAll();
         if (isset($publicates)) {
            return $publicates;
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
