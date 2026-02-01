<?php
namespace models;

class Recipemod {

   private $host = "localhost";
   private $dbname = "recipecolldb";
   private $dbuser = "root";
   private $dbpasswd = "";
   private $_connect;
   private $table = "recipes";
   
   public function __construct() {
      try {
         $this->_connect = new \PDO("mysql:host=".$this->host. ";dbname=", $this->dbuser, $this->dbpasswd); // fred TBC
      } catch (PDOException $ex) {
         echo "Erreur de connexion: ".$ex->getMessage();
      }
   }

   public function findByKeywds(string $recipewds) : array {
	   // 3 keywords
      $items = [];
      $results = [];
      $keywds = str_replace(',' ,')(',$recipewds);
      $keywds = '('.$keywds.')';
      try {
	      $sql = "SELECT (id, category_id, title, slug, content, duration, image_path) FROM ".$this->table;
         $query = $this->_connect->prepare($sql);
         $query->execute();
	      $items = $query->fetchAll();
	      foreach ($items as $item) {
	      // preg_match_all
	         preg_match_all($keywds, $result, $matches, PREG_PATTERN_ORDER);
	         if (isset($matches)) {
		         if (count($matches) === 1) {
		            array_push($result, $item);
		         }
		         elseif (count($matches) >= 2) { // relevant priority is higher
                  array_unshift($result, $item);
		         }
	         }
	      }
      } catch (PDOException $ex) {
         echo "Erreur de connexion: ".$ex->getMessage();
      }
   }

}
?>
