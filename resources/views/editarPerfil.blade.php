@extends('layout.welcome')

@section('sidebar')
<aside class="pushy-panel pushy-panel--dark">
    <div class="pushy-panel__inner">
        <header class="pushy-panel__header">
            <div class="pushy-panel__logo">
                <a href="index.html">
                    <img alt="Alchemists" src="assets/images/soccer/logo.png" srcset="assets/images/soccer/logo@2x.png 2x"/>
                </a>
            </div>
        </header>
        <div class="pushy-panel__content">
            <!-- Widget: Posts -->
            <aside class="widget widget-popular-posts widget--side-panel">
                <div class="widget__content">
                    <ul class="posts posts--simple-list">
                        <li class="posts__item posts__item--category-1">
                            <figure class="posts__thumb">
                                <a href="#">
                                    <img alt="" src="assets/images/samples/post-img19-xs.jpg"/>
                                </a>
                            </figure>
                            <div class="posts__inner">
                                <div class="posts__cat">
                                    <span class="label posts__cat-label">
                                        The team
                                    </span>
                                </div>
                                <h6 class="posts__title">
                                    <a href="#">
                                        The Team will make a small vacation to the Caribbean
                                    </a>
                                </h6>
                                <time class="posts__date" datetime="2016-08-23">
                                    August 23rd, 2016
                                </time>
                            </div>
                            <div class="posts__excerpt">
                                Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                        </li>
                        <li class="posts__item posts__item--category-2">
                            <figure class="posts__thumb">
                                <a href="#">
                                    <img alt="" src="assets/images/samples/post-img18-xs.jpg"/>
                                </a>
                            </figure>
                            <div class="posts__inner">
                                <div class="posts__cat">
                                    <span class="label posts__cat-label">
                                        Injuries
                                    </span>
                                </div>
                                <h6 class="posts__title">
                                    <a href="#">
                                        Jenny Jackson won't be able to play the next game
                                    </a>
                                </h6>
                                <time class="posts__date" datetime="2016-08-23">
                                    August 23rd, 2016
                                </time>
                            </div>
                            <div class="posts__excerpt">
                                Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                        </li>
                        <li class="posts__item posts__item--category-1">
                            <figure class="posts__thumb">
                                <a href="#">
                                    <img alt="" src="assets/images/samples/post-img8-xs.jpg"/>
                                </a>
                            </figure>
                            <div class="posts__inner">
                                <div class="posts__cat">
                                    <span class="label posts__cat-label">
                                        The Team
                                    </span>
                                </div>
                                <h6 class="posts__title">
                                    <a href="#">
                                        The team is starting a new power breakfast regimen
                                    </a>
                                </h6>
                                <time class="posts__date" datetime="2016-08-23">
                                    August 23rd, 2016
                                </time>
                            </div>
                            <div class="posts__excerpt">
                                Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                        </li>
                        <li class="posts__item posts__item--category-3">
                            <figure class="posts__thumb">
                                <a href="#">
                                    <img alt="" src="assets/images/samples/post-img20-xs.jpg"/>
                                </a>
                            </figure>
                            <div class="posts__inner">
                                <div class="posts__cat">
                                    <span class="label posts__cat-label">
                                        The League
                                    </span>
                                </div>
                                <h6 class="posts__title">
                                    <a href="#">
                                        The Alchemists need two win the next two games
                                    </a>
                                </h6>
                                <time class="posts__date" datetime="2016-08-23">
                                    August 23rd, 2016
                                </time>
                            </div>
                            <div class="posts__excerpt">
                                Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </div>
                        </li>
                    </ul>
                </div>
            </aside>
            <!-- Widget: Posts / End -->
            <!-- Widget: Tag Cloud -->
            <aside class="widget widget--side-panel widget-tagcloud">
                <div class="widget__title">
                    <h4>
                        Popular Tags
                    </h4>
                </div>
                <div class="widget__content">
                    <div class="tagcloud">
                        <a class="btn btn-primary btn-xs btn-outline btn-sm" href="#">
                            PLAYOFFS
                        </a>
                        <a class="btn btn-primary btn-xs btn-outline btn-sm" href="#">
                            ALCHEMISTS
                        </a>
                        <a class="btn btn-primary btn-xs btn-outline btn-sm" href="#">
                            INJURIES
                        </a>
                        <a class="btn btn-primary btn-xs btn-outline btn-sm" href="#">
                            TEAM
                        </a>
                        <a class="btn btn-primary btn-xs btn-outline btn-sm" href="#">
                            INCORPORATIONS
                        </a>
                        <a class="btn btn-primary btn-xs btn-outline btn-sm" href="#">
                            UNIFORMS
                        </a>
                        <a class="btn btn-primary btn-xs btn-outline btn-sm" href="#">
                            CHAMPIONS
                        </a>
                        <a class="btn btn-primary btn-xs btn-outline btn-sm" href="#">
                            PROFESSIONAL
                        </a>
                        <a class="btn btn-primary btn-xs btn-outline btn-sm" href="#">
                            COACH
                        </a>
                        <a class="btn btn-primary btn-xs btn-outline btn-sm" href="#">
                            STADIUM
                        </a>
                        <a class="btn btn-primary btn-xs btn-outline btn-sm" href="#">
                            NEWS
                        </a>
                        <a class="btn btn-primary btn-xs btn-outline btn-sm" href="#">
                            PLAYERS
                        </a>
                        <a class="btn btn-primary btn-xs btn-outline btn-sm" href="#">
                            WOMEN DIVISION
                        </a>
                        <a class="btn btn-primary btn-xs btn-outline btn-sm" href="#">
                            AWARDS
                        </a>
                    </div>
                </div>
            </aside>
            <!-- Widget: Tag Cloud / End -->
            <!-- Widget: Banner -->
            <aside class="widget widget--side-panel widget-banner">
                <div class="widget__content">
                    <figure class="widget-banner__img">
                        <a href="#">
                            <img alt="Banner" src="assets/images/samples/banner.jpg"/>
                        </a>
                    </figure>
                </div>
            </aside>
            <!-- Widget: Banner / End -->
        </div>
        <a class="pushy-panel__back-btn" href="#">
        </a>
    </div>
