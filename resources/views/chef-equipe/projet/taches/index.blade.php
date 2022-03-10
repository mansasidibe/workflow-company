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
                <h3>Tâches <small>par équipes</small></h3>
              </div>

            @if ($projets->count() && auth()->user()->type_utilisateur == "chef")
                <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Ajouter une nouvelle tâche</button>
                  </div>
                </div>
              </div>
            @else
                <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <p> Bienvenue {{ Str::upper(auth()->user()->nom_utilisateur) }} </p>
                  </div>
                </div>
              </div>
            @endif

            </div>

             {{-- modal ici --}}

             @if ($projets->count())
                     <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST" action="{{ route('taches.store') }}">
                            @csrf
                            <br>
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Projet</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                <select name="projet_id" class="form-control">Choisissez le projet</option>
                                    @if ($projets->count())
                                        @foreach ($projets as $projet)
                                            <option value="{{ $projet->id }}"> {{ $projet->nom }} </option>

                                        @endforeach
                                    @else
                                        <option value="">Pas de projet</option>
                                    @endif
                                </select>
                                </div>
                            </div>
                                <input type="hidden" name="equipe_id" value="{{ $projet->equipe->id }}">
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Libellé de la tâche</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="libelle" class="form-control" placeholder="Libellé de la tâche">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Durée</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="duree" class="form-control" placeholder="Durée">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Exécutant</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                <select name="executand_id" class="form-control">
                                    @if ($projets->count())
                                        @foreach ($projets as $projet)
                                            <option value="1"> {{ $projet->equipe->membres }} </option>
                                        @endforeach
                                    @else
                                        <option value="">Pas de taches</option>
                                    @endif
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Etat</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <select name="etat" class="form-control">
                                <option value="debut">Pas fait</option>
                                <option value="encours">En cours </option>
                                <option value="termine">Fait </option>
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
             @else

             @endif

            {{-- fin model --}}

            <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Projet <small>Voir les tâches</small></h2>
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

                    <p>Choisissez un projet pour voir les tâches qui lui sont liées</p>

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Nom </th>
                            <th class="column-title">Date début </th>
                            <th class="column-title">Duré du projet </th>
                            <th class="column-title">Nombre de personnes </th>
                            <th class="column-title">Chef d'équipe </th>
                            <th class="column-title">Status </th>
                            <th class="column-title no-link last"><span class="nobr">Tâches</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                            @if ($projets->count())
                                @if ($taches->count())
                                    @foreach ($taches as $tache)
                                        <tr class="even pointer">
                                            <td class="a-center ">
                                            <input type="checkbox" class="flat" name="table_records">
                                            </td>
                                            <td class=" ">{{ $projet->nom }}</td>
                                            <td class=" ">{{ $projet->created_at }} </td>
                                            <td class=" ">{{ $projet->duree }} </td>
                                            <td class=" ">{{ $projet->equipe->membres->count() }} </td>
                                            <td class=" ">{{ $projet->equipe->chef }}</td>
                                            <td class=" ">
                                                 @if ( $tache->etat == "encours")
                                                    <button type="button" class="btn btn-warning btn-xs">En cours</button>
                                                @elseif ( $tache->etat == "termine")
                                                    <button type="button" class="btn btn-success btn-xs">Terminé</button>
                                                @else
                                                    <button type="button" class="btn btn-danger btn-xs">Début</button>
                                                @endif
                                            </td>
                                            <td class=" last"><a data-toggle="modal" data-target=".bs-example-modal-sm" href="#">Voir | </a>
                                                <a data-toggle="modal" data-target=".bs2-example-modal-lg" href="#">Editer</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td style="text-align: center" colspan="9">Pas de taches en cours</td>
                                    </tr>
                                @endif
                            @else
                            <tr>
                                <td style="text-align: center" colspan="9">Pas de projet en cours</td>
                            </tr>

                            @endif


                        </tbody>
                      </table>
                    </div>

                   <div class="modal fade bs2-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">

                        @csrf
                        <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Modifier les états des tâches</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Tâche</th>
                                        <th>Durée</th>
                                        <th>Etat</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($taches->count())
                                            @foreach ($taches as $tache)
                                            <form action="{{ route('taches.update', $tache->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <tr>
                                                    <th scope="row">{{ $tache->id }}</th>
                                                    <td>{{ $tache->libelle }}</td>
                                                    <td>{{ $tache->duree }}</td>
                                                    <td>{{ $tache->etat }}</td>
                                                    <td><select name="etat" class="form-control">
                                                            <option value="debut">Pas fait</option>
                                                            <option value="encours">En cours </option>
                                                            <option value="termine">Fait </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5"></td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>
                            </div>

                        </div>
                        </div>

                  </div>

                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                        <div class="modal-content">

                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel2">Les tâches du projet RH Système</h4>
                            </div>
                            <div class="modal-body">
                            <table class="table">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Tâche</th>
                            <th>Exécutant</th>
                            <th>Durée</th>
                            <th>Etat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($taches->count())
                                    @foreach ($taches as $tache)
                                        <tr>
                                            <th scope="row">{{ $tache->id }}</th>
                                            <td>{{ $tache->libelle }}</td>
                                            <td>Arouna</td>
                                            <td>{{ $tache->duree }}</td>
                                            <th>{{ $tache->etat }}</th>
                                        </tr>
                                    @endforeach
                            @else
                                <tr>
                                    <td>Pas de tâche</td>
                                </tr>
                            @endif
                            </tbody>
                            </table>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                            </div>

                        </div>
                        </div>
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
