<?php
$postData = $_POST;
$statusUser = "";
$loggedUser = [];
$errorMessage = "";

if ((!isset($postData['titlekey'])) || (!isset($postData['category']))) {
   $statusUser = "error";
   $errorMessage = "Le formulaire doit contenir au moins un mot cle ou une categorie";
}
else {
   $titlekey = $postData['titlekey'];
   $category = $postData['category'];
   // instanciates the model
   require_once(__DIR__.'/models/Recipemod.php');
   $recipemod = new models\Recipemod();
   // DEBUG: for the moment, by-pass the database and collect the results as const
   //$searchresults = $recipemod->findByKeywds($titlekey);
   $searchresults = [['id' => 1,
	   'title' => 'Quinoa tomate et riz complet',
	   'category' => 'plat-principal',
	   'slug' => 'quinoa-tomate-riz',
	   'content' => 'lavez les tomates',
	   'duration' => 45,
	   'image_path' => 'quinoa.jpg'
   ]];
   
   $statusUser = "insearch";
   array_push($loggedUser, ['insearch' => $postData['category']] );  
   // as a mind-keeping and to disable the form rendering
}
?>

<!-- script src="/js/RecipeValidation.js"></script -->

<script>

const liste = {{'category': "plat-principal", 'title: "Quinoa, riz et tomates"},
               {'category': "plat-principal", 'title: "Poulet et gnoccis"}};

var ul_element = document.getElementById("listrecipes");

function replace_ulelement(liste) {

    //foreach (li_elmt in ul_element) {} //try next
    // remove all elements of the ul list, so as this list does not grow to infinite
    while (ul_element.childNodes.length > 0) {
        ul_element.removeChild(ul_element.childNodes[0]);
    }
    for (var i=0; i < liste.length; i++) {
        var new_lielmt = document.createElement("LI");
        new_lielmt.innerHTML=liste[i].title;
        ul_element.appendChild(new_lielmt);
    }
}

// il reste a appeler cette fonction dans un cadre de Promise

</script>

<?php if (!isset($loggedUser['insearch'])) : ?>
       <form action="searchrecipe.php" method="POST">
       <!-- si message d erreur on affiche -->
       <?php if (isset($errorMessage)) : ?>
           <div class="alert alert-danger" role="alert">
               <?php echo $statusUser; ?>
           </div>
       <?php endif ; ?>
       <h1>Rechercher des recettes</h1>
       <p id="pintro1">Rechercher par mot clé</p>
           <div class="mb-3">
               <label for="titlekey" class="form-label">Mots composant le titre (xx,yy)</label>
	       <input type="text" class="form-control" id="titlekey" name="titlekey">
	   </div>
           <div class="mb-3">
	       <label for="category" class="form-label">Category</label>
               <!-- a remplacer par un select -->
	       <input type="text" class="form-control" id="category" name="category">
	   </div>
	   <button type="submit" class="btn btn-primary">Envoyer</button>
         </form>
    <ul id="listrecipes">
        <li>Riz-Quinoa</li>
        <li>Poulet-gnoccis</li>
    </ul>
<!-- then follow of our application: do the form to prompt input our keywords -->
<?php else: ?>
   <div class="alert alert-success" role="alert">
       <?php if ($loggedUser['insearch']==="success") {
          require_once(__DIR__.'/views/recipevue.php');
       } ?>
   </div>
<?php endif; ?>
