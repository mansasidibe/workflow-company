@extends('admin.layout.header')

@section('content')

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h2 class="error-number">LA SESSION EST BLOQUEE</h2>
              <h2>Pas d'accès</h2>
              <p>Entrez votre mot de passe pour débloquer la session.
              </p>
              <div class="mid_center">
                <form method="POST" action="{{ route('user.unlock') }}">
                    @csrf
                  <div class="col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                      <input type="password" name="mdp" class="form-control" placeholder="Mot de passe">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Débloquer</button>
                    </span>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>

@endsection
