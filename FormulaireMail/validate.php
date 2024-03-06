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
$to='frederic.peugny@gmail.com';

$subject='Tutorial - Test Mail';
$msg='Message du mail'."\r\n\r\n";
$msg .= $usermsg."\r\n";
//headers
$headers='From: '.$username.' <'.$useremail.'>'."\r\n\r\n";
$headers .= "\r\n";

// Function mail()
mail($to, $subject, $msg,$headers);
     }
  }
}
if (!empty($alert))
{
	echo $alert;
}

?>

