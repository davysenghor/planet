
<?php


function affiche_tableau($filtre,$debut,$fin, $val_filtre_0, $val_filtre_1, $val_filtre_2)
{
include('connexion_base_donnees.php');

  try{
	 
echo $debut. '-' .$fin;	 

	 // trouver le nombre total d'interpretes 
	$enregistrement_inter = $connexion_bd->prepare('SELECT count(*) as nbre FROM tble_annuaire_interpretes');
	$enregistrement_inter->execute();
	$liste_interpretes = $enregistrement_inter->fetch();
	$nre_interpretes = $liste_interpretes['nbre'];
	// definir le debut, pas et fin de l'affichage
	//$debut =0;
	//$n_pas =$nre_interpretes/$pas;
	//$fin = $debut + $pas;
	// affiche en fonction du début et de la fin
	
	if (!$filtre) //affichage  à l'ouverture, filtre pas encore utilisé
	{$lignes_resultats = $connexion_bd->prepare('SELECT * FROM tble_annuaire_interpretes GROUP BY Prenom ASC LIMIT ?,?');
	$lignes_resultats->bindParam(1, $debut, PDO::PARAM_INT);
	$lignes_resultats->bindParam(2, $fin, PDO::PARAM_INT);
	$lignes_resultats->execute();
	}
	elseif($filtre) //affichage  après l'ouverture, filtre pas encore utilisé
	{
		
	/*lorsqu'on utilise le select box pour ne filtrer que sur les langues fortement utilisées*/
	if (empty($val_filtre_1) and empty($val_filtre_2))
	{ 
	$lignes_resultats= $connexion_bd->prepare('SELECT * FROM tble_annuaire_interpretes WHERE Langues_parlees like ?  GROUP BY Prenom ASC');
	$val_filtre_0 = '%'.$val_filtre_0.'%';
	$lignes_resultats->bindParam(1, $val_filtre_0, PDO::PARAM_INT);
	
	}
	/* filtre sur une langue saisie et un Prenom */
	if (!empty($val_filtre_1) and !empty($val_filtre_2))
	{
	$lignes_resultats= $connexion_bd->prepare('SELECT * FROM tble_annuaire_interpretes WHERE Langues_parlees like ?  AND Prenom like ? GROUP BY Prenom ASC  LIMIT ?,?');
	$val_filtre_1 = '%'.$val_filtre_1.'%';
	$val_filtre_2 = '%'.$val_filtre_2.'%';
	
	$lignes_resultats->bindParam(1, $val_filtre_1, PDO::PARAM_INT);
	$lignes_resultats->bindParam(2, $val_filtre_2, PDO::PARAM_INT);
	$lignes_resultats->bindParam(3, $debut, PDO::PARAM_INT);
	$lignes_resultats->bindParam(4, $fin, PDO::PARAM_INT);
	}
	/* filtre sur la langue saisie */ 	
	if (!empty($val_filtre_1) and empty($val_filtre_2))	
	{
	$lignes_resultats= $connexion_bd->prepare('SELECT * FROM tble_annuaire_interpretes WHERE Langues_parlees like ?  GROUP BY Prenom ASC  LIMIT ?,?');
	$val_filtre_1 = '%'.$val_filtre_1.'%';
	
	$lignes_resultats->bindParam(1, $val_filtre_1, PDO::PARAM_INT);
	$lignes_resultats->bindParam(2, $debut, PDO::PARAM_INT);
	$lignes_resultats->bindParam(3, $fin, PDO::PARAM_INT);
	}
	/* filtre sur le Prenom */
	if (empty($val_filtre_1) and !empty($val_filtre_2))
	{
	$lignes_resultats= $connexion_bd->prepare('SELECT * FROM tble_annuaire_interpretes WHERE Prenom like ? GROUP BY Prenom ASC  LIMIT ?,?');
	$val_filtre_2 = '%'.$val_filtre_2.'%';
	
	$lignes_resultats->bindParam(1, $val_filtre_2, PDO::PARAM_INT);
	$lignes_resultats->bindParam(2, $debut, PDO::PARAM_INT);
	$lignes_resultats->bindParam(3, $fin, PDO::PARAM_INT);
	}
	
} // fin elseif
		
	else{}
	/* execution de la requete */

	$lignes_resultats->execute();
	/* Récupération de toutes les lignes d'un jeu de résultats */
	$liste_interpretes = $lignes_resultats->fetchAll();
	$nbre_lignes_result = count($liste_interpretes);
	
	
	if($mode_debug)
	{
	//echo 'valeur_text_affichee=' .$val_lue. '<br>';
	echo 'valeur filtre_0= ' .$val_filtre_0. '<br> valeur filtre_1= ' .$val_filtre_1. '<br> valeur filtre_2= ' .$val_filtre_2. '<br>';
	echo 'filtre_actif= ' .$filtre. '<br>';
		
	echo 'nbre_lignes_resultats = ' .$nbre_lignes_result. '<br>';
	//print_r($liste_interpretes);
	}
	

	}
	catch(Exception $e)
	{
    exit('<b>Catched exception at line '. $e->getLine() .' (code : '. $e->getCode() .') :</b> '. $e->getMessage());
	}



foreach	($liste_interpretes as $cles => $users_data)  {
	
			  echo '<tr>'; 
			  
			  echo '<td>';
					echo $cles + 1;
                echo '</td>';
				
                echo '<td><a style="color:black;" href="#">';
						echo $liste_interpretes[$cles]['Prenom']. ' ' .$liste_interpretes[$cles]['Nom'];
				echo '</a></td>';
				
				echo '<td>';
				//if(is_numeric($liste_interpretes[$cles]['Tél. Mobile'])) echo $liste_interpretes[$cles]['Tél. Mobile'];
				// if(is_numeric($liste_interpretes[$cles]['Numéro'])) echo  ' '.$liste_interpretes[$cles]['Numéro'];
				 // if(is_numeric($liste_interpretes[$cles]['Tél. domicile'])) echo  ' '.$liste_interpretes[$cles]['Tél. domicile'];
				  echo  $liste_interpretes[$cles]['Tél. Mobile']. ' /' .$liste_interpretes[$cles]['Tél. domicile']. '/ ' .$liste_interpretes[$cles]['Numéro'];
				echo '</td>';
				
				echo '<td>';
					echo $liste_interpretes[$cles]['Langues_parlees'];
                echo '</td>';
				
				echo '<td>';
				  echo $liste_interpretes[$cles]['Email'];
                echo '</td>';
               echo  '</tr>';
			} // fin foreach

		

$sortie = 	$nbre_lignes_result;
return $sortie;

$lignes_resultats->closeCursor(); // Termine le traitement de la requête
$enregistrement_inter->closeCursor();
} // fin function






?>
  