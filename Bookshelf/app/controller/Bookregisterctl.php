<?php
namespace controller;

class Bookregisterctl extends Controllerabs {

   // propriete  qui contiendra l instance de connexion
   protected $model;

   public function __construct(string $modelname) {
      if (!defined('ROOT')) {
         define('ROOT', str_replace('controller\Bookregisterctl.php', '', $_SERVER['SCRIPT_FILENAME']));
      }
   //   require_once(ROOT.'\model\Bookmod.php');
   //   $modelname = 'Bookmod';  // on ne tient pas compte
      $modelname = '\\model\\'.$modelname;
      var_dump($modelname);
      $this->model = new $modelname();
   }

   public function saveBook(BookDTO $bookDTO) : void {
      if (method_exists($this->model, 'save')) {
         $this->model->save($bookDTO);
      }
   }

   public function showBook(int $id) : void  {
      if (method_exists($this->model, 'show')) {
	 //return $this->model->findById($id); // on teste le mock suivant d'abord
	 require_once(ROOT.'/public/functions.php');
	 $book = findBookById($id);
	 $this->render($book);
      }
   }

   public function render(array $book) : void {
      require_once(ROOT.'\view\booksave.php');
   }

}
?>

