<?php
$postData=$_POST;
if (get_magic_quotes_gpc())
{
	$username= stripslashes($postData['name']);
	$useremail=stripslashes($postData['email']);
	$usermsg=stripslashes($postData['requete']);
}
else
{
	$username=$postData['name'];
	$useremail=$postData['email'];
	$usermsg=$postData['requete'];
}

$to='frederic.peugny@gmail.com';

$subject='Tutorial - Test Mail';
$msg='Message du mail'."\r\n\r\n";
$msg .= $usermsg."\r\n";
//headers
$headers='From: '.$username.' <'.$useremail.'>'."\r\n\r\n";
$headers .= "\r\n";

// Function mail()
mail($to, $subject, $msg,$headers);
?>
