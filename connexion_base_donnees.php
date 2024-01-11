<?php
// varaible de configuration lors du changement de plateforme ( developpement ou production)
$mode_debug=1;
$mise_en_ligne=0;
try
{
	// On se connecte à MySQL
	if (($mode_debug==0 and $mise_en_ligne==0) || ($mode_debug==1))
	$connexion_bd = new PDO('mysql:host=localhost;dbname=code_db;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	elseif($mode_debug==0 and $mise_en_ligne==1)
	$connexion_bd = new PDO('mysql:host=sentravamasoft.mysql.db;dbname=sentravamasoft;charset=utf8', 'sentravamasoft', 'Moctar250590', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	else{}
}
catch(Exception $excep_error)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur mauvaise adresse de la base de données: '.$excep_error->getMessage());
}
?>