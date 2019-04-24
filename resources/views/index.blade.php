@extends('layout.welcome')

@section('sidebar') 
  <input type="hidden" value="{{ Session::get('plainficode') }}" id="plainficode-hidden">
  <input type="hidden" value="{{ Session::get('select-tougrptname') }}" id="session-select-tougrptname">
  <input type="hidden" value="{{ Session::get('select-tougrpicode') }}" id="session-select-tougrpicode">
  <input type="hidden" value="{{ Session::get('select-touinfscode') }}" id="session-select-touinfscode">
  <input type="hidden" value="{{ Session::get('select-tougplicode') }}" id="session-select-tougplicode">
  <input type="hidden" value="{{ Session::get('select-plainficode') }}" id="session-select-plainficode">
  <input type="hidden" value="{{ Session::get('select-q') }}" id="session-select-q">
  <input type="hidden"  id="tougrpicode-hidden-filtrer">
  @if(!Session::has('select-q'))
   <div id="slider-index" class="hero-slider-wrapper">
    
      <div class="hero-slider">
        @foreach ($listaTouinf as $objSlideTouinf)
           <div class="hero-slider__item" style="background-image: url(/images/{{  $objSlideTouinf->touinfvlogt}})">
    
          <div class="container hero-slider__item-container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <!-- Post Meta - Top -->
                <div class="post__meta-block post__meta-block--top">
    
                  <!-- Post Category -->
                  <div class="post__category">
                    {{-- <span class="label posts__cat-label">{{ $objSlideTouinf->touinftname }}</span> --}}
                  </div>
                  <!-- Post Category / End -->
    
                  <!-- Post Title -->
                  <h1 class="page-heading__title"><a href="javascript:void(0)">{{ $objSlideTouinf->touinftname }}</span> <span class="highlight"></span> </a></h1>
                  <!-- Post Title / End -->
    
                  <!-- Post Meta Info -->
                  <ul class="post__meta meta">
                    <li class="meta__item meta__item--date"><time datetime="{{ $objSlideTouinf->touinfdstat }}">
                      {{ Carbon\Carbon::parse($objSlideTouinf->touinfdstat)->formatLocalized('%d DE %B %Y') }}</time></li>
                    {{-- <li class="meta__item meta__item--views">2369</li> --}}
                    {{-- <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like meta-like--active icon-heart"></i> 530</a></li>
                    <li class="meta__item meta__item--comments"><a href="#">18</a></li> --}}
                  </ul>
                  <!-- Post Meta Info / End -->
    
                  <!-- Post Author -->
                {{--   <div class="post-author">
                    <figure class="post-author__avatar">
                      <img src="assets/images/samples/avatar-1.jpg" alt="Post Author Avatar">
                    </figure>
                    <div class="post-author__info">
                      <h4 class="post-author__name">James Spiegel</h4>
                      <span class="post-author__slogan">Alchemists Ninja</span>
                    </div>
                  </div> --}}
                  <!-- Post Author / End -->
    
                </div>
                <!-- Post Meta - Top / End -->
              </div>
            </div>
          </div>
      
        </div>
        @endforeach

      </div>
      <div class="hero-slider-thumbs-wrapper" >
        <div class="container">
          <div class="hero-slider-thumbs posts posts--simple-list">
            @foreach ($listaTouinf as $objSlideTouinf1)
            <div class="hero-slider-thumbs__item">
              <div class="posts__item posts__item--category-{{ $objSlideTouinf1->touinfscode }}">
                <div class="posts__inner">
                  <div class="posts__cat">
                    <span class="label posts__cat-label"></span>
                  </div>
                  <h6 class="posts__title">{{ $objSlideTouinf1->touinftname }}</h6>
                  <time  datetime="{{ $objSlideTouinf->touinfdstat }} class="posts__date">{{ Carbon\Carbon::parse($objSlideTouinf->touinfdstat)->formatLocalized('%d DE %B %Y') }}</time>
                </div>
              </div>
            </div>
           @endforeach
          </div>
        </div>
      </div>
    
    
    </div>
  @endif
@endsection

