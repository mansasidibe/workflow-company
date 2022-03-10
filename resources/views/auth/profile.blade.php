@extends('admin.layout.header')

@section('content')

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        @if (auth()->user()->type_utilisateur == "admin")
            @include('admin.layout.sidebar')
            <!-- top navigation -->
            @include('admin.layout.navbar')
            <!-- /top navigation -->
        @else
            @include('chef-equipe.layout.sidebar')
            @include('chef-equipe.layout.navbar')
        @endif

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Profil {{ $user->nom_utilisateur }}</h3>
              </div>

            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Profil</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form enctype="multipart/form-data" action="{{ route('update.profil') }}" method="POST" class="form-horizontal form-label-left" novalidate>
                        @csrf
                      </p>
                      <span class="section">Informations personnelles</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom & Prénoms
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nom_prenom" name="nom_prenom" value="{{ $user->nom_prenom }}" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom utilisateur
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nom_prenom" name="nom_utilisateur" value="{{ $user->nom_utilisateur }}" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" value="{{ $user->email }}"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                    <div class="item form-group">
                        <label for="file" class="control-label col-md-3 col-sm-3 col-xs-12">Photo</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="file" type="file" name="photo"  class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Matricule
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="email2" value="{{ $user->matricule }}" name="matricule" data-validate-linked="email"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Numéro
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="number" name="numero" value="{{ $user->numero }}" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Lien Twitter
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="url" id="website" name="lien_twitter" value="{{ $user->lien_twitter }}"  placeholder="https://twitter.com/..." class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Modifier</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('admin.layout.footer')
        <!-- /footer content -->
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
    <!-- validator -->
    <script src="../vendors/validator/validator.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>

  @endsection