</aside>
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
                    
                    @if(Session::get('secusricode') == 1)
                <li class="nav-account__item">
                    <a href="#">
                        Administrar
                    </a>
                </li>
                @else

                    @endif
                <li class="nav-account__item">
                    <a href="#">
                        Mi Cuenta
                    </a>
                    <ul class="main-nav__sub">
                        <li>
                            <a href="#">
                                Nuevo Grupo
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Editar Perfil
                            </a>
                        </li>
                        <li>
                            <a href="/logout">
                                Cerrar Sesion
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-account__item">
                    <a data-target="#modal-login-register" data-toggle="modal" href="#">
                        Bienvenido : {{ Session::get('plainftnick') }}
                    </a>
                </li>
                @else
                <li class="nav-account__item">
                    <a data-target="#modal-login-register-tabs" data-toggle="modal">
                        Iniciar Sesion
                    </a>
                    <li class="nav-account__item">
                        <a data-target="#modal-login-register" data-toggle="modal" href="#">
                            Crear Cuenta
                        </a>
                    </li>
                </li>
                @endif
                <!--     
                    <li class="nav-account__item">
                        <a href="#" data-toggle="modal" data-target="#modal-login-register-tabs">Iniciar Sesion</a>
                    </li>
                    
                                  
                    
                       -->
            </ul>
            <!-- Account Navigation / End -->
        </div>
    </div>
    <div class="header__secondary">
        <div class="container">
            <!-- Header Search Form -->
            <div class="header-search-form">
                <form action="#" class="search-form" id="mobile-search-form">
                    <input class="form-control header-mobile__search-control" placeholder="Ingrese su búsqueda aquí ..." type="text" value="">
                        <button class="header-mobile__search-submit" type="submit">
                            <i class="fa fa-search">
                            </i>
                        </button>
                    </input>
                </form>
            </div>
            <!-- Header Search Form / End -->
            <ul class="info-block info-block--header">
                <!-- <li class="info-block__item info-block__item--contact-primary">
                        <svg role="img" class="df-icon df-icon--swhistle">
                            <use xlink:href="assets/images/icons-soccer.svg#whistle"/>
                        </svg>
                        <h6 class="info-block__heading">Join Our Team!</h6>
                        <a class="info-block__link" href="mailto:tryouts@alchemists.com">tryouts@alchemists.com</a>
                    </li>
                    <li class="info-block__item info-block__item--contact-secondary">
                        <svg role="img" class="df-icon df-icon--soccer-ball">
                            <use xlink:href="assets/images/icons-soccer.svg#soccer-ball"/>
                        </svg>
                        <h6 class="info-block__heading">Contactenos</h6>
                        <a class="info-block__link" href="mailto:info@alchemists.com">info@alchemists.com</a>
                    </li> -->
                <li class="info-block__item info-block__item--shopping-cart">
                    <a class="info-block__link-wrapper" href="#">
                        <div class="df-icon-stack df-icon-stack--bag">
                            <svg class="df-icon df-icon--soccer-ball" role="img">
                                <use xlink:href="assets/images/icons-soccer.svg#soccer-ball">
                                </use>
                            </svg>
                        </div>
                        <h6 class="info-block__heading">
                            Mis Torneos
                        </h6>
                        <span class="info-block__cart-sum">
                            8
                        </span>
                    </a>
                    <ul class="header-cart">
                        <li class="header-cart__item">
                            <figure class="header-cart__product-thumb">
                                <a href="_soccer_shop-product.html">
                                    <img alt="" src="assets/images/soccer/samples/_soccer_cart-sm-1.jpg">
                                    </img>
                                </a>
                            </figure>
                            <div class="header-cart__inner">
                                <span class="header-cart__product-cat">
                                    TORNEO 1
                                </span>
                                <h5 class="header-cart__product-name">
                                    <a href="_soccer_shop-product.html">
                                        LIGA BBVA
                                    </a>
                                </h5>
                            </div>
                        </li>
                        <li class="header-cart__item">
                            <figure class="header-cart__product-thumb">
                                <a href="_soccer_shop-product.html">
                                    <img alt="" src="assets/images/soccer/samples/_soccer_cart-sm-4.jpg">
                                    </img>
                                </a>
                            </figure>
                            <div class="header-cart__inner">
                                <span class="header-cart__product-cat">
                                    TORNEO 2
                                </span>
                                <h5 class="header-cart__product-name">
                                    <a href="_soccer_shop-product.html">
                                        FAMILI
                                    </a>
                                </h5>
                            </div>
                        </li>
                        <li class="header-cart__item">
                            <figure class="header-cart__product-thumb">
                                <a href="_soccer_shop-product.html">
                                    <img alt="" src="assets/images/soccer/samples/_soccer_cart-sm-2.jpg">
                                    </img>
                                </a>
                            </figure>
                            <div class="header-cart__inner">
                                <span class="header-cart__product-cat">
                                    TORNEO 3
                                </span>
                                <h5 class="header-cart__product-name">
                                    <a href="_soccer_shop-product.html">
                                        LOS COCOS
                                    </a>
                                </h5>
                            </div>
                        </li>
                        <li class="header-cart__item header-cart__item--subtotal">
                            <span class="header-cart__subtotal">
                                TOTAL TORNEOS
                            </span>
                            <span class="header-cart__subtotal-sum">
                                8
                            </span>
                        </li>
                        <li class="header-cart__item header-cart__item--action">
                            <a class="btn btn-primary-inverse btn-block" href="_soccer_shop-checkout.html">
                                IR A MIS TORNEOS
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="header__primary">
        <div class="container">
            <div class="header__primary-inner">
                <div class="header-logo">
                    <a href="_soccer_index.html">
                        <img alt="Alchemists" class="header-logo__img" src="assets/images/soccer/logo.png" srcset="assets/images/soccer/logo@2x.png 2x"/>
                    </a>
                </div>
                <nav class="main-nav clearfix">
                    <ul class="main-nav__list">
                        <li class="active">
                            <a href="#">
                                Inicio
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                PARTIDOS
                            </a>
                            <div class="main-nav__megamenu clearfix">
                        
                                <div class="col-lg-4 col-md-4 col-xs-12">
                                    <ul class="posts posts--simple-list">
                                        <span class="juego">
                                            EN JUEGO
                                        </span>
                                        <li class="posts__item posts__item--category-1">
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label" style="background-color: #38a9ff">
                                                        LA LIGA
                                                    </span>
                                                </div>
                                                <h6 class="posts__title">
                                                    <a href="#">
                                                        BARCELONA - VALENCIA
                                                    </a>
                                                </h6>
                                                <time class="posts__date" datetime="2018-01-21">
                                                    21 Enero 15:45 PM, 2018
                                                </time>
                                            </div>
                                        </li>
                                        <li class="posts__item posts__item--category-2">
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label" style="background-color: #38a9ff">
                                                        CHAMPIONS LEAGUE
                                                    </span>
                                                </div>
                                                <h6 class="posts__title">
                                                    <a href="#">
                                                        REAL MADRID - PSG
                                                    </a>
                                                </h6>
                                                <time class="posts__date" datetime="2016-08-23">
                                                    1 Enero 15:45 PM, 2018
                                                </time>
                                            </div>
                                        </li>
                                        <li class="posts__item posts__item--category-2">
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label" style="background-color: #38a9ff">
                                                        CHAMPIONS LEAGUE
                                                    </span>
                                                </div>
                                                <h6 class="posts__title">
                                                    <a href="#">
                                                        REAL MADRID - PSG
                                                    </a>
                                                </h6>
                                                <time class="posts__date" datetime="2016-08-23">
                                                    1 Enero 15:45 PM, 2018
                                                </time>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-md-4 col-xs-12">
                                    <ul class="posts posts--simple-list">
                                        <span class="pendiente">
                                            PENDIENTE
                                        </span>
                                        <li class="posts__item posts__item--category-1">
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label" style="background-color: #cac331">
                                                        LA LIGA
                                                    </span>
                                                </div>
                                                <h6 class="posts__title">
                                                    <a href="#">
                                                        BARCELONA - VALENCIA
                                                    </a>
                                                </h6>
                                                <time class="posts__date" datetime="2018-01-21">
                                                    21 Enero 15:45 PM, 2018
                                                </time>
                                            </div>
                                        </li>
                                        <li class="posts__item posts__item--category-2">
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label" style="background-color: #cac331">
                                                        CHAMPIONS LEAGUE
                                                    </span>
                                                </div>
                                                <h6 class="posts__title">
                                                    <a href="#">
                                                        REAL MADRID - PSG
                                                    </a>
                                                </h6>
                                                <time class="posts__date" datetime="2016-08-23">
                                                    1 Enero 15:45 PM, 2018
                                                </time>
                                            </div>
                                        </li>
                                        <li class="posts__item posts__item--category-1">
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label" style="background-color: #cac331">
                                                        COPA TIGO
                                                    </span>
                                                </div>
                                                <h6 class="posts__title">
                                                    <a href="#">
                                                        ORIENTE P - WILSTERMANN
                                                    </a>
                                                </h6>
                                                <time class="posts__date" datetime="2016-08-21">
                                                    August 21st, 2016
                                                </time>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-md-4 col-xs-12">
                                    <ul class="posts posts--simple-list">
                                        <span class="finalizado">
                                            FINALIZADO
                                        </span>
                                        <li class="posts__item posts__item--category-1">
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label" style="background-color: #31ca5e">
                                                        LA LIGA
                                                    </span>
                                                </div>
                                                <h6 class="posts__title">
                                                    <a href="#">
                                                        BARCELONA - VALENCIA
                                                    </a>
                                                </h6>
                                                <time class="posts__date" datetime="2018-01-21">
                                                    21 Enero 15:45 PM, 2018
                                                </time>
                                            </div>
                                        </li>
                                        <li class="posts__item posts__item--category-2">
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label" style="background-color: #31ca5e">
                                                        CHAMPIONS LEAGUE
                                                    </span>
                                                </div>
                                                <h6 class="posts__title">
                                                    <a href="#">
                                                        REAL MADRID - PSG
                                                    </a>
                                                </h6>
                                                <time class="posts__date" datetime="2016-08-23">
                                                    1 Enero 15:45 PM, 2018
                                                </time>
                                            </div>
                                        </li>
                                        <li class="posts__item posts__item--category-1">
                                            <div class="posts__inner">
                                                <div class="posts__cat">
                                                    <span class="label posts__cat-label" style="background-color: #31ca5e">
                                                        COPA TIGO
                                                    </span>
                                                </div>
                                                <h6 class="posts__title">
                                                    <a href="#">
                                                        ORIENTE P - WILSTERMANN
                                                    </a>
                                                </h6>
                                                <time class="posts__date" datetime="2016-08-21">
                                                    August 21st, 2016
                                                </time>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#">
                                RESULTADOs
                            </a>
                        </li>
                        @if(Session::has('plainficode') and Session::has('secusricode') and Session::has('plainftnick') 
                            and Session::has('secusrtmail'))
                        <li>
                            <a href="#">
                                Tincasos
                            </a>
                        </li>
                        @endif

                    </ul>
              
                    <!-- Social Links / End -->
                    <!-- Pushy Panel Toggle -->
                    <a class="pushy-panel__toggle" href="#">
                        <span class="pushy-panel__line">
                        </span>
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
<div class="hero-slider-wrapper">
    <div class="hero-slider">
        <!-- Slide #1 -->
        <div class="hero-slider__item hero-slider__item--img1">
            <div class="container hero-slider__item-container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!-- Post Meta - Top -->
                        <div class="post__meta-block post__meta-block--top">
                            <!-- Post Category -->
                            <div class="post__category">
                                <span class="label posts__cat-label">
                                    The Team
                                </span>
                            </div>
                            <!-- Post Category / End -->
                            <!-- Post Title -->
                            <h1 class="page-heading__title">
                                <a href="_soccer_blog-post-1.html">
                                    The Alchemists
                                    <span class="highlight">
                                        won the last game
                                    </span>
                                    2-0 against Clovers
                                </a>
                            </h1>
                            <!-- Post Title / End -->
                            <!-- Post Meta Info -->
                            <ul class="post__meta meta">
                                <li class="meta__item meta__item--date">
                                    <time datetime="2017-08-23">
                                        August 23rd, 2017
                                    </time>
                                </li>
                                <li class="meta__item meta__item--views">
                                    2369
                                </li>
                                <li class="meta__item meta__item--likes">
                                    <a href="#">
                                        <i class="meta-like meta-like--active icon-heart">
                                        </i>
                                        530
                                    </a>
                                </li>
                                <li class="meta__item meta__item--comments">
                                    <a href="#">
                                        18
                                    </a>
                                </li>
                            </ul>
                            <!-- Post Meta Info / End -->
                            <!-- Post Author -->
                            <div class="post-author">
                                <figure class="post-author__avatar">
                                    <img alt="Post Author Avatar" src="assets/images/samples/avatar-1.jpg">
                                    </img>
                                </figure>
                                <div class="post-author__info">
                                    <h4 class="post-author__name">
                                        James Spiegel
                                    </h4>
                                    <span class="post-author__slogan">
                                        Alchemists Ninja
                                    </span>
                                </div>
                            </div>
                            <!-- Post Author / End -->
                        </div>
                        <!-- Post Meta - Top / End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Slide #1 / End -->
        <!-- Slide #2 -->
        <div class="hero-slider__item hero-slider__item--img2">
            <div class="container hero-slider__item-container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!-- Post Meta - Top -->
                        <div class="post__meta-block post__meta-block--top">
                            <!-- Post Category -->
                            <div class="post__category">
                                <span class="label posts__cat-label">
                                    The Team
                                </span>
                            </div>
                            <!-- Post Category / End -->
                            <!-- Post Title -->
                            <h1 class="page-heading__title">
                                <a href="_soccer_blog-post-1.html">
                                    Franklin Stevens has
                                    <span class="highlight">
                                        a knee fracture
                                    </span>
                                    and is gona be out
                                </a>
                            </h1>
                            <!-- Post Title / End -->
                            <!-- Post Meta Info -->
                            <ul class="post__meta meta">
                                <li class="meta__item meta__item--date">
                                    <time datetime="2017-08-23">
                                        August 23rd, 2017
                                    </time>
                                </li>
                                <li class="meta__item meta__item--views">
                                    2369
                                </li>
                                <li class="meta__item meta__item--likes">
                                    <a href="#">
                                        <i class="meta-like meta-like--active icon-heart">
                                        </i>
                                        530
                                    </a>
                                </li>
                                <li class="meta__item meta__item--comments">
                                    <a href="#">
                                        18
                                    </a>
                                </li>
                            </ul>
                            <!-- Post Meta Info / End -->
                            <!-- Post Author -->
                            <div class="post-author">
                                <figure class="post-author__avatar">
                                    <img alt="Post Author Avatar" src="assets/images/samples/avatar-1.jpg">
                                    </img>
                                </figure>
                                <div class="post-author__info">
                                    <h4 class="post-author__name">
                                        James Spiegel
                                    </h4>
                                    <span class="post-author__slogan">
                                        Alchemists Ninja
                                    </span>
                                </div>
                            </div>
                            <!-- Post Author / End -->
                        </div>
                        <!-- Post Meta - Top / End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Slide #2 / End -->
        <!-- Slide #3 -->
        <div class="hero-slider__item hero-slider__item--img3">
            <div class="container hero-slider__item-container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <!-- Post Meta - Top -->
                        <div class="post__meta-block post__meta-block--top">
                            <!-- Post Category -->
                            <div class="post__category">
                                <span class="label posts__cat-label">
                                    The Team
                                </span>
                            </div>
                            <!-- Post Category / End -->
                            <!-- Post Title -->
                            <h1 class="page-heading__title">
                                <a href="_soccer_blog-post-1.html">
                                    The New
                                    <span class="highlight">
                                        Eco Friendly Stadium
                                    </span>
                                    won a leafy award in 2016
                                </a>
                            </h1>
                            <!-- Post Title / End -->
                            <!-- Post Meta Info -->
                            <ul class="post__meta meta">
                                <li class="meta__item meta__item--date">
                                    <time datetime="2017-08-23">
                                        August 23rd, 2017
                                    </time>
                                </li>
                                <li class="meta__item meta__item--views">
                                    2369
                                </li>
                                <li class="meta__item meta__item--likes">
                                    <a href="#">
                                        <i class="meta-like meta-like--active icon-heart">
                                        </i>
                                        530
                                    </a>
                                </li>
                                <li class="meta__item meta__item--comments">
                                    <a href="#">
                                        18
                                    </a>
                                </li>
                            </ul>
                            <!-- Post Meta Info / End -->
                            <!-- Post Author -->
                            <div class="post-author">
                                <figure class="post-author__avatar">
                                    <img alt="Post Author Avatar" src="assets/images/samples/avatar-1.jpg">
                                    </img>
                                </figure>
                                <div class="post-author__info">
                                    <h4 class="post-author__name">
                                        James Spiegel
                                    </h4>
                                    <span class="post-author__slogan">
                                        Alchemists Ninja
                                    </span>
                                </div>
                            </div>
                            <!-- Post Author / End -->
                        </div>
                        <!-- Post Meta - Top / End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Slide #3 / End -->
    </div>
    <div class="hero-slider-thumbs-wrapper">
        <div class="container">
            <div class="hero-slider-thumbs posts posts--simple-list">
                <div class="hero-slider-thumbs__item">
                    <div class="posts__item posts__item--category-1">
                        <div class="posts__inner">
                            <div class="posts__cat">
                                <span class="label posts__cat-label">
                                    The Team
                                </span>
                            </div>
                            <h6 class="posts__title">
                                The Alchemists won the last game 2-0 against Clovers
                            </h6>
                            <time class="posts__date" datetime="2017-12-12">
                                December 12th, 2016
                            </time>
                        </div>
                    </div>
                </div>
                <div class="hero-slider-thumbs__item">
                    <div class="posts__item posts__item--category-2">
                        <div class="posts__inner">
                            <div class="posts__cat">
                                <span class="label posts__cat-label">
                                    Injuries
                                </span>
                            </div>
                            <h6 class="posts__title">
                                Franklin Stevens has a knee fracture and is gona be out
                            </h6>
                            <time class="posts__date" datetime="2017-11-14">
                                November 14th, 2016
                            </time>
                        </div>
                    </div>
                </div>
                <div class="hero-slider-thumbs__item">
                    <div class="posts__item posts__item--category-1">
                        <div class="posts__inner">
                            <div class="posts__cat">
                                <span class="label posts__cat-label">
                                    The Team
                                </span>
                            </div>
                            <h6 class="posts__title">
                                The New Eco Friendly Stadium won a leafy award in 2016
                            </h6>
                            <time class="posts__date" datetime="2017-12-13">
                                December 13th, 2016
                            </time>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('content')
