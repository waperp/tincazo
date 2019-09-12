@extends('layout.welcome_test')
@section('header')
{{-- @include('partials.layout.header') --}}
@endsection
{{-- @section('slider')
@include('partials.layout.slider')
@endsection --}}
@section('content')
<div class="site-content">
    <div class="container">
        <div class="row">
            <div class="content col-md-8 offset-md-2">
                <!-- Article -->
                <article class="card card--lg post post--single">
                    <div class="card__content">
                        <div class="post__content">
                            @include('partials.layout.terminoscondiciones')
                        </div>
                </article>
                <!-- Article / End -->
            </div>
            <!-- Content / End -->
        </div>
    </div>
</div>
</div>
@endsection