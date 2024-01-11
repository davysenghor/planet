<?php


function carte_de_visite($filtre,$debut,$fin,$valeur_lue,$val_filtre_0,$option_choisie, $val_filtre_1)
{
include('connexion_base_donnees.php');

  try{
	 
if($mode_debug) echo $debut. '-' .$fin; 

	 // trouver le nombre total d'interpretes 
	$enregistrement_inter = $connexion_bd->prepare('SELECT count(*) as nbre FROM tble_annuaire_interpretes');
	
	$enregistrement_inter->execute();
	$liste_interpretes = $enregistrement_inter->fetch();
	$nre_interpretes = $liste_interpretes['nbre'];

	if (!$filtre) //affichage  à l'ouverture, filtre pas encore utilisé
	{$lignes_resultats = $connexion_bd->prepare('SELECT * FROM tble_annuaire_interpretes  GROUP by Prenom ORDER BY Prenom ASC LIMIT ?,?');
	$lignes_resultats->bindParam(1, $debut, PDO::PARAM_INT);
	$lignes_resultats->bindParam(2, $fin, PDO::PARAM_INT);
	$lignes_resultats->execute();
	}
	elseif($filtre) //affichage  après l'ouverture, filtre pas encore utilisé
	{
	
	if ($option_choisie!=0  and empty($val_filtre_1))
	{ 



$lignes_resultats= $connexion_bd->prepare('SELECT * FROM tble_annuaire_interpretes WHERE Langues_parlees like ? or Nom like ? or Prenom like ?  GROUP BY Prenom ORDER BY Prenom ASC');

	

	$val_filtre_0 = '%'.$val_filtre_0.'%'; // % ajouter  pour les filtre like 
	$lignes_resultats->bindParam(1, $val_filtre_0, PDO::PARAM_STR);
	$lignes_resultats->bindParam(2, $val_filtre_0, PDO::PARAM_STR);
	$lignes_resultats->bindParam(3, $val_filtre_0, PDO::PARAM_STR);

    }
	if ($option_choisie==0  and !empty($val_filtre_1))
	{
	$lignes_resultats= $connexion_bd->prepare('SELECT * FROM tble_annuaire_interpretes WHERE Langues_parlees like ? or Nom like ? or Prenom like ?  GROUP BY Prenom ORDER BY Prenom ASC');
	$val_filtre_1 = '%'.$val_filtre_1.'%'; // % ajouter  pour les filtre like 
	$lignes_resultats->bindParam(1, $val_filtre_1, PDO::PARAM_STR);
	$lignes_resultats->bindParam(2, $val_filtre_1, PDO::PARAM_STR);
	$lignes_resultats->bindParam(3, $val_filtre_1, PDO::PARAM_STR);
	}
	
	if ($option_choisie!=0 and !empty($val_filtre_1) )
	{
	$lignes_resultats= $connexion_bd->prepare('SELECT * FROM tble_annuaire_interpretes WHERE Langues_parlees like ? and (Nom like ? or Prenom like ?)  GROUP BY Prenom ORDER BY Prenom ASC');
	$val_filtre_0 = '%'.$val_filtre_0.'%';
	$val_filtre_1 = $val_filtre_1.'%'; // % ajouter  pour les filtre like 
	$lignes_resultats->bindParam(1, $val_filtre_0, PDO::PARAM_STR);
	$lignes_resultats->bindParam(2, $val_filtre_1, PDO::PARAM_STR);
	$lignes_resultats->bindParam(3, $val_filtre_1, PDO::PARAM_STR);
	}
	
	
} // fin elseif
		
	else{}
	/* execution de la requete */


	if($mode_debug)  var_dump( $lignes_resultats);
		
	$lignes_resultats->execute();
	/* Récupération de toutes les lignes d'un jeu de résultats */
	$liste_interpretes = $lignes_resultats->fetchAll();
	$nbre_lignes_result = count($liste_interpretes);
	
	
	if($mode_debug)
	{
	//echo 'valeur_text_affichee=' .$val_lue. '<br>';
	echo 'valeur filtre_0= ' .$val_filtre_0. '<br> valeur filtre_1= ' .$val_filtre_1;
	echo 'filtre_actif= ' .$filtre. '<br>';
		
	echo 'nbre_lignes_resultats = ' .$nbre_lignes_result. '<br>';
	//print_r($liste_interpretes);
	}
	

	}
	catch(Exception $e)
	{
    exit('<b>Catched exception at line '. $e->getLine() .' (code : '. $e->getCode() .') :</b> '. $e->getMessage());
	}

if($nbre_lignes_result==0) echo '<h6>Nous avons trouvé 0 contact correspondant à votre recherche</<h6>';
if ($nbre_lignes_result!=0)
{
foreach	($liste_interpretes as $cles => $users_data) 
{

echo '<div class="col-lg-4 col-md-4 col-sm-4  col-xs-4 mb-2 mt-1">';
echo'<a href="formulaire_modif_interprete.php?id_interprete=';
echo $liste_interpretes[$cles]['id_tble_annuaire_interpretes'].'"';
 
echo 'class="btn " role="button" id="image_button">';
echo'<div class="card border-primary  h-100"> <div class="card-body">';

echo'<h6 class="card-title">';
if (!empty($liste_interpretes[$cles]['Prenom']) ||!empty($liste_interpretes[$cles]['Nom']))
	
{
echo $liste_interpretes[$cles]['Prenom'].' '.$liste_interpretes[$cles]['Nom'];
}
echo '</h6>'; 


echo '<h6 class="card-subtitle mb-2 text-muted">';
if (!empty($liste_interpretes[$cles]['Tel_Mobile']))
{
echo		$liste_interpretes[$cles]['Tel_Mobile'];
}
echo '</h6>';


echo'	    <h5 class="card-text text-warning" style=" font: normal normal serif ;"> ';
if (!empty($liste_interpretes[$cles]['Langues_parlees']))
{

echo      $liste_interpretes[$cles]['Langues_parlees'];
}
echo'		</h5>';


 echo'	   <a href="#" class="card-link">';
 if (!empty($liste_interpretes[$cles]['Tel_domicile']))
 {

echo $liste_interpretes[$cles]['Tel_domicile'];
 }
echo'		</a>';

 echo'	   <a href="#" class="card-link">';

 if (!empty($liste_interpretes[$cles]['Numero']))
 {
echo $liste_interpretes[$cles]['Numero'];
 }
echo'		</a>';




 echo '</div></div>';
echo '</a>';
echo '</div>';

} // fin foreach
} // fin if ($nbre_lignes_result!=0)


	
$sortie = 	$nbre_lignes_result;
return $sortie;

$lignes_resultats->closeCursor(); // Termine le traitement de la requête
$enregistrement_inter->closeCursor();
} // fin function





?>