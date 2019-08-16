@section('header')
<div class="header__top-bar clearfix">
    <div class="container">
        @include('partials.layout.header_top')
    </div>
</div>
<!-- Header Top Bar / End -->
<!-- Header Secondary -->
<div class="header__secondary">
    <div class="container">
        @include('partials.layout.header_secondary')
    </div>
</div>
<!-- Header Secondary / End -->
<!-- Header Primary -->
<div class="header__primary">
    <div class="container">
        @include('partials.layout.header_primary')
    </div>
</div>
@endsection
