<?php

//fetch.php

// faire des print_r que pour degubber le sql
// Par contre après le ajax puisse bien recuperer la reponse pas de print_r , il faut il tout effacer apreds le debugg

// ================= connexion à la base de données
	include('connexion_base_donnees.php');
	$debug_mode = 1;
	$debug_cette_partie==1
include('biblio_fonctions_php.php');
/*   */

$table = 'tble_reservation';

$primaryKey = 'id_tble_annuaire_interpretes';


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
$columns = getColumnNames($sql_details['db'],$table);

if($debug_mode==1 && $debug_cette_partie==1){print_r($columns);}

$filtre_choisi = " Personne_Demandeur "; // colonne sur laquelle le grand filtre fonctionne

$query = "SELECT * FROM tble_reservation ";


if($debug_mode==0)
{
if(isset($_POST["search"]["value"]))
{
$debut_requete = 'WHERE' .$filtre_choisi;

 $query .= $debut_requete.
 'LIKE "%'.$_POST["search"]["value"].'%" 
 OR Langues LIKE "%'.$_POST["search"]["value"].'%" 
 OR Date_Mission LIKE "%'.$_POST["search"]["value"].'%" 
 OR Structure_Demandeur LIKE "%'.$_POST["search"]["value"].'%" 
 OR Interprete LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id_tble_reservation DESC ';
}
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
}

$statement = $connexion_bd->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

if($debug_mode==1)
$statement = $connexion_bd->prepare($query);

//$statement = $connexion_bd->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
	
	
/*	$column_to_display = array(
"0"=>"ID",
"1"=>"Date_Mission",
"2"=>"Debut",
"3"=>"Fin",
"4"=> "Structure_Demandeur",
"5"=> "Personne_Demandeur",
"6"=>"Langues", 
"7"=>"Interprete",
"8"=>"Type_prestation",
"9"=>"Statut_avancement",
"10"=>"Duree_Heure",
"11"=>"Duree_Minute",
"12"=> "Num_Devis",
"13"=>"Date_enregistrement");
*/

 $sub_array = array();
 $sub_array[] = $row['id_tble_reservation'];
 $sub_array[] = $row['Date_Mission'];
 $sub_array[] = $row['Date_enregistrement'];
 $sub_array[] = $row['Debut'];
 $sub_array[] = $row['Fin'];
 $sub_array[] = $row['Structure_Demandeur'];
 $sub_array[] = $row['Personne_Demandeur'];
 $sub_array[] = $row['Langues'];
 $sub_array[] = $row['Interprete'];
 $sub_array[] = $row['Type_prestation'];
 $sub_array[] = $row['Statut_avancement'];
 $sub_array[] = $row['Duree_Heure'];
 $sub_array[] = $row['Duree_Minute']; 
 $sub_array[] = $row['Num_Devis'];
   $data[] = $sub_array;
}

function count_all_data($connexion_bd)
{
 $query = "SELECT * FROM tble_reservation";
 $statement = $connexion_bd->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'   => intval($_POST['draw']),
 'recordsTotal' => count_all_data($connexion_bd),
 'recordsFiltered' => $number_filter_row,
 'data'   => $data
);

if($debug_mode==1 && $debug_cette_partie==1) echo json_encode($output); // donnees envoyer à ajax pour notre datatable; les printr ou echo ne sont pas acceptable comme reponse
							// Pas de de echo ou printr dans ce fichier
}
catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
?>
		