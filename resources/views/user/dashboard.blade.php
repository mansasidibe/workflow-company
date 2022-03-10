@extends('admin.layout.header')

@section('content')

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        @include('chef-equipe.layout.sidebar')

        <!-- top navigation -->
        @include('chef-equipe.layout.navbar')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                  <div class="count">{{ $taches_debut->count() }}</div>
                  <h3>Taches non effectuées</h3>
                  <p>mise à jour : il y'a une heure</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count">{{ $taches_termine->count() }}</div>
                  <h3>Tâches effectuées</h3>
                  <p>mise à jour : il y'a une heure</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                  <div class="count">{{ $taches_encours->count() }}</div>
                  <h3>Tâches en cours</h3>
                  <p>mise à jour : il y'a une heure</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-comments-o"></i></div>
                  <div class="count">{{ $messages->count() }}</div>
                  <h3>Messages en attentes</h3>
                  <p>mise à jour : il y'a une heure</p>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-md-11">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tâche non fait</h2>
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

                  @if ($taches->count())
                    @foreach ($taches as $tache)
                    <div class="x_content">
                        <article class="media event">
                            <a class="pull-left date">
                                <p class="month">{{ $tache->created_at->format('F') }}</p>
                                <p class="day">{{ $tache->created_at->format('d') }}</p>
                            </a>
                            <div class="media-body">
                                <a class="title" href="{{ route('projets.show', $tache->projet->id) }}">Projet : {{ $tache->projet->nom }}</a>
                                <p>Tache: {{ $tache->libelle }}</p>
                            </div>
                        </article>
                  </div>
                        @endforeach
                    @else
                        <div class="x_content">
                            <article class="media event">
                            <div class="media-body">
                                <p>Pas de Taches.</p>
                            </div>
                            </article>
                        </div>
                    @endif
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
       @include('chef-equipe.layout.footer')
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
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>

  @endsection
