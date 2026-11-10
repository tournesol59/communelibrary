<?php
$postData=$_POST;
$statusPub = "";
$errorMessage = "";

if ((!isset($postData['pubslug'])) || (!isset($postData['keywds']))) {
      $statusPub = "error";
      $errorMessage = "Veuillez entrer des criteres de recherche et un slug";
}
else {
   $_SESSION['pubslug'] = $postData['pubslug'];
   $_SESSION['pubkeywds'] = $postData['keywds'];
   
   //verification : connection to database
}
?>
<?php if (!isset($_SESSION['pubslug'])) : ?>
    <form action="researchpub.php" method="POST">
	<!-- si message d erreur on affiche -->
    <?php if (isset($errorMessage)) : ?>
        <div class="alert alert-danger" role="alert">
	<?php echo $statusPub; ?>
         </div>
     <?php endif ; ?>
        <h1>Entrez vos identifiants</h1>
            <div class="mb-3">
                <label for="pubslug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="pubslug" name="pubslug">
            </div>
	    <div class="mb-3">
                <label for="keywds" class="form-label">Keywords</label>
                <input type="text" class="form-control" id="keywds" name="keywds">
	    </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
	</form>
<?php else : ?>
   <div class="alert alert-success" role="alert">
      <p>Veulliez cliquer sur ce lien pour faire la recherche avec les criteres <?php echo $_SESSION['keywds']; ?> </p>
	  <a href="/publication/search/<?php echo $_SESSION['pubslug']; ?>" ><?php echo "/publication/search/".$_SESSION['pubslug']; ?>"</a>
	  <?php unset($_SESSION['keywds']); unset($_SESSION['pubslug']); ?>
   </div>
<?php endif ; ?>
