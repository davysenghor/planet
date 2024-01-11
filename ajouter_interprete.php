<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Formulaire</title>
    <style>
          body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            padding: 30px;
            background-color: #fff;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #2980b9; /* Couleur du titre */
        }

        label {
            font-weight: bold;
            color: #2980b9;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea,
        button {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="tel"]:focus,
        select:focus,
        textarea:focus,
        button:focus {
            outline: none;
            border-color: #dc3545;
            box-shadow: 0 0 10px rgba(220, 53, 69, 0.5);
        }

 
        button[type="submit"] {
        background-color: #3498db; /* Bleu */
        color: white;
        cursor: pointer;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    button[type="submit"]:hover {
        background-color: #2980b9; /* Bleu clair au survol */
    }
    </style>
</head>
<body>
    <div class="container">
    <h1>Formulaire d'ajout d'interprete</h1>
        <form action="traitement_formulaire.php" method="post">
            <div class="row mb-4">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" placeholder="Prénom" name="prenom" pattern="[a-zéèaA-Z- ]*" maxlength="20" required>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" placeholder="Nom" name="nom" pattern="[a-zéèaA-Z- ]*" maxlength="20">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    </div>
                </div>
                <div class="col-lg-3">
                     <div class="form-group">
                        <label for="telTravail">Téléphone de Travail</label>
                        <input type="tel" class="form-control" placeholder="Numéro de Téléphone" name="telTravail" pattern="(([0-9 ]{2})\s*){5}|\s*" title="10 chiffres séparés 2 à 2 par un espace">
                     </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                       <label for="telFixe">Téléphone Fixe</label>
                       <input type="tel" class="form-control" placeholder="Téléphone Fixe" name="telFixe" pattern="(([0-9 ]{2})\s*){5}|\s*" title="10 chiffres séparés 2 à 2 par un espace">
                     </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                      <label for="telTravail">Téléphone de Travail</label>
                     <input type="tel" class="form-control" placeholder="Téléphone de Travail" name="telTravail" pattern="(([0-9 ]{2})\s*){5}|\s*" title="10 chiffres séparés 2 à 2 par un espace">  
                    </div>
                </div>

                <div class="col-lg-3">
                  <div class="form-group">
                    <label for="ville">Ville</label>
                    <input type="text" class="form-control" placeholder="Ville" name="ville" pattern="[a-zA-Z- ]*" title="Veuillez saisir un nom de ville valide">
                 </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                     <label for="codePostal">Code postal</label>
                     <input type="text" class="form-control" placeholder="Code postal" name="codePostal" pattern="[0-9]{5}" title="Veuillez saisir un code postal à 5 chiffres">
                    </div>
                </div>
                <div class="col-lg-6">
                 <div class="form-group">
                    <label for="languesParlees">Langues parlées</label>
                   <textarea class="form-control" id="languesParlees" rows="3" name="languesParlees" placeholder="Langues parlées"></textarea>
                 </div>
                </div>
                <div class="col-lg-6">
    <div class="form-group">
        <label for="commentaire">Commentaires</label>
        <textarea class="form-control" id="commentaire" rows="4" name="commentaire" placeholder="Ajouter un commentaire"></textarea>
    </div>
</div>


    </div>


           
            <!-- ... d'autres champs -->

            <div class="row">
                <div class="col-lg-8">
                <button type="submit" class="btn btn-lg w-100 mb-2 btn-primary">Enregistrer</button>

                </div>
            </div>
        </form>
    </div>
</body>
</html>
