<?php
require_once(__DIR__ . '/variables.php');
?>
<!DOCTYPE html>
<!-- Fred: code transformee en une simple reponse d'un fichier Xml mais cette fois c est plus complet: le responseXml "livres.xml" contient un champ "resume" qui sera insere dans un input text -->
<html>
<head>
<script type='text/javascript'>
   function getXhr() {
      var xhr=null;
      if(window.XMLHttpRequest)  
         xhr=new XMLHttpRequest();
      else if(window.ActiveXObject) {
         try {
            xhr=new ActiveXObject("Msxml2.XMLHTTP");
         } catch(e) {
            xhr= new ActiveXObject("Microsoft.XMLHTTP");
         }
      }
      else {
          alert("Votre navigateur ne supporte pas les objets XMLHttpRequest..");
          xhr=false;
   }
   return xhr;
   }

//les variables globales
  //pour le code Xml "propre"
var response;
  //pour l objet liste a puce que l on a creee dans une premiere version
//var _completeListe = document.createElement("UL");

// fonction qui cree une liste de tous les champs titre present dans le fichier
function traiteXmlResponse() {

   var items=response.getElementByTagName("item");
  // count =1; // count=items.length; // test du premier element pour le moment
   
   document.getElementById("textresume").innerHTML=items[0].getElementByTagName("resume")[0].firstChild.nodeValue;
   
}

function handleHttpResponse() {
	// on ne fait qqchose qui si on a tout recu et que le serveur est ok
   if (xhr.readyState==4 && xhr.status==200) {
      leselect=xhr.responseXml;
      response = cleanXML(leselect.documentElement);

      traiteXmlResponse();
      // APRES on fera:
      //document.getElementById('livre').innerHTML=metEnPlace(liste);
      //d ABORD:
    }
}

// fonction associee a la requete au serveur
function go() {
   var xhr = getXhr();
   // on definit ce qu'on va faire quand on aura recu la reponse
   xhr.onreadystatechange=   // ici on fait le requete
   xhr.open("GET","livres.xml",true);

   // APRES: use GET
   / xhr.send(null);
} // end function go

</script>
</head>
<body>
   <form>
       <select name='auteur' id='auteur' onchange='go()'>
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
