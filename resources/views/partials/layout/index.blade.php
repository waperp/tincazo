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
@if (Session::has('select-q') && Session::get('select-q') == true)
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
    @include('partials.footer')
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
<script src="/js/matches.js?v={{ time() }}" type="text/javascript">
</script>
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
@endif
@endauth
@auth
@include('partials.modals.user.modal-user-perfil')
@include('partials.modals.user.modal-user-config-grupo')
@include('partials.modals.user.modal-user-invitar')
@endauth
@include('partials.modals.admin.group.modal-admin-group-grupo')
@include('partials.partialModal')

@endsection