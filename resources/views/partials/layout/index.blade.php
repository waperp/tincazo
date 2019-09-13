@extends('layout.welcome_test')
@section('css')
@endsection

@section('header')
@include('partials.layout.header')
@endsection

@section('slider')
@include('partials.layout.slider')
@endsection

@section('content')

@if (Session::has('select-q') && Session::get('select-q') == true && Session::has('tougrp'))
<div class="page-heading page-heading pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h1 class="page-heading__title">GRUPO: <span
                        class="highlight">{{ Session::get('tougrp') ->tougrptname}}</span></h1>
            </div>
        </div>
    </div>
</div>
<nav class="content-filter">
    <div class="container"><a href="#" class="content-filter__toggle"></a>
        <ul class="nav nav-tabs content-filter__list" role="tablist">
            <li class="nav-item content-filter__item">
                <a role="tab" data-toggle="tab" href="#TAB-1" class="nav-link content-filter__link active">TU
                    CAMPEÓN</a></li>
            <li class="nav-item content-filter__item">
                <a role="tab" data-toggle="tab" href="#TAB-2" class="nav-link content-filter__link">TABLA
                    DE POSICIONES
                </a>
            </li>
            <li class="nav-item content-filter__item">
                <a role="tab" data-toggle="tab" href="#TAB-3" class="nav-link content-filter__link">TUS TINCAZOS</a>
            </li>
            @if (Session::has('touinf') && Session::has('tougrp'))
    @if(App\tougrp::isUserGroupAdmin() > 0)
            <li class="content-filter__item">
                <a role="tab" data-toggle="tab" href="#TAB-4" class="nav-link content-filter__link">CONFIGURAR</a></li>
            <li class="content-filter__item">
                <a role="tab" data-toggle="tab" href="#TAB-5" class="nav-link content-filter__link">INVITAR</a></li>
            @endif
            @endif
        </ul>
    </div>
</nav>
<div class="site-content">
    <div class="container">
        <div class="row">
            <!-- Content -->
            @include('partials.layout.content')
        </div>
    </div>
</div>
@endif
@endsection
@section('footer')
<footer id="footer" class="footer">
    @include('partials.layout.footer')
</footer>
@endsection
@section('scripts')

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