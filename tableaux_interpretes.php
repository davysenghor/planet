<?php

include ('annuaire_interpretes.php');


echo'
  <section class="py-5 bg-light">
        <div class="container">
          <div class="bg-white px-2 py-2 rounded shadow-sm">
            <table class="table table-striped table-responsive">
              <thead>
                <tr><th class="col-lg-3">Prenom Nom</th><th class="col-lg-2">Telephone</th><th class="col-lg-5">Langues</th><th class="col-lg-2">Email</th></tr>
              </thead>
              <tbody id="id_contenu_table">';
			  
			  foreach	($liste_interpretes as $cles => $users_data)  {
			  echo '<tr>'; 
                echo '<td class="col-lg-2"><a class="text-decoration-none" href="#">';
						echo $liste_interpretes[$cles]['Prenom'];
				echo '</a></td>';
				
				echo '<td class="col-lg-2">';
				if(is_numeric($liste_interpretes[$cles]['Tél. Mobile'])) echo $liste_interpretes[$cles]['Tél. Mobile'];
				 if(is_numeric($liste_interpretes[$cles]['Numéro'])) echo  ' '.$liste_interpretes[$cles]['Numéro'];
				  if(is_numeric($liste_interpretes[$cles]['Tél. domicile'])) echo  ' '.$liste_interpretes[$cles]['Tél. domicile'];
				echo '</td>';
				
				echo '<td class="col-lg-5">';
					echo $liste_interpretes[$cles]['Langues_parlees'];
                echo '</td>';
				
				echo '<td class="col-lg-2">';
				  echo $liste_interpretes[$cles]['Email'];
                echo '</td>';
               echo  '</tr>';
			} // fin foreach
			
			echo '
              </tbody>
            </table>
          </div>
        </div>
      </section>
	  ';

?>