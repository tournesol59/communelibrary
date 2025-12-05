<?php
$postData=$_POST;
$statusUser = "";
$loggedUser = "";
$errorMessage = "";

if ((!isset($postData['email'])) || (!isset($postData['password']))) {
   if ($statusUser == "") {
		// first default try to connect: redirect to login
      $statusUser = "error";
      $errorMessage = "Veuillez entrer vos identifiants de connexion";
   }
   elseif ($statusUser == "error") {
      $statusUser = "seconderror";
      $errorMessage = "Vous devez d abord vous enregistrer";
   }
}
else {
   $postemail = $postData['email'];
   $postpasswd = $postData['password'];
   //verification : connection to database
   //mysqli_connect("localhost","root","");
   //prefer this

   try{
      $host = "localhost";
      $db_name = "usercpp";
      $db_user = "root";
      $db_passwd = "";
      echo 'email entre: '.$postemail.' password:: '.$postpasswd;
      $_connection = new \PDO("mysql:host=".$host. ";dbname=" .$db_name, $db_user, $db_passwd);
      $_connection->exec("set names utf8");
      $_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

      $sql = "SELECT * FROM user WHERE email='".$postemail."'";
      //var_dump($sql);
      $query = $_connection->prepare($sql);
      //$query->bindParam('email', $postemail, PDO::PARAM_INT); // "is" means that $id is bound as an integer and $label as a string
      $query->execute();
      $result = $query->fetchAll();
      
   } catch (PDOException $exception) {
      echo "Erreur de connexion : " .$exception->getMessage();
   }
   $icount = 0;
   while (isset($result[$icount])) {
      if ($result[$icount]['email'] === $postemail) { // email, lastname==result['name']
         $statusUser = "connected";
         $loggedUser = ['login' => $postemail];
         $icount += 1;
      }
   }
   // normally icount === 1
  
  /* if no database present:
   *
         $statusUser = "connected";
         $loggedUser = ['login' => 'olivier.simon@centraliens.net'];
   echo "the database tests cannot be run with this version of the code";
  */
}
?>
<?php if (!isset($loggedUser['login'])) : ?>
    <form action="index.php" method="POST">
	<!-- si message d erreur on affiche -->
    <?php if (isset($errorMessage)) : ?>
        <div class="alert alert-danger" role="alert">
	<?php echo $statusUser; ?>
         </div>
     <?php endif ; ?>
        <h1>Entrez vos identifiants</h1>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
	    <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
	    </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
	</form>
<?php else : ?>
   <div class="alert alert-success" role="alert">
      <p>Bonjour<?php if (isset($loggedUser['login'])) echo $loggedUser['login']; ?> et bienvenue sur le site !</p>
   </div>
<?php endif ; ?>
