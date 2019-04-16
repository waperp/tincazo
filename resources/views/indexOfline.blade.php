@extends('layout.welcomeOfline')

@section('sidebar1') 

   <div id="slider-index" class="hero-slider-wrapper">
    
      <div class="hero-slider">
        @foreach ($listaTouinf as $objSlideTouinf)
           <div class="hero-slider__item" style="background-image: url(/images/{{  $objSlideTouinf->touinfvlogt}})">
          <div class="container hero-slider__item-container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="post__meta-block post__meta-block--top">
    
                  <div class="post__category">
                  </div>
                  <h1 class="page-heading__title"><a href="javascript:void(0)">{{ $objSlideTouinf->touinftname }}</span> <span class="highlight"></span> </a></h1>
                  <ul class="post__meta meta">
                    <li class="meta__item meta__item--date"><time datetime="{{ $objSlideTouinf->touinfdstat }}">
                      {{ Carbon\Carbon::parse($objSlideTouinf->touinfdstat)->formatLocalized('%d DE %B %Y') }}</time></li>
                   
                  </ul>
    
                </div>
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
@endsection

@section('header1')
 <header class="header">
  
        <!-- Header Top Bar -->
        <div class="header__top-bar clearfix">
            <div class="container">
  
                <!-- Account Navigation -->
                <ul class="nav-account">

              
                    <li class="nav-account__item">

                        <a  href="javascript:void(0)" data-toggle="modal" data-target="#modal-login-register-tabs">Iniciar Sesion</a>
                         {{-- <li class="nav-account__item"><a  data-toggle="modal" data-target="#modal-login-register">Crear Cuenta</a></li> --}}
                    </li>
                     <li class="nav-account__item">
                      
                        {{-- <li class="nav-account__item"><a  data-toggle="modal" data-target="#modal-login-register-tabs">Iniciar Sesion</a></li> --}}
                         <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-login-register">Crear Cuenta</a>
                    </li>
              
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
                            <li ><a onclick="removemenu()" href="#instrucciones">Instrucciones</a></li>


                        </ul>
                        <a href="javascript:void(0)" class="pushy-panel__toggle">
                            <span class="pushy-panel__line"></span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
  
    </header>   
@endsection
