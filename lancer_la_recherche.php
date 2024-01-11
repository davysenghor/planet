<?php
session_start();// mettre toujours en haut de page pour éviter warning
//récupération des valeurs  des arguements de la fonction affichee tableaux
if(isset($_POST['valeur_lue']))$valeur_lue = $_POST['valeur_lue'];
if(isset($_POST['valeur_filtre_0'])) $valeur_filtre_0 = $_POST['valeur_filtre_0'];
if(isset($_POST['valeur_filtre_1'])) $valeur_filtre_1 = $_POST['valeur_filtre_1'];
if(isset($_POST['option_choisie'])) $option_choisie = $_POST['option_choisie'];

print_r($_POST);
include('carte_de_visite.php');


//echo  $valeur_filtre_0.'-'.$valeur_filtre_1.'-'.$valeur_filtre_2;
$debut=$valeur_lue;
$pas=25;
$fin=$debut + $pas ;
$debut =$_SESSION['deb'];
$sortie= carte_de_visite(1,$debut,$fin,$valeur_lue, $valeur_filtre_0, $option_choisie, $valeur_filtre_1); 
//param d'entrées ($filtre,$debut,$fin,$valeur_lue, $val_filtre_0,$option_choisie,  $val_filtre_1)
//echo'la sortie est :';
//print_r($sortie);
//echo 'hellooooo';

?>