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


            <div class="row">
              <div class="col-md-12 col-xs-12">

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Déclarer un empêchement</h2>
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

                    <!-- start form for validation -->
                    <form id="demo-form" data-parsley-validate method="POST" action="{{ route('empechement.store') }}">
                        @csrf
                        <label for="fullname">Titre * :</label>
                        <input type="text" id="fullname" class="form-control" name="titre" required />
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <label for="file">Justification :</label>
                        <input type="file" id="file" class="form-control" name="file" data-parsley-trigger="change"  />
                        <br> <br>
                        <label for="message">Raison (entre 20 et 100 caractères max) :</label>
                        <textarea id="message" required="required" class="form-control" name="raison" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Yo Mec, t'es pas inspiré on dirait, c'est trop court"
                        data-parsley-validation-threshold="10"></textarea>

                        <br/>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>

                    </form>
                    <!-- end form for validations -->

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
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>

  @endsection
