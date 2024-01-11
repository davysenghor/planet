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
	
include('retourner_vers_page_de_connexion.php');
	// ================= connexion à la base de données
	include('connexion_base_donnees.php');
  //========================
	//include('navigation_horizontale.php');
?>
<?php include('page_globale.php');?>
			
			
			
<?php
//$lignes_resultats->closeCursor(); // Termine le traitement de la requête
?>
 
	
<script>
var pas = 25;
var mode_debug = 0;
window.addEventListener('load', function () {
var val_lue = document.getElementById('id_affichage_nbre_contacts') ;
var my_request = new XMLHttpRequest();
my_request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		/* Reponse de la requete ; c'est à dire le contenu du fichier dans le my_request.open*/

console.clear();
 
 var var_contenu_table_annuaire_interpretes = document.getElementById("id_affichage_carte_visite")

 
//affectation de la réponse ( fichier id_bt_svt.php)
var_contenu_table_annuaire_interpretes .innerHTML = this.responseText;
 

    //  val_lue.innerHTML= 0+'-'+pas;
	  val_lue.value = 0+'-'+pas;
   
 //reponse à afficher pour debug
if(mode_debug)console.log(this.responseText);

    }
  };
   


  
 // fichier  à envoyer en réponse (menus.php) avec envoie de données avec la méthode post 
 // donnée envoyée : "lien_bouton_a_activer=1"
my_request.open("POST", "affichage_lors_ouveture_page.php", "true");
my_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
my_request.send('&valeur_lue='+val_lue); 
});
  
</script>

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
