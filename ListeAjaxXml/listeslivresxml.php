<?php
 require_once(__DIR__ . 'variables.php');
?>
<!DOCTYPE html>
<html>
<head>
<script src=jquery.js></script>
<script>
//lecode jQuery/AJAX ici
$("idauteur").bind("select", function(event) { //l evenement declencheur
  $.ajax({url: "unlivre.php", success: function(responseXml, xhr){
// ajoute un nouvel element dans la liste déroulante, plus tard plusieurs
   //var min = 1,
   //max = 1,
   select = document.getElementById('idlivre');
   var docXml=responseXml;
  // for (var i = min; i<=max; i++){
	   var optXml=docXml.getElementByTagName("livre");
	   var opttxt=optXml.getElementByTagName("titre");
       var opt = document.createElement('option');
       opt.value = i;
       opt.innerHTML = opttxt;
       select.appendChild(opt);
   // }
  }});
});
</script>
</head>
<body>
  <h1>Page de selection d'un auteur/livre</h1>
  <form>
     <select name='auteur' id='idauteur'>
         <option value='-1'>Aucun</option>	 
	    <?php 
		$ii=1;
		foreach ($auteurs as $aut) {
			echo "<option value='".$ii."'>".$aut."</option>";
			$ii++;
		}
        ?>		
	 </select>
	<div id='livre' style ='display:inline'>	 
     <select name='livre' id='idlivre'>	
         <option value="1" >auteur</option>
	 </select>
	 </div>
  </form>
</body>
</html>