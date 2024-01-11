<?php
session_start();

// Afficher la liste des utilisateurs depuis la variable de session
if (isset($_SESSION['utilisateurs'])) {
    foreach ($_SESSION['utilisateurs'] as $utilisateur) {
        echo "ID: " . $utilisateur['id'] . " | Nom: " . $utilisateur['nom'] . "<br>";
        // Affichez d'autres informations ici selon vos besoins
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-------------css----------->
    <link rel="stylesheet" href="style.css">

    <!------------boxincons css----------->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>DASBORD</title>
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="IMAGES/image-conexion.jpg" alt="LOGO">
                </span>

                <div class="text header-text">
                    <span class="name">Planet</span>
                   <span class="profession">Traduction</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>

            <div class="menu-bar">
                <div class="menu">
                       <li class="search-box">
                            <i class='bx bx-search icon'></i>
                            <input type="text" placeholder= "search...">
                        </li>
                    </li>
                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="acceuil.php" class="active">
                                <i class='bx bx-home-alt icon'></i>
                                <span class="text nav-text">Home</span>
                            </a>
                        </li>
                        <li class="nav-link">
                             <a href="">
                               <i class='bx bx-user icon'></i>
                              <span class="text nav-text">Contact Interprétes</span>
                              </a>
                        </li>
                        <li class="nav-link">
                            <a href="formutilisateur.html">
                            <i class='bx bx-cog icon'></i> </i>
                                <span class="text nav-text">Parametre</span>
                            </a>
                        </li> 

                    </ul>
                </div>
                <br><br>
                <div class="button-content">

                    <li class="mode">
                        <div class="moon-sun">
                            <i class='bx bx-moon icon moon'></i>
                            <i class='bx bx-sun icon sun'></i>
                        </div>
                        <span class="mode-text text">Dark Mode</span>
                        <div class="toggle-switch">
                            <span class="switch"></span>
                        </div>
                    </li>
                </div>
            </div>
    </nav>
    
         <!-----------Menu horizontale------------>

    <section class="home">
        <div class="text">
            <div class="nav-bar2">
                <a class="nav-link active" aria-current="page" href="acceuil.php">Acceuil</a>     
                <a class="nav-link" aria-current="page" href="formulaire d'ajout.php">Ajouter contact</a> 
                <a class="nav-link" aria-current="page" href="formulaire_modification.php">Modifier contact</a> 
                <a class="nav-link" aria-current="page" href="#">Liste de missions</a>  
                <div class="dropdown" id="myDropdown">
                    <button class="dropbtn" onclick="toggleDropdown()">Junior</button>
                    <div class="dropdown-content">
                      <a href="#">se déconnecter</a>
                    </div>
                </div>
        </div>
        
        <div class="header">
            <div class="back">
                 <h1>Planet Traduction smarbizapp</h1>
                <p>Application destinée à la gestion des interprètes</p>
            </div>
        </div>
    
        <div class="main-content">

        <div class="card">
                <i class='bx bxs-bookmark-alt text-danger'></i>
                <h6>Contact interprète</h6>
                <p>Acceder à l'annuaire des interpretes</p>
                <a href="#"></a>
            </div>

        <div class="card">
                <i class='bx bxs-user-plus text-primary'></a></i>
                <h6>Ajouter interprète</h6>
                <p>Acceder aux formulaires d'ajouts d'interpretes</p>
                <a href="ajouter_interprete.php"></a>
            </div>
    
            <div class="card">
                <i class='bx bxs-calendar-event text-success'></i>
                <h6>Mes missions</h6>
                <p>Acceder aux tableau de bord des missions</p>
                <a href="mes mission.php"></a>
            </div>
        </div>
    
        <section class="description">
            <div class="container">
                <p>
                    "A.S.M" permet de consulter et de mettre à jour l'annuaire de ses interprètes. Il permet également un meilleur suivi des réservations. Les principales fonctionnalités du logiciel sont décrites <br>ci-dessus
                </p>
            </div>
        </section>

    </section>

    

<script src="script.js"></script>
<style>

</style>
</body>
</html>
