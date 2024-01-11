<?php

//action.php

// faire des print_r que pour degubber le sql
// Par contre après le ajax puisse bien recuperer la reponse pas de print_r , il faut il tout effacer apreds le debugg

// ================= connexion à la base de données
	include('connexion_base_donnees.php');


if($_POST['action'] == 'edit')
{
 $query = "
UPDATE tble_structures_clients_v1_0

SET 
NOM_STRUCTURE =:NOM,
EMAIL_STRUCTURE	=:EMAIL,
TELEPHONE_STRUCTURE =:TELEPHONE
WHERE id_tble_structures_clients	=:ID
";


  $data = array(
':NOM' 	=>$_POST["NOM"],
':EMAIL' =>$_POST["EMAIL"],
':TELEPHONE' =>$_POST["TELEPHONE"],
':ID' =>$_POST["ID"]
  );

//print_r($query);
//print_r($data);
$statement = $connexion_bd->prepare($query);
 $statement->execute($data);
 echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
 $query = "
 DELETE FROM tble_structures_clients_v1_0
 
 WHERE id_tble_structures_clients = '".$_POST["ID"]."'
 ";
 $statement = $connexion_bd->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>