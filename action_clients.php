<?php

//action.php

// faire des print_r que pour degubber le sql
// Par contre après le ajax puisse bien recuperer la reponse pas de print_r , il faut il tout effacer apreds le debugg

// ================= connexion à la base de données
	include('connexion_base_donnees.php');
$table1 = " tble_personnes_clients_v1_0 ";

if($_POST['action'] == 'edit')
{
 $query = "
UPDATE" .$table1.
"SET 
PRENOM =:PRENOM,
NOM =:NOM,
EMAIL	=:EMAIL,
STRUCTURE =:STRUCTURE,
TELEPHONE =:TELEPHONE
WHERE id_tble_personnes_clients =	:ID
";


  $data = array(
':ID' =>$_POST["ID"],
':PRENOM' =>$_POST["PRENOM"],
':NOM' 	=>$_POST["NOM"],
':EMAIL' =>$_POST["EMAIL"],
':STRUCTURE' =>$_POST["STRUCTURE"],
':TELEPHONE' =>$_POST["TELEPHONE"]
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
 DELETE FROM  ".$table1.
 "WHERE id_tble_personnes_clients = '".$_POST["ID"]."'
 ";
 $statement = $connexion_bd->prepare($query);
 $statement->execute();
 echo json_encode($_POST);
}


?>