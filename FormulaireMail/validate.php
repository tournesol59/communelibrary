<?php
$postData=$_POST;
if (get_magic_quotes_gpc())
{
	$username= stripslashes(trim($postData['name']));
	$useremail=stripslashes(trim($postData['email']));
	$usermsg=stripslashes(trim($postData['requete']));
}
else
{
	$username=trim($postData['name']);
	$useremail=trim($postData['email']);
	$usermsg=trim($postData['requete']);
}
/* Expression régulière permettant de vérifier qu'aucun en-tête n'est inséré dans nos champs */
$regex_head = '/[\n\r]/';   
/* On vérifie qu'il n'y a aucun header dans les champs */ 
if (preg_match($regex_head, $useremail) || preg_match($regex_head, $username))
{
	$alert='En tete interdites dans les champ du formulaire';
}
else
	/* Si le formulaire n'est pas posté de notre site on renvoie vers la page d'accueil */
  if ($_SERVER['HTTP_REFERER'] != 'http://www.monsite.com/send_email.php')
  {  
    header('Location: http://www.monsite.com/'); 
  } *
  else
  {
     if (empty($username) || empty($useremail) || empty($usermsg))
     {
	     $alert = 'Tous les champs doivent être renseignés';
     }
     else
     {
	/* envoi de l'e-mail */

/* Namespace alias */
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    /* include the Composer generated autoload.php file */
    require '/opt/lampp/composer/vendor/autoload.php';
    /* If you installed PHPMailer without Composer do this instead: */
    /* ... */
    /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions */
    $mail = new PHPMailer(TRUE);
    try {
      // mail sender
      $mail->setFrom('frederic.peugny@gmail.com');
      // a mail recipient
      $mail->addAddress($useremail);
      // set subject
      $mail->Subject='Test PHPMail';
      // set message body
      $mail->Body='Hello '.$username.'A simple test message to validate your text in the form: '.$usermsg;
 
      $mail->send();
    }
    catch (Exception $e)
    {
      /* PHPMailer exception */
      echo $e->errorMessage();
    }
    catch (Exception $e)
    {
	    /* PHP exception (note the backslash to select the global namespace Exception class). */
      echo $e->getMessage();
    }
   }
  }
}
if (!empty($alert))
{
	echo $alert;
}

?>

