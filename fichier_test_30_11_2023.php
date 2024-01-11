<?php


session_start();
/*    */
$debug_mode = 1;
include('biblio_fonctions_php.php');
/*   */
include('connexion_base_donnees.php');

$table = 'tble_reservation';
// Table's primary key
$primaryKey = '';
 
// lecture des parametres de DataTable() evoyes lors de la requete ajax
$request= $_REQUEST;

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
    'user' => 'sentravamasoft',
    'pass' => 'Moctar250590',
    'db'   => 'sentravamasoft',
    'host' => 'sentravamasoft.mysql.db'
);
}


//$var_reservation = ['Date_Mission','Debut','Fin','Langues','Interprete','Personne_Demandeur','Structure_Demandeur','Type_prestation','Statut_avancement','Duree_Heure','Duree_Minute','Num_Devis'];

$var_reservation = ['Date_Mission','Debut','Fin','Langues','Interprete','Personne_Demandeur','Structure_Demandeur','Type_prestation','Statut_avancement','Date_enregistrement','Duree_Heure','Duree_Minute','Num_Devis'];

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


if(isset($_POST['Date_Mission'])) $date_demande = valid_donnees($_POST['Date_Mission']);
if(isset($_POST['Debut'])) $debut_mission = valid_donnees($_POST['Debut']);
if(isset($_POST['Fin'])) $fin_mission = valid_donnees($_POST['Fin']);
if(isset($_POST['Langues'])) $langues = valid_donnees($_POST['Langues']);
if(isset($_POST['Interprete'])) $interprete = valid_donnees($_POST['Interprete']);
if(isset($_POST['Personne_Demandeur'])) $personne_demandeur = valid_donnees($_POST['Personne_Demandeur']);
if(isset($_POST['Structure_Demandeur'])) $structure_demandeur = valid_donnees($_POST['Structure_Demandeur']);
if(isset($_POST['Type_prestation'])) $type_prestation = valid_donnees($_POST['Type_prestation']);
if(isset($_POST['Statut_avancement'])) $statut_avancement = valid_donnees($_POST['Statut_avancement']);
if(isset($_POST['Duree_Heure'])) $duree_heure = valid_donnees($_POST['Duree_Heure']);
if(isset($_POST['Duree_Minute'])) $duree_minute = valid_donnees($_POST['Duree_Minute']);
if(isset($_POST['Num_Devis'])) $num_devis= valid_donnees($_POST['Num_Devis']);


$maintenant = new DateTime();

 $date_enregistrement = $maintenant ->format('Y-m-d H:i:s');


$connexion_bd->beginTransaction();
 
try
{

//$valeurs_a_affecter = ['',$date_demande,$debut_mission,$fin_mission,$langues,$interprete,$personne_demandeur,$structure_demandeur,$type_prestation,$statut_avancement,$duree_heure,$duree_minute,$num_devis];

$valeurs_a_affecter = ['',$date_demande,$debut_mission,$fin_mission,$langues,$interprete,$personne_demandeur,$structure_demandeur,$type_prestation,$statut_avancement,$date_enregistrement,$duree_heure,$duree_minute,$num_devis];
//print_r($valeurs_a_affecter);

//$valeurs_a_affecter = ['','2021-06-06','15:30'];

/*Requêtes préparéeAvec execute(array) et des marqueurs nommés 

( il y'a aussi la possibilié d'utiliser des marqueurs interrogatifs,

 ou encore bindValue ou bindparam avec des marqueur nommés ou interrogatifs )

 */
inserer_dans_table($sql_details['db'],$table,$valeurs_a_affecter,$debug_mode);
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

