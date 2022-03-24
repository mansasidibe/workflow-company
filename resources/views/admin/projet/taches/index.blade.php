@extends('admin.layout.header')

@section('content')

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        @include('admin.layout.sidebar')

        <!-- top navigation -->
        @include('admin.layout.navbar')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="page-title">
              <div class="title_left">
                <h3>Projets</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Nouvelles tâches</button>
                  </div>
                </div>
              </div>
            </div>

            {{-- modal ici --}}

            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST" action="{{ route('taches.store') }}">
                            @csrf
                            <br>
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Libellé </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="libelle" class="form-control" required placeholder="Nom de la tâche">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Durée</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="duree" class="form-control" required placeholder="Durée de la tâche">
                                </div>
                            </div>
                             {{-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Exécutant</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="duree" class="form-control" required placeholder="Durée du projet">
                                </div>
                            </div> --}}
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Exécutant</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                <select name="executand_id" class="form-control">
                                    @if ($projet->equipe->membres->count())
                                        @foreach ($projet->equipe->membres as $equipe)
                                            <option value="{{ $equipe->id }}">{{ $equipe->nom }}</option>
                                        @endforeach
                                        <input type="hidden" value="{{ $projet->id }}" name="projet_id">
                                    @else
                                    <option value="neant">Pas d'équipe</option>
                                    @endif
                                </select>
                                </div>
                            </div>
                            
                            <br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>

                      </div>
                    </div>
            </div>

            {{-- fin model --}}

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Toutes les tâches</small></h2>
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

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Libellé </th>
                            <th class="column-title">Durée </th>
                            <th class="column-title">Exécutant </th>
                            <th class="column-title">Status </th>
                            <th class="column-title">Action </th>
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                        @if ($projet->taches->count())
                            <tr class="even pointer">
                                <td class="a-center ">
                                <input type="checkbox" class="flat" name="table_records">
                                </td>
                                <td class=" ">{{ $projet->id }}</td>
                                <td class=" ">May 23, 2014 11:47:56 PM </td>
                                <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
                                <td class=" ">John Blank L</td>
                                <td class=" ">Paid</td>
                                <td class="a-right a-right ">$7.45</td>
                                <td class=" last"><a href="#">View</a>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="9" style="text-align: center;">Il n'ya pas encore de tâche {{ $projet->taches->count() }}</td>
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

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>

  @endsection
