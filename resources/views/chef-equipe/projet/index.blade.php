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
                <h3>Projets</h3>
              </div>

              @if (auth()->user()->type_utilisateur == "admin")
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Nouveau projet</button>
                  </div>
                </div>
              </div>
              @else

              @endif
            </div>

            @if (auth()->user()->type_utilisateur == "admin")
                            {{-- modal ici --}}

                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST" action="{{ route('projets.store') }}">
                            @csrf
                            <br>
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nom du projet</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="nom" class="form-control" placeholder="Nom du projet">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date de début</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="date" name="date_debut" class="form-control" placeholder="Date">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Durée</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="duree" class="form-control" placeholder="Durée du projet">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Assigner une équipe</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                <select name="equipe_id" class="form-control">
                                    @if ($equipes->count())
                                        @foreach ($equipes as $equipe)
                                            <option value="{{ $equipe->id }}">{{ $equipe->nom }}</option>
                                        @endforeach
                                    @else
                                    <option value="">Pas d'équipe</option>
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
            @else

            @endif

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Projets</h2>
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

                    <p>Liste de tous les projets</p>

                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">#</th>
                          <th style="width: 20%">Nom du projet</th>
                          <th>Durée d'exécution</th>
                          <th>Progrès de l'équipe</th>
                          <th>Status</th>
                          <th style="width: 20%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if ($projets->count())
                            @foreach ($projets as $projet)

                        <tr>
                            <input type="hidden" class="btn-suppres" value="{{ $projet->id }}">
                          <td>{{ $projet->id }}</td>
                          <td>
                            <a>{{ $projet->nom }}</a>
                            <br />
                            <small>Créé le {{ $projet->created_at }}</small>
                            <br />
                            <small>Modifié : {{ $projet->updated_at->diffForHumans() }} par : admin </small>
                          </td>
                          <td> {{ $projet->duree }} </td>
                          <td class="project_progress">
                            <div class="progress progress_sm">
                              <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="
                               @foreach ($taches as $key => $value)
                                    @if($value->projet_id == $projet->id && $taches_tota > 0)
                                        {{ ($projet->id * 100)/$taches_tota }}
                                    @endif
                                @endforeach">
                              </div>
                            </div>
                            <small>

                                @foreach ($taches as $key => $value)
                                    @if($value->projet_id == $projet->id && $taches_tota > 0)
                                        {{ ceil(($projet->id * 100)/$taches_tota)}}.
                                    @endif
                                @endforeach
                                0% Completé</small>
                          </td>
                           <td>
                            @if ( $projet->etat == "encours")
                                <button type="button" class="btn btn-warning btn-xs">En cours</button>
                            @elseif ( $projet->etat == "termine")
                                <button type="button" class="btn btn-success btn-xs">Terminé</button>
                            @else
                                <button type="button" class="btn btn-danger btn-xs">Début</button>
                            @endif
                          </td>
                          <td>
                            <a href="{{ route('equipe.tache', $projet->id ) }}"  class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Voir </a>
                          </td>
                        </tr>

                        {{-- modal ici --}}
                        <div class="modal fade bs3-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST" action="{{ route('projets.update', $projet->id) }}">
                                    @method('PUT')
                                    @csrf
                                    <br>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nom du projet</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" name="nom" value="{{ $projet->nom }}" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date de début</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="date" name="date_debut" value="{{ $projet->date_debut }}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Durée</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <input type="text" name="duree" value="{{ $projet->duree }}" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Assigner une équipe</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select name="equipe_id" class="form-control">
                                            @if ($equipes->count())
                                                @foreach ($equipes as $equipe)
                                                    <option value="{{ $equipe->id }}">{{ $equipe->nom }}</option>
                                                @endforeach
                                            @else
                                            <option value="">Pas d'équipe</option>
                                            @endif
                                        </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Assigner une équipe</label>
                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select name="etat" class="form-control">
                                            <option value="debut">Début</option>
                                            <option value="encours">En cours</option>
                                            <option value="termine">Terminé</option>
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

                         @endforeach
                          @else
                          <tr>
                              <td style="text-align: center" colspan="8">Pas de projet</td>
                          </tr>

                          @endif

                      </tbody>
                    </table>
                    <!-- end project list -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('admin.layout.footer')
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
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>


@endsection
