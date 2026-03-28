<?php
namespace controller;

class Publicationctl extends Controllerabs {
   private string $host = "localhost";
   private string $db_name = "usercpp";
   private string $db_user = "root";
   private string $db_passwd = "";
   public string $table = "user";
   public string $publicatname = "";

// propriete qui contiendra l instance de connexion
   protected $model;

   public function __construct($modelname) {     // nothing
      //var_dump(str_replace("controller","model", __DIR__.'\publicatmod.php')); //debug
      require_once(str_replace("controller","model", __DIR__.'\publicatmod.php'));
      // $this->model = new \model\publicatmod(); // does not work
      $modelname = '\\model\\'.$modelname;
      var_dump($modelname);
      $this->model = new $modelname();
   }
/*
   public function sortPublications() : array {
      $publications = $this->model->findAll(); 
      return $publications;
   }
*/
   public function search($pubSlug) : void {
	   // perform a joined query on slug
       $publications = $this->model->findBySlug($slug);
       require_once(__DIR__.'\view\publication.php');
       
   }

}
?>
