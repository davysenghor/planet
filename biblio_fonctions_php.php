
<?php
function valid_donnees($donnees)
{
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
}  

function getColumnNames($db,$table){
    $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = :table AND table_schema =:table_schema";
    try {
        include('connexion_base_donnees.php');
        $stmt = $connexion_bd->prepare($sql);
        $stmt->bindValue(':table', $table, PDO::PARAM_STR);
		$stmt->bindValue(':table_schema', $db, PDO::PARAM_STR);
        $stmt->execute();
        $output = array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $output[] = $row['COLUMN_NAME'];                
        }
        return $output; 
    }

    catch(PDOException $pe) {
        trigger_error('Could not connect to MySQL database. ' . $pe->getMessage() , E_USER_ERROR);
    }
} // fin fonction getColumnNames


function insert_col_name_col_values($colonnes_table,$c){


// initalisation des tableaux 
$valeurs_noms_col=[];$noms_col=[];$donnees_construites=[];

foreach ($colonnes_table  as $key => $value){
	
// ajouter '`' pour éviter le probleme des espaces dans les noms de colonnes de la table	
$noms_col[$key] = '`'.$colonnes_table[$key].'`';
// probleme des espaces dans les noms de colonnes 
$str = str_replace(" ", "_", $colonnes_table[$key]);

// marqueurs nommés
$valeurs_noms_col[$key] = ':'.$str;

// construire le tableau pour affecter les valeurs aux marquées nommeés de la forme :nomcolonne
$marqueurs_nommes = $valeurs_noms_col[$key];
$donnees_construites[$marqueurs_nommes] = "" ;

}

// Transformer les tableaux en chaines de caratères avec implode pour construire la requête 
$noms_colonnes = 	implode(', ', $noms_col);
$valeurs_colonnes = 	implode(', ', $valeurs_noms_col);

// Valeurs de retour  
if ($c =="n") {return $noms_colonnes; }
if ($c== "c") {return $valeurs_colonnes;}
if ($c== "d") {return $donnees_construites;}

} // fin fonction insert_col_name_col_values



function setvaleur_colonne_tabe($colonnes_table,$donnees_construites,$nom_col,$valeur)
{
	
	$donnees_construites[$nom_col] = $valeur;
	return $donnees_construites;
}



function affect_tableau_donnees_a_inserer($colonnes_table,$donnees_construites,$valeurs_a_affecter)
{
	
$Nbre_val_a_changer = count($valeurs_a_affecter);

if( $Nbre_val_a_changer>count($colonnes_table) ){
        throw new Exception("Nombre de donnees à enregistrer est superieur au nombre de colonne de la table");
    }	
		for ( $i=0;$i<=$Nbre_val_a_changer-1;$i++)
		{
			
			$nom_col = ':'.$colonnes_table[$i];
			$str = str_replace(" ", "_", $colonnes_table[$i]);
			$marqueurs_nommes = ':'.$str;
		//	if(empty($valeurs_a_affecter [$i])) $valeurs_a_affecter [$i]="' '";
			$donnees_construites[$marqueurs_nommes] = $valeurs_a_affecter[$i];
		}
return $donnees_construites;
}

/*
Cette prend en entrée le nom de la table 
*/
function preparation_insertion_dans_base_de_donnees($db,$table)
{
$colonnes_table = getColumnNames($db,$table);
$noms_colonnes= insert_col_name_col_values($colonnes_table,'n');
$valeurs_colonnes = insert_col_name_col_values($colonnes_table,'c');
$donnees_construites = insert_col_name_col_values($colonnes_table,'d');

$tableau_preparer_insertion =[$colonnes_table,$noms_colonnes,$valeurs_colonnes,$donnees_construites];


return $tableau_preparer_insertion;
}

	//Requêtes préparéeAvec execute(array) et des marqueurs nommés ( il y'a aussi la possibilié d'utiliser des marqueurs interrogatifs, ou encore bindValue ou bindparam avec des marqueur nommés ou interrogatifs


function inserer_dans_table($db,$table,$valeurs_a_affecter,$debug_mode)
{
	include('connexion_base_donnees.php');
	$tableau_prep_insertion = preparation_insertion_dans_base_de_donnees($db,$table);

	$colonnes_table = $tableau_prep_insertion[0];
	$noms_colonnes 	= $tableau_prep_insertion[1];
	$valeurs_colonnes = $tableau_prep_insertion[2];
	$donnees_construites	= $tableau_prep_insertion[3]; 

try{
$donnees_construites = affect_tableau_donnees_a_inserer($colonnes_table,$donnees_construites,$valeurs_a_affecter);
$sql = "INSERT INTO `$table` ($noms_colonnes) VALUES ($valeurs_colonnes)";

if ($debug_mode ==1)
{

print_r($sql);
print_r($donnees_construites);
}
$lignes_resultats = $connexion_bd->prepare($sql);
$lignes_resultats->execute($donnees_construites);
}
catch(Exception $e){
exit('<b>Catched exception at line  :</b> '. $e->getMessage());
}

}

?>