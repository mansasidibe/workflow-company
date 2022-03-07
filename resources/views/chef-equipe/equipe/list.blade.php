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
            <div class="page-title">
              <div class="title_left">
                <h3>Liste des chef d'équipe</h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                        <ul class="pagination pagination-split">
                          <li><a href="#">A</a></li>
                          <li><a href="#">B</a></li>
                          <li><a href="#">C</a></li>
                          <li><a href="#">D</a></li>
                          <li><a href="#">E</a></li>
                          <li>...</li>
                          <li><a href="#">W</a></li>
                          <li><a href="#">X</a></li>
                          <li><a href="#">Y</a></li>
                          <li><a href="#">Z</a></li>
                        </ul>
                      </div>

                      <div class="clearfix"></div>

                      {{-- foreach debut ici --}}
                      @if ($equipes_chef->count())
                            @foreach ($equipes_chef as $chef)
                            <div class="col-md-4 col-sm-4 col-xs-12 profile_details">
                                <div class="well profile_view">
                                <div class="col-sm-12">
                                    <h4 class="brief"><i>Nom de l'équipe de réalisation</i></h4>
                                    <div class="left col-xs-7">
                                    <h2>Nom </h2> : {{ $chef->nom }}
                                    <p><strong>email: </strong>{{ $chef->nom }}</p>
                                    </div>
                                    <div class="right col-xs-5 text-center">
                                    <img src="{{ asset('images/user.png') }}" alt="" class="img-circle img-responsive">
                                    </div>
                                </div>
                                <div class="col-xs-12 bottom text-center">
                                    <div class="col-xs-12 col-sm-6 emphasis">
                                    <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                        <a href="{{ route('message.create') }}"></i> <i class="fa fa-comments-o"></i></a> </button>
                                    <button type="button" class="btn btn-primary btn-xs">
                                        <a href="#"><i class="fa fa-user"> </i></a> Voir détails
                                    </button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endforeach
                      @else
                            <p>Pas de chef d'équipe</p>
                      @endif

                      {{-- fin foreach --}}

                    </div>
                  </div>
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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>

@endsection
