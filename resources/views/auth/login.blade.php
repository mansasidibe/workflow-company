<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WMC | {{ $title }}</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{ route('user.doLog') }}">
            @csrf
              <h1>Connexion</h1>
              <div>
                <input type="text" name="email" class="form-control" placeholder="email" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="" />
              </div>
              <div>
                    <button type="submit" class="btn btn-default submit">Connexion</button>

                <a class="reset_pass" href="#">Mot de passe oublié?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Vous êtes nouveau?
                  <a href="#signup" class="to_register"> Création de compte </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1>World Market Commodities!</h1>
                  <p>©{{ date('Y') }} - Tous droits réservés | World Market Commodities!</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form method="POST" action="{{ route('user.doReg') }}">
                 @csrf
              <h1>Création de compte</h1>
              <div>
                <input type="text" value="{{ old('nom_prenom') }}" name="nom_prenom" class="form-control" placeholder="Nom & prénom" required="" />
              </div>
               <div>
                <input type="text" value="{{ old('nom_utilisateur') }}" name="nom_utilisateur" class="form-control" placeholder="Nom d'utilisateur" required="" />
              </div>
              <div>
                <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Email" required="" />
              </div>

               <div>
                <select name="genre" class="form-control">
                    <option value="H">Homme </option>
                    <option value="F">Femme </option>
                </select>
              </div>
              <br/>

              <div>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="" />
              </div>
              <div>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmation" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">S'inscrire</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Vous avez déjà un compte ?
                  <a href="#signin" class="to_register">Connectez vous </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> World Market Commodities!</h1>
                  <p>©{{ date('Y') }} - Tous droits réservés | World Market Commodities!</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
