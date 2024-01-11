<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Contacts Interprétes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css"   href="css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet"  type="text/css"  href="css/style_personnalise_side_bar.css">
    <link rel="icon" href="favicon.ico">	
	 <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

  </head>
  <body>

<?php
session_start();

include('connexion_base_donnees.php');

function valid_donnees($donnees)
{
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        return $donnees;
}  


if(isset($_POST['prenom'])) $prenom = valid_donnees($_POST['prenom']);
if(isset($_POST['nom'])) $nom = valid_donnees($_POST['nom']);
if(isset($_POST['email'])) $email = valid_donnees($_POST['email']);
if(isset($_POST['tel_mobile'])) $tel_mobile = valid_donnees($_POST['tel_mobile']);
if(isset($_POST['numero'])) $numero = valid_donnees($_POST['numero']);
if(isset($_POST['tel_domicile'])) $tel_domicile= valid_donnees($_POST['tel_domicile']);
if(isset($_POST['code_postal'])) $code_postal = valid_donnees($_POST['code_postal']);
if(isset($_POST['ville'])) $ville = valid_donnees($_POST['ville']);
if(isset($_POST['pays'])) $pays = valid_donnees($_POST['pays']);
if(isset($_POST['commentaires'])) $commentaires = valid_donnees($_POST['commentaires']);
if(isset($_POST['langues_parlees'])) $langues_parlees = valid_donnees($_POST['langues_parlees']);

$_id_users = $_SESSION['id']; // récup l'id de l'utilisateur de celui qui enregistre

$date_de_modif = date('Y-m-d H:i:s'); // produire une date php de format  year-month-day hour-minute-seconde pour etre copier
									// dans la base de données mysql sur une colonne de type Datetime
  // a mettre dans une colonne date_de_modif


//mapping colonne et valeurs , l'id sera automatique incrémenté
$data=
['id_tble_annuaire_interpretes'=>'',
'id_vers_tble_users'=>$_id_users,
 'Code_postal' => $code_postal,
 'Commentaires' =>$commentaires,
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
 'Ville' =>$ville,
 'Adresse' => $pays.' '.$ville,
 'date_de_modif' =>$date_de_modif
 ];

try
{
	
// préparation requete d'insertion et bind values avec des param de différents types ( nombre et chaine de carac) sql avec 



$requete_insertion = 'INSERT INTO tble_annuaire_interpretes
(
id_tble_annuaire_interpretes,
id_vers_tble_users,
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
Ville,
Adresse,
date_de_modif

)
VALUES
(
:id_tble_annuaire_interpretes,
:id_vers_tble_users,
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
:Ville,
:Adresse,
:date_de_modif
)';

$requete_insertion_prete = $connexion_bd->prepare($requete_insertion);

 $connexion_bd->beginTransaction();
 


// execution de la requête $requete_insertion_prete avec les $data du formulaire
$requete_insertion_prete->execute($data);
// 
 $connexion_bd->commit();
 
 $_SESSION['is_save_ok'] = 1;
 
 
}
 catch(Exception $e)
	{
	$_SESSION['is_save_ok'] = 0;
	$connexion_bd->rollback();
	$delai=0;
	$url_modif = 'formulaire_interprete.php';
    header("Refresh:$delai; url=$url_modif");
    exit('<b>Catched exception at line '. $e->getLine() .' (code :'. $e->getCode() .') :</b> '. $e->getMessage());
    }

$requete_insertion_prete->closeCursor(); // Termine le traitement de la requête

	echo '<h6 class="text-right mt-2">';
	echo($date_de_modif);
	echo'</h6>';
    echo '<div class="flexbox-container">
	
      <div class="flexbox-item fixed">
        <div class="box">
         <h6  class="text-center"> 
	
	<i class="fa fa-spinner fa-pulse fa-3x fa-fw" style=" display: inline-block;font-size:48px;color:red;margin-bottom:5px"></i>
	</h6>
	<span class=" text-center" style="margin-top:5px">
	Modification en cours...
	</span>
	<span class="sr-only">Modification en cours...</span>
	
	</div>
    </div>';
	echo' </div>';
 

$delai=3;
$url_modif = 'formulaire_interprete.php';
 header("Refresh:$delai; url=$url_modif");
exit();

?>


<script src="evenement.js"></script>

<!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	
	<script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
	
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>

 








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