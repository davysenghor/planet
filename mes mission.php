<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire d'inscription</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="container mt-5">
    <h2 class="text-center mb-4">Formulaire d'inscription</h2>

    <form>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Activer</th>
            <th scope="col">Nom d'utilisateur</th>
            <th scope="col">Mot de passe</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="activateInput1">
                <label class="custom-control-label" for="activateInput1"></label>
              </div>
            </td>
            <td>
              <input type="text" class="form-control" id="username1" disabled>
            </td>
            <td>
              <div class="input-group">
                <input type="password" class="form-control" id="password1" disabled>
                <div class="input-group-append">
                  <span class="input-group-text">
                    <img src="https://img.icons8.com/ios/30/000000/visible.png" id="showPasswordBtn1" />
                  </span>
                </div>
              </div>
            </td>
          </tr>
          <!-- Ajoutez d'autres lignes au besoin -->
        </tbody>
      </table>

      <button type="submit" class="btn btn-primary btn-block" id="registerButton" disabled>S'inscrire</button>
    </form>
  </div>

  <script>
    $(document).ready(function() {
      $('[id^="activateInput"]').change(function() {
        var usernameInput = $(this).closest('tr').find('[id^="username"]');
        var passwordInput = $(this).closest('tr').find('[id^="password"]');
        var registerButton = $('#registerButton');

        usernameInput.prop('disabled', !this.checked);
        passwordInput.prop('disabled', !this.checked);
        registerButton.prop('disabled', !$('[id^="activateInput"]:checked').length > 0);
      });

      $('[id^="showPasswordBtn"]').click(function() {
        var passwordInput = $(this).closest('.input-group').find('[id^="password"]');

        if (passwordInput.attr('type') === 'password') {
          passwordInput.attr('type', 'text');
          $(this).find('img').attr('src', 'https://img.icons8.com/ios/30/000000/invisible.png');
        } else {
          passwordInput.attr('type', 'password');
          $(this).find('img').attr('src', 'https://img.icons8.com/ios/30/000000/visible.png');
        }
      });
    });
  </script>

</body>
</html>


</body>
</html>

