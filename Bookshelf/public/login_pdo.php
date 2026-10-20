<?php
$postData=$_POST;
$statusUser = (isset($_SESSION['user'])) ? $_SESSION['user'] : ""; 
// debug
$loggedUser = "";
$errorMessage = "";

if ((!isset($postData['email'])) || (!isset($postData['password']))
    || ($postData['email'] === '') || ($postData['password'] === '')) {
   if ($statusUser == "") {
		// first default try to connect: redirect to login
      echo "no email or password entered";
      $statusUser = "error";
      $errorMessage = "Veuillez entrer vos identifiants de connexion";
   }
   $_SESSION['user'] = $statusUser;
   echo "session: ".$_SESSION['user']; // debug
}
else {
   $table = "tbluser";
   $postemail = $postData['email'];
   $postpasswd = $postData['password'];
   try {
   // remplacer par PDO::sqlite3:host
      $host = "localhost";
      $db_name = "booksdb3";
      $db_user = "root";
      $db_passwd = "";
      //echo 'email entre: '.$postemail.' password:: '.$postpasswd; // debug
      $_connection = new \PDO("sqlite::memory:", null, null, array(PDO::ATTR_PERSISTENT => true));

      $_connection->exec("set names utf8");

      echo "connection set before query with param email=" .$postemail." ";
      // $_connection = new \PDO("mysql:host=".$host.";dbname=".$db_name, $db_user, $db_passwd);
      // $_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      $sql = "CREATE TABLE " .$this->table . " IF NOT EXISTS (id INT PRIMARY KEY, username VARCHAR(40), email VARCHAR(40), password VARCHAR(40));";
      $sth = $_connection->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
      $sth->execute();
      $sth=null;

      $sql = "SELECT * FROM user WHERE email ='".postemail." ";
      //var_dump($sql);
      $query = $_connection->prepare($sql);
      //$query->bindParam('email', $postemail, PDO::PARAM_INT);
      $query->execute();
      $result = $query->fetchAll();
      $query=null;
 
   } catch (PDOException $e) {
       echo "Erreur de connexion : " .$e->getMessage();
   }
   $icount = 0;
   while (isset($result[$icount])) {
      if (($result[$icount]['email'] === $postemail) &&
	  ($result[$icount]['password'] === $postpasswd)) {

	  $statusUser = "connected";
	  $loggedUser = ['login' => $postemail];
	  $_SESSION['user'] = $postemail;
	  $icount += 1;
      }
   }
   echo "session: " . $_SESSION['user']; //debug
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



