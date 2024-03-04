<?php
$postData=$_POST;
$statusUser = "";
$loggedUser="";
$errorMessage="";

if ((!isset($postData['name']) || (!isset($postData['firstname']) || (!isset($postData['homepage']) || (!isset($postData['birthdate'])) {
   $statusUser = "error";
   $errorMessage="Le formulaire nom et prenom doit etre rempli pour chaque champ";
}
else {
   $postname = $postData['name'];
   $postfirst = $postData['firstname'];
   $postsite = $postData['homepage'];
   $birthdate = $postData['birthdate'];
   $option = $postData['option'];
	//********** connection to db
   mysql_connect("localhost","root","root");
   mysql_select_db("usercpp");
   $res=mysql_query("SELECT * FROM users ORDER BY name WHERE name="+$postname);
   $icount = 0;
   while ($row=mysql_fetch_assoc($res)) {
   // only a simple display to test
	   //      echo "<p>".row['firstname']."</p>";
      $icount +=1;
      if ($row['firstname']===$postfirst) {
         $loggedUser=['login' => sprintf("%s.%s", $postfirst, $postname)];
      }
   }
   if ($icount ===1) {
      $statusUser="connected";
   }
   // if there is more than one row one should compare the birthdate
   elseif ($icount > 1) {
      $jcount=0;
      while ($row=mysql_fetch_assoc($res) {
         if (($row['firstname']===$postfirst) || ($row['birthdate']===$postbirth)) {
	   $jcount+=1;
	   $loggedUser=['login' => sprintf(%s.%s.%d, $postfirst, $postname, $jcount)];
	 }
      }
      $statusUser="connected";
   }
   else {
      $statusUser="notfound";
   }

   // ON COURT CIRCUITE UN PEU POUR TESTER LA PARTIE FORULAIRE SEULEMENT
   $statusUser="connected";
   $loggedUser=['login' => 'frederic.peugny@libertysurf.fr'];

?>

<!-- then follow of our application : redo the form index.php if the user is not authenticated-->

<?php if (!isset($loggedUser)) : ?>
        <form action="index.php" method="POST">
	<!-- si message d erreur on affiche -->
	<?php if (isset($errorMessage)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $statusUser; ?>
	    </div>
        <?php endif ; ?>
        <h1>Contactez nous</h1>
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
	    <div class="mb-3">
	    <div class="mb-3">
                <label for="firstname" class="form-label">Prenom</label>
                <input type="text" class="form-control" id="firstname" name="firstname">
	    </div>
            <div class="mb-3">

                <label for="birthdate" class="form-label">Votre date de naissance (dd-mm-yyyy)</label>
                <input type="text" class="form-control" id="birthdate" name="birthdate">
	    </div>
	       <label for="option" class="form-label">Votre cursus</label>
		<select name="option" id="option">
                    <option value="1">CDR</option>
                    <option value="2">MP</option>
		    <option value="3">PROD</option>
		    <option value="3">MAT</option>
                    <option value="4">ENT</option>
                    <option value="5">INTER</option>
                </select>
            </div>
            <div class="mb-3">

                <label for="homepage" class="form-label">Votre site web personnel</label>
                <textarea class="form-control" placeholer="page perso" id="homepage" name="homepage"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
	</form>
<?php else : ?>
   <div class="alert alert-success" role="alert">
      Bonjour <?php echo $loggedUser['login']; ?> et bienvenue sur le site !
   </div>
<?php endif; ?>

