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
echo ' <div class="row">';

echo '<div  class ="text-center"id="id_enregistrement_en_cours">'; 
echo '<button class="btn btn-primary btn-block" disabled style="visibility: hidden">
<span class="" ><i class="fa fa-spinner fa-pulse fa-3x fa-fw text-center" style="display:block;font-size:48px;color:red"></i>Enregistrement en cours</span>
<span class="sr-only">Enregistrement en cours...</span>
</button>

</div> <!-- Fin affichage enregistrement en cours -->
 </div> <!-- fin row -->';
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