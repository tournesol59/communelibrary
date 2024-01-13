<?php

 $livres=[['id'=>1,
           'titre'=>'Odyssee',
	   'idAuteur'=> 1],
           ['id'=>4,
           'titre'=>'Une chance de trop',
	   'idAuteur'=> 2],
           ['id'=>7,
           'titre'=>'Dune',
	   'idAuteur'=> 3],
           ['id'=>9,
           'titre'=>'Les guerriers du silence',
	   'idAuteur'=> 4],
           ['id'=>2,
           'titre'=>'Sahara',
	   'idAuteur'=> 2]
         ]; 
/*
        echo "<select name="'livre'>";
	if(isset($_POST["idAuteur"])) {
		mysql_connect("localhost","root","root");
		mysql_select_db("test");
		$res=mysql_query("SELECT id,titre FROM livre WHERE idAuteur=".$_POST["idAuteur"]." ORDER BY titre");
	while ($row=mysql_fetch_asssoc($res)) {
		echo "<option value='".$row["id"]."'>"$row["titre"]."</option>";
	}
}
echo "</select>";
 */
// fred variante sans mysql:
         echo "<select name='livre'>";
	 if(isset($_POST["idAuteur"])) {
	    foreach($livres as $element) {
               if ($element['idAuteur']===idAuteur) {
                  echo "<option value='".$element["id"]."'>".$element["titre"]."</option>";
	       }
	    }
         }
                
?>
