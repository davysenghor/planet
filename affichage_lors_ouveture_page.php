<?php
session_start(); // mettre toujours en haut de page pour éviter warning
include('connexion_base_donnees.php');
include('carte_de_visite.php');



// nbre de lignes totales àafficher
// modifier le 30/11/2023; la requete sql SELECT * FROM tble_annuaire_interpretes GROUP BY Prenom ASC renvoie une erreur
//$nbre_tot_enregistrement = $connexion_bd->prepare('SELECT * FROM tble_annuaire_interpretes GROUP BY Prenom ASC');
$nbre_tot_enregistrement = $connexion_bd->prepare('SELECT * FROM `tble_annuaire_interpretes` GROUP BY Prenom ORDER BY Prenom asc');
$nbre_tot_enregistrement->execute();
$liste_interpretes = $nbre_tot_enregistrement->fetchAll();
$nbre_lignes_result = count($liste_interpretes);

$debut =0;
$fin =25 + $debut ;
$_SESSION['deb'] = $debut;
carte_de_visite(0,$debut,$fin,'','','','');  //param d'entrées ($filtre,$debut,$fin,$valeur_lue, $val_filtre_0,$option_choisie,  $val_filtre_1)

$lignes_max_affiche = $_SESSION['ligne_maxi'];        
$rest_div_par_lignes_max_affiche = $nbre_lignes_result%$lignes_max_affiche;
// nbre de fois à lciquer pour atteindre la totalité des lignes de résultat
$nbre_fois = ($nbre_lignes_result - $rest_div_par_lignes_max_affiche)/$lignes_max_affiche;
if($rest_div_par_lignes_max_affiche!=0) $nbre_fois = $nbre_fois+1;
$_SESSION['nbre_fois'] = $nbre_fois;

if($mode_debug==1)
{
echo 'nbre_fois = ' .$nbre_fois;
echo 'nbre_ligne_max' .$lignes_max_affiche;
}
?>