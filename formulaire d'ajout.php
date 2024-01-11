<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulaire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   
</head>
<body>

    <div class="container">

        <h2 class="text-center">Formulaire d'ajout de contact</h2>
    <form action="ajouter_utilisateur.php" method="post">
        <form action="" onsubmit="return myFunction()">
          <h1 class="text-center">Informations personnelles</h1>
            <div class="section">
               
                <div class="row row-cols-3">
                    <div class="col">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" required>
                    </div>
                    <div class="col">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" id="prenom" required>
                    </div>
                    <div class="col">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="col">
                        <label for="langue">Langue parlée</label>
                        <input type="text" class="form-control" id="langue" required>
                    </div>
                    <div class="col">
                        <label for="telTravail">Téléphone de travail</label>
                        <input type="tel" class="form-control" id="telTravail" required>
                    </div>
                    <div class="col">
                        <label for="telMobile">Téléphone mobile</label>
                        <input type="tel" class="form-control" id="telMobile">
                    </div>
                    <div class="col">
                        <label for="ville">Ville</label>
                        <input type="text" class="form-control" id="ville">
                    </div>
                    <div class="col">
                        <label for="pays">Pays</label>
                        <input type="text" class="form-control" id="pays">
                    </div>
                    <div class="col">
                        <label for="codePostal">Code postal</label>
                        <input type="text" class="form-control" id="codePostal">
                    </div> 
                    <div class="col">
                        <label for="telFixe">Téléphone fixe</label>
                        <input type="tel" class="form-control" id="telFixe">
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="text-center">
                    <div class="mb-3">
                        <label for="commentaire">Ajouter un commentaire</label>
                        <textarea class="form-control" id="commentaire" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
    </form>
                </div>
            </div>
        </form>
    </div>
    <script>
        function myFunction() {
            return confirm("Êtes-vous sûr de vouloir sauvegarder les modifications ?");
        }
    </script>
     <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            background-color: #fff;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            width: 100%;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #555;
        }
        textarea.form-control {
            resize: vertical;
        }
        input.form-control,
        textarea.form-control {
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
            padding: 8px;
            width: 100%;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        input.form-control:focus,
        textarea.form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
            outline: none;
        }
        .section {
            margin-bottom: 30px;
        }
        .row-cols-3 [class^="col-"] {
            flex: 0 0 33.33%;
            max-width: 33.33%;
        }
        h2 {
            margin-bottom: 20px;
            color: #007bff;
        }

    </style>
</body>
</html>