@section('header')
 <header class="header">
  
        <!-- Header Top Bar -->
        <div class="header__top-bar clearfix">
            <div class="container">
  
                <!-- Account Navigation -->
                <ul class="nav-account">

                @if(Session::has('plainficode') and Session::has('secusricode') and Session::has('plainftnick') 
                and Session::has('secusrtmail'))
                    
                    @if(Session::get('contypscode') == 1)


                       <li class="nav-account__item has-children">
                        <span class="main-nav__toggle"></span>

                        <a href="javascript:void(0)">Administrar <span class="highlight"></span></a>
                                        <ul class="main-nav__sub">
                                            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-admin-gestionar-grupo" >Gestionar Grupos</a></li>

                                            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-nuevo-torneo" >Gestionar Torneos</a></li>
                                            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-nuevo-equipo">Gestionar Plantel</a></li>
                                            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-nuevo-torneo-equipo">Torneo & Plantel</a></li>
                                            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-gestionar-fixture">Gestionar Fixture</a></li>
                                        </ul>
                                    </li>
                    @else

                    @endif
                    
                       <li class="nav-account__item has-children"><span class="main-nav__toggle"></span><a href="javascript:void(0)">Mi Cuenta <span class="highlight"></span></a>
                            <ul class="main-nav__sub">
                                @if (Session::get('conmemscode') != 1)
                                  <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-login-nuevo-grupo">Crear Grupo </a></li>
                                @endif
                                <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-edit-perfil" >Editar Perfil</a></li>
                                <li><a href="/logout">Cerrar Sesion</a></li>
                                </ul>
                            </li>
                    <li class="nav-account__item">
                      <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-edit-perfil"><img src="images/{{ Session::get('conmemvimgm') }}" style="height:25px; width: 25px" alt=""> &nbsp; {{ Session::get('plainftnick') }} </a>
                    </li>
                @else
                    <li class="nav-account__item">

                        <a  href="javascript:void(0)" data-toggle="modal" data-target="#modal-login-register-tabs">Iniciar Sesion</a>
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
                            <use xlink:href="assets/images/icons-soccer.svg#soccer-ball"/>
                        </svg>
                        <h6 class="info-block__heading">Contactenos</h6>
                        <a class="info-block__link" {{-- href="mailto:info@alchemists.com" --}}>tincazo.info@gmail.com</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="header__primary">
            <div class="container">
                <div class="header__primary-inner">
  
                    <!-- Header Logo -->
                    <div class="header-logo">
                        <a href="/"><img src="assets/images/soccer/tincaso.png" style="widows: 150px; height: 170px"  alt="Alchemists" class="header-logo__img"></a>
                    </div>
                    <nav class="main-nav clearfix">
                        <ul class="main-nav__list">
                            <li class="active"><a href="/">Inicio</a></li>
                            <li ><a onclick="removemenu()" href="/#instrucciones">Instrucciones</a></li>
                                 @if(Session::has('plainficode') )
                              <li class=""><a id="enlace-invitacion" href="javascript:void(0)">INVITACIONES ( {{ count($listaInvitaciones) }} )</a>
                            @endif
                              @if(count($listaInvitaciones) <= 0 )
                              @else
                            <div class="main-nav__megamenu clearfix" style="width:unset; left: unset; padding: 23px 25px;">
                  
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <ul class="posts posts--simple-list">
                                <!-- //torneo -->
                                  @foreach($listaInvitaciones as $objInvitacionesTorneos)
                                  
                                <li class="posts__item posts__item--category-1">
                                  <figure class="posts__thumb">
                                    <a >
                                      <img  name="image-torneo-{{ $objInvitacionesTorneos->tougrpicode }}"  
                                      style="width: 70px ; height: 70px" src="/images/{{ $objInvitacionesTorneos->tougrpvimgg  }}" >
                                    </a>
                                  </figure>
                                  <div class="posts__inner">
                                    <div class="posts__cat">
                                     <span class="label posts__cat-label" style="background-color: #ff7e1f !important;"><a style="color: white;font-size: 10px;">{{ $objInvitacionesTorneos->tougrptname }}</a></span>

                                    </div>
                                    <h6 style="font-size: 10px;" class="posts__title"> <a>{{ $objInvitacionesTorneos->touinftname }}</a></h6>

                                    <span id="aceptarInvitacion{{ $objInvitacionesTorneos->tougrpicode }}" onclick="aceptarInvitacion(2,{{ $objInvitacionesTorneos->tougrpicode }})" class="label label-success" onmouseover="" style="cursor: pointer;">Aceptar</span>
                                    <span id="rechazarInvitacion{{ $objInvitacionesTorneos->tougrpicode }}" onclick="aceptarInvitacion(0,{{ $objInvitacionesTorneos->tougrpicode }})" class="label label-danger" onmouseover="" style="cursor: pointer;">Rechazar</span>
                                  </div>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                            @endif
                </li>
                 @if(Session::has('plainficode') )
                    <li class=""><a href="javascript:void(0)">MIS TORNEOS ( {{ count($listaTorneosMenu) }} )</a>
                                  <div id="main-nav-torneos" class="main-nav__megamenu clearfix" style="width:unset; left: unset; padding: 20px 20px ">
                  
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <ul class="posts posts--simple-list">
                                <!-- //torneo -->
                                  @foreach($listaTorneosMenu as $objTorneosUsersMenu)
                                   
                                  
                                <li class="posts__item posts__item--category-1">
                                  <figure class="posts__thumb">
                                    <a href="javascript:void(0)" data-id="">
                                      <img style="width: 50px ; height: 50px; border-radius: 20%" src="/images/{{ $objTorneosUsersMenu->touinfvlogt  }}" >
                                    </a>
                                  </figure>
                                  <div class="posts__inner">
                                    <div class="posts__cat">
                                      <span style="white-space: pre-wrap; width: 100%"  class="label posts__cat-label"><a href="javascript:void(0)" style="color: white;font-size: 11px;" >{{ $objTorneosUsersMenu->touinftname }}</a></span>
                                    </div>
                                    <h6 class="posts__title"><a href="javascript:void(0)" style="color: white;font-size:9px;">{{ $objTorneosUsersMenu->touinftname }}</a> </h6>
                                  </div>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                              </li>
                              @endif 
                            @if(Session::has('plainficode') )
                              <li class=""><a href="javascript:void(0)">MIS GRUPOS ( {{ count($listaTorneos) }} )</a>
                            @endif
                              @if(count($listaTorneos) <= 0 )
                              @else
                            <div id="main-nav-torneos" class="main-nav__megamenu clearfix" style="width:unset; left: unset; padding: 20px 20px ">
                  
                            <div class="col-lg-12 col-md-12 col-xs-12">
                              <ul class="posts posts--simple-list">
                                <!-- //torneo -->
                                  @foreach($listaTorneos as $objTorneosUsers)
                                      <input type="hidden" id="tougrpsmaxp{{ $objTorneosUsers->tougrpicode }}" value="{{ $objTorneosUsers->tougrpsmaxp }}">
                                      <input type="hidden" id="tougrpsmedp{{ $objTorneosUsers->tougrpicode }}" value="{{ $objTorneosUsers->tougrpsmedp}}">
                                      <input type="hidden" id="tougrpsminp{{ $objTorneosUsers->tougrpicode }}" value="{{ $objTorneosUsers->tougrpsminp}}">
                                      <input type="hidden" id="tougrpsxval{{ $objTorneosUsers->tougrpicode }}" value="{{ $objTorneosUsers->tougrpsxval}}">
                                  
                                <li class="posts__item posts__item--category-1">
                                  <figure class="posts__thumb">
                                    <a href="javascript:void(0)" data-id="{{ $objTorneosUsers->tougrpicode }}" onclick="tougrptname_name_link('{{ $objTorneosUsers->tougrptname }}',{{ $objTorneosUsers->tougrpicode }},{{ $objTorneosUsers->touinfscode }},{{ $objTorneosUsers->tougplicode }},{{ $objTorneosUsers->plainficode }},{{ $objTorneosUsers->tougrpsxval }})">
                                      <img id="image-torneo-{{ $objTorneosUsers->tougrpicode }}" name="image-torneo-{{ $objTorneosUsers->tougrpicode }}"  
                                      style="width: 50px ; height: 50px; border-radius: 20%" src="/images/{{ $objTorneosUsers->tougrpvimgg  }}" >
                                    </a>
                                  </figure>
                                  <div class="posts__inner">
                                    <div class="posts__cat">
                                      <span style="white-space: pre-wrap; width: 100%"  class="label posts__cat-label"><a href="javascript:void(0)" style="color: white;font-size: 11px;" data-id="{{ $objTorneosUsers->tougrpicode }}" onclick="tougrptname_name_link('{{ $objTorneosUsers->tougrptname }}',{{ $objTorneosUsers->tougrpicode }},{{ $objTorneosUsers->touinfscode }},{{ $objTorneosUsers->tougplicode }},{{ $objTorneosUsers->plainficode }},{{ $objTorneosUsers->tougrpsxval }})">{{ $objTorneosUsers->tougrptname }}</a></span>
                                    </div>
                                    <h6 class="posts__title"><a href="javascript:void(0)" style="color: white;font-size:9px;"  data-id="{{ $objTorneosUsers->tougrpicode }}" onclick="tougrptname_name_link('{{ $objTorneosUsers->tougrptname }}',{{ $objTorneosUsers->tougrpicode }},{{ $objTorneosUsers->touinfscode }},{{ $objTorneosUsers->tougplicode }},{{ $objTorneosUsers->plainficode }},{{ $objTorneosUsers->tougrpsxval }})">{{ $objTorneosUsers->touinftname }}</a> </h6>
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
                              <li class="mitorneo">
                                <a class="mitorneo" >{{ Session::get('select-tougrptname') }}</a>
                                <ul class="main-nav__sub">
                                    <li><a href="javascript:void(0)" id="modal-config-open" data-toggle="modal" data-target="#modal-config-grupo">Configurar</a></li>
                                    <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modales" >Invitar</a></li>
                                    <li><a href="javascript:void(0)" onclick="validarCampeonFechas()">Campeón</a></li>
                                    <li><a href="#tustincazos-div" >Tincazos</a></li>
                                </ul>
                              </li>
                              @else
                                <li >
                                  <a class="mitorneo" >{{ Session::get('select-tougrptname') }}</a>

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
@endsection
@section('slider')
  
    @endsection
    @section('content')
   
    <div class="col-md-8">
    <div class="content col-md-6">
        <aside class="widget card widget--sidebar widget-awards">
            <div class="widget__title card__header">
                <h4>
                    TU CAMPEÓN
                </h4>
            </div>
            <div class="widget__content card__content">
                <div class="awards awards--slider">
                    <div class="awards__item">
                        @if ($miCampeon != null && Session::has('plainficode'))
                          <figure  onclick="validarCampeonFechas()"class="awards__figure awards__figure--space" style="padding: 10px 0; cursor: pointer;">
                            <img style="border-radius:  50%;height: 200px;width: 250px;" id="image-mi-campeon" 
                            src="images/{{ $miCampeon[0]->touteavimgt }}" alt="">
                          </figure>
                          <div class="awards__desc" style="padding: 5px 0; color: red" >
                          <div id="mi-campeon-name" class="awards__name" style="font-size: 16px; font-weight: 600"> {{ $miCampeon[0]->touteatname }}</div>
                        @elseif($miCampeon == null && Session::has('plainficode'))
                          <figure onclick="validarCampeonFechas()"class="awards__figure awards__figure--space" style="padding: 10px 0; cursor: pointer;">
                              <img style="border-radius:  50%;height: 200px;width: 250px;"  id="image-mi-campeon" src="assets/images/samples/trophy-04.svg" alt="">
                          </figure>
                          <div class="awards__desc" style="padding: 5px 0; color: red" >
                          <div id="mi-campeon-name" class="awards__name" style="font-size: 16px; font-weight: 600">NO TIENES CAMPEÓN TODAVIA!!</div>
                        @else
                          <figure onclick="validarCampeonFechas()" class="awards__figure awards__figure--space" style="padding: 10px 0; cursor: pointer;">
                              <img style="border-radius:  50%;height: 200px;width: 250px;"  id="image-mi-campeon" src="assets/images/samples/trophy-04.svg" alt="">
                          </figure>
                          <div class="awards__desc" style="padding: 5px 0; color: red" >
                          <div id="mi-campeon-name" class="awards__name" style="font-size: 16px; font-weight: 600">INICIE SESSIÓN</div>
                        @endif
                        
                    </div>
                </div>
            </div>
        </aside>
    </div>
    <div class="content col-md-6">
        <aside class="widget widget--sidebar card card--has-table widget-team-stats">
            <div class="widget__title card__header">
                <h4>
                    CAMPEONES
                </h4>
            </div>
            <div class="widget__content card__content">
                <ul class="team-stats-box" id="estadisticas">
                </ul>
            </div>
        </aside>
    </div>
    <div class="content col-md-12" id="tustincazos-div">
        <div class="card">
              <header class="card__header card__header--has-filter">
                <h4>TUS TINCAZOS</h4>
                 <ul class="nav nav-tabs category-filter category-filter--featured" style="padding:7px 7px">
                    <li class="active category-filter__item">
                        <a class="category-filter__link category-filter__link--reset category-filter__link--active" data-toggle="tab" href="#pendientes">
                            PENDIENTES
                        </a>
                    </li>
                    <li class="category-filter__item">
                        <a class="category-filter__link" data-toggle="tab" href="#juego">
                            EN JUEGO
                        </a>
                    </li>
                    <li class="category-filter__item">
                        <a class="category-filter__link" data-toggle="tab" href="#finalizado">
                            FINALIZADOS
                        </a>
                    </li>
                    <li class="category-filter__item" style="width: 100%"> 
                      {{-- <input type="search" class="form-control buscar btn-block" style="padding: 5px 5px;height: auto;" placeholder="Busca por equipos" name="">
                      <input type="button" class="btn-primary-inverse btn-sm btn-block" value="BUSCAR" style="padding: 5px 5px;height: auto; margin-top: 0px" name=""> --}}
                   {{--    <div class="input-group">
                                                     
                                                      <span class="input-group-btn">
                                                        <button style="padding:9px 32px 8px 32px" class="btn btn-primary-inverse" id="shearh-tincazos" type="button"><i class="glyphicon glyphicon-search"></i></button>
                                                      </span>          
                    </div> --}}

