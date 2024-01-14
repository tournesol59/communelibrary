<?php
require_once(__DIR__ . '/variables.php');
?>
<!DOCTYPE html>
<!-- Fred: code transformee en une simple reponse d'un fichier Xml mais cette fois c est plus complet: le responseXml "livres.xml" contient un champ "resume" qui sera insere dans un input text -->
<html>
<head>
<script type='text/javascript'>

/**** PLUS NECESSAIRE
	function getXhr() {
		...
    return xhr;
   }
******/

// MAINTENANT: fonction qui cree une liste de tous les champs titre present dans le fichier
function traiteXmlResponse(requete) {

  // var items=requete.responseXml.getElementByTagName("item");
  // document.getElementById("textresume").innerHTML=items[0].getElementByTagName("resume")[0].firstChild.nodeValue;
// simple pour l'instant
   document.getElementById("textresume").innerHTML=requete.responseText;
   
}

// si on peut utiliser prototype.js voici comment faire une requete
function rechercheLivre() {
   var sel =  document.getElementById("livre");
   var idLivre = sel.options[sel.selectedIndex].value;
   var url='http://127.0.0.1/firstappliAjaxDirect/livres.xml';
   var parametres='idLivre=' + idLivre;

   var myAjax = new Ajax.Request(
      url,
      {
	 method: 'get',
         parameters: parametres,
	 onComplete: traiteXmlResponse
      }
   );
}

/********** AVANT LE MECANISME de requete json, c etait fait comme ca:
function handleHttpResponse() {
}

// fonction associee a la requete au serveur
function go() {
   var xhr = getXhr();
   // on definit ce qu'on va faire quand on aura recu la reponse
   xhr.onreadystatechange=handleHttpResponse;   // ici on fait le requete
} // end function go
 ****************/

</script>
</head>
<body>
   <form>
       <select name='auteur' id='auteur' onchange='rechercheLivre()'>
         <option value='-1'>Aucun</option>
         <?php
/* 
 * previewed code for mysql
        mysql_connect("localhost","root","root");
	mysql_select_db("test");
	$res=mysql_query("SELECT * FROM auteur ORDER BY nom");
	while($row=mysql_fetch_assoc($res)) {
		echo "<option value='".$row['id']."'>".$row['nom']."</option>";
	}
 */
          foreach ($auteurs as $auteur) {
		  echo "<option value='".$auteur["id"]."'>".$auteur["nom"]."</option>";
	?>
	</select>
	<label>Livres</label>
	<div id='livre' style ='display:inline'>
	<select name='livre'>
		<option value='1' >Choisir un auteur</option>
	</select>
 
        <!-- the new field in this page: a text area for resume -->
	<label for="testresume">Resume du livre:</label>

        <textarea id="textresume" name="textresume" rows="4" cols="50">
        Entrez le texte
        </textarea>
	</div>
	</fieldset>
	</form>
</body>
</html>
