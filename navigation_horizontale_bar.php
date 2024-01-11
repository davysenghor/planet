
 <?php
//$interface ='acceuil';
echo '


<nav class="navbar navbar-expand-lg navbar-light bg-light customiser_nav_hrztale" id="id_navbar"">

<!-- bouton de la nav horizontale --->

                    <button type="button" id="sidebarCollapse" class="btn customiser_btn_recherche">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </button>
					
					<!-- bouton de la nav horizontale --->

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
  Menu
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"></a>



  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">';
	
	if($interface == 'acceuil')
	{
      echo '<li class="nav-item custum_marg_link_navbar  active">
        <a  type ="button" class="nav-link" href="acceuil.php">
		<i class="fas fa-home"></i> Acceuil
		</a>
      </li>';
	  
	}
	elseif($interface != 'acceuil')
	{
      echo '<li class="nav-item custum_marg_link_navbar ">
        <a class="nav-link" href="acceuil.php">
		<i class="fas fa-home"></i>Acceuil
		</a>
     
      </li>';
	  
	}
	if($interface =='reservation')
    {
      echo '  <li class="nav-item custum_marg_link_navbar  active ">
        <a class="nav-link" href="reservation.php">
		<i class="fa fa-book" aria-hidden="true"></i>
					Réservations
		</a>
      </li>';
	}
	elseif($interface !='reservation')
    {
      echo '  <li class="nav-item custum_marg_link_navbar" >
        <a class="nav-link" href="reservation.php">
		<i class="fa fa-book" aria-hidden="true"></i>
					Réservations
		</a>
      </li>';
	}
	  
	 if($interface == 'clients')
	{
      echo ' <li class="nav-item custum_marg_link_navbar active">
        <a class="nav-link" href="clients.php">
		<i class="fa fa-book" aria-hidden="true"></i>
					Clients
		</a>
      </li>';
	}
	 if($interface != 'clients')
	{
      echo ' <li class="nav-item custum_marg_link_navbar">
        <a class="nav-link" href="clients.php">
		<i class="fa fa-book" aria-hidden="true"></i>
					Clients
		</a>
      </li>';
	}
	  
	  
	  if($interface =='interpretes')
	{
      echo '  <li class="nav-item custum_marg_link_navbar active">
        <a class="nav-link" href="contact_interpretes.php">
		<i class="fa fa-address-book" aria-hidden="true"></i>
                    Contacts interprètes
		</a>
      </li>';
	}
	  elseif($interface !='interpretes')
	{
      echo '  <li class="nav-item custum_marg_link_navbar">
        <a class="nav-link" href="contact_interpretes.php">
		<i class="fa fa-address-book" aria-hidden="true"></i>
                    Contacts interprètes
		</a>
      </li>';
	}
	 
if($interface =='structure')	 
	{
      echo '  <li class="nav-item custum_marg_link_navbar active">
        <a class="nav-link" href="structures_partenaires.php">
		<i class="fa fa-address-book" aria-hidden="true"></i>
				Structures Partenaires
		</a>
	</li>';
	}
elseif($interface !='structure')	 
	{
      echo '  <li class="nav-item custum_marg_link_navbar">
        <a class="nav-link" href="structures_partenaires.php">
		<i class="fa fa-address-book" aria-hidden="true"></i>
				Structures Partenaires
		</a>
	</li>';
	}	  
	
	// Compte rendu d'activité : tableau de mission effectué par l'intrepete
	
	if($interface =='Mes missions')	 
	{
      echo '  <li class="nav-item custum_marg_link_navbar active">
        <a class="nav-link" href="tableau_de_missions_interprete.php">
		<i class="fa fa-address-book" aria-hidden="true"></i>
				Mes missions
		</a>
	</li>';
	}
elseif($interface !='Mes missions')	 
	{
      echo '  <li class="nav-item custum_marg_link_navbar">
        <a class="nav-link" href="tableau_de_missions_interprete.php">
		<i class="fa fa-address-book" aria-hidden="true"></i>
				Mes missions
		</a>
	</li>';
	}	  
	
      
	  
echo	'  <li class="nav-item dropdown mr-auto">

        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
          echo 'Bienvenue '; if(isset($_SESSION['pseudo'])) echo $_SESSION['pseudo']; 
        echo'
		</a>
		
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="deconnection.php">     
		  Se déconnecter</a>
          
        </div>
      </li>';
	  
 echo'   </ul>
    
  </div>
</nav>';

?>
	