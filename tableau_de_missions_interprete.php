<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Missions</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css"   href="css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet"  type="text/css"  href="css/style_personnalise_side_bar.css">

<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
 


    <link rel="icon" href="favicon.ico">	
	
	
	
	
	<!-- 
	
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
	 -->
	
	
	 <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
	
	
	<!--   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script> -->

  
    <script src="popper_min_js.js"></script>
  <script src="jquery_3_6_0.min.js"></script>
  
  <script src="js/bootstrap/bootstrap.min.js"></script>

 <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>

 <script type="text/javascript" src="DataTables/datatables.min.js"></script>

<script src="jquery-tabledit.js"></script>
<script src="./repeater.js" type="text/javascript"></script>



  </head>
  <body>
  
  

<?php
	session_start();
	// ================= connexion à la base de données
	include('connexion_base_donnees.php');
  //========================

$interface ='missions';
include('navigation_horizontale_bar.php');

// <!-- debut reservation -->
//echo '<div class="container-fluid  ml-2" id ="form_reservation">';

/* echo '<div id ="message_succes" class="alert alert-success alert-dismissible fade" role="alert">
<strong>Succès! </strong> "La reservation a bien été enregistrée"
  <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
//include('form_reserv_avec_repeteur.php');
echo '</div>'; 
*/
/*
echo'<div class="container-fluid">';

//echo '<div id ="message_succes" class="alert alert-success" role="alert"><strong>Liste</strong> Réservations</div>';



//<!-- Page Content  -->
echo'<div class="container-fluid" id="content">';
*/


//<!--fin reservation  -->


//<!-- contenu table  -->

//echo'<div class="container-fluid">';
/*
echo '<div class="row">';
echo '<div class="col-lg-2">
		<button class="btn btn-primary" id="ajouter_ligne" type="submit">Button</button>
	 </div>';
echo'</div>',
*/

include('table_html_missions_interprete.php');

//echo'</div>';
//<!-- fin div  contenu table -->;

//echo'</div>';//<!-- fin div page conteent -->
//echo'</div>';//<!-- fin wrapper -->;	
?>			
			

  
   
<script type="text/javascript" language="javascript" >


$(document).ready(function(){
// function regroupant les sous fonctions du développeur de jquery qui s'execute au lancement de la page web
// jquery est une bibliothèque de javascript

//A page can't be manipulated safely until the document is "ready." jQuery detects this state of readiness for you. Code included inside $( document ).ready() will only run once the page Document Object Model (DOM) is ready for JavaScript code to execute
 var bouton_dataTable =  ["colvis","csvHtml5","excelHtml5","pdfHtml5","print"];

// appel du constructeur de la classe pour la création de l'objet
// Customisation of these options are performed by defining options in the new DataTable() constructor (or $().DataTable() if you are using jQuery based code) 

// https://datatables.net/reference/option/

 var dataTable = $('#tb_missions_interprete').DataTable({

   dom: 'Blfrtip',
	buttons: [
        'selectAll',
        'selectNone',
		 //'copy',
		// 'csv', 
		 'excel', 
		 'pdf' 
		 //'print'
    ],
    language: {
        buttons: {
            selectAll: "Sélectionner tout",
            selectNone: "Désélectionner"
        }
    },
	
// 3 mises à jour à faire lors de l'ajout de colonne
//*==== $column_to_display à mettre à jour dans le fichier table_html_missions_interprete; 
//==== mettre à jour la requete ( $query) dans le fichier fetch_mes_missions
//*==== $sub_array[] = $row['ma nouvelle colonne recuperer avec la requete sql']  à mettre jour dans le fichier fetch_mes_missions ; 

// 2 choses à faire pour de plus afficher une colonne
// mettre en commentaire la colonne concerncée dans la variable $column_to_display
// mettre en comment la colonne concernée dans  $sub_array[] = $row['colonne']


//définition des proprietes d'une ou de plusieurs columns
// s'il y'a pas de définition de propriétés sur une colonne donnée c'est que par dé"faut l'option ou la fonctionnation s'applicquera sur toutes les colonnes 
// comme le cas de l'option "searchable" 
  columnDefs: [
  
  
  
  // propriétés de la 1ere colonne du tableau
 {
			
			   
          orderable: false,
            className: 'select-checkbox',  // dessin  d'une 1ere colonne contenant des check boxe
            targets: [0]  // cette colonne de selection se met toujours à l'ombre d'une des colonnes déclarer du tableau 
							// elle n'a pas son nom de colonne pour l'instant , et je pense que ce n'est pas possible avec le plug in Datatable
		}
		
		
    ],



 select: {
        style: 'multi' , //'os',   // style de selection qui offre bcp syte de selection complexe, 
        selector: 'td:first-child'  // la premiere cellule de la ligne nous permet de cliquer et de selectionner une ligne du tableau
    },
	

	   order: [[1, 'asc']],  // colonne sur laquelle effectuer un ordre d'affichage par défaut ( asc : de a vers z )
  ajax: {
        url: 'fetch_mes_missions.php',
        error: function (jqXHR, textStatus, errorThrown)
		{
		// Do something here
		console.log( errorThrown);
		var toto = jqXHR;
		console.log(jqXHR);
		console.log(jqXHR.done)
		}, // fin definition url pour recuperer les data sous format JSOn
        type: 'POST'
		},
		

	

 });
  // fin de la création  variable de "type objet " dataTable representant notre table tb_missions_interprete

});


//save_Button.addEventlistener("click",enregistrement_reservation());

</script>

	