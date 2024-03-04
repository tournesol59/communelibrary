<?php

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces donn�es doivent �tre test�es et v�rifi�es.
 */

$postData = $_POST;


// Validation du formulaire
if (isset($postData['email']) &&  isset($postData['password'])) {
    if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
        $errorMessage = 'Il faut un email valide pour soumettre le formulaire.';
    } else {
        foreach ($users as $user) {
            if (
                $user['email'] === $postData['email'] &&
                $user['password'] === $postData['password']
            ) {
                $loggedUser = [
                    'email' => $user['email'],
                ];
            }
        }

        if (!isset($loggedUser)) {
            $errorMessage = sprintf(
                'Les informations envoy�es ne permettent pas de vous identifier : (%s/%s)',
                $postData['email'],
                strip_tags($postData['password'])
            );
        }
    }
}
?>

    <!--
       Si utilisateur/trice est non identifi�(e), on affiche le formulaire
    -->
<?php if (!isset($loggedUser)) : ?>
    <form action="index.php" method="POST">
        <!-- si message d'erreur on l'affiche -->
        <?php if (isset($errorMessage)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="you@exemple.com">
            <div id="email-help" class="form-text">L'email utilis� lors de la cr�ation de compte.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    <!-- Si utilisateur/trice bien connect�e on affiche un message de succ�s -->
<?php else : ?>
    <div class="alert alert-success" role="alert">
        Bonjour <?php echo $loggedUser['email']; ?> et bienvenue sur le site !
    </div>
<?php endif; ?>
