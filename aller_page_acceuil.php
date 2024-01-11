<?php
include('verifier_login_et_pwd.php');
if (!$liste_users)
{
    echo 'Mauvais identifiant ou mot de passe !'; // en réalité c'est mauvais mot de passe mais on brouille les pistes pour 
												 // ne pas faciliter la connexion en cas de piratage
	include('index.php');
	
}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $liste_users['id_tble_users'];
        $_SESSION['pseudo'] = $var_login;
		$_SESSION['ligne_maxi'] = 25;
        //echo 'Vous êtes connecté !';
		
		
    }
    else {
        $erreur = 'Pseudo ou Mot de passe incorrects !';
			include('index.php');

    }
}

	if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
    //echo 'Bonjour ' . $_SESSION['pseudo'];
	include('contenu_page_acceuil.php');
}
?>