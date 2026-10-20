<?php
$registerStatus="";
$errorMessage="";
if (!defined('ROOT')) {
   define('ROOT', str_replace('\public\Bookregister.php', '', $_SERVER['SCRIPT_FILENAME']));
}
var_dump('ROOT');
if ($registerStatus=="") {
    // fred: probleme ici avec ROOT lors du deuxieme appel de Bookregister.php
    require_once(ROOT.'\app\model\BookDTO.php');
    $bookDTO = new \model\BookDTO();
    $errorMessage = $bookDTO->errorMessage;
    if ($errorMessage==="") {
        require_once(ROOT.'\controller\Bookregisterctl.php');
        require_once(ROOT.'\model\Bookmod.php');
        $modelname = 'Bookmod';
        $controller = new \controller\Bookregisterctl($modelname);
        $controller->saveBook($bookDTO);    

        // we indicate by means of a SESSION variable that the book has been saved and that the form should not be displayed
        $registerStatus = "saved";
        $_SESSION['registerSaved'] = ['title' => $bookDTO->title];
    }
    
}
?>
<?php if (!isset($_SESSION['registerSaved'])) : ?>

<form action="Bookregister.php" method="POST">
    <!-- si message d erreur on afffiche -->
    <?php if (isset($errorMessage) && ($errorMessage!=="")) : ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
    <?php endif ; ?>  
    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Entrez le titre">
    </div>
    <div class="mb-3">
        <label for="author" class="form-label">Auteur</label>
        <input type="text" class="form-control" id="author" name="author" placeholder="Entrez l'auteur">
    </div>
    <div class="mb-3">
        <label for="published" class="form-label">Date de publication</label>
        <input type="text" class="form-control" id="published" name="published" placeholder="Entrez la date de publication">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>

</form>
<? else : ?>
    <div class="alert alert-success" role="alert">
        <a href="/Bookindex.php">Index des livres</a>;
    </div>
    <?php unset($_SESSION['registerSaved']); ?>
<?php endif; ?>;

