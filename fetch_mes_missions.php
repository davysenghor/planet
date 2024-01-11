<?php

//fetch.php

// faire des print_r que pour degubber le sql
// Par contre après le ajax puisse bien recuperer la reponse pas de print_r , il faut il tout effacer apreds le debugg
// L'objectif de ce fichier est de produire un format JSON de données pour alimenter mes tableaux avec datatable, dans l'option ajax 
// $outpout contiendra entre autres nos données. 
//   json_encode($output);


// ================= connexion à la base de données
	include('connexion_base_donnees.php');
$debug_mode = 0;
$debug_cette_partie=0;
include('biblio_fonctions_php.php');
/*   */

$table1 = 'llx_missions_mission';
$table2='llx_user';

$primaryKey = 'rowid';


// server connection information
if( $mode_debug == 1)
{
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'db_systeme_information_ama',
    'host' => 'localhost'
);
}
if( $mode_debug == 0)
{
$sql_details = array(
   /* 'user' => 'sentravamasoft',
    'pass' => 'Moctar250590',
    'db'   => 'sentravamasoft',
    'host' => 'sentravamasoft.mysql.db'*/
	    'user' => 'root',
    'pass' => '',
    'db'   => 'db_systeme_information_ama',
    'host' => 'localhost'
);
}
try
{
//prévu pour ne faire select que des colonnes qui  m'interressent pour optimiser le temps ( certainement il utilsera moii ns d temps que si on fait un selet * )	
$columns = getColumnNames($sql_details['db'],$table1);

if($debug_mode==1 && $debug_cette_partie==1){print_r($columns);}

//$filtre_choisi = " nominterprete "; // colonne sur laquelle le grand filtre fonctionne

//query = "SELECT * FROM ". $table. " ";
$query = "SELECT
llx_missions_mission.colvidedatatable,
 llx_missions_mission.rowid,
 llx_missions_mission.langues,
 llx_missions_mission.label,
 llx_missions_mission.debutmission,
 llx_missions_mission.finmission,
 llx_missions_mission.nominterprete,
 llx_user.firstname,
 llx_user.lastname,
 llx_missions_mission.description".
 " FROM ".
 $table1 
 ." INNER JOIN ".
 $table2.
 " on llx_missions_mission.nominterprete=llx_user.rowid ";
 

/*
if($debug_mode==0)
{
if(isset($_POST["search"]["value"]))
{
$debut_requete = 'WHERE' .$filtre_choisi;

 $query .= $debut_requete. ' ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY rowid DESC ';
}
$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
}
*/

$statement = $connexion_bd->prepare($query);

$statement->execute();
$result = $statement->fetchAll();


$data = array();
// columns to display
foreach($result as $row)
{
	// récuperer les colonnes renvoyées par la requete
$sub_array = array();
$sub_array[] = $row['colvidedatatable'];
$sub_array[] = $row['firstname'];
$sub_array[] = $row['lastname'];
$sub_array[] = $row['langues'];
$sub_array[] = $row['debutmission'];
$sub_array[] = $row['finmission'];
$sub_array[] = $row['label'];
$sub_array[] = $row['rowid'];
 //$sub_array[] = $row['nominterprete'];

  // $sub_array[] = $row['description'];

   $data[] = $sub_array;  // données à encode sous format json à la fin du fichier
}

function count_all_data($connexion_bd)
{
 $query = "SELECT
  llx_missions_mission.colvidedatatable,
 llx_missions_mission.rowid, llx_missions_mission.debutmission, llx_missions_mission.finmission, llx_missions_mission.nominterprete, llx_user.firstname,
 llx_user.lastname".
 " FROM ".
 $table1 
 ." RIGHT JOIN ".
 $table2.
 " on llx_missions_mission.nominterprete=llx_user.rowid ";
 
 $statement = $connexion_bd->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 //'draw'   => intval($_POST['draw']),
 //'recordsTotal' => count_all_data($connexion_bd),
 //'recordsFiltered' => $number_filter_row,
 'data'   => $data
);


 // donnees envoyer à ajax pour notre datatable; les printr ou echo ne sont pas acceptable comme reponse
							// Pas de de echo ou printr dans ce fichier
//if($debug_mode==1 && $debug_cette_partie==1)  
	echo json_encode($output);

}
catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n";
}
?>
		