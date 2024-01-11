<?php
//https://datatables.net/manual/server-side
/*

Pour trouver les données envoyees par la requete ajax et les données retourneés par le serveur en reponse

/https://datatables.net/manual/server-side --> 
regarder la section   : Sent parameters
puis regarder la section : Returned data

*/


// inclure la requete de connexion à la base de données
include('connexion_base_donnees.php');

$table = 'tble_reservation';
 // Table's primary key
$primaryKey = 'id_tble_annuaire_interpretes';
 
// lecture des parametres de DataTable() evoyés lors de la requete ajax
$request= $_REQUEST;

  
$draw = $request['draw'];
$row =  $request['start'];
$rowperpage =  $request['length']; // Rows display per page
$columnIndex =  $request['order'][0]['column']; // Column index
$columnName =  $request['columns'][$columnIndex]['data']; // Column name
$columnSortOrder =  $request['order'][0]['dir']; // asc or desc */
 
 
 //print_r($request);
 
 
 
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'db_reservation_interpretariat',
    'host' => 'localhost'
);

$sql='SELECT * FROM'.' '.$table;


//if(!empty( $request["search"]["value"])) $sql.='where Langues_parlees like' . $request["search"]["value"];


//faire un try catch pour recuperer les erreurs sql egalement
if(empty( $request["search"]["value"]))  $sql = "SELECT * FROM tble_reservation WHERE Langues LIKE \"%an%\"";   
$data = array();
$lignes_resultats = $connexion_bd->prepare($sql);
$lignes_resultats->execute();
$data = $lignes_resultats->fetchAll();
$nbre_total_resultats = $lignes_resultats->rowCount();
	/* Récupération de toutes les lignes d'un jeu de résultats */
	
	 $json_data= array
	 (
		"draw" => 1,
		"recordsTotal" => $nbre_total_resultats,
		"recordsFiltered" => $nbre_total_resultats,
		"data" => $data
		 
		 
	 );

	//Afficher le tableau au format JSON
echo json_encode($json_data); // données retournées par le server apres la requete ajax

/*
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
*/
 
?>