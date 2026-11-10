<?php
 
namespace controller;

abstract class Controllerabs {

// propriete qui contiendra l instance de connexion
//   protected $_connection;

   /**** the following shall be commune to all other classes ***/
   protected $model;
   protected string $viewname;
   protected array $items;

   public function __construct(object $model, string $viewname) {
	$this->model = $model;
	$this->viewname = $viewname;   
 //     $this->_connection = $this->model->getConnection();
   }

  // shall be overriden
   public function runctl($param) : void {
       // following shall be replaced by a business query method from model
      $items=['orange'];
      require_once(__DIR__.'/view/'.$view.'.php');
   }

   // a particular controller shall implement a custom method
   // eg
   // public function updatedata($formbody) {
   //    //.. set data from form to database
   // }
}
?>
