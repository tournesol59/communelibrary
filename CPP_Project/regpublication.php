<?php
$statusUser="";
$loggedUser= (isset($_SESSION['user']))? array('login' => $_SESSION['user']) : "";
$errorMessage="";

require_once(__DIR__. '\model\publicationDTO.php');
$publicationDTO = new \model\publicationDTO();
$publicationDTO->validate();
$errorMessage = $publicationDTO->errorMessage;

if ($errorMessage != "") {
   // demander à reafficher le formulaire avec le message d'erreur
   $statusUser = "pub-error";
}
else {
   // instanciates a controller+model
   $modelname = 'registermod';
   $controllername = '\\controller\\Registerctl';
   var_dump($controllername);
   require_once(__DIR__.'/controller/Controllerabs.php');
   require_once(__DIR__.'/controller/Publicationctl.php');
   $controller = new \controller\Registerctl($modelname);

   echo 'this section of code has to be completed';
   if (isset($loggedUser['login']) {
      array_push($loggedUser, 'pubtitle' => $publicationDTO->ptitle);
   }
   var_dump($loggedUser);
}
?>

<?php if (!isset($loggedUser['pubtitle'])) : ?>
    <form action="regpublication.php" method="POST">

    <!-- si message d erreur on affiche -->
    <?php if (isset($errorMessage)) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $statusUser; ?>
	</div>
    <?php endif; ?>
    <h2>Entrez les references d une publication</h2>
	 <div class="mb-3">
             <label for="title" class="form-label">Titre</label>
             <input type="text" class="form-control" id="title" name="title">
         </div>
	 <div class="mb-3">
             <label for="slug" class="form-label">Slug</label>
             <input type="text" class="form-control" id="slug" name="slug">
         </div>
	 <div class="mb-3">
             <label for="public" class="form-label">Titre</label>
	     <select class="form-control" id="public" name="public">
		<option value="false">paper</option>
		<option value="true">online</option>
             </select>
	 </div>
	 <div class="mb-3">
             <label for="publicdate" class="form-label">Publication date</label>
             <input type="text" class="form-control" id="publicdate" name="publidate">
         </div>
	 <div class="mb-3">
             <label for="siteurl" class="form-label">Adresse URL</label>
             <input type="text" class="form-control" id="siteurl" name="siteurl">
         </div>
	  <button type="submit" class="btn btn-primary">Envoyer</button>
	</form>


<?php endif; ?>

