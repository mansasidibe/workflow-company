@extends('admin.layout.header')

@section('content')

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        @include('admin.layout.sidebar')
        @include('admin.layout.navbar')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Liste des empêchements</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><span style="color: green">{{ $empechements->count() }} empêchements aujourd'hui</span></h2>
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
                    <p class="text-muted font-13 m-b-30">
                        Tous les messages s'affichent ici
                    </p>

                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Nom & Prénons</th>
                          <th>Contact</th>
                          <th>Email</th>
                          <th>Titre</th>
                          <th colspan="2">Justificatif</th>
                          <th>Raison</th>
                          <th>Date d'envoie</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @if ($empechements->count())
                            @foreach ($empechements as $empechement)
                                <tr>
                                <td>{{ $empechement->user->nom_prenom }}</td>
                                <td>{{ $empechement->user->contact }}</td>
                                <td>{{ $empechement->user->email }}</td>
                                <td>{{ $empechement->titre }}</td>
                                <td colspan="2">{{ $empechement->file }}</td>
                                <td>{{ $empechement->raison }}</td>
                                <td>{{ $empechement->created_at->diffForHumans() }}</td>
                                <td><a href="{{ route('message.create') }}"  class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Repondre </a></td>
                                </tr>
                            @endforeach
                          @else
                            <tr>
                                <td colspan="8"></td>
                            </tr>
                          @endif

                      </tbody>
                    </table>


                  </div>
                </div>
              </div>

              {{-- tous les empêchements --}}
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Empêchements</h2>
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
                    <p class="text-muted font-13 m-b-30">
                        Tous les messages s'affichent ici
                    </p>

                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Nom & Prénons</th>
                          <th>Contact</th>
                          <th>Email</th>
                          <th>Titre</th>
                          <th colspan="2">Justificatif</th>
                          <th>Raison</th>
                          <th>Date d'envoie</th>
                        </tr>
                      </thead>
                      <tbody>
                          @if ($tous_empechement->count())
                            @foreach ($tous_empechement as $empechement)
                                <tr>
                                <td>{{ $empechement->user->nom_prenom }}</td>
                                <td>{{ $empechement->user->contact }}</td>
                                <td>{{ $empechement->user->email }}</td>
                                <td>{{ $empechement->titre }}</td>
                                <td colspan="2">{{ $empechement->file }}</td>
                                <td>{{ $empechement->raison }}</td>
                                <td>{{ $empechement->created_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                          @else
                            <tr>
                                <td colspan="8"></td>
                            </tr>
                          @endif

                      </tbody>
                    </table>


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
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
@endsection
