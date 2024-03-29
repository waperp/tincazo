@extends('layout.welcome_test')
@section('header')
@include('partials.layout.header')
@endsection
{{-- @section('slider')
@include('partials.layout.slider')
@endsection --}}
@section('content')
<div class="site-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="content col-md-4">
                        <aside class="widget card widget--sidebar widget-awards">
                            <div class="widget__title card__header">
                                <h4>
                                    TORNEOS VIGENTES
                                </h4>
                            </div>
                            <div class="widget__content card__content">
                                @foreach(App\touinf::tournamentActive()->get() as $objTorneosUsersMenu)
                                @if ($loop->first)
                                <ul id="post-torneos" class="posts posts--simple-list">
                                    <li data-touinfscode="{{$objTorneosUsersMenu->touinfscode}}"
                                        class="posts__item  post__items__custom post__items__custom__selected"
                                        onclick="load_matches({{$objTorneosUsersMenu->touinfscode}}, this)">
                                        <figure class="posts__thumb">
                                            <img class="post__items__custom__img post__items__custom__img__selected"
                                                src="/images/{{ $objTorneosUsersMenu->touinfvlogt }}" alt="">
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
                                    <li class="posts__item  post__items__custom"
                                        onclick="load_matches({{$objTorneosUsersMenu->touinfscode}},this)">
                                        <figure class="posts__thumb">
                                            <img class="post__items__custom__img"
                                                src="/images/{{ $objTorneosUsersMenu->touinfvlogt }}" alt="">
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
                                <ul class="category-filter category-filter--featured nav nav-tabs">

                                    <li class="category-filter__item refresh-button-matches"><a
                                            style="color:#38a9ff;font-size:15px" data-toggle="tab"
                                            class="category-filter__link active"
                                            data-category="posts__item--category-2"><i class="fa fa-refresh"></i></a>
                                    </li>
                                </ul>
                            </header>
                            <div class="tab-content">
                                <div class="card__content" style="height: 600px;overflow-y:  auto;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group input-group-sm date mb-4"
                                                id="datetimepicker-toufixdplay-matches-full">
                                                <input class="form-control c" placeholder="Ingrese su fecha inicio"
                                                    required="" type="text" />
                                                <div class="input-group-addon input-group-append">
                                                    <div class="input-group-text">
                                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
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
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{{-- <script src="/js/index.js?v={{ time() }}" type="text/javascript"></script> --}}
<script type="text/javascript">
    const tougrp = @json(Session::get('tougrp'));
const touinf = @json(Session::get('touinf'));
</script>
<script src="/js/index.js?v={{ time() }}" type="text/javascript">
</script>
<script src="/js/login_app.js?v={{ time() }}" type="text/javascript">
</script>
<script src="/assets/vendor/jpreloader2/js/jpreloader.js" type="text/javascript">
</script>
<script src="/js/sum.js" type="text/javascript"></script>

<script src="/js/other_champions.js?v={{ time() }}" type="text/javascript">
</script>
<script src="/js/matches_pending.js?v={{ time() }}" type="text/javascript">
</script>
<script src="/js/matches_play.js?v={{ time() }}" type="text/javascript">
</script>
<script src="/js/matches_finished.js?v={{ time() }}" type="text/javascript">
</script>
<script src="/js/datatables_app.js?v={{ time() }}" type="text/javascript">
</script>
    <script src="/js/matches.js?v={{ time() }}" type="text/javascript"></script>

@endsection
@section('modals')
@include('partials.modals.modal-login')
@include('partials.modals.modal-register')
@auth
@if (\Auth::user()->contypscode == 1)
@include('partials.modals.admin.modal-admin-fixture')
@include('partials.modals.admin.modal-admin-equipo-plantel')
@include('partials.modals.admin.modal-admin-add-torneo-equipo')
@include('partials.modals.admin.modal-admin-add-fixture')
@include('partials.modals.admin.modal-admin-add-equipo')
@include('partials.modals.admin.modal-admin-add-torneo')
@include('partials.modals.admin.modal-admin-add-grupo')
@include('partials.modals.admin.modal-admin-plantel')
@include('partials.modals.admin.modal-admin-torneo')
@include('partials.modals.admin.modal-admin-grupo')
@include('partials.modals.admin.modal-admin-edit-fixture-score')
@endif
@endauth
@auth
@include('partials.modals.user.modal-user-perfil')
@include('partials.modals.user.modal-user-config-grupo')
@include('partials.modals.user.modal-user-invitar')
@include('partials.modals.user.modal-user-elegir-campeon')
@include('partials.modals.user.modal-user-jugadores-campeones')
@include('partials.modals.user.modal-user-add-tincazo')
@include('partials.modals.user.modal-user-tincazos-users')
@include('partials.modals.user.modal-user-player-info-general')
@include('partials.modals.user.modal-user-player-info-day')
@include('partials.modals.user.modal-user-invitaciones')
@endauth
@include('partials.modals.admin.group.modal-admin-group-grupo')
@endsection
