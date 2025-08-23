<?php
$postData=$_POST;
$statusUser = "";
$loggedUser = "";
$errorMessage = "";

// fred: query the database cppuser and simple echo the lines
     try{
      $host = "localhost";
      $db_name = "usercpp";
      $db_user = "root";
      $db_passwd = "";
      $_connection = new \PDO("mysql:host=".$host. ";dbname=" .$db_name, $db_user, $db_passwd);
      $_connection->exec("set names utf8");
      $_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT * from cppuser";
      $query = $_connection->prepare($sql);
      $query->execute();
      $result = $query->fetchAll();
      
   } catch (PDOException $exception) {
      echo "Erreur de connexion : " .$exception->getMessage();
   }
$icount = 0;
   echo '<table>';
   echo '<tr><td>name</td><td>firstname</td><td>publication</td><td>birthdate</td><td>option</td></tr>';
   while isset($result[$icount]) {
	   echo '<tr>';
	   echo '<td>'.$result['name'].'</td><td>'
		      .$result['firstname'].'</td><td>'
		      .$result['publication'].'</td><td>'
		      .$result['birthdate'].'</td><td>'
		      .$result['option'].'</td><td></tr>';

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
                <label for="email" class="form-label">Nom</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
	    <div class="mb-3">
                <label for="password" class="form-label">Prenom</label>
                <input type="password" class="form-control" id="password" name="password">
	    </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
	</form>
<?php else : ?>
   <div class="alert alert-success" role="alert">
      <p>Bonjour admin<?php if (isset($loggedUser['login'])) echo $loggedUser['login']; ?> et bienvenue sur le site !</p>
   </div>

<?php endif ; ?>
