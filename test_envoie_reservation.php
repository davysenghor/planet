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
	
	window.onload = function()
	{
	//alert('hello');
	
	



   
var my_request = new XMLHttpRequest();
my_request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		/* Reponse de la requete ; c'est à dire le contenu du fichier dans le my_request.open*/

 
 var var_contenu_table_annuaire_interpretes = document.getElementById("example");

 
//affectation de la réponse ( fichier id_bt_svt.php)
var_contenu_table_annuaire_interpretes .innerHTML = this.responseText;
 
 
console.log(this.responseText);

    }
	}

my_request.open("POST", "recup_donnees_clients.php", "true");
my_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
my_request.send('&new_valeur_lue='+'new_valeur'); 	
	}
	
	
	
	
   
    </script>
	
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
<!--	<script src="jvscript_exple_datable.js"></script> -->
  </body>
</html>
