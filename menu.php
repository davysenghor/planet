<?php

	if (!isset($_SESSION['id']))session_start();
	// ================= connexion à la base de données
	include('connexion_base_donnees.php');
  //========================


echo '<div class="wrapper">';
include('navigation_side_bar.php');
echo'<!-- Page Content  --><div id="content">';
$interface = 'acceuil';
include('navigation_horizontale_bar.php');

include('am_soft_acceuil.php');

echo'</div> <!-- fin div page conteent -->';
echo'</div> <!-- fin container -->';	


?>			
			
<?php
//$lignes_resultats->closeCursor(); // Termine le traitement de la requête
?>

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

