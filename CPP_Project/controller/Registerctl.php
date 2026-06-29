<?php
namespace controller;

class Registerctl extends Controllerabs {
   private string $host = "localhost";
   private string $db_name = "usercpp";
   private string $db_user = "root";
   private string $db_passwd = "";
   public string $table = "user";
   public string $contactname = "";

// propriete qui contiendra l instance de connexion
   protected $model;

   public function __construct($modelname) {     // nothing
      echo "<pre>";
      var_dump(str_replace("controller","model", __DIR__.'\registermod.php'));
      echo "</pre>";
      require_once(str_replace("controller","model", __DIR__.'\registermod.php'));
      // $this->model = new \model\registermod(); // does not work
      $modelname = '\\model\\'.$modelname;
      var_dump($modelname);
      $this->model = new $modelname();
   }

   public function saveUser($registDTO) : void {
      $this->model->save($registDTO); 
   }

}
?>
