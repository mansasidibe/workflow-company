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
                <h3>Messages</h3>
              </div>
            </div>
            <div class="clearfix"></div>

        <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data" action="{{ route('message.store') }}">
            @csrf

            <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                    <h2>Envoyer un messages</small></h2>
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
                    <br />

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Selectionnez un destinataire</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select name="destinataire_id" class="form-control">
                                @if ($users->count())
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->nom_prenom }}</option>
                                    @endforeach
                                @endif
                                </select>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Message</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" name="message" class="form-control" required>
                            </div>
                        </div>
                         <input type="hidden" name="sender" value="{{ auth()->user()->nom_prenom }}" class="form-control" required>
                        <br>

                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
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
                  <div id="alerts"></div>

                  <div class="form-group">
                    <div class="col-md-9 col-sm-9 col-xs-12">
                    <button class="btn btn-primary">Envoyer</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </form>

          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
         @include('admin.layout.footer')
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
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('../vendors/iCheck/icheck.min.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('../vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('../vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="{{ asset('../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
    <script src="{{ asset('../vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
    <script src="{{ asset('../vendors/google-code-prettify/src/prettify.js') }}"></script>
    <!-- jQuery Tags Input -->
    <script src="{{ asset('../vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
    <!-- Switchery -->
    <script src="{{ asset('../vendors/switchery/dist/switchery.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('../vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- Parsley -->
    <script src="{{ asset('../vendors/parsleyjs/dist/parsley.min.js') }}"></script>
    <!-- Autosize -->
    <script src="{{ asset('../vendors/autosize/dist/autosize.min.js') }}"></script>
    <!-- jQuery autocomplete -->
    <script src="{{ asset('../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js') }}"></script>
    <!-- starrr -->
    <script src="{{ asset('../vendors/starrr/dist/starrr.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('../build/js/custom.min.js') }}"></script>

  </body>

@endsection
