@extends('admin.layout.header')

@section('content')

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
          @if (auth()->user()->type_utilisateur == 'admin')
                @include('admin.layout.sidebar')
                <!-- top navigation -->
                @include('admin.layout.navbar')
                <!-- /top navigation -->
          @else
                 @include('chef-equipe.layout.sidebar')
                <!-- top navigation -->
                @include('chef-equipe.layout.navbar')
                <!-- /top navigation -->
          @endif


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Detail du projet</h3>
              </div>
            </div>

            <div class="clearfix"></div>
<br>
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Statistiques des activités du projet</h2>
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

                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <ul class="stats-overview">
                        <li>
                          <span class="name"> Tâches complètées </span>
                          <span class="value text-success"> 2 </span>
                        </li>
                        <li>
                          <span class="name"> Tâches non complètée </span>
                          <span class="value text-success"> 0 </span>
                        </li>
                        <li class="hidden-phone">
                          <span class="name"> Tâches en attentes </span>
                          <span class="value text-success"> 20 </span>
                        </li>
                      </ul>
                      <br />

                      <div id="mainb" style="height:350px;"></div>

                      <div>

                        <h4>Activités recentes</h4>

                        <!-- end of user messages -->
                        <ul class="messages">
                          <li>
                            <img src="images/img.jpg" class="avatar" alt="Avatar">
                            <div class="message_date">
                              <h3 class="date text-info">24</h3>
                              <p class="month">Mai</p>
                            </div>
                            <div class="message_wrapper">
                              <h4 class="heading">Phobos</h4>
                              <blockquote class="message">Mis à jour du dashboard administrateur.</blockquote>
                              <br />
                              <p class="url">
                                <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                <a href="#"><i class="fa fa-paperclip"></i> il y'a 10 mins </a>
                              </p>
                            </div>
                          </li>
                        </ul>
                        <!-- end of user messages -->


                      </div>


                    </div>

                    <!-- start project-detail sidebar -->
                    <div class="col-md-3 col-sm-3 col-xs-12">

                      <section class="panel">

                        <div class="x_title">
                          <h2>Description du projet</h2>
                          <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                          <h3 class="green"><i class="fa fa-paint-brush"></i> {{ $projet->nom }}</h3>

                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus ullam non illum maxime, aperiam porro consectetur dolor hic doloribus amet eveniet aliquid dolorum eligendi facilis assumenda unde! Labore, reiciendis dolore!.</p>
                          <br />

                          <br />
                          <h5>fichiers du produit</h5>
                          <ul class="list-unstyled project_files">
                            <li><a href=""><i class="fa fa-file-word-o"></i> cahier des charge.docx</a>
                            </li>
                            <li><a href=""><i class="fa fa-picture-o"></i> Logo.png</a>
                            </li>
                            <li><a href=""><i class="fa fa-file-word-o"></i> Contrat-10_12_2014.docx</a>
                            </li>
                          </ul>
                          <br />

                          {{-- <div class="text-center mtop20">
                            <a href="#" class="btn btn-sm btn-primary">Add files</a>
                            <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                          </div> --}}
                        </div>

                      </section>

                    </div>
                    <!-- end project-detail sidebar -->

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
    <!-- ECharts -->
    <script src="../vendors/echarts/dist/echarts.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
@endsection

