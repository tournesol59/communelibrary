<?php
namespace controller;

class Contactrefctl extends Controllerabs {
   private string $host = "localhost";
   private string $db_name = "usercpp";
   private string $db_user = "root";
   private string $db_passwd = "";
   public string $table = "user";
   public string $contactname = "";

// propriete qui contiendra l instance de connexion
   protected $model;

   public function __construct($modelname) {     // nothing
	   //var_dump(str_replace("controller","model", __DIR__.'\contactrefmod.php'));
     if (!defined('ROOT')) {
	      define('ROOT', str_replace('controller\contactref.php', '', $_SERVER['SCRIPT_FILENAME']));
     }
         require_once(ROOT.'\model\contactrefmod.php');
      // $this->model = new \model\contactrefmod(); // does not work
         $modelname = '\\model\\'.$modelname;
         var_dump($modelname);
         $this->model = new $modelname();
   }

   public function sortContacts() : array { 
      if (method_exists($this->model, 'findAll')) {
         return $this->model->findAll();
      }
      else {
         return [];
      }
   }

   public function render($contactname) : void {
	   // perform a joined query on address and contact
       $contact = $this->model->findByName($contactname);
       require_once(ROOT.'\view\contact.php');
       
   }

}
?>
