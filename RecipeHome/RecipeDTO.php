<?php
class RecipeDTO {

   private int $id;
   private string $category_name;
   private string $title;
   private string $slug;
   private string $content;
   private string $duration;
   private string $image_path;

   private $errorMessage="";

   public function __construct($data) {
     if ((!isset($data['id'])) || ($data['id'] === '')) {
        $errorMessage = $errorMessage."Pas d'id sur ce champ";  
     }
     if ((!isset($data['title'])) || ($data['title'] === '')) {
	$errorMessage = $errorMessage." Vous devez entrer un titre valide";
     }
     if ((!isset($data['slug'])) || ($data['slug'] === '')) {
	$errorMessage = $errorMessage." Vous devez entrer un slug valide";
     }
     if ((!isset($data['content'])) || ($data['content'] === '')) {
	$errorMessage = $errorMessage." Vous devez entrer un contenu valide";
     }
     if ((!isset($data['duration'])) || ($data['duration'] === '')) {
	$errorMessage = $errorMessage." Vous devez entrer une duree valide";
     }
     if ((!isset($data['image_path'])) || ($data['image_path'] === '')) {
	$errorMessage = $errorMessage." Vous devez entrer une duree valide";
     }
     if ($errorMessage === "") {
        $this->id = $data['id'];
        $this->category_name="default";
        $this->title = $data['title'];
        $this->slug = $data['slug'];
        $this->content = $data['content'];
        $this->duration = $data['duration'];
        $this->image_path = $data['image_path'];
     }
   }

   // fred: rajouter les getters avec VS
}
?>
