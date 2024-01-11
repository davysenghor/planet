<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Page de Connexion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<div class="container">
  <div class="row justify-content-center align-items-center" style="height: 100vh;">
    <div class="col-md-6">
      <form action="page_apres_formulaire_de_connection.php" method="post" id="loginForm">
        <div class="text-center">
          <img src="IMAGES/image-conexion.jpg" alt="Logo" class="img-fluid d-block mx-auto" style="max-width: 150px;">

          <div class="text-center">
                    <p class="code">Se connecter</p>
                    <?php if (isset($erreur)): ?>
                        <div class="Erreur"><?php echo $erreur; ?></div>
                    <?php endif; ?>
                </div>



        <h6 class="center-text">Reservation d'interpretariat</h6>
        <div class="mb-3 input-group">
          <input class="form-control" type="text" placeholder="pseudo" name="var_pseudo">
          <span class="input-group-text icon"><i class="bi bi-person"></i></span>
        </div>
        <div class="mb-3 input-group">
          <input class="form-control" type="password" placeholder="Enter your password" name="var_pwd" id="password">
          <button class="btn btn-outline-secondary" type="button" id="togglePassword">
            <i id="eyeIcon" class="bi bi-eye-fill"></i>
          </button>
        </div>
        <div class="mb-3 text-center">
          <button type="submit" class="btn btn-primary connect-btn">Se connecter</button>
        </div>
        <div class="mb-3 text-center">
          <a href="page_inscription.php" class="btn btn-outline-secondary">Creer un compte</a>
        </div>
      </form>
      <p class="code1">Police privacy and Terme of Use</p>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // JavaScript pour afficher/cacher le mot de passe
  const passwordField = document.getElementById('password');
  const eyeIcon = document.getElementById('eyeIcon');

  document.getElementById('togglePassword').addEventListener('click', function() {
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);

    eyeIcon.classList.toggle('bi-eye');
    eyeIcon.classList.toggle('bi-eye-slash');
  });
</script>
<style>
  /* Vos styles CSS ici */
   /* Styles pour le formulaire */
   #loginForm {
    padding:20px; 
    border-radius: 10px;
    box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
    background-color: rgba(255, 255, 255, 0.9); /* Fond du formulaire */
    /* Votre image de fond */
    background-size:cover;
    background-position: center;
  }

  /* Styles pour l'icône de l'œil et l'icône utilisateur */
  .icon {
    pointer-events: auto;
    cursor: pointer;
  }

  /* Styles pour le bouton Se connecter */
  .connect-btn {
    width: 100%; /* Définir la largeur à 100% */
  }

  /* Centrer le texte de la balise h6 */
  .center-text {
    text-align: center;
  }
  .code1{
      text-align: center;
      margin-top: 10px;
      font-size: 17px;
  }

  .code{
     margin: 5px;
     font-size: 17px;
  }
  h6{
      font-size: 30px;
   }
   .error{
      background: #f2dede;
      color: #a9a442;
    padding: 10px;
    width: 95%;
    border-radius: 5px;
    }
    .Erreur{
      color:black ;
      margin: 10px 0;
      text-align: center;
      background: red;
      border-radius: 10px;
    }
</style>
</body>
</html>