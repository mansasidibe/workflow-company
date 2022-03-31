<div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                 <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('images/pas_image.svg.png') }}" alt="">@auth {{ auth()->user()->nom_utilisateur }} @endauth @guest Personne @endguest
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Paramètre</a></li>
                    <li>
                      <a href="{{ route('user.profil') }}">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Profil</span>
                      </a>
                    </li>
                    @auth
                    <li><a href="{{ route('user.logout') }}"><i class="fa fa-sign-out pull-right"></i>Deconnexion</a></li>
                    @endauth
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">{{ $messages->count() }}</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                       {{-- @if (Controller == DashboardController AND Method == dashbord_admin) --}}

                        @if ($messages->count())
                            @foreach ($messages as $message)
                            <li>
                                <a>
                                    <span class="image"><img src="" alt="Profil Image" /></span>
                                    <span>
                                    <span style="color: green">{{ $message->sender }}</span>
                                    <span class="time">{{ $message->created_at->diffForHumans() }}</span>
                                    </span>
                                    <span class="message">
                                    {{ $message->message }}
                                    </span>
                                </a>
                                </li>
                            @endforeach

                            <li>
                            <div class="text-center">
                                <a>
                                <strong>Voir toutes les alertes</strong>
                                <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                        @else
                            <li>
                                <div class="text-center">
                                <a><strong>Il n'ya pas de message en cours</strong></a>
                            </div>
                            </li>
                        @endif
                    {{-- @endif --}}

                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
