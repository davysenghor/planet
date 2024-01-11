<?php

//fetch.php

// faire des print_r que pour degubber le sql
// Par contre après le ajax puisse bien recuperer la reponse pas de print_r , il faut il tout effacer apreds le debugg

// ================= connexion à la base de données
	include('connexion_base_donnees.php');
	$debug_mode = 0;
include('biblio_fonctions_php.php');
/*   */

$table1 = 'tble_personnes_clients_v1_0';
$table2 = 'tble_structures_clients_v1_0';

$primaryKey = '';


// server connection information
if( $mode_debug == 1)
{
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'db_reservation_interpretariat',
    'host' => 'localhost'
);
}
if( $mode_debug == 0)
{
$sql_details = array(
    'user' => 'sentravamasoft',
    'pass' => 'Moctar250590',
    'db'   => 'sentravamasoft',
    'host' => 'sentravamasoft.mysql.db'
);
}
try
{
//prévu pour ne faire select que des colonnes qui  m'interressent pour optimiser le temps ( certainement il utilsera moii ns d temps que si on fait un selet * )	
$columns1 = getColumnNames($sql_details['db'],$table1);
$columns2 = getColumnNames($sql_details['db'],$table2);

if($debug_mode==1){print_r($columns1);print_r($columns2);}

$filtre_choisi = " PRENOM "; // colonne sur laquelle le grand filtre fonctionne


/* $query = "SELECT * FROM tble_personne_demandeur INNER JOIN tble_structure_demandeur ON tble_personne_demandeur.id_vers_tble_structure = tble_structure_demandeur.id_tble_structure_demandeur";*/


//$query = "SELECT * FROM tble_personne_demandeur ";

$query = "SELECT * FROM " .$table1;

if ($debug_mode==0)
{

if(isset($_POST["search"]["value"]))
{
	$debut_requete = ' WHERE ' .$filtre_choisi;

 $query .= $debut_requete.
 'LIKE "%'.$_POST["search"]["value"].'%"  ';

}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{

 $query .= ' ORDER BY ' .$columns1['0']. ' DESC ';
}
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

}

if($debug_mode==1){print_r($query);};
$statement = $connexion_bd->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

//$statement = $connexion_bd->prepare($query . $query1);
$statement = $connexion_bd->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
	
 $sub_array = array();
 $sub_array[] = $row['id_tble_personnes_clients'];
   $sub_array[] = $row['PRENOM'];
  $sub_array[] = $row['NOM'];
    $sub_array[] = $row['EMAIL'];
	$sub_array[] = $row['STRUCTURE'];
	$sub_array[] = $row['TELEPHONE'];

   $data[] = $sub_array;
}


function count_all_data($connexion_bd)
{
/*  $query = "SELECT * FROM tble_personne_demandeur INNER JOIN tble_structure_demandeur ON tble_personne_demandeur.id_vers_tble_structure = tble_structure_demandeur.id_tble_structure_demandeur";*/

//$query = "SELECT * FROM tble_personne_demandeur ";
 
 $statement = $connexion_bd->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

function count_all_data_table($connexion_bd,$table)
{
/*  $query = "SELECT * FROM tble_personne_demandeur INNER JOIN tble_structure_demandeur ON tble_personne_demandeur.id_vers_tble_structure = tble_structure_demandeur.id_tble_structure_demandeur";*/

//$query = "SELECT * FROM tble_personne_demandeur ";
 
	$query = "SELECT * FROM " .$table;
 $statement = $connexion_bd->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}


$output = array(
 'draw'   => intval($_POST['draw']),
 'recordsTotal' => count_all_data_table($connexion_bd,$table1),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

echo json_encode($output); // donnees envoyer à ajax pour notre datatable; les printr ou echo ne sont pas acceptable comme reponse
							// Pas de de echo ou printr dans ce fichier
					
}
catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
?>
