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
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
   <link href="{{ asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
            @if (auth()->user()->type_utilisateur == "chef" || auth()->user()->type_utilisateur == "employe")
                @include('chef-equipe.layout.sidebar')
                @include('chef-equipe.layout.navbar')
            @endif

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
                                    {{-- @if ($projet->equipe->membres->count())
                                        @foreach ($projet->equipe->membres as $equipe)
                                            <option value="{{ $equipe->id }}">{{ $equipe->nom }}</option>
                                            <input type="hidden" value="{{ $equipe->nom }}" name="executand_nom">
                                        @endforeach
                                        <input type="hidden" value="{{ $projet->id }}" name="projet_id">
                                    @else
                                    <option value="neant">Pas d'équipe</option>
                                    @endif --}}
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
                            <th class="column-title">Temps d'ajout </th>
                            <th class="column-title">Status </th>
                            <th colspan="2" class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                         @if ($projets->taches->count())
                            @foreach ($projets->taches as $key => $object)
                                <tr class="even pointer">
                                    <td class="a-center ">
                                    <input type="checkbox" class="flat" name="table_records">
                                    </td>
                                    <td class=" "> {{ $object->libelle }}</td>
                                    <td class=" ">{{ $object->duree }}</td>
                                    <td class=" ">{{ $object->executand_nom }}</td>
                                    <td class=" "> {{ $object->created_at->diffForHumans() }}</td>
                                    <td class=" ">
                                        @if ($object->etat === "encours")
                                            <button type="button" class="btn btn-warning btn-xs">En cours</button>
                                        @elseif ( $object->etat === "termine")
                                            <button type="button" class="btn btn-success btn-xs">Terminé</button>
                                        @else
                                            <button type="button" class="btn btn-danger btn-xs">Début</button>
                                        @endif
                                    </td>
                                    <form action="{{ route('equipe.id', $object->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <td style="text-align:center;">
                                        <select class="form-control" style="width: 100px;"  name="etat">
                                            <option value="debut">début</option>
                                            <option value="encours">en cours</option>
                                            <option value="termine">terminée</option>
                                        </select>
                                        <td>
                                            <button type="submit" class="btn btn-primary" data-toggle="modal">valider</button>
                                        </td>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach

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
       @include('chef-equipe.layout.footer')
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('../vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('../vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('../vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('../vendors/nprogress/nprogress.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('../vendors/iCheck/icheck.min.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('../build/js/custom.min.js') }}"></script>
  </body>
</html>
