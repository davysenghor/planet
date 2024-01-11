<?php
session_start();



/*
if(isset($_POST['prenom'])) $prenom = $_POST['prenom'];
if(isset($_POST['nom'])) $nom = $_POST['nom'];
if(isset($_POST['email'])) $email = $_POST['email'];
if(isset($_POST['tel_mobile'])) $tel_mobile = $_POST['tel_mobile'];
if(isset($_POST['numero'])) $numero = $_POST['numero'];
if(isset($_POST['tel_domicile'])) $tel_domicile= $_POST['tel_domicile'];
if(isset($_POST['code_postal'])) $code_postal = $_POST['code_postal'];
if(isset($_POST['ville'])) $ville = $_POST['ville'];
if(isset($_POST['pays'])) $pays = $_POST['pays'];
if(isset($_POST['commentaires'])) $commentaires = $_POST['commentaires'];
if(isset($_POST['langues_parlees'])) $langues_parlees = $_POST['langues_parlees'];

*/
/*

//mapping colonne et valeurs , l'id sera automatique incrémenté

$data=
['id_tble_annuaire_interpretes'=>'',
 'Adresse' =>$pays.', '.$ville ,
 'Code_postal' => $code_postal,
 'Commentaires' => '',
 'Email' => $email,
 'Groupe_Service' => '',
 'Langues_parlees' =>$langues_parlees,
 'Nom' => $nom,
 'Numero' => $numero,
 'Num_abrege' => '',
 'Pays' => $pays,
 'Prenom' => $prenom ,
 'Societe'  => '',
 'Tel_domicile' =>$tel_domicile,
 'Tel_domicile_abrege' => '',
 'Tel_Mobile' => $tel_mobile,
 'Tel_Mobile_abrege' => '',
 'Ville' =>$ville
 ];

try
{
	
// préparation requete d'insertion et bind values avec des param de différents types ( nombre et chaine de carac) sql avec 



$requete_insertion = 'INSERT INTO tble_annuaire_interpretes
(
id_tble_annuaire_interpretes,
Adresse,
Code_postal,
Commentaires,
Email,
Groupe_Service,
Langues_parlees,
Nom,
Numero,
Num_abrege,
Pays,
Prenom,
Societe,
Tel_domicile,
Tel_domicile_abrege,
Tel_Mobile,
Tel_Mobile_abrege,
Ville
)
VALUES
(
:id_tble_annuaire_interpretes,
:Adresse,
:Code_postal,
:Commentaires,
:Email,
:Groupe_Service,
:Langues_parlees,
:Nom,
:Numero,
:Num_abrege,
:Pays,
:Prenom,
:Societe,
:Tel_domicile,
:Tel_domicile_abrege,
:Tel_Mobile,
:Tel_Mobile_abrege,
:Ville
)';

$requete_insertion_prete = $connexion_bd->prepare($requete_insertion);

 $connexion_bd->beginTransaction();
 
// execution de la requête $requete_insertion_prete avec les $data du formulaire
$requete_insertion_prete->execute($data);
// 
 $connexion_bd->commit();
 
header("Refresh:0; url=formulaire_interprete.php");

 //echo '<h6> Enregistrement réussi <h6>';
 

 
}
 catch(Exception $e)
	{
    exit('<b>Catched exception at line '. $e->getLine() .' (code :'. $e->getCode() .') :</b> '. $e->getMessage());
	 $connexion_bd->rollback();
	}

 $requete_insertion_prete->closeCursor(); // Termine le traitement de la requête
*/

?>






<?php

//include('navigation_horizontale_bar.php');
/*
echo ' <div class="row">';

echo '<div  class ="text-center"id="id_enregistrement_en_cours">'; 
echo '<button class="btn btn-primary btn-block" disabled style="visibility: hidden">
<span class="" ><i class="fa fa-spinner fa-pulse fa-3x fa-fw text-center" style="display:block;font-size:48px;color:red"></i>Enregistrement en cours</span>
<span class="sr-only">Enregistrement en cours...</span>
</button>

</div> <!-- Fin affichage enregistrement en cours -->';
 </div> <!-- fin row -->';
 */


?>