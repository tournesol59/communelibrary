<?php
require_once(__DIR__ . '/variables.php');
?>

<!DOCTYPE html>
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
function go() {
var xhr = getXhr();
xhr.onreadystatechange=function() {
   if (xhr.readyState==4 && xhr.status==200) {
   leselect=xhr.rsponseText;
//on se sert de innerHtml"
document.getElementById('livre').innerHTML=leselect;
   }
}

xhr.open("POST","ajaxLivre.php",true);
xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
sel=document.getElementById('auteur');
idauteur=sel.options[sel.selectedIndex].value;
xhr.send("idAuteur="+idauteur);
}
</script>
</head>
<body>
   <form>
       <select name='auteur' id='auteur' onchange='go()'>
         <option value='-1'>Aucun</option>
         <?php
	// mysql_connect("localhost","root","root");
	// mysql_select_db("test");
	// $res=mysql_query("SELECT * FROM auteur ORDER BY nom");
	foreach ($auteurs as $auteur) {
		echo "<option value='".$auteur["id"]."'>".$auteur["nom"]."</option>";
	  }
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
