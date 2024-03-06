<?php 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de la promotion - Page de confirmation du contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
  <div class="container">
  <form action="validate.php" method="POST">
  <h1>Contactez nous</h1>
      <div class="mb-3">
          <label for="name" class="form-label">Nom</label>
          <input type="text" class="form-control" id="name" name="name">
      </div>
       <div class="mb-3">
          <label for="email" class="form-label">email</label>
          <input type="text" class="form-control" id="email" name="email">
      </div>
      <div class="mb-3">
          <label for="requete" class="form-label">Explication de votre demande</label>
          <textarea class="form-control" placeholder="votre requete" id="requete" name="requete" col="40" rows="4"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Envoyer</button>
      </form>

  </div>
</body>
</html>
