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

<style>

<!-- pseudo-class: invalid de l'element input -->
input:invalid
{
	border:red solid 3px
}
</style>


  </head>
  <body>
<?php
	session_start();
	include('retourner_vers_page_de_connexion.php');

	// ================= connexion à la base de données
	include('connexion_base_donnees.php');
  //========================




if(isset($_SESSION['is_save_ok']) and $_SESSION['is_save_ok'])
{
echo'<h6 class=" text-center  mt-2" id="id_mypopup">La modification s\'est effectuée avec succès </h6>';
$_SESSION['is_modif_ok']=0; // remise à zéro de la variable qui ns dit que modif est ok 
}


echo '<div class="wrapper">';
include('navigation_side_bar.php');
echo'<!-- Page Content  --><div id="content">';
include('navigation_horizontale_bar.php');
//*****************************
echo '
<div class="container ml-0"><form id ="id_formulaire_interprete" action="/enregistrer_interprete.php" method="post">';
?>

<div class="row mb-2">
<div class="col-lg-1"></div>
	<div class="form-group col-lg-3">
	<label >Prenom</label>
      <input type="text" class="form-control" placeholder="Prenom" name="prenom"   pattern="[a-zéèaA-Z- ]*" maxlenght ="20" required>
    </div>
    <div class="form-group col-lg-3">
	<label >Nom</label>
      <input type="text" class="form-control" placeholder="Nom" name="nom"  pattern="[a-zéèaA-Z- ]*" maxlenght ="20">
	</div>
	
	<div class="form-group col-lg-3">
	<label >Email</label>
      <input type="email" class="form-control" placeholder="Email" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
	</div>
	<div class="col-lg-1"></div>
</div>


<div class="row mb-2">
<div class="col-lg-1"></div>
<div class="col-lg-9">
 <div class="form-group">
    <label for="exampleFormControlTextarea1">Langues parlées</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="langues_parlees" >
	</textarea>
  </div>
  </div>
  <div class="col-lg-1"></div>
</div>

<div class="row mb-2">
<div class="col-lg-1"></div>
 <div class="form-group col-lg-3">
	<label >Téléphone de travail</label>
      <input type="tel" class="form-control" placeholder="ex: 06 48 75 14 78" name="numero"
       pattern="(([0-9 ]{2})\s*){5}|\s*" title ="10 chiffres séparés 2 à 2 par un espace">
	</div>
	
	<div class="form-group col-lg-3">
	<label >Téléphone Fixe</label>
      <input type="tel"  class="form-control" placeholder="ex: 06 48 75 14 78" name="tel_domicile"  pattern="(([0-9 ]{2})\s*){5}|\s*" title ="10 chiffres séparés 2 à 2 par un espace" >
    </div>
   
	
	<div class="form-group col-lg-3">
	<label >Téléphone Mobile</label> 
      <input type="tel"  class="form-control" placeholder="ex: 06 48 75 14 78" name="tel_mobile"  pattern="(([0-9 ]{2})\s*){5}|\s* "  title ="10 chiffres séparés 2 à 2 par un espace">
    </div>
	<div class="col-lg-1"></div>
</div>

  <div class="row mb-2">
  <div class="col-lg-1"></div>
  <div class="form-group col-lg-4">
      <label >Ville</label>
      <input type="text" class="form-control" name ="ville"  pattern="[a-zéèaA-Z- ]*">
    </div>
	
    <div class="form-group col-lg-3">
      <label >Pays</label>
	  <select  class="form-control" name="pays"  >
        <option selected>France</option>
	<option  >Choose...</option>
      </select>
    </div>
	
    <div class="form-group col-2">
      <label>Code postal</label>
      <input type="text" class="form-control" name="code_postal" pattern="([0-9]{5})\s*">
    </div>
	<div class="col-lg-1"></div>
  </div>
  
    <div class="row mb-2">
	<div class="col-lg-1"></div>
  <div class="form-group col-lg-9">
    <label for="exampleFormControlTextarea1">Commentaires</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="commentaires"  pattern="[a-zéèaA-Z- ]*"></textarea>
  </div>
  <div class="col-lg-1"></div>
  
  </div>
  
  <div class="row">
   	  <div class="col-lg-1"></div>
  <div class="col-lg-9">
     <button type="submit" class="btn btn-lg w-100 mb-2" style="background-color:#dc3545;">Enregistrer</button>
</div>
<div class="col-lg-1"></div>
</div>

<?php 
  
 echo '</form></div>';

//*******************************************
echo'</div> <!-- fin div page conteent -->';
echo'</div> <!-- fin wrapper -->';	
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
	
<script type="text/javascript">

function remise_a_zero()
{
		if(!!document.getElementById("id_mypopup"))
		{
var var_popup = document.getElementById("id_mypopup");
var garbage_collect = var_popup.parentNode.removeChild(var_popup);
		}
}


window.addEventListener('load', function () {
	if(!!document.getElementById("id_mypopup"))
	{
setTimeout(remise_a_zero, 50000);
	}
});


</script>

	
	
  </body>
</html>