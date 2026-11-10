<?php
function displayAuthor(string $authorEmail, array $users): string
{
	// la distinction se fait sur l email qu il faut envoyer c params
	// renvoie une chaine de caracteres avec le nom et l age
    foreach ($users as $user) {
        if ($authorEmail === $user['email']) {
            return $user['full_name'] . '(' . $user['age'] . ' ans)';
        }
    }
    return 'Auteur inconnu';
}

