<?php
require_once(__DIR__ . '/variables.php');
?>
<!DOCTYPE html>
<!-- Fred: code transformee en une simple reponse d'un fichier Xml (responseXml) "livres.xml" -->
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
  //pour l objet liste a puce que l on va creer dans une premiere version
var _completeListe = document.createElement("UL");
_completeListe.id = "completeListe";
document.body.appendChild(_completeListe);

// fonction qui cree une liste de tous les champs titre present dans le fichier
function traiteXmlResponse() {
   liste = new Array();
   var items=response.getElementByTagName("item");
   count =1; // count=items.length; // test du premier element pour le moment
   for (i=0; i < count; i++) { 
      liste.push( items[i].getElementByTagName("title")[0].firstChild.nodeValue;
   }
   return liste;
}

// fonction qui va ajouter des elements à la liste a puce d'abord au lieu de select
function metEnPlace(liste) {
   // d'abord supprime tous les elements sinon croit a l infini
   while (-completeListe.childNodes.length > 0) {
      _completeListe.removeChild(_completeListe.childNodes[0]);       
   }
   // ensuite ajoute
   for (var i=0; i < liste.length; ++i) {
      var nouveauElement = document.createElement("LI");
      nouveauElement.innerHTML = liste[i];
      _completeListe.appendChild(nouveauElement);
   }
}

function handleHttpResponse() {
	// on ne fait qqchose qui si on a tout recu et que le serveur est ok
   if (xhr.readyState==4 && xhr.status==200) {
      leselect=xhr.responseXml;
      response = cleanXML(leselect.documentElement);
      // fred: ici remplacer par responseXml, toujours se servir de innerHTML
      liste=traiteXmlResponse();
      // APRES on fera:
      //document.getElementById('livre').innerHTML=metEnPlace(liste);
      //d ABORD:
      metEnPlace(liste);
    }
   }
// fonction associee a la requete au serveur
function go() {
   var xhr = getXhr();
   // on definit ce qu'on va faire quand on aura recu la reponse
   xhr.onreadystatechange=handleHttpResponse;   // ici on fait le requete
   xhr.open("GET","livres.xml",true);
   //AVANT: ne pas oublier ca pour le post
//   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
//   sel=document.getElementById('auteur');
//   idauteur=sel.options[sel.selectedIndex].value;
//   xhr.send("idAuteur="+idauteur);
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
	</div>
	</fieldset>
	</form>
</body>
</html>