<div class="input-group">
   <div class="input-group-btn">
    <button title="Refrescar Tincazos" style="padding:8px 16px 8px 16px" type="button" class="btn btn-primary-inverse refresh-button"><i class="fa fa-refresh"></i></button>
  </div>
   <input style="padding: 7px 7px;height: auto;" type="search"class="form-control buscar" placeholder="Busca por equipos">
  <div class="input-group-btn">
    <button title="Buscar Tincazos"  style="padding:8px 16px 8px 16px" type="button" id="shearh-tincazos" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
  </div>
</div>
                </ul>
                    </li>


              </header>
           

               <div class="tab-content">
                <div class="tab-pane fade in active" id="pendientes">
                    <div class="card__content" style="height: 550px;overflow-y:  auto;" >
                        <div class="game-result" id="game-result-pendientes">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="juego">
                    <div class="card__content" style="height: 550px;overflow-y:  auto;" >
                        <div class="game-result" id="game-result-juego">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="finalizado">
                    <div class="card__content" style="height: 550px;overflow-y:  auto;" >
                        <div class="game-result" id="game-result-finalizado">
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </div>
</div>
<div class="sidebar col-md-4" id="sidebar">
    <aside class="widget card widget--sidebar widget-standings">
        <div class="widget__title card__header card__header--has-btn">
            <h4>
                TABLA GENERAL
            </h4>
        </div>
        <div class="widget__content card__content">
            <div class="table-responsive">
                <table class="table table-hover table-standings" id="tablepociciones" style="width: 100%">
                    <thead>
                        <tr>
                            <th style="width: 25px;padding-left: 10px;">
                                POS
                            </th>
                            <th>
                                JUGADOR
                            </th>
                            <th>
                                TA
                            </th>
                            <th>
                                TM
                            </th>
                            <th>
                                TB
                            </th>
                            <th>
                                PTS
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </aside>
    <aside class="widget card widget--sidebar widget-standings">
        <div class="widget__title card__header card__header--has-btn" style="overflow: visible">
            <h4>
                TABLA POR DIA
            </h4>

                                                   <div class="input-group date" id="datetimepicker-filtrer-posiciones">
                                                       <input class="form-control" id="date-filtrer-posiciones" placeholder="Ingrese una fecha" required="" type="text"/>
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar">
                                                                        </span>
                                                                </span>
                                                        </div>
        </div>
        <div class="widget__content card__content">
            <div class="table-responsive">
                <table class="table table-hover nowrap" id="table-pociciones-dia" style="width: 100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>
                                JUGADOR
                            </th>
                            <th>
                                PTS
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </aside>
</div>
    @endsection