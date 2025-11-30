<?php
//require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de confirmation du contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
  <div class="container">
    <?php require_once(__DIR__ . '/header.php'); ?>
<!-- ?php if (!isset(loggedUser['login'])) : ?-->
<!-- no , we include the page login.php which does the conditional treatment -->
   <?php require_once(__DIR__ . '/login.php'); ?>

   <?php if (isset($loggedUser['login'])) : ?>
   <!-- the identification has established --> 
       <?php if (!isset($loggerUser['contactname'])) : ?>  
       <!-- has a contact been selected in contactref.php ? -->  
	  <?php require_once(__DIR__.'/contactref.php'); ?>
        <?php else: ?>
         <div class="alert alert-success" role="alert">
            <p>Bonjour <?php echo $loggedUser['login']; ?> et bienvenue sur le site !</p>
	    <p>Votre contact est <?php echo $loggedUser['contactname']; ?></p>
	 </div>
       <?php endif; ?>
   <?php endif; ?>
 </div>

  <!-- inclusion du bas de page du site -->
   <?php require_once(__DIR__ . '/footer.php'); ?>
</body>

</html>
