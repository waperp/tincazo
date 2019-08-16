@extends('layout.welcome_test')
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

