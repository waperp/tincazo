<div class="header__primary-inner">
    <!-- Header Logo -->
    <div class="header-logo">
        <a href="_soccer_index.html"><img src="assets/images/soccer/logo.png"
                srcset="assets/images/soccer/logo@2x.png 2x" alt="Alchemists" class="header-logo__img"></a>
    </div>
    <!-- Header Logo / End -->
    <!-- Main Navigation -->
    <nav class="main-nav clearfix">
        <ul class="main-nav__list">
            <li class="active"><a href="/"><i class="fa fa-home fa-lg"></i></a></li>
            <li><a href="/">Quienes Somos</i></a></li>
            @if(Session::has('plainficode') )
            <li @if(trim(\Request::segment(1))."/*"==trim(substr("/matches",1))."/*") class="active active-white" @else
                @endif><a style="color:orange" href="/matches">PARTIDOS</a>
            </li>
            @else
            <li @if(trim(\Request::segment(1))."/*"==trim(substr("/matches",1))."/*") class="active active-white" @else
                @endif><a style="color:orange" data-toggle="modal" data-target="#modal-login-register-tabs">PARTIDOS</a>
            </li>
            @endif
            @if(Session::has('plainficode') )
            {{-- <li class=""><a href="#">Mis Torneos  <span style="color:#c2ff1f">(
                    {{ App\touinf::tournamentMenu()->count() }} )</span></a>
                <div class="main-nav__megamenu clearfix">
                    <div class="col-12">
                        <ul class="posts posts--simple-list">
                            <div class="row">
                                @foreach(App\touinf::tournamentMenu() as $objTorneosUsersMenu)
                                <li style="cursor: pointer;" class="posts__item posts__item--category-1 col-3">
                                    <figure class="posts__thumb">
                                        <a href="{{ route('touinf.tournament', $objTorneosUsersMenu->secconnuuid) }}">
                                            <img style="width: 80px ; height:80px;"
                                                src="/images/{{ $objTorneosUsersMenu->touinfvlogt }}">
                                        </a>
                                    </figure>
                                    <div class="posts__inner">
                                        <div class="posts__cat">
                                            <span
                                                class="label posts__cat-label">{{ $objTorneosUsersMenu->touinftname }}</span>
                                        </div>
                                        <h6 class="posts__title">
                                            <a href="{{ route('touinf.tournament', $objTorneosUsersMenu->secconnuuid) }}">
                                                {{ $objTorneosUsersMenu->touinftname }}</a>
                                        </h6>
                                        <time class="posts__date">{{ $objTorneosUsersMenu->touinfdstat }}</time>
                                    </div>
                                </li>
                                @endforeach
                            </div>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="">
                <a href="#">Mis Grupos 
                    @if (App\tougrp::tournamentsWithGroups()->count() > 0)
                    <span style="color:#c2ff1f">(
                            {{ App\tougrp::tournamentsWithGroups()->count() }} )</span>
                    @endif</a>
                <div class="main-nav__megamenu clearfix">
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="posts posts--simple-list">
                            <div class="row">
                                @foreach(App\tougrp::tournamentsWithGroups() as $objTorneosUsers)
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
                                    onclick="tougrptname_name_link('{{ $objTorneosUsers->tougrptname }}',
                                    {{ $objTorneosUsers->tougrpicode }},{{ $objTorneosUsers->touinfscode }},
                                    {{ $objTorneosUsers->tougplicode }},{{ $objTorneosUsers->plainficode }},
                                    {{ $objTorneosUsers->tougrpsxval }},{{ $objTorneosUsers->tougrpschpt }})">
                                    <figure class="posts__thumb">
                                        <a data-id="{{ $objTorneosUsers->tougrpicode }}">
                                            <img id="image-torneo-{{ $objTorneosUsers->tougrpicode }}"
                                                name="image-torneo-{{ $objTorneosUsers->tougrpicode }}"
                                                style="width: 80px ; height: 80px; "
                                                src="/images/{{ $objTorneosUsers->tougrpvimgg  }}">
                                        </a>
                                    </figure>
                                    <div class="posts__inner">
                                        <div class="posts__cat">
                                            <span
                                                class="label posts__cat-label">{{ $objTorneosUsers->touinftname }}</span>
                                        </div>
                                        <h6 class="posts__title"><a
                                                data-id="{{ $objTorneosUsers->tougrpicode }}">{{ $objTorneosUsers->tougrptname }}</a>
                                        </h6>
                                        <time class="posts__date">{{ $objTorneosUsers->tougrpdcrea }}</time>
                                    </div>
                                </li>
                                @endforeach
                            </div>
                        </ul>
                    </div>
                </div>
            </li> --}}
            <li class=""><a href="#">MIS TORNEOS Y GRUPOS</a>
                <div class="main-nav__megamenu clearfix">
                    
                    <div class="col-lg-6 col-md-6 col-12" >
                        <ul class="posts posts--simple-list">
                            <span class="badge badge-success mb-3" style="font-size: small">TORNEOS</span>
                            <div style="height: 180px; overflow-y:auto;">

                            @foreach(App\touinf::tournamentMenu() as $objTorneosUsersMenu)
                            
                            <li class="posts__item posts__item--category-1">
                                
                                    <figure class="posts__thumb">
                                            <a href="{{ route('touinf.tournament', $objTorneosUsersMenu->secconnuuid) }}">
                                                    <img class="img-thumbnail img-thumbnail-success rounded-circle" style="width: 80px; height:80px;border-radius: 25%"
                                                        src="/images/{{ $objTorneosUsersMenu->touinfvlogt }}">
                                                </a>
                                    </figure>
                                    <div class="posts__inner">
                                            <div class="posts__cat">
                                                    <span class="label posts__cat-label badge-success" style="font-size: 9px">{{ $objTorneosUsersMenu->touinfsnumt }} Equipos</span>
                                                </div>
                                        <h6 class="posts__title"><a href="{{ route('touinf.tournament', $objTorneosUsersMenu->secconnuuid) }}">
                                                {{ $objTorneosUsersMenu->touinftname }}</a></h6>
                                                
                                        <time datetime="2016-08-21" class="posts__date">{{ $objTorneosUsersMenu->touinfdstat }}</time>
                                    </div>
                                </li>
                            @endforeach
                           
                        </div>
                          
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12" >
                            <ul class="posts posts--simple-list">
                                <span class="badge badge-primary mb-3" style="font-size: small;background-color: #007bff;">GRUPOS</span>
                            <div style="height: 180px; overflow-y:auto;">
                                
                                @foreach (App\tougrp::tournamentsWithGroups()  as $objTorneosUsers)
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
                                <li class="posts__item posts__item--category-1"  style="cursor: pointer;"
                                onclick="tougrptname_name_link('{{ $objTorneosUsers->tougrptname }}',
                                {{ $objTorneosUsers->tougrpicode }},{{ $objTorneosUsers->touinfscode }},
                                {{ $objTorneosUsers->tougplicode }},{{ $objTorneosUsers->plainficode }},
                                {{ $objTorneosUsers->tougrpsxval }},{{ $objTorneosUsers->tougrpschpt }})">
                                    
                                        <figure class="posts__thumb">
                                                <a data-id="{{ $objTorneosUsers->tougrpicode }}">
                                                        <img class="img-thumbnail img-thumbnail-primary  rounded-circle" id="image-torneo-{{ $objTorneosUsers->tougrpicode }}"
                                                            name="image-torneo-{{ $objTorneosUsers->tougrpicode }}"
                                                            style="width: 40px ; height: 40px; border-radius: 25%"
                                                            src="/images/{{ $objTorneosUsers->tougrpvimgg  }}">
                                                    </a>
                                        </figure>
                                        <div class="posts__inner">
                                                <div class="posts__cat">
                                                        <span class="label posts__cat-label badge-primary"  style="font-size: 8px">{{ $objTorneosUsers->total }} Participantes</span>
                                                    </div>
                                            <h6 class="posts__title"><a href="#">{{ $objTorneosUsers->tougrptname }}</a></h6>
                                        </div>
                                    </li>
                                @endforeach
                            </div>
                              
                            </ul>
                        </div>
                </div>
            </li>
            @endif
            @if(Session::has('plainficode') && Session::has('session-admin-tougrp'))
            @if (Session::get('session-admin-tougrp')== true)
            <li class="mitorneo_li">
                <a class="mitorneo">{{ Session::get('select-tougrptname') }}</a>
                <ul class="main-nav__sub">
                    <li><a href="javascript:void(0)" id="modal-config-open" data-toggle="modal"
                            data-target="#modal-config-grupo">Configurar</a></li>
                    <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modales">Invitar</a></li>
                    <li><a href="javascript:void(0)" onclick="validarCampeonFechas()">Campeón</a>
                    </li>
                    <li><a href="#tustincazos-div">Tincazos</a></li>
                </ul>
            </li>
            @else
            <li class="mitorneo_li">
                <a class="mitorneo">{{ Session::get('select-tougrptname') }}</a>

                <ul class="main-nav__sub">
                    <li><a href="javascript:void(0)" onclick="validarCampeonFechas()">Campeón</a>
                    </li>
                    <li><a href="#tustincazos-div">Tincazos</a></li>
                </ul>
            </li>
            @endif
            @endif
        </ul>

        <!-- Social Links -->
        {{-- <ul class="social-links social-links--inline social-links--main-nav">
                <li class="social-links__item">
                    <a href="#" class="social-links__link" data-toggle="tooltip" data-placement="bottom"
                        title="Facebook"><i class="fa fa fa-facebook"></i></a>
                </li>
                <li class="social-links__item">
                    <a href="#" class="social-links__link" data-toggle="tooltip" data-placement="bottom"
                        title="Twitter"><i class="fa fa fa-twitter"></i></a>
                </li>
                <li class="social-links__item">
                    <a href="#" class="social-links__link" data-toggle="tooltip" data-placement="bottom"
                        title="Google+"><i class="fa fa fa-google-plus"></i></a>
                </li>
            </ul> --}}
        <!-- Social Links / End -->

        <!-- Pushy Panel Toggle -->
        <a href="#" class="pushy-panel__toggle">
            <span class="pushy-panel__line"></span>
        </a>
        <!-- Pushy Panel Toggle / Eng -->
    </nav>
    <!-- Main Navigation / End -->
</div>