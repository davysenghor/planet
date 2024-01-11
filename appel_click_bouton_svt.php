<?php
session_start();// mettre toujours en haut de page pour éviter warning
//récupération des valeurs  des arguements de la fonction affichee tableaux
	if(isset($_POST['new_valeur_lue']))$valeur_lue = $_POST['new_valeur_lue'];
 // if(isset($_POST['valeur_filtre_0'])) $valeur_filtre_0 = $_POST['valeur_filtre_0'];
 // if(isset($_POST['valeur_filtre_1'])) $valeur_filtre_1 = $_POST['valeur_filtre_1'];
 // if(isset($_POST['valeur_filtre_2'])) $valeur_filtre_2 = $_POST['valeur_filtre_2'];
include('carte_de_visite.php');

$nbre_fois = $_SESSION['nbre_fois'];
$lignes_max = $_SESSION['ligne_maxi'];

$pas=25;
$debut= intval($valeur_lue);
$fin=$debut + $pas ;


$sortie=carte_de_visite(0,$debut,$fin,'', '', '', '');
//echo'la sortie est :';
//print_r($sortie);


?>