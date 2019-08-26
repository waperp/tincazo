<div class="header__primary-inner">
    <div class="header-logo">
        <a href="_soccer_index.html"><img src="assets/images/soccer/logo.png"
                srcset="assets/images/soccer/logo@2x.png 2x" alt="Alchemists" class="header-logo__img"></a>
    </div>
    <nav class="main-nav clearfix">
        <ul class="main-nav__list">
            <li class="active"><a href="/"><i class="fa fa-home fa-lg"></i></a></li>
            <li><a href="/">Quienes Somos</a></li>
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
            <li class=""><a href="#">MIS TORNEOS Y GRUPOS</a>
                <div class="main-nav__megamenu clearfix p-0 pt-2 pb-2">
                    <div style="border-right: 1px solid #ffffff30" class="col-lg-6 col-md-6 col-12">
                        <ul class="posts posts--simple-list">
                            <span class="badge badge-success mb-2" style="font-size: small">TORNEOS</span>
                            <div style="height: 180px; overflow-y:auto;">
                                @foreach(App\touinf::tournamentMenu() as $objTorneosUsersMenu)
                                <li class="posts__item posts__item--category-tournament posts__item--category-tournament-{{ $objTorneosUsersMenu->touinfscode }} posts__item__tournament"
                                    style="cursor: pointer;"
                                    onclick="selected_tournament(this,'{{ $objTorneosUsersMenu->secconnuuid }}')">
                                    <figure class="posts__thumb">
                                        <a>
                                            <img class="img-thumbnail img-thumbnail-success "
                                                style="width: 80px; height:80px;border-top-right-radius: 50%;border-bottom-right-radius: 50%;"
                                                src="/images/{{ $objTorneosUsersMenu->touinfvlogt }}">
                                        </a>
                                    </figure>
                                    <div class="posts__inner">

                                        <h6 class="posts__title pt-2  "><a>{{ $objTorneosUsersMenu->touinftname }}</a>
                                        </h6>
                                        <div class="posts__cat">
                                            <span class="label posts__cat-label badge-success"
                                                style="font-size: 9px">{{ $objTorneosUsersMenu->touinfsnumt }}
                                                Equipos</span>
                                        </div>
                                        <time class="posts__date">{{ $objTorneosUsersMenu->touinfdstat }}</time>
                                    </div>
                                </li>
                                @endforeach
                            </div>
                        </ul>
                    </div>
                    <div style="border-left: 1px solid #ffffff30" class="col-lg-6 col-md-6 col-12">
                        <ul class="posts posts--simple-list">
                            <span class="badge badge-primary mb-2"
                                style="font-size: small;background-color: #007bff;">GRUPOS
                            </span>
                            <div class="lds-spinner lds-spinner-middle d-none">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                            <div style="height: 180px; overflow-y:auto;" id="list_groups">
                            </div>
                        </ul>
                    </div>
                </div>
            </li>
            @endif
            @if(Session::has('plainficode') && Session::has('session-admin-tougrp'))
            @if (Session::get('session-admin-tougrp') == true)
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
        <a href="#" class="pushy-panel__toggle">
            <span class="pushy-panel__line"></span>
        </a>
    </nav>
</div>