<div class="content col-md-8">
    <!-- Featured News -->
    <div class="card card--clean">
        <header class="card__header card__header--has-filter">
            <h4>
                Completar su registro de facebook            </h4>
        </header>
        <div class="card__content">
                <form  class="modal-form" enctype="multipart/form-data" id="editform" method="post">
                    <div class="modal-account-holder">
                        <div style="margin: auto;
						    margin-bottom: 20px;
						    width: 200px;
						    height: 200px;
						    position: relative;
						    overflow: hidden;
						    background-color: #ffffff;
						    color: #ecf0f1;" id="image-preview">
                            <label for="image-upload" id="image-label">
                                Tu Foto
                            </label>
                            <input id="image-upload" name="plainfvimgp" type="file"/>
                        </div>
                        <div class="modal-account__item">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab-register" role="tabpanel">
                                    {{ csrf_field() }}
                                    <input type="hidden" id="secusrtface" value="{{ $secusrtface }}">
                                    <!-- Register Form -->
                                    <div class="form-group">
                                        <input class="form-control" name="secusrtmail" value="{{ $secusrtmail }}" placeholder="Ingrese su correo electronico..." type="email">
                                        </input>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="secusrtpass"  placeholder="Ingrese su contraseña.." type="password">
                                        </input>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="plainftname" value="{{ $plainftname }}" placeholder="Ingrese su nombre completo..." type="text">
                                        </input>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group date" id="datetimepicker1">
                                            <input class="form-control" name="plainfddobp" placeholder="Ingrese su fecha de nacimiento" type="text"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar">
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="radio-inline">
                                            <input @if($plainftgder == "male") checked="" @else  @endif name="plainftgder" type="radio" value="M">
                                                Hombre 
                                            </input>
                                        </label>
                                        <label class="radio-inline">
                                            <input @if($plainftgder == "female")checked="" @else  @endif name="plainftgder" type="radio" value="F">
                                                Mujer
                                            </input>
                                        </label>
                                    </div>
                                    <div class="form-group form-group--submit">
                                        <button class="btn btn-primary-inverse btn-block" id="xD" type="submit">
                                            Completar mi registro
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Lates News / End -->
    <!-- Post Pagination -->
  
    <!-- Post Pagination / End -->
