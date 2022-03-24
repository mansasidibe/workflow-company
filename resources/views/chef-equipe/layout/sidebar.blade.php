<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>WMC</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('images/pas_image.svg.png') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenue,</span>
                <h2>@auth {{ auth()->user()->nom_utilisateur }} @endauth @guest Personne @endguest</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    @if (auth()->user()->type_utilisateur == "chef")
                        <li><a href="{{ route('chef.dashbord') }}"><i class="fa fa-home"></i> Accueil</a></li>
                    @else
                        <li><a href="{{ route('user.dashbord') }}"><i class="fa fa-home"></i> Accueil</a></li>
                    @endif
                     <li><a><i class="fa fa-sitemap"></i> Projets <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('equipe.projet') }}">projets</a>
                        <li><a>Tâches<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            @foreach ($projets as $projet)
                                <li><a href="{{ route('equipe.tache', $projet->id) }}">{{ $projet->nom }}</a></li>
                            @endforeach
                          </ul>
                        </li>
                        <li><a href="{{ route('empechement.create') }}">Déclarer un empêchement</a>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-edit"></i> Evénements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('evenements.index') }}">Calendrier</a></li>
                      <li><a href="{{ route('message.create') }}">Envoyé messages</a></li>
                    </ul>

                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings" href="{{ route('user.setting') }}">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="verrouiller la session" href="{{ route('user.lock') }}">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('user.logout') }}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
               <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
