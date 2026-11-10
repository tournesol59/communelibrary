<?php
//contains the form
$postData=$_POST;
$statusBook = (isset($_SESSION['searchtitle'])) ? "requested" : ""; 
$current_search = (isset($_SESSION['searchtitle'])) ? ['search' => $_SESSION['searchtitle']] : "";
$errorMessage = "";

if ((!isset($postData['searchtitle'])) || (!isset($postData['searchtitle']))
    || ($postData['searchauthor'] === '') || ($postData['searchauthor'] === '')) {
   if ($statusBook = "") {
	   echo "no search title or author indicated, please enter again";
	   $statusBook = "error";
	   $errorMessage = "Veuillez entrer un titre ou un auteur de livre";
   }
   unset($_SESSION['searchtitle']);
   unset($_SESSION['searchauthor']);
   }
}
else {
	if (isset($postData['searchtitle']) && ($postData['searchtitle'] != '')) {
		// perform a search of books by keyword in the title
		// DO NOT INSTANCIATE A CONTROLLER and MODEL ! it will be done by the index.php by passing the uri
		$_SESSION['searchtitle'] = $postData['searchtitle'];
		$current_search = ['title' => $postData['searchtitle']];
	}
	else if (isset($postData['searchauthor']) && ($postData['searchauthor'] != '')) {
		echo "to be implemented in the future: search by author";
	}
}
?>

<?php if (!isset($current_search['title'])) && (!isset($current_search['author'])) : ?>
    <form action="index.php" method="POST">
	<!-- si message d erreur on affiche -->
    <?php if (isset($errorMessage)) : ?>
        <div class="alert alert-danger" role="alert">
	         <?php echo $errorMessage; ?>
        </div>
     <?php endif ; ?>
	 <h1>Entrez un critere de recherche:</h1>
	 <div class="mb-3">
	    <label for="texttitle" class="form-label">Titre</label>
		<input type="text" class="form-control" id="searchtitle" name="searchtitle">
	 </div>
	 <div class="mb-3">
	    <label for="textauthor" class="form-label">Auteur</label>
		<input type="text" class="form-control" id="searchauthor" name="searchauthor">
	 </div>
	 <button type="submit" class="btn btn-primary">Rechercher</button>
	</form>
<?php else : ?>
    <h2>Confirmer votre recherche en cliquant sur le lien</h2>
    <a href="http://localhost:8080/" . <?php 
			$uricontroller="/booksearch/searchbykeyw/" . $_SESSION['searchtitle'];
			echo $uricontroller; ?> >Rechercher</a>
    <?php 
	    unset($_SESSION['searchtitle']);
		unset($_SESSION['searchauthor']);
	?>
<?php endif; ?>