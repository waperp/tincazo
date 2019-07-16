@extends('layout.welcome')
@section('header')
@include('header')
@endsection
@section('content')
<div class="col-md-12">
    <div class="content col-md-4">
        <aside class="widget card widget--sidebar widget-awards">
            <div class="widget__title card__header">
                <h4>
                    TORNEOS VIGENTES
                </h4>
            </div>
            <div class="widget__content card__content">
                @foreach($listaTouinf as $objTorneosUsersMenu)

                <ul class="posts posts--simple-list">
                    <li style="cursor:pointer" class="posts__item posts__item--category-2" onclick="load_matches({{$objTorneosUsersMenu->touinfscode}})">
                        <figure class="posts__thumb">
                            <a ><img style="width: 130px; height: 80px"
                                    src="/images/{{ $objTorneosUsersMenu->touinfvlogt }}" alt=""></a>
                        </figure>
                        <div class="posts__inner">
                            <div class="posts__cat">
                                <span class="label posts__cat-label"
                                    style="font-size: 10px;background-color: #38a9ff">{{$objTorneosUsersMenu->touinfdstat}}</span>
                            </div>
                            <h6 class="posts__title"><a>{{ $objTorneosUsersMenu->touinftname }}</a></h6>
                        </div>
                    </li>
                </ul>
                @endforeach
            </div>
        </aside>
    </div>
    <div class="content col-md-8">
        <div class="card">
            <header class="card__header card__header--has-filter">
                <h4>PARTIDOS </h4>
                
                        <div class="row" style="margin-bottom: 8px">
                           
                            <div class="col-md-8">
                                <div class="input-group-btn input-group-btn-sm">
                                    <div class="input-group input-group-sm" style="width: 100%">
                                        <div class="input-group-btn input-group-btn-sm">
                                            <div class="btn-group btn-group-sm">
                                                <button title="Refrescar Tincazos" type="button"
                                                    class="btn btn-primary-inverse refresh-button">
                                                    <i class="fa fa-refresh"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <input type="search" class="form-control buscar input-sm"
                                            placeholder="Busca por equipos">
                                        <div class="input-group-btn">
                                            <button title="Buscar Tincazos" type="button" id="shearh-tincazos"
                                                class="btn btn-primary"><i class="glyphicon glyphicon-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  
            </header>
            <div class="tab-content">
                
                <div class="card__content" style="height: 600px;overflow-y:  auto;">
                    <div class="row">
                            <div class="col-md-4">
                                    <div class="input-group input-group-sm date" id="datetimepicker-toufixdplay-matches-full">
                                        <input class="form-control c"  placeholder="Ingrese su fecha inicio"
                                            required="" type="text" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar">
                                            </span>
                                        </span>
                                    </div>
                                </div>
                    </div>
                        
                    <div class="game-result" id="matches_all">
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection