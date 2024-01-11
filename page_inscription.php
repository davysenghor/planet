<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Page d'Inscription</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      margin-top: 50px;
    }
    form {
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form id="signupForm">
        <h2 class="text-center mb-4">Inscription</h2>
        <div class="mb-3">
          <label for="fullname" class="form-label">Nom</label>
          <input type="text" class="form-control" id="fullname" placeholder="Nom" required>
        </div>
        <div class="mb-3">
          <label for="fullname" class="form-label">Prenom</label>
          <input type="text" class="form-control" id="fullname" placeholder="Prenom" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Adresse électronique</label>
          <input type="email" class="form-control" id="email" placeholder="Adresse électronique" required>
        </div>
        <div class="mb-3">
          <label for="adresse" class="form-label">Adresse</label>
          <input type="text" class="form-control" id="adresse" placeholder="Adresse" required>
        </div>
        <div class="mb-3">
          <label for="telephone" class="form-label">Numéro de téléphone</label>
          <input type="tel" class="form-control" id="telephone" placeholder="Numéro de téléphone" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Mot de passe</label>
          <input type="password" class="form-control" id="password" placeholder="Mot de passe" required>
        </div>
        <div class="mb-3 d-grid">
          <button type="submit" class="btn btn-primary btn-lg">S'inscrire</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.getElementById('signupForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêcher le formulaire de se soumettre

    const fullname = document.getElementById('fullname').value;
    const email = document.getElementById('email').value;
    const adresse = document.getElementById('adresse').value;
    const telephone = document.getElementById('telephone').value;
    const password = document.getElementById('password').value;

    // Validation simple du format d'email et de mot de passe (vous pouvez utiliser des expressions régulières pour une validation plus robuste)
    if (!validateEmail(email)) {
      alert("Veuillez entrer une adresse e-mail valide.");
      return;
    }

    if (password.length < 6) {
      alert("Le mot de passe doit comporter au moins 6 caractères.");
      return;
    }

    // Si tout est valide, vous pouvez envoyer les données au serveur
    console.log("Nom complet:", fullname);
    console.log("Adresse électronique:", email);
    console.log("Adresse:", adresse);
    console.log("Numéro de téléphone:", telephone);
    console.log("Mot de passe:", password);

    // Redirection après traitement côté serveur (simulation)
    // window.location.href = 'page_confirmation.html';
  });

  // Fonction de validation d'email simple
  function validateEmail(email) {
    const re = /\S+@\S+\.\S+/;
    return re.test(email);
  }
</script>
</body>
</html>
