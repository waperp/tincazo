<header class="header header--layout-1">

  <!-- Header Top Bar -->
  <div class="header__top-bar clearfix">
    <div class="container">

      <!-- Account Navigation -->
      <ul class="nav-account">
        @if(Session::has('plainficode') and Session::has('secusricode') and Session::has('plainftnick')
        and Session::has('secusrtmail'))
        @if(Session::get('contypscode') == 1)
        <li class="nav-account__item">
          <span class="main-nav__toggle"></span>
          <a href="javascript:void(0)">Administrar <span class="highlight"></span></a>
          <ul class="main-nav__sub">
            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-admin-gestionar-grupo">Gestionar
                Grupos</a></li>
            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-nuevo-torneo">Gestionar Torneos</a>
            </li>
            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-nuevo-equipo">Gestionar Plantel</a>
            </li>
            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-nuevo-torneo-equipo">Torneo &
                Plantel</a></li>
            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-gestionar-fixture">Gestionar
                Fixture</a></li>
          </ul>
        </li>
        @else
        @endif


        <li class="nav-account__item"><span class="main-nav__toggle"></span><a href="javascript:void(0)">Mi Cuenta <span
              class="highlight"></span></a>
          <ul class="main-nav__sub">
            @if (Session::get('conmemscode') != 1)
            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-login-nuevo-grupo">Crear Grupo </a>
            </li>
            @endif
            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-edit-perfil">Editar Perfil</a></li>
            <li><a href="/logout">Cerrar Sesion</a></li>
          </ul>
        </li>
        @if (COUNT($listaInvitaciones) > 0)
        <li class="nav-account__item">
          <a href="javascript:void(0)" DATA-toggle="modal" DATA-target="#modal-invitaciones"><span
              style="color:orange">INVITACIONES</span> <span> ( {{ COUNT($listaInvitaciones) }} )</span></a>
        </li>
        @else
        <li class="nav-account__item">
          <a href="javascript:void(0)"><span style="color:orange">INVITACIONES</span> <span style="color:#c2ff1f">(
              {{ COUNT($listaInvitaciones) }} )</span> </a>
        </li>
        @endif
        <li class="nav-account__item">
          <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-edit-perfil"><img
              src="images/{{ Session::get('conmemvimgm') }}" style="height:25px; width: 25px" alt=""> &nbsp;
            {{ Session::get('plainftnick') }} </a>
        </li>
        @else
        <li class="nav-account__item">
          <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-login-register-tabs">Iniciar Sesion</a>
          {{-- <li class="nav-account__item"><a  data-toggle="modal" data-target="#modal-login-register">Crear Cuenta</a></li> --}}
        </li>
        <li class="nav-account__item">

          {{-- <li class="nav-account__item"><a  data-toggle="modal" data-target="#modal-login-register-tabs">Iniciar Sesion</a></li> --}}
          <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-login-register">Crear Cuenta</a>
        </li>
        @endif
      </ul>

    </div>
  </div>
  <div class="header__secondary">
    <div class="container">
      <ul class="info-block info-block--header">
        <li class="info-block__item info-block__item--contact-secondary">
          <svg role="img" class="df-icon df-icon--soccer-ball">
            <use xlink:href="assets/images/icons-soccer.svg#soccer-ball" />
          </svg>
          <h6 class="info-block__heading">Contactenos</h6>
          <a style="text-decoration: underline" class="info-block__link"
            href="mailto:soporte@tincazo.com">soporte@tincazo.com</a>
        </li>
      </ul>
    </div>
  </div>
  <div class="header__primary">
    <div class="container">
      <div class="header__primary-inner">

        <!-- Header Logo -->
        <div class="header-logo">
          <a href="/"><img src="assets/images/soccer/tincaso.png" style="width: 150px; height: 150px" alt="Alchemists"
              class="header-logo__img"></a>
        </div>
        <nav class="main-nav clearfix">
          <ul class="main-nav__list">
            <li @if(trim(\Request::segment(1))."/*"==trim(substr("/",1))."/*") class="active" @else @endif><a
                href="/"><i class="fa fa-home fa-lg"></i></a></li>
            @if(Session::has('plainficode') )
            <li @if(trim(\Request::segment(1))."/*"==trim(substr("/matches",1))."/*") class="active active-white" @else
              @endif><a style="color:orange" href="/matches">PARTIDOS</a></li>
            @else
            <li @if(trim(\Request::segment(1))."/*"==trim(substr("/matches",1))."/*") class="active active-white" @else
              @endif><a style="color:orange" data-toggle="modal" data-target="#modal-login-register-tabs">PARTIDOS</a>
            </li>

            @endif

            <li><a href="/Guia" target="_blank">GUIA</a></li>

            @if(Session::has('plainficode') )
            <li class=""><a href="javascript:void(0)">MIS TORNEOS <span style="color:#c2ff1f">(
                  {{ count($listaTorneosMenu) }} )</span></a>
              <div id="main-nav-torneos" class="main-nav__megamenu clearfix"
                style="width:unset; left: unset; padding: 20px 20px ">
                <div class="col-lg-12 col-md-12 col-xs-12">
                  <ul class="posts posts--simple-list">
                    <!-- //torneo -->
                    @foreach($listaTorneosMenu as $objTorneosUsersMenu)
                    <li class="posts__item posts__item--category-1">
                      <figure class="posts__thumb">
                        <a href="{{ route('touinf.tournament', $objTorneosUsersMenu->secconnuuid) }}">
                          <img style="width: 50px ; height: 50px; border-radius: 20%"
                            src="/images/{{ $objTorneosUsersMenu->touinfvlogt }}">
                        </a>
                      </figure>
                      <div class="posts__inner">
                        <div class="posts__cat">
                          <span style="white-space: pre-wrap; width: 100%" class="label posts__cat-label"><a
                              href="{{ route('touinf.tournament', $objTorneosUsersMenu->secconnuuid) }}"
                              style="color: white;font-size: 11px;">{{ $objTorneosUsersMenu->touinftname }}</a></span>
                        </div>
                        <h6 class="posts__title"><a
                            href="{{ route('touinf.tournament', $objTorneosUsersMenu->secconnuuid) }}"
                            style="color: white;font-size:9px;">{{ $objTorneosUsersMenu->touinftname }}</a> </h6>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </li>
            @endif
            @if(Session::has('plainficode') )
            <li class=""><a href="javascript:void(0)">MIS GRUPOS <span>(
                  {{ count($listaTorneos) }} )</span></a>
              @endif
              @if(count($listaTorneos) <= 0 ) @else <div id="main-nav-torneos" class="main-nav__megamenu clearfix"
                style="width:unset; left: unset; padding: 20px 20px ">

                <div class="col-lg-12 col-md-12 col-xs-12">
                  <ul class="posts posts--simple-list">
                    <!-- //torneo -->
                    @foreach($listaTorneos as $objTorneosUsers)
                    <input type="hidden" id="tougrpsmaxp{{ $objTorneosUsers->tougrpicode }}"
                      value="{{ $objTorneosUsers->tougrpsmaxp }}">
                    <input type="hidden" id="tougrpsmedp{{ $objTorneosUsers->tougrpicode }}"
                      value="{{ $objTorneosUsers->tougrpsmedp}}">
                    <input type="hidden" id="tougrpsminp{{ $objTorneosUsers->tougrpicode }}"
                      value="{{ $objTorneosUsers->tougrpsminp}}">
                    <input type="hidden" id="tougrpsxval{{ $objTorneosUsers->tougrpicode }}"
                      value="{{ $objTorneosUsers->tougrpsxval}}">
                    <input type="hidden" id="tougrpschpt{{ $objTorneosUsers->tougrpicode }}"
                      value="{{ $objTorneosUsers->tougrpschpt}}">
                    <li class="posts__item posts__item--category-1" style="cursor: pointer;"
                      onclick="tougrptname_name_link('{{ $objTorneosUsers->tougrptname }}',{{ $objTorneosUsers->tougrpicode }},{{ $objTorneosUsers->touinfscode }},{{ $objTorneosUsers->tougplicode }},{{ $objTorneosUsers->plainficode }},{{ $objTorneosUsers->tougrpsxval }},{{ $objTorneosUsers->tougrpschpt }})">
                      <figure class="posts__thumb">
                        <a data-id="{{ $objTorneosUsers->tougrpicode }}">
                          <img id="image-torneo-{{ $objTorneosUsers->tougrpicode }}"
                            name="image-torneo-{{ $objTorneosUsers->tougrpicode }}"
                            style="width: 50px ; height: 50px; border-radius: 20%"
                            src="/images/{{ $objTorneosUsers->tougrpvimgg  }}">
                        </a>
                      </figure>
                      <div class="posts__inner">
                        <div class="posts__cat">
                          <span style="white-space: pre-wrap; width: 100%" class="label posts__cat-label"><a
                              style="color: white;font-size: 11px;">{{ $objTorneosUsers->tougrptname }}</a></span>
                        </div>
                        <h6 class="posts__title"><a style="color: white;font-size:9px;"
                            data-id="{{ $objTorneosUsers->tougrpicode }}">{{ $objTorneosUsers->touinftname }}</a> </h6>
                      </div>
                    </li>
                    @endforeach
                  </ul>
                </div>
      </div>
      @endif
      </li>

      @if(Session::has('plainficode') and Session::has('secusricode') and Session::has('plainftnick')
      and Session::has('secusrtmail'))
 
      @endif
      @if(Session::has('plainficode') && Session::has('session-admin-tougrp'))


      @if (Session::get('session-admin-tougrp')== true)
      <li class="mitorneo_li">
        <a class="mitorneo">{{ Session::get('select-tougrptname') }}</a>
        <ul class="main-nav__sub">
          <li><a href="javascript:void(0)" id="modal-config-open" data-toggle="modal"
              data-target="#modal-config-grupo">Configurar</a></li>
          <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modales">Invitar</a></li>
          <li><a href="javascript:void(0)" onclick="validarCampeonFechas()">Campeón</a></li>
          <li><a href="#tustincazos-div">Tincazos</a></li>
        </ul>
      </li>
      @else
      <li class="mitorneo_li">
        <a class="mitorneo">{{ Session::get('select-tougrptname') }}</a>

        <ul class="main-nav__sub">
          <li><a href="javascript:void(0)" onclick="validarCampeonFechas()">Campeón</a></li>
          <li><a href="#tustincazos-div">Tincazos</a></li>
        </ul>
      </li>
      @endif





      @endif

      </ul>
      <a href="javascript:void(0)" class="pushy-panel__toggle">
        <span class="pushy-panel__line"></span>
      </a>
      <!-- Pushy Panel Toggle / Eng -->
      </nav>
      <!-- Main Navigation / End -->
    </div>
  </div>
  </div>
  <!-- Header Primary / End -->

</header>