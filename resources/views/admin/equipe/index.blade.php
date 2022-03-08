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
                <h3>Equipes</h3>
              </div>

              <div class="title_right">
                <div class="col-md-7 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Nouvelle équipe</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs1-example-modal-lg">Ajout membre</button>
                  </div>
                </div>
              </div>
            </div>

            {{-- modal ici --}}

            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST" action="{{ route('equipes.store') }}">
                        @csrf
                        <br>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nom de l'équipe</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" name="nom" class="form-control" placeholder="Nom de l'équipe">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Chef d'équipe</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                            <select name="chef" class="form-control">
                                @if ($users->count())
                                    @foreach ($users as $user)
                                        <option value="{{ $user->nom_prenom }}">{{ $user->nom_prenom }}</option>
                                        <input type="hidden" value="{{ $user->id }}" name="membre_id">
                                    @endforeach
                                @else
                                    <option>Pas d'utilisateur</option>
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

             {{-- modal ici --}}

            <div class="modal fade bs1-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST" action="{{ route('membre.store') }}">
                            @csrf
                            <br>
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nom du membre</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                     <select name="nom" class="form-control">
                                        @if ($users->count())
                                            @foreach ($users as $user)
                                                <option value="{{ $user->nom_prenom }}">{{ $user->nom_prenom }}</option>
                                            @endforeach
                                        @else
                                            <option>Pas d'utilisateur</option>
                                        @endif
                                    </select>
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
                                    <option>Pas d'équipe</option>
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
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Equipes</h2>
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

                    <p>Liste de toutes les équipes</p>

                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">#</th>
                          <th style="width: 20%">Nom</th>
                          <th>Membres d'équipe</th>
                          <th>Chef</th>
                          <th style="width: 20%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @if ($equipes->count())
                            @foreach ($equipes as $equipe)
                        <tr>
                            <input type="hidden" class="btn-suppres" value="{{ $equipe->id }}">
                            <td>#</td>
                            <td>
                                <a>{{ $equipe->nom }}</a>
                                <br />
                                <small>{{ $equipe->created_at }}</small>
                            </td>
                            <td>{{ $equipe->membres->count() }}</td>

                            <td> {{ $equipe->chef }} </td>
                             <td>
                                <a href="{{ route('taches.update', $equipe->id ) }}"  class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Voir </a>
                                <a data-toggle="modal" data-target=".bs3-example-modal-lg" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edite </a>
                                <a href="{{ route('taches.destroy', $equipe->id ) }}" class="btn btn-danger btn-xs supress"><i class="fa fa-trash-o"></i> Archiver </a>
                            </td>
                            </tr>
                            @endforeach
                          @else
                          <tr>
                              <td style="text-align: center" colspan="5">Pas d'équipe</td>
                          </tr>

                          @endif

                      </tbody>
                    </table>

                    {{-- modal ici --}}

                    <div class="modal fade bs3-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST" action="{{ route('equipes.update', $equipe->id ) }}">
                                @method('PUT')
                            @csrf
                            <br>
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nom du membre</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                     <select name="nom" class="form-control">
                                        @if ($users->count())
                                            @foreach ($users as $user)
                                                <option value="{{ $user->nom_prenom }}">{{ $user->nom_prenom }}</option>
                                            @endforeach
                                        @else
                                            <option>Pas d'utilisateur</option>
                                        @endif
                                    </select>
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
                                    <option>Pas d'équipe</option>
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


  <script>
      $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

          $('.supress').click(function (e) {
            e.preventDefault();

            var element_id = $(this).closest('tr').find('.btn-suppres').val();

                swal({
                    title: "Etes-vous sûr d'effectuer cette opération ?",
                    text: "Cette action est irréversible!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        var data = {
                            "_token": $('input[name="_token"]').val(),
                            "id": element_id,
                        };

                        $.ajax({
                            type: "DELETE",
                            url: '/equipes/'+element_id,
                            data: data,
                            success: function (response) {
                                swal(response.message, {
                                    icon: "success",
                                })
                                .then((result) => {
                                    location.reload();
                                });
                            }
                        });

                    } else {
                        swal("Action annulée!");
                    }
            });
          })
      })
  </script>


@endsection
