<?php
$postData=$_POST;
$statusUser = "";
$loggedUser="";
$errorMessage="";

if ((!isset($postData['name'])) || (!isset($postData['firstname'])) || (!isset($postData['publication'])) || (!isset($postData['birthdate'])) || (!isset($postData['option'])) || (!isset($postData['password'])) || (!isset($postData['repassword']))) {
   $statusUser = "error";
   $errorMessage="Le formulaire nom et prenom doit etre rempli pour chaque champ";
}
else {
   $name = $postData['name'];
   $email = $postData['firstname'];
   $site = $postData['publication'];
   $birthdate = $postData['birthdate'];
   $option = $postData['option'];
   $password = $postData['password'];
   $repassword = $postData['repassword'];
   if ($password === $repassword) {  // fred do other sanitizer in the future
     try{
      $host = "localhost";
      $db_name = "usercpp";
      $db_user = "root";
      $db_passwd = "";
      $_connection = new \PDO("mysql:host=".$host. ";dbname=" .$db_name, $db_user, $db_passwd);
      $_connection->exec("set names utf8");
      $_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

      $sql = "INSERT INTO user (name,firstname,publication,birthdate,useroption,password) VALUES(?,?,?,?,?,?);";
      $query = $_connection->prepare($sql);
      $query->bindValues($name, $email, $site, $birthdate, $option, $password);
      $query->execute();
      
     } catch (PDOException $exception) {
      echo "Erreur de connexion : " .$exception->getMessage();
     }
     $statusUser = "connected";
     $loggedUser= ['login' => $email];
   }
   else {	   
     $statusUser = "error";
     $errorMessage="Veuillez entrer deux mots de passe identiques";
   }
	//********** connection to db
 //  mysqli_connect("localhost","root","root");
 //  mysqli_select_db("usercpp");
 //  $res=mysql_query("SELECT * FROM users ORDER BY name WHERE name="+$postname);
}
?>

<!-- then follow of our application : redo the form index.php if the user is not authenticated-->

<?php if (!isset($loggedUser['login'])) : ?>
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
                <label for="password" class="form-label">Prenom</label>
                <input type="password" class="form-control" id="password" name="password">
	    </div>
	    <div class="mb-3">
                <label for="repassword" class="form-label">Prenom</label>
                <input type="password" class="form-control" id="repassword" name="repassword">
	    </div>

            <div class="mb-3">

                <label for="birthdate" class="form-label">Votre date de naissance (dd-mm-yyyy)</label>
                <input type="text" class="form-control" id="birthdate" name="birthdate">
	    </div>
	       <label for="option" class="form-label">Votre cursus</label>
		<select name="option" id="option">
                    <option value="1">MED</option>
                    <option value="2">DRO</option>
		    <option value="3">LIT</option>
		    <option value="3">ING</option>
                    <option value="4">ENT</option>
                    <option value="5">INTER</option>
                </select>
            </div>
            <div class="mb-3">

                <label for="publication" class="form-label">Votre site web personnel</label>
                <textarea class="form-control" placeholer="page perso" id="publication" name="publication"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
	</form>
<?php else : ?>
   <div class="alert alert-success" role="alert">
      <p>Bonjour <?php if (isset($loggedUser['login'])) echo $loggedUser['login']; ?> et bienvenue sur le site !</p>
   </div>
<?php endif; ?>

