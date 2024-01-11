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
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/cr-1.5.3/datatables.min.css"/>
  <link rel="stylesheet" type="text/css"   href=" https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css"   href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css"   href="https://cdn.datatables.net/searchbuilder/1.0.1/css/searchBuilder.dataTables.min.css">
  <link rel="stylesheet" type="text/css"   href="https://cdn.datatables.net/datetime/1.0.3/css/dataTables.dateTime.min.css">
	

	<!-- <link rel="stylesheet" type="text/css" href="DataTables/datatables.css">	-->
	 <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css"> -->
  
    <link rel="icon" href="favicon.ico">	
	
	 <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
	

  </head>
  <body>
  
  

<?php
	session_start();
	// ================= connexion à la base de données
	include('connexion_base_donnees.php');
  //========================


echo '<div class="wrapper">';
include('navigation_side_bar.php');

//<!-- Page Content  -->
echo'<div id="content">';
include('navigation_horizontale_bar.php');

//<!-- contenu table  -->
echo'<div id="id_table_reservation">';
include('exple_html_datatable.php');
echo'</div>'; // <!-- fin div  contenu table -->;

echo'</div>';//<!-- fin div page conteent -->
echo'</div>';//<!-- fin wrapper -->;	
?>			
			
<?php
//$lignes_resultats->closeCursor(); // Termine le traitement de la requête
?>


 <!-- jQuery CDN - (=without AJAX) -->
   
   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/cr-1.5.3/datatables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
 <script src="https://cdn.datatables.net/searchbuilder/1.0.1/js/dataTables.searchBuilder.min.js"></script>
 <script src="https://cdn.datatables.net/datetime/1.0.3/js/dataTables.dateTime.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

<script  src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script  src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>

<script  src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

 


	
	<script type="text/javascript">
	
// Définiation de variables utilisées dans l'initialisation de l'oject DataTable() de jquery
	var tag_name_data_columns_to_display =  // le target signifiant la position de ma colonne tagguée
	[
	{ "name": "Tag_Demandeur",   			"targets": 0 },
    { "name": "Tag_Prestation_demandee",  	"targets": 1 },
    { "name": "Tag_Langues", 				"targets": 2 },
    { "name": "Tag_Adresse de facturation", "targets": 3 }
	];
	
	var data_columns_to_display = 
	{
	"data_0":"Demandeur",
	"data_1":"Prestation demandée", 
	"data_2":"Langues", 
	"data_3":"Adresse de facturation"
	};
	
	var param_ajax ={ type: "POST",url: "recup_donnees_clients.php", data:{"val" :2 , "rechercher": "reree"}};
	
	var bouton_dataTable =  ["colvis","copyHtml5","csvHtml5","excelHtml5","pdfHtml5","print"];
	
	var data_columns_to_display = 
	[
     { "data": data_columns_to_display.data_0 },  // afficher en 1er cette colonne
     { "data": data_columns_to_display.data_1 },  // afficher en 2eme  cette colonne
     { "data": data_columns_to_display.data_2},
     { "data": data_columns_to_display.data_3 },
    ];
	
// Définition de la fonction ready de jquery	
$(document).ready(function () {

//Normally set in the title tag of your page, Only needed for the filename of export files.
	document.title = "Réservation interprétariat";
// DataTable initialisation
	var donnees_datatables =	$("#example").DataTable(
	{
	"dom": '<"dt-buttons"Bf>p<"clear">lirtp',
	"buttons": bouton_dataTable,
	"processing": true,
	"serverSide": true,
	"ajax": param_ajax,
	 "columnDefs": tag_name_data_columns_to_display,
	 "columns" : data_columns_to_display,
	  "colReorder": true
	  
	}
	); // fin init DataTable();
	
console.log(donnees_datatables);// Debug

// customisation des éléments  button de  $("#example").DataTable
var 	button_0	 =	 donnees_datatables.button(0); // recupérer  le 1er element contenu  dans  donnees_datatables.button()
var noeud_button 	=  	button_0[0].node;

noeud_button.style.color = "green";
noeud_button.innerText = "Visibilité des colonnes";

var param_envoyer_par_ajax = donnees_datatables.ajax.params()["columns"][0]["search"].value; // récupoerer de toutes les colonnes de  donnees_datatables.ajax.params()
 
$("#id_table_reservation").prepend(param_envoyer_par_ajax); // debug

	//afficher param ajax
	
	
	
}); // fin  $(document).ready


	
	
	/*
 * TO DEBUG DATA TABLES USE THIS FUNCTION BELLOW
 */
/*
           (function () {
           var url = '//debug.datatables.net/bookmarklet/DT_Debug.js';
           if (typeof DT_Debug != 'undefined') {
             if (DT_Debug.instance !== null) {
                   DT_Debug.close();
               } else {
               new DT_Debug();
               }
           } else {
               var n = document.createElement('script');
               n.setAttribute('language', 'JavaScript');
               n.setAttribute('src', url + '?rand=' + new Date().getTime());
               document.body.appendChild(n);
               }
           }
           )(); 
		   
*/
    </script>
	
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
<!--	<script src="jvscript_exple_datable.js"></script> -->
  </body>
</html>
