<?php
$postData=$_POST;
//$statusUser = (isset($statusUser)) ? $statusUser : $_SESSION['status']; 
$statusUser = (isset($_SESSION['status'])) ? $_SESSION['status'] : ""; 
// debug
$loggedUser = "";
$errorMessage = "";
//if (!defined('ROOT')) {
//   define('ROOT', str_replace('login.php', '', $_SERVER['SCRIPT_FILENAME']));
//}

if ((!isset($postData['email'])) || (!isset($postData['password']))
    || ($postData['email'] === '') || ($postData['password'] === '')) {
   if ($statusUser == "") {
		// first default try to connect: redirect to login
      echo "no email or password entered";
      $statusUser = "error";
      $errorMessage = "Veuillez entrer vos identifiants de connexion";
   }
   elseif ($statusUser == "error") {
      echo "no email or password entered for the second time";
      $statusUser = "seconderror";
      $errorMessage = "Vous devez d abord vous enregistrer";
   }
   $_SESSION['status'] = $statusUser;
   echo "session: ".$_SESSION['status']; // debug
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
      //echo 'email entre: '.$postemail.' password:: '.$postpasswd; // debug
      $_connection = new \PDO("mysql:host=".$host. ";dbname=" .$db_name, $db_user, $db_passwd);
      $_connection->exec("set names utf8");
	  
	  echo "connection set before query with param email=".$postemail." ";
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
      if (($result[$icount]['email'] === $postemail) && 
          ($result[$icount]['password'] === $postpasswd)) {
             // email, lastname==result['name']
         $statusUser = "connected";
	      $loggedUser = ['login' => $postemail];
	      $_SESSION['user'] = $postemail;
         $icount += 1;
      }
   }
   // normally icount === 1
   // save into session the status of the user
     $_SESSION['status'] = $statusUser;
     echo "session: ".$_SESSION['status']; // debug
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
