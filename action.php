<?php

//action.php

// faire des print_r que pour degubber le sql
// Par contre après le ajax puisse bien recuperer la reponse pas de print_r , il faut il tout effacer apreds le debugg

// ================= connexion à la base de données
	include('connexion_base_donnees.php');


if($_POST['action'] == 'edit')
{
 $query = "
UPDATE tble_reservation 
SET 
Date_Mission =:Date_Mission,
Debut =:Debut,
Fin	=:Fin,	 
Structure_Demandeur  =:Structure_Demandeur,
Personne_Demandeur =:Personne_Demandeur,
Langues              =:Langues,
Interprete =:Interprete,
Type_prestation =:Type_prestation,
Statut_avancement =:Statut_avancement,
Duree_Heure =:Duree_Heure,
Duree_Minute =:Duree_Minute,
Num_Devis =:Num_Devis,
Date_enregistrement =:Date_enregistrement
WHERE id_tble_reservation =	:id_tble_reservation
";

$data = array(
 ':id_tble_reservation' => $_POST['id_tble_reservation'],
	':Date_Mission' =>$_POST['Date_Mission'],
	':Debut' 				=>$_POST['Debut'],
	':Fin'					=>$_POST['Fin'],	 
	':Structure_Demandeur'    => $_POST['Structure_Demandeur'],
    ':Personne_Demandeur'     => $_POST['Personne_Demandeur'],
	':Langues'              => $_POST['Langues'],
	':Interprete' 				=> $_POST['Interprete'],
	':Type_prestation'			=>$_POST['Type_prestation'],
	':Statut_avancement'		=>$_POST['Statut_avancement'],
	':Duree_Heure'				=>$_POST['Duree_Heure'],
	':Duree_Minute'				=>$_POST['Duree_Minute'],
	':Num_Devis' 				=> $_POST['Num_Devis'],
	':Date_enregistrement'		 => $_POST['Date_enregistrement']
  );



$statement = $connexion_bd->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM tble_reservation 
 WHERE id_tble_reservation = '".$_POST["id_tble_reservation"]."'
 ";
 $statement = $connexion_bd->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>