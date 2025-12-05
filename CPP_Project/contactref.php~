<script src=jquery.js></script>

<script>
/*
function miseajourContact() {
   var txt=""; // debug
   $.ajax({
      url : "http://127.0.0.1/CPP_Demo/contacts.xml";
      complete : function(xhr, result) 
      {
         // traitement ici
	 if (result != "success" return;
	 var items = xhr.responseXML.getElementsByTagName("contact");

	 let opts = "";
	 for (let i=0; i < items.length; i++) {
	    opts += "<option value="+i+">" + items[i].childNodes[0].nodeValue + "</option>";
	 }
	 document.getElementById("contact").innerHTML = txt; // est ce que ca reintialise tous les choix de contacts?
      }
   });
}
 */
</script>

<?php
$postData=$_POST;
$statusContact = "";
$loggedUser = "";
$errorMessage = "";
$errorMessage="vous pouvez selectionner un contact referent";
// instanciates a controller+model single class object, using the php object layer
$modelname = 'contactrefmod';
$controllername = '\\controller\\Contactrefctl';
require_once(__DIR__ . '/controller/Controllerabs.php');
require_once(__DIR__ . '/controller/Contactrefctl.php');
var_dump($controllername);
$controller = new \controller\Contactrefctl($modelname); // yes it works

if (!isset($postData['contactname'])) {
   $statusContact="noselected";
   $errorMessage="vous n'avez pas selectionne de contact referent";
   // use the above defined controller method
   echo "liste de tout les contacts"; // debug
   $contacts = $controller->sortContacts();
   var_dump($contacts);

}
else {
   $contactname = $postData['contactname'];
   // interrogation en base de donnees pour avoir l adresse du contact
   $statusContact = "selected";
   $loggedUser['contactname'] = $contactname;
   $_SESSION['user']=['contact' => $contactname];
   $errorMessage = "";   
   // use the above defined controller method
   $controller->render($contactname);

}
/*
 *
$contacts = [['id' => 1, 'name' => 'aucun'],
	['id' => 2, 'name' => 'Simon'],
	['id' => 3, 'name' => 'Fressancourt']];
  var_dump($contacts);
  echo "the database tests cannot be run with this version of the code";
 */
?>

<?php if (!isset($loggedUser['contactname'])) : ?>
    <?php if (isset($errorMessage)) : ?>
    <div class="alert alert-danger">
        <?php echo $errorMessage ?>
    </div>
    <h2>Vous pouvez selectionner un contact</h2>
    <form action="contactref.php">
       <div class="mb-3">
       <select name="contact" id="contact" ><!--onchange='miseajourContact()'-->
          <?php
            foreach ($contacts as $contact) {
		    echo "<option value='".
			    $contact['id']."'>".
			    $contact['name'].
			    "</option>";
            }
          ?>
       </select>
       </div>
       <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    <?php endif; ?>
<?php elseif (isset($_SESSION['user']['contact'])) : ?>
    <p>Valider pour selectionner ce contact <?php echo$_SESSION['user']['contact'] ?></p>
    <a href="index.php?p=contactref/render/<?=$_SESSION['user']['contact'] ?>">Afficher coordonnees</a>
     <?php unset($_SESSION['user']['contact']) ?>
<?php endif; ?>

