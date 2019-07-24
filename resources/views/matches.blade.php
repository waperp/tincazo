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
                @if ($loop->first)
                <ul id="post-torneos" class="posts posts--simple-list">
                    <li data-touinfscode="{{$objTorneosUsersMenu->touinfscode}}" class="posts__item  post__items__custom post__items__custom__selected" 
                        onclick="load_matches({{$objTorneosUsersMenu->touinfscode}}, null)">
                        <figure class="posts__thumb">
                                <img class="post__items__custom__img post__items__custom__img__selected" src="/images/{{ $objTorneosUsersMenu->touinfvlogt }}" alt="">
                        </figure>
                        <div class="posts__inner">
                            <div class="posts__cat">
                                <span class="label posts__cat-label"
                                    style="font-size: 10px;background-color: #38a9ff">{{$objTorneosUsersMenu->touinfdstat}}</span>
                            </div>
                            <h6 class="posts__title">{{ $objTorneosUsersMenu->touinftname }}</h6>
                        </div>
                    </li>
                </ul>
                @else
                <ul class="posts posts--simple-list">
                    <li  class="posts__item  post__items__custom" onclick="load_matches({{$objTorneosUsersMenu->touinfscode}},this)">
                        <figure class="posts__thumb">
                                <img class="post__items__custom__img" src="/images/{{ $objTorneosUsersMenu->touinfvlogt }}" alt="">
                        </figure>
                        <div class="posts__inner">
                            <div class="posts__cat">
                                <span class="label posts__cat-label"
                                    style="font-size: 10px;background-color: #38a9ff">{{$objTorneosUsersMenu->touinfdstat}}</span>
                            </div>
                            <h6 class="posts__title">{{ $objTorneosUsersMenu->touinftname }}</h6>
                        </div>
                    </li>
                </ul>
                @endif
                @endforeach
            </div>
        </aside>
    </div>
    <div class="content col-md-8">
        <div class="card">
            <header class="card__header card__header--has-filter">
                <h4>PARTIDOS </h4>
                
            </header>
            <div class="tab-content">
                
                <div class="card__content" style="height: 600px;overflow-y:  auto;">
                    <div class="row" style="margin-bottom: 15px">
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
                                                    placeholder="Busca por equipos" >
                                                <div class="input-group-btn">
                                                    <button title="Buscar Tincazos" type="button" id="shearh-matches"
                                                        class="btn btn-primary"><i class="glyphicon glyphicon-search"></i>
                                                    </button>
                                                </div>
                                            </div>
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