<?php
echo "test";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de resultat de la recherche</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    <header clas="main-header">
        <h1>Des recettes de cuisine</h1>
</header>

<body class="d-flex flex-column min-vh-100">
  <div class="container">

<?php if (!isset($loggedUser['insearch'])) : ?>

    <?php require_once(__DIR__.'/searchrecipe.php'); ?>
<?php else: ?>

    <div class="alert alert-success" role="alert">
        <p>Merci d'avoir effectué une recherche !</p>
    </div>
    <?php 
    unset($loggedUser['insearch']);
    require_once(__DIR__.'searchrecipe.php');
    ?>
<?php endif; ?>