</div>
<!-- Content / End -->
<!-- Sidebar -->
<div class="sidebar col-md-4" id="sidebar">
    <!-- Widget: Standings -->
    <aside class="widget card widget--sidebar widget-standings">
        <div class="widget__title card__header card__header--has-btn">
            <h4>
                West League 2016
            </h4>
            <a class="btn btn-default btn-outline btn-xs card-header__button" href="#">
                See All Stats
            </a>
        </div>
        <div class="widget__content card__content">
            <div class="table-responsive">
                <table class="table table-hover table-standings">
                    <thead>
                        <tr>
                            <th>
                                Team Positions
                            </th>
                            <th>
                                W
                            </th>
                            <th>
                                L
                            </th>
                            <th>
                                D
                            </th>
                            <th>
                                PTS
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="team-meta">
                                    <figure class="team-meta__logo">
                                        <img alt="" src="assets/images/samples/logos/pirates_shield.png">
                                        </img>
                                    </figure>
                                    <div class="team-meta__info">
                                        <h6 class="team-meta__name">
                                            L.A Pirates
                                        </h6>
                                        <span class="team-meta__place">
                                            Bebop Institute
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                36
                            </td>
                            <td>
                                14
                            </td>
                            <td>
                                10
                            </td>
                            <td>
                                118
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="team-meta">
                                    <figure class="team-meta__logo">
                                        <img alt="" src="assets/images/samples/logos/sharks_shield.png">
                                        </img>
                                    </figure>
                                    <div class="team-meta__info">
                                        <h6 class="team-meta__name">
                                            Sharks
                                        </h6>
                                        <span class="team-meta__place">
                                            Marine College
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                32
                            </td>
                            <td>
                                20
                            </td>
                            <td>
                                8
                            </td>
                            <td>
                                104
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="team-meta">
                                    <figure class="team-meta__logo">
                                        <img alt="" src="assets/images/soccer/logos/alchemists_s_shield.png">
                                        </img>
                                    </figure>
                                    <div class="team-meta__info">
                                        <h6 class="team-meta__name">
                                            The Alchemists
                                        </h6>
                                        <span class="team-meta__place">
                                            Eric Bros School
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                32
                            </td>
                            <td>
                                21
                            </td>
                            <td>
                                7
                            </td>
                            <td>
                                103
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="team-meta">
                                    <figure class="team-meta__logo">
                                        <img alt="" src="assets/images/samples/logos/ocean_kings_shield.png">
                                        </img>
                                    </figure>
                                    <div class="team-meta__info">
                                        <h6 class="team-meta__name">
                                            Ocean Kings
                                        </h6>
                                        <span class="team-meta__place">
                                            Bay College
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                30
                            </td>
                            <td>
                                20
                            </td>
                            <td>
                                10
                            </td>
                            <td>
                                100
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="team-meta">
                                    <figure class="team-meta__logo">
                                        <img alt="" src="assets/images/samples/logos/red_wings_shield.png">
                                        </img>
                                    </figure>
                                    <div class="team-meta__info">
                                        <h6 class="team-meta__name">
                                            Red Wings
                                        </h6>
                                        <span class="team-meta__place">
                                            Icarus College
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                28
                            </td>
                            <td>
                                24
                            </td>
                            <td>
                                8
                            </td>
                            <td>
                                92
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="team-meta">
                                    <figure class="team-meta__logo">
                                        <img alt="" src="assets/images/samples/logos/lucky_clovers_shield.png">
                                        </img>
                                    </figure>
                                    <div class="team-meta__info">
                                        <h6 class="team-meta__name">
                                            Lucky Clovers
                                        </h6>
                                        <span class="team-meta__place">
                                            St. Patrick’s Institute
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                27
                            </td>
                            <td>
                                24
                            </td>
                            <td>
                                9
                            </td>
                            <td>
                                90
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="team-meta">
                                    <figure class="team-meta__logo">
                                        <img alt="" src="assets/images/samples/logos/draconians_shield.png">
                                        </img>
                                    </figure>
                                    <div class="team-meta__info">
                                        <h6 class="team-meta__name">
                                            Draconians
                                        </h6>
                                        <span class="team-meta__place">
                                            Draconians
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                25
                            </td>
                            <td>
                                28
                            </td>
                            <td>
                                7
                            </td>
                            <td>
                                82
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="team-meta">
                                    <figure class="team-meta__logo">
                                        <img alt="" src="assets/images/samples/logos/bloody_wave_shield.png">
                                        </img>
                                    </figure>
                                    <div class="team-meta__info">
                                        <h6 class="team-meta__name">
                                            Bloody Wave
                                        </h6>
                                        <span class="team-meta__place">
                                            Atlantic School
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                24
                            </td>
                            <td>
                                30
                            </td>
                            <td>
                                6
                            </td>
                            <td>
                                78
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </aside>
    <!-- Widget: Standings / End -->
    <!-- Widget: Social Buttons - Condensed-->
    <aside class="widget widget--sidebar widget-social widget-social--condensed">
        <a class="btn-social-counter btn-social-counter--fb" href="#" target="_blank">
            <div class="btn-social-counter__icon">
                <i class="fa fa-facebook">
                </i>
            </div>
            <h6 class="btn-social-counter__title">
                Like Our Facebook Page
            </h6>
            <span class="btn-social-counter__count">
                <span class="btn-social-counter__count-num">
                </span>
                Likes
            </span>
            <span class="btn-social-counter__add-icon">
            </span>
        </a>
        <a class="btn-social-counter btn-social-counter--twitter" href="#" target="_blank">
            <div class="btn-social-counter__icon">
                <i class="fa fa-twitter">
                </i>
            </div>
            <h6 class="btn-social-counter__title">
                Follow Us on Twitter
            </h6>
            <span class="btn-social-counter__count">
                <span class="btn-social-counter__count-num">
                </span>
                Followers
            </span>
            <span class="btn-social-counter__add-icon">
            </span>
        </a>
        <a class="btn-social-counter btn-social-counter--rss" href="#" target="_blank">
            <div class="btn-social-counter__icon">
                <i class="fa fa-rss">
                </i>
            </div>
            <h6 class="btn-social-counter__title">
                Subscribe to Our RSS
            </h6>
            <span class="btn-social-counter__count">
                <span class="btn-social-counter__count-num">
                    840
                </span>
                Subscribers
            </span>
            <span class="btn-social-counter__add-icon">
            </span>
        </a>
    </aside>
    <!-- Widget: Social Buttons - Condensed / End -->
    <!-- Widget: Popular News -->
    <aside class="widget widget--sidebar card widget-popular-posts">
        <div class="widget__title card__header">
            <h4>
                Popular News
            </h4>
        </div>
        <div class="widget__content card__content">
            <ul class="posts posts--simple-list">
                <li class="posts__item posts__item--category-2">
                    <figure class="posts__thumb">
                        <a href="#">
                            <img alt="" src="assets/images/samples/post-img1-xs.jpg"/>
                        </a>
                    </figure>
                    <div class="posts__inner">
                        <div class="posts__cat">
                            <span class="label posts__cat-label">
                                Injuries
                            </span>
                        </div>
                        <h6 class="posts__title">
                            <a href="#">
                                Mark Johnson has a Tibia Fracture and is gonna be out
                            </a>
                        </h6>
                        <time class="posts__date" datetime="2016-08-23">
                            August 23rd, 2016
                        </time>
                    </div>
                </li>
                <li class="posts__item posts__item--category-1">
                    <figure class="posts__thumb">
                        <a href="#">
                            <img alt="" src="assets/images/samples/post-img2-xs.jpg"/>
                        </a>
                    </figure>
                    <div class="posts__inner">
                        <div class="posts__cat">
                            <span class="label posts__cat-label">
                                The Team
                            </span>
                        </div>
                        <h6 class="posts__title">
                            <a href="#">
                                Jay Rorks is only 24 points away from breaking the record
                            </a>
                        </h6>
                        <time class="posts__date" datetime="2016-08-22">
                            August 22nd, 2016
                        </time>
                    </div>
                </li>
                <li class="posts__item posts__item--category-1">
                    <figure class="posts__thumb">
                        <a href="#">
                            <img alt="" src="assets/images/samples/post-img3-xs.jpg"/>
                        </a>
                    </figure>
                    <div class="posts__inner">
                        <div class="posts__cat">
                            <span class="label posts__cat-label">
                                The Team
                            </span>
                        </div>
                        <h6 class="posts__title">
                            <a href="#">
                                The new eco friendly stadium won a Leafy Award in 2016
                            </a>
                        </h6>
                        <time class="posts__date" datetime="2016-08-21">
                            August 21st, 2016
                        </time>
                    </div>
                </li>
                <li class="posts__item posts__item--category-1">
                    <figure class="posts__thumb">
                        <a href="#">
                            <img alt="" src="assets/images/samples/post-img4-xs.jpg"/>
                        </a>
                    </figure>
                    <div class="posts__inner">
                        <div class="posts__cat">
                            <span class="label posts__cat-label">
                                The Team
                            </span>
                        </div>
                        <h6 class="posts__title">
                            <a href="#">
                                The team is starting a new power breakfast regimen
                            </a>
                        </h6>
                        <time class="posts__date" datetime="2016-08-21">
                            August 21st, 2016
                        </time>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
    <!-- Widget: Popular News / End -->
    <!-- Widget: Featured Player -->
    <aside class="widget card widget--sidebar widget-player widget-player--soccer">
        <div class="widget__content card__content">
            <div class="widget-player__ribbon">
                <div class="fa fa-star">
                </div>
            </div>
            <figure class="widget-player__photo">
                <img alt="" src="assets/images/soccer/samples/_soccer_widget-featured-player.png">
                </img>
            </figure>
            <header class="widget-player__header clearfix">
                <div class="widget-player__number">
                    07
                </div>
                <h4 class="widget-player__name">
                    <span class="widget-player__first-name">
                        James
                    </span>
                    <span class="widget-player__last-name">
                        Messinal
                    </span>
                </h4>
            </header>
            <div class="widget-player__content">
                <div class="widget-player__content-inner">
                    <div class="widget-player__stat widget-player__goals">
                        <div class="widget-player__stat-number">
                            104
                        </div>
                        <h6 class="widget-player__stat-label">
                            Goals
                        </h6>
                    </div>
                    <div class="widget-player__stat widget-player__shots">
                        <div class="widget-player__stat-number">
                            129
                        </div>
                        <h6 class="widget-player__stat-label">
                            Shots
                        </h6>
                    </div>
                    <div class="widget-player__stat widget-player__assists">
                        <div class="widget-player__stat-number">
                            57
                        </div>
                        <h6 class="widget-player__stat-label">
                            Assists
                        </h6>
                    </div>
                    <div class="widget-player__stat widget-player__games">
                        <div class="widget-player__stat-number">
                            86
                        </div>
                        <h6 class="widget-player__stat-label">
                            Games
                        </h6>
                    </div>
                </div>
                <div class="widget-player__content-alt">
                    <!-- Progress: Shot Accuracy -->
                    <div class="progress-stats">
                        <div class="progress__label">
                            SHOT ACC
                        </div>
                        <div class="progress">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="90" class="progress__bar progress__bar--success progress__bar-width-90" role="progressbar">
                            </div>
                        </div>
                        <div class="progress__number">
                            96%
                        </div>
                    </div>
                    <!-- Progress: Shot Accuracy / End -->
                    <!-- Progress: Pass Accuracy -->
                    <div class="progress-stats">
                        <div class="progress__label">
                            PASS ACC
                        </div>
                        <div class="progress">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress__bar progress__bar--success progress__bar-width-70" role="progressbar">
                            </div>
                        </div>
                        <div class="progress__number">
                            74%
                        </div>
                    </div>
                    <!-- Progress: Pass Accuracy / End -->
                </div>
            </div>
        </div>
    </aside>
    <!-- Widget: Featured Player / End -->
    <!-- Widget: Game Result -->
    <aside class="widget card widget--sidebar widget-game-result">
        <div class="widget__title card__header card__header--has-btn">
            <h4>
                Last Game Results
            </h4>
            <a class="btn btn-default btn-outline btn-xs card-header__button" href="#">
                Expand Stats
            </a>
        </div>
        <div class="widget__content card__content">
            <!-- Game Score -->
            <div class="widget-game-result__section">
                <div class="widget-game-result__section-inner">
                    <header class="widget-game-result__header">
                        <h3 class="widget-game-result__title">
                            Championship Quarter Finals
                        </h3>
                        <time class="widget-game-result__date" datetime="2016-03-24">
                            Saturday, March 24th, 2016
                        </time>
                    </header>
                    <div class="widget-game-result__main">
                        <!-- 1st Team -->
                        <div class="widget-game-result__team widget-game-result__team--first">
                            <figure class="widget-game-result__team-logo">
                                <a href="#">
                                    <img alt="" src="assets/images/soccer/logos/alchemists_last_game_results_big.png"/>
                                </a>
                            </figure>
                            <div class="widget-game-result__team-info">
                                <h5 class="widget-game-result__team-name">
                                    Alchemists
                                </h5>
                                <div class="widget-game-result__team-desc">
                                    Elric Bros School
                                </div>
                            </div>
                        </div>
                        <!-- 1st Team / End -->
                        <div class="widget-game-result__score-wrap">
                            <div class="widget-game-result__score">
                                <span class="widget-game-result__score-result widget-game-result__score-result--winner">
                                    2
                                </span>
                                <span class="widget-game-result__score-dash">
                                    -
                                </span>
                                <span class="widget-game-result__score-result widget-game-result__score-result--loser">
                                    0
                                </span>
                            </div>
                            <div class="widget-game-result__score-label">
                                Final Score
                            </div>
                        </div>
                        <!-- 2nd Team -->
                        <div class="widget-game-result__team widget-game-result__team--second">
                            <figure class="widget-game-result__team-logo">
                                <a href="#">
                                    <img alt="" src="assets/images/samples/logo-l-clovers--sm.png"/>
                                </a>
                            </figure>
                            <div class="widget-game-result__team-info">
                                <h5 class="widget-game-result__team-name">
                                    Clovers
                                </h5>
                                <div class="widget-game-result__team-desc">
                                    St Paddy's Institute
                                </div>
                            </div>
                        </div>
                        <!-- 2nd Team / End -->
                    </div>
                </div>
            </div>
            <!-- Game Score / End -->
            <!-- Timeline -->
            <div class="widget-game-result__section">
                <div class="df-timeline-wrapper">
                    <div class="df-timeline">
                        <div class="df-timeline__event df-timeline__event--start">
                            <div class="df-timeline__team-1">
                                <img alt="" class="df-timeline__team-shirt" src="assets/images/soccer/icon-shirt.svg">
                                </img>
                            </div>
                            <div class="df-timeline__time">
                                0’
                            </div>
                            <div class="df-timeline__team-2">
                                <img alt="" class="df-timeline__team-shirt" src="assets/images/soccer/icon-shirt-alt.svg">
                                </img>
                            </div>
                        </div>
                        <div class="df-timeline__event df-timeline__event--empty">
                        </div>
                        <div class="df-timeline__event">
                            <div class="df-timeline__team-1">
                                <div class="df-timeline__event-info">
                                    <div class="df-timeline__event-name">
                                        F. Stevens
                                    </div>
                                    <div class="df-timeline__event-desc">
                                        Alchemists 1-0
                                    </div>
                                </div>
                                <img alt="" class="df-timeline__event-icon" height="16" src="assets/images/soccer/icon-soccer-ball.svg" width="16">
                                </img>
                            </div>
                            <div class="df-timeline__time">
                                22’
                            </div>
                        </div>
                        <div class="df-timeline__event">
                            <div class="df-timeline__time">
                                36’
                            </div>
                            <div class="df-timeline__team-2">
                                <img alt="" class="df-timeline__event-icon" src="assets/images/soccer/icon-yellow-card.svg">
                                    <div class="df-timeline__event-info">
                                        <div class="df-timeline__event-name">
                                            Johnny Griffin
                                        </div>
                                    </div>
                                </img>
                            </div>
                        </div>
                        <div class="df-timeline__event df-timeline__event--empty">
                        </div>
                        <div class="df-timeline__event">
                            <div class="df-timeline__time">
                                HT
                            </div>
                            <div class="df-timeline__team-2">
                                <img alt="" class="df-timeline__event-icon" src="assets/images/soccer/icon-substitution.svg">
                                    <div class="df-timeline__event-info">
                                        <div class="df-timeline__event-name">
                                            Markus Jackson
                                        </div>
                                        <div class="df-timeline__event-name">
                                            Rick Valentine
                                        </div>
                                    </div>
                                </img>
                            </div>
                        </div>
                        <div class="df-timeline__event">
                            <div class="df-timeline__team-1">
                                <div class="df-timeline__event-info">
                                    <div class="df-timeline__event-name">
                                        Brian Kingster
                                    </div>
                                </div>
                                <img alt="" class="df-timeline__event-icon" src="assets/images/soccer/icon-red-card.svg">
                                </img>
                            </div>
                            <div class="df-timeline__time">
                                59’
                            </div>
                        </div>
                        <div class="df-timeline__event">
                            <div class="df-timeline__team-1">
                                <div class="df-timeline__event-info">
                                    <div class="df-timeline__event-name">
                                        Christofer Grass (P)
                                    </div>
                                    <div class="df-timeline__event-desc">
                                        Alchemists 2-0
                                    </div>
                                </div>
                                <img alt="" class="df-timeline__event-icon" src="assets/images/soccer/icon-soccer-ball-penalty.svg">
                                </img>
                            </div>
                            <div class="df-timeline__time">
                                68’
                            </div>
                        </div>
                        <div class="df-timeline__event df-timeline__event--empty">
                        </div>
                        <div class="df-timeline__event">
                            <div class="df-timeline__time">
                                84’
                            </div>
                            <div class="df-timeline__team-2">
                                <img alt="" class="df-timeline__event-icon" src="assets/images/soccer/icon-yellow-card.svg">
                                    <div class="df-timeline__event-info">
                                        <div class="df-timeline__event-name">
                                            Wally Christison
                                        </div>
                                    </div>
                                </img>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Timeline / End -->
            <!-- Game Statistics -->
            <div class="widget-game-result__section">
                <header class="widget-game-result__subheader card__subheader card__subheader--sm card__subheader--nomargins">
                    <h5 class="widget-game-result__subtitle">
                        Game Statistics
                    </h5>
                </header>
                <div class="widget-game-result__section-inner">
                    <!-- Progress: Shots on Goal -->
                    <div class="progress-double-wrapper">
                        <h6 class="progress-title">
                            Shots on Goal
                        </h6>
                        <div class="progress-inner-holder">
                            <div class="progress__digit progress__digit--left progress__digit--40">
                                15
                            </div>
                            <div class="progress__double">
                                <div class="progress">
                                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" class="progress__bar progress__bar-width-60" role="progressbar">
                                    </div>
                                </div>
                                <div class="progress">
                                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" class="progress__bar progress__bar--success progress__bar-width-80" role="progressbar">
                                    </div>
                                </div>
                            </div>
                            <div class="progress__digit progress__digit--right progress__digit--highlight progress__digit--40">
                                24
                            </div>
                        </div>
                    </div>
                    <!-- Progress: Shots on Goal / End -->
                    <!-- Progress: Ball Posession -->
                    <div class="progress-double-wrapper">
                        <h6 class="progress-title">
                            Ball Posession
                        </h6>
                        <div class="progress-inner-holder">
                            <div class="progress__digit progress__digit--left progress__digit--highlight progress__digit--40">
                                75%
                            </div>
                            <div class="progress__double">
                                <div class="progress">
                                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" class="progress__bar progress__bar-width-80" role="progressbar">
                                    </div>
                                </div>
                                <div class="progress">
                                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" class="progress__bar progress__bar--success progress__bar-width-40" role="progressbar">
                                    </div>
                                </div>
                            </div>
                            <div class="progress__digit progress__digit--right progress__digit--40">
                                35%
                            </div>
                        </div>
                    </div>
                    <!-- Progress: Ball Posession / End -->
                    <!-- Progress: Fouls -->
                    <div class="progress-double-wrapper">
                        <h6 class="progress-title">
                            Fouls
                        </h6>
                        <div class="progress-inner-holder">
                            <div class="progress__digit progress__digit--left progress__digit--40">
                                5
                            </div>
                            <div class="progress__double">
                                <div class="progress">
                                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="30" class="progress__bar progress__bar-width-30" role="progressbar">
                                    </div>
                                </div>
                                <div class="progress">
                                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" class="progress__bar progress__bar--success progress__bar-width-60" role="progressbar">
                                    </div>
                                </div>
                            </div>
                            <div class="progress__digit progress__digit--right progress__digit--highlight progress__digit--40">
                                8
                            </div>
                        </div>
                    </div>
                    <!-- Progress: Fouls / End -->
                    <!-- Progress: Corner Kicks -->
                    <div class="progress-double-wrapper">
                        <h6 class="progress-title">
                            Corner Kicks
                        </h6>
                        <div class="progress-inner-holder">
                            <div class="progress__digit progress__digit--left progress__digit--40">
                                10
                            </div>
                            <div class="progress__double">
                                <div class="progress">
                                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="30" class="progress__bar progress__bar-width-30" role="progressbar">
                                    </div>
                                </div>
                                <div class="progress">
                                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" class="progress__bar progress__bar--success progress__bar-width-80" role="progressbar">
                                    </div>
                                </div>
                            </div>
                            <div class="progress__digit progress__digit--right progress__digit--highlight progress__digit--40">
                                12
                            </div>
                        </div>
                    </div>
                    <!-- Progress: Corner Kicks / End -->
                </div>
            </div>
            <!-- Game Statistics / End -->
        </div>
    </aside>
    <!-- Widget: Game Result / End -->
    <!-- Widget: Trending News -->
    <aside class="widget widget--sidebar card widget-tabbed">
        <div class="widget__title card__header">
            <h4>
                Top Trending News
            </h4>
        </div>
        <div class="widget__content card__content">
            <div class="widget-tabbed__tabs">
                <!-- Widget Tabs -->
                <ul class="nav nav-tabs nav-justified widget-tabbed__nav" role="tablist">
                    <li class="active" role="presentation">
                        <a aria-controls="widget-tabbed-sm-newest" data-toggle="tab" href="#widget-tabbed-sm-newest" role="tab">
                            Newest
                        </a>
                    </li>
                    <li role="presentation">
                        <a aria-controls="widget-tabbed-sm-commented" data-toggle="tab" href="#widget-tabbed-sm-commented" role="tab">
                            Most Commented
                        </a>
                    </li>
                    <li role="presentation">
                        <a aria-controls="widget-tabbed-sm-popular" data-toggle="tab" href="#widget-tabbed-sm-popular" role="tab">
                            Popular
                        </a>
                    </li>
                </ul>
                <!-- Widget Tab panes -->
                <div class="tab-content widget-tabbed__tab-content">
                    <!-- Newest -->
                    <div class="tab-pane fade in active" id="widget-tabbed-sm-newest" role="tabpanel">
                        <ul class="posts posts--simple-list">
                            <li class="posts__item posts__item--category-1">
                                <div class="posts__inner">
                                    <div class="posts__cat">
                                        <span class="label posts__cat-label">
                                            The Team
                                        </span>
                                    </div>
                                    <h6 class="posts__title">
                                        <a href="#">
                                            Jake Dribbler Announced that he is retiring next mnonth
                                        </a>
                                    </h6>
                                    <time class="posts__date" datetime="2016-08-23">
                                        August 23rd, 2016
                                    </time>
                                    <div class="posts__excerpt">
                                        Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </div>
                                </div>
                            </li>
                            <li class="posts__item posts__item--category-1">
                                <div class="posts__inner">
                                    <div class="posts__cat">
                                        <span class="label posts__cat-label">
                                            The Team
                                        </span>
                                    </div>
                                    <h6 class="posts__title">
                                        <a href="#">
                                            The Alchemists news coach is bringin a new shooting guard
                                        </a>
                                    </h6>
                                    <time class="posts__date" datetime="2016-08-23">
                                        August 23rd, 2016
                                    </time>
                                    <div class="posts__excerpt">
                                        Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </div>
                                </div>
                            </li>
                            <li class="posts__item posts__item--category-1">
                                <div class="posts__inner">
                                    <div class="posts__cat">
                                        <span class="label posts__cat-label">
                                            The Team
                                        </span>
                                    </div>
                                    <h6 class="posts__title">
                                        <a href="#">
                                            This Saturday starts the intensive training for the Final
                                        </a>
                                    </h6>
                                    <time class="posts__date" datetime="2016-08-23">
                                        August 23rd, 2016
                                    </time>
                                    <div class="posts__excerpt">
                                        Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Commented -->
                    <div class="tab-pane fade" id="widget-tabbed-sm-commented" role="tabpanel">
                        <ul class="posts posts--simple-list">
                            <li class="posts__item posts__item--category-3">
                                <div class="posts__inner">
                                    <div class="posts__cat">
                                        <span class="label posts__cat-label">
                                            Playoffs
                                        </span>
                                    </div>
                                    <h6 class="posts__title">
                                        <a href="#">
                                            New York Islanders are now flying to California for the big game
                                        </a>
                                    </h6>
                                    <time class="posts__date" datetime="2016-08-23">
                                        August 23rd, 2016
                                    </time>
                                    <div class="posts__excerpt">
                                        Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </div>
                                </div>
                            </li>
                            <li class="posts__item posts__item--category-1">
                                <div class="posts__inner">
                                    <div class="posts__cat">
                                        <span class="label posts__cat-label">
                                            The Team
                                        </span>
                                    </div>
                                    <h6 class="posts__title">
                                        <a href="#">
                                            The Female Division is growing strong after their third game
                                        </a>
                                    </h6>
                                    <time class="posts__date" datetime="2016-08-23">
                                        August 23rd, 2016
                                    </time>
                                    <div class="posts__excerpt">
                                        Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </div>
                                </div>
                            </li>
                            <li class="posts__item posts__item--category-1">
                                <div class="posts__inner">
                                    <div class="posts__cat">
                                        <span class="label posts__cat-label">
                                            The Team
                                        </span>
                                    </div>
                                    <h6 class="posts__title">
                                        <a href="#">
                                            The Alchemists news coach is bringin a new shooting guard
                                        </a>
                                    </h6>
                                    <time class="posts__date" datetime="2016-08-23">
                                        August 23rd, 2016
                                    </time>
                                    <div class="posts__excerpt">
                                        Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Popular -->
                    <div class="tab-pane fade" id="widget-tabbed-sm-popular" role="tabpanel">
                        <ul class="posts posts--simple-list">
                            <li class="posts__item posts__item--category-1">
                                <div class="posts__inner">
                                    <div class="posts__cat">
                                        <span class="label posts__cat-label">
                                            The Team
                                        </span>
                                    </div>
                                    <h6 class="posts__title">
                                        <a href="#">
                                            The Alchemists news coach is bringin a new shooting guard
                                        </a>
                                    </h6>
                                    <time class="posts__date" datetime="2016-08-23">
                                        August 23rd, 2016
                                    </time>
                                    <div class="posts__excerpt">
                                        Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </div>
                                </div>
                            </li>
                            <li class="posts__item posts__item--category-1">
                                <div class="posts__inner">
                                    <div class="posts__cat">
                                        <span class="label posts__cat-label">
                                            The Team
                                        </span>
                                    </div>
                                    <h6 class="posts__title">
                                        <a href="#">
                                            This Saturday starts the intensive training for the Final
                                        </a>
                                    </h6>
                                    <time class="posts__date" datetime="2016-08-23">
                                        August 23rd, 2016
                                    </time>
                                    <div class="posts__excerpt">
                                        Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </div>
                                </div>
                            </li>
                            <li class="posts__item posts__item--category-1">
                                <div class="posts__inner">
                                    <div class="posts__cat">
                                        <span class="label posts__cat-label">
                                            The Team
                                        </span>
                                    </div>
                                    <h6 class="posts__title">
                                        <a href="#">
                                            Jake Dribbler Announced that he is retiring next mnonth
                                        </a>
                                    </h6>
                                    <time class="posts__date" datetime="2016-08-23">
                                        August 23rd, 2016
                                    </time>
                                    <div class="posts__excerpt">
                                        Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <!-- Widget: Trending News / End -->
    <!-- Widget: Match Announcement -->
    <aside class="widget widget--sidebar card widget-preview">
        <div class="widget__title card__header">
            <h4>
                Next Match
            </h4>
        </div>
        <div class="widget__content card__content">
            <!-- Match Preview -->
            <div class="match-preview">
                <section class="match-preview__body">
                    <header class="match-preview__header">
                        <time class="match-preview__date" datetime="2017-05-17">
                            Friday August 14th
                        </time>
                        <h3 class="match-preview__title match-preview__title--lg">
                            Quarter Finals
                        </h3>
                    </header>
                    <div class="match-preview__content">
                        <!-- 1st Team -->
                        <div class="match-preview__team match-preview__team--first">
                            <figure class="match-preview__team-logo">
                                <img alt="" src="assets/images/soccer/logos/alchemists_buy_tickets.png">
                                </img>
                            </figure>
                            <h5 class="match-preview__team-name">
                                Alchemists
                            </h5>
                            <div class="match-preview__team-info">
                                Elric Bros School
                            </div>
                        </div>
                        <!-- 1st Team / End -->
                        <div class="match-preview__vs">
                            <div class="match-preview__conj">
                                VS
                            </div>
                            <div class="match-preview__match-info">
                                <time class="match-preview__match-time" datetime="2017-05-17 09:00">
                                    9:00 PM
                                </time>
                                <div class="match-preview__match-place">
                                    Madison Cube Stadium
                                </div>
                            </div>
                        </div>
                        <!-- 2nd Team -->
                        <div class="match-preview__team match-preview__team--second">
                            <figure class="match-preview__team-logo">
                                <img alt="" src="assets/images/soccer/logos/pirates_buy_tickets.png">
                                </img>
                            </figure>
                            <h5 class="match-preview__team-name">
                                Pirates
                            </h5>
                            <div class="match-preview__team-info">
                                Bebop Institute
                            </div>
                        </div>
                        <!-- 2nd Team / End -->
                    </div>
                </section>
                <div class="countdown__content">
                    <div class="countdown-counter" data-date="September 12, 2017 12:00:00">
                    </div>
                </div>
                <div class="match-preview__action match-preview__action--ticket">
                    <a class="btn btn-primary-inverse btn-lg btn-block" href="#">
                        Buy Tickets Now
                    </a>
                </div>
            </div>
            <!-- Match Preview / End -->
        </div>
    </aside>
    <!-- Widget: Match Announcement / End -->
</div>
@endsection
