<?php 

// récupéraration login saisie et pwd
  if(isset($_POST['var_pseudo'])) {$var_login = $_POST['var_pseudo'];} else $var_login="";
  if(isset($_POST['var_pwd'])){$var_mot_de_passe =$_POST['var_pwd'];} else $var_mot_de_passe="";

try{
    $lignes_resultats = $connexion_bd->prepare('SELECT id_tble_users, mot_de_passe FROM tble_users where pseudo=?');

	/* execution de la requete */
	$lignes_resultats->execute(array($var_login));
	/* Récupération de toutes les lignes d'un jeu de résultats */
	$liste_users= $lignes_resultats->fetch();
	}
	catch(Exception $e)
	{
    exit('<b>Catched exception at line '. $e->getLine() .' (code : '. $e->getCode() .') :</b> '. $e->getMessage());
	}
	

// Comparaison du pass envoyé via le formulaire avec la base
$pass = $liste_users['mot_de_passe']; // mot de passe reçu via formulaire
$pass_hash = password_hash($pass, PASSWORD_DEFAULT);//mot de passe cripté en base de donnees normalement
$isPasswordCorrect = password_verify($var_mot_de_passe,$pass_hash);

if($mode_debug==1)
	{   
	var_dump(!$liste_users);
	echo $var_login;
	echo $var_mot_de_passe;
	var_dump($isPasswordCorrect);
}
	
	 
?>	