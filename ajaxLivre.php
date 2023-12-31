<?php
	echo "<select name="'livre'>";
	if(iset($_POST["idAuteur"])) {
		mysql_connect("localhost","root","root");
		mysql_select_db("test");
		$res=mysql_query("SELECT id,titre FROM livre WHERE idAuteur=".$_POST["idAuteur"]." ORDER BY titre");
	while ($row=mysql_fetch_asssoc($res)) {
		echo "<option value=’".$row["id"]."’>"$row["titre"]."</option>";
	}
}
echo "</select>";
?>
