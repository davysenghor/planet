<?php


session_start();
/*    */
$debug_mode = 1;
include('biblio_fonctions_php.php');
/*   */
include('connexion_base_donnees.php');

$table1 = 'tble_structures_clients_v1_0';
// Table's primary key
$primaryKey = 'id_tble_structures_clients';
 
// lecture des parametres de DataTable() evoyes lors de la requete ajax
$request= $_REQUEST;

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

$var_reservation = ['NOM_STRUCTURE','EMAIL_STRUCTURE','TELEPHONE_STRUCTURE'];

/*
$nom_var_reservation = [$Date_Mission,$Debut,$Fin,$Langues,$Interprete,$Personne_Demandeur,$Structure_Demandeur,$Type_prestation,$Statut_avancement,$Duree_Heure,$Duree_Minute,$Numero_Devis];

for($i=0;$i<count($var_reservation);$i++)
{
	$indice = 	$var_reservation[$i]	;
	//print_r($indice);
	if(isset($_POST[$indice])) {$nom_var_reservation[$i] = valid_donnees($_POST[$indice]); print_r($nom_var_reservation[$i]);}

}
*/
//print_r($nom_var_reservation);


if(isset($_POST['NOM_STRUCTURE'])) $structure = valid_donnees($_POST['NOM_STRUCTURE']);

if(isset($_POST['EMAIL_STRUCTURE'])) $email = valid_donnees($_POST['EMAIL_STRUCTURE']);
if(isset($_POST['TELEPHONE_STRUCTURE'])) $telephone = valid_donnees($_POST['TELEPHONE_STRUCTURE']);








$connexion_bd->beginTransaction();
 
try
{

$valeurs_a_affecter = ['',$structure, $email, $telephone];
//$valeurs_a_affecter = ['','structure', 'email', 'telephone'];

//print_r($valeurs_a_affecter);

//$valeurs_a_affecter = ['','2021-06-06','15:30'];

/*Requêtes préparéeAvec execute(array) et des marqueurs nommés 

( il y'a aussi la possibilié d'utiliser des marqueurs interrogatifs,

 ou encore bindValue ou bindparam avec des marqueur nommés ou interrogatifs )

 */
inserer_dans_table($sql_details['db'],$table1,$valeurs_a_affecter,$debug_mode);
$_SESSION['is_modif_ok'] = 1;
/*
$json_data= array
 (
 );
*/
//Afficher le tableau au format JSON
//echo json_encode($json_data); // données retournées par le server apres la requete ajax
 $connexion_bd->commit();
}
catch(Exception $e)
	{
    exit('<b>Catched exception at line '. $e->getLine() .' (code :'. $e->getCode() .') :</b> '. $e->getMessage());
	 $connexion_bd->rollback();
	  $_SESSION['is_modif_ok'] = 0;
 }
 

 
?>

