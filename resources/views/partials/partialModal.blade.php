
<!-- Login/Register Tabs Modal / End -->

@if (Session::get('conmemscode') != 1)
    <div class="modal fade" id="modal-login-nuevo-grupo" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg modal--login modal--login-only" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">
                            ×
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('secusr.store') }}" class="modal-form" enctype="multipart/form-data" id="formgrupo" method="post">
                        <div class="modal-account-holder">
                            <div id="image-preview1">
                                <label for="image-upload1" id="image-label1">
                                    Tu Foto
                                </label>
                                <input id="image-upload1" name="tougrpvimgg" type="file"/>
                            </div>
                            <div class="modal-account__item">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab-register1" role="tabpanel">
                                        {{ csrf_field() }}
                                        <!-- Register Form -->
                                        <div class="form-group">
                                            <h5>
                                                GESTIONAR GRUPO
                                            </h5>
                                            <div class="form-group">
                                                <input class="form-control" name="tougrptnamec" placeholder="Ingrese del nombre del grupo..." required="" type="text">
                                                </input>
                                            </div>
                                            <div class="form-group">
                                                <select class="select2 form-control" id="selecttorneo" name="touinfscode" required="" style="width: 100%">
                                                    @foreach($listaTouinf as $objTouinf)
                                                    <option data-image="{{$objTouinf->touinfvlogt}}" value="{{$objTouinf->touinfscode}}">
                                                        {{$objTouinf->touinftname }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12" style="display: flex; justify-content: center;">
                                                <img alt="" id="imagetorneo" src="" style=" height: auto; width: auto;max-width: 150px; max-height: 150px;">
                                                </img>
                                            </div>
                                            <div class="form-group form-group--submit">
                                                <button class="btn btn-primary-inverse btn-block" id="crear-grupo-btn-subtmit" type="submit">
                                                    Crea tu grupo
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Register Form / End -->
                </div>
                <!-- Tab: Register / End -->
            </div>
        </div>
    </div>
@endif
@if (Session::has('secusricode'))
    <div class="modal fade" id="modal-elegir-campeon" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">
                            ×
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="modal-account-holder">
                           {{--  <button data-toggle="modal" type="button" data-target="#modal-login-nuevo-grupo" class="btn btn-primary-inverse btn-sm btn-block">Agregar</button> --}}
                            <div class="modal-account__item" style="flex-basis: 100%;">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <h5>MI CAMPEÓN</h5>
                                        <aside class="widget widget--sidebar card card--has-table widget-team-stats" style="height: 450px; overflow-y: scroll;overflow-x: hidden">
                      {{-- <div class="widget__title card__header">
                        <h4>ELEGIR CAMPEON</h4>
                      </div> --}}
                      <div class="widget__content card__content">
                        <ul class="team-stats-box">

                            @foreach ($listaEquiposElegir as $objEquiposELegir)

                            @if($objEquiposELegir->touttescode != null ) 
                                <li id="li-equipo-selected-{{ $objEquiposELegir->touttescode1 }}" onclick="miCampeon({{ $objEquiposELegir->touttescode1 }})" class="team-stats__item team-stats__item--clean select-gb">
                                    <div id="div-circle-selected-{{ $objEquiposELegir->touttescode1 }}" class="team-stats__icon team-stats__icon--circle-select">
                                      <img id="img-elegir-equipo-{{ $objEquiposELegir->touttescode1 }}" src="images/{{ $objEquiposELegir->touteavimgt }}" alt="" class="team-stats__icon-primary" style="height: 50px">
                                    </div>
                                    <div  id="equipo-elegir-name-{{ $objEquiposELegir->touttescode1 }}" class="team-stats__label" style="color: black;font-size: 14px;font-weight: 600;">{{ $objEquiposELegir->touteatname }}</div>
                                </li>
                                @else
                                <li id="li-equipo-unselected-{{ $objEquiposELegir->touttescode1}}"  onclick="miCampeon({{ $objEquiposELegir->touttescode1 }})"  class="team-stats__item team-stats__item--clean">
                                    <div id="div-circle-unselected-{{ $objEquiposELegir->touttescode1 }}" class="team-stats__icon team-stats__icon--circle">
                                      <img id="img-elegir-equipo-{{ $objEquiposELegir->touttescode1 }}" src="images/{{ $objEquiposELegir->touteavimgt }}" alt="" class="team-stats__icon-primary" style="height: 50px">
                                    </div>
                                    <div id="equipo-elegir-name-{{ $objEquiposELegir->touttescode1 }}" class="team-stats__label" style="color: black;font-size: 14px;font-weight: 600;">{{ $objEquiposELegir->touteatname }}</div>
                                </li>
                            @endif
                                
                            @endforeach
                         
                        
                          
                        </ul>
                      </div>
                    </aside>
                                </div>
                            </div>
                        </div>
                    <!-- Register Form / End -->
                </div>
                <!-- Tab: Register / End -->
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal-jugadores-campeon" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg modal--login modal--login-only" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">
                            ×
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="modal-account-holder">
                           {{--  <button data-toggle="modal" type="button" data-target="#modal-login-nuevo-grupo" class="btn btn-primary-inverse btn-sm btn-block">Agregar</button> --}}
                            <div class="modal-account__item" style="flex-basis: 100%" >
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <input type="hidden" id="filtre-touinfscode" value="0">
                    
                                        <aside class="widget widget--sidebar card card--has-table widget-team-stats">
                                          <div class="widget__title card__header">
                                            <img id="title-image-campeon" style="width: 40px;height: 40px; border-radius: 50%" alt="">
                                            <h4  style="display:  inline-block;" id="title-equipo-campon"></h4>
                                            
                                          </div>
                                          <div class="widget__content card__content">
                                            <ul id="jugadores" class="team-stats-box">

                                        
                                              
                                            </ul>
                                          </div>
                                        </aside>
                                </div>
                            </div>
                        </div>
                    <!-- Register Form / End -->
                </div>
                <!-- Tab: Register / End -->
            </div>
        </div>
    </div>



    <div class="modal fade" id="modal-nuevo-agregar-tinzaso" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">
                            ×
                        </span>
                    </button>
                                            <h5 style="color: #41acfe;">TU TINCAZO</h5>

                </div>
                <div class="modal-body">
                        <div class="modal-account-holder">
                           {{--  <button data-toggle="modal" type="button" data-target="#modal-login-nuevo-grupo" class="btn btn-primary-inverse btn-sm btn-block">Agregar</button> --}}
                            <div class="modal-account__item" style="flex-basis: 100%;">
                                <!-- Tab panes -->

                    <form action="{{ route('plapre.store') }}" onsubmit="document.getElementById('form-agregar-tincazo-button').disabled = 1" class="modal-form" enctype="multipart/form-data" id="form-agregar-tincazo" method="post">
                        <input type="hidden" id="agregar-toufixicode-hidden">
                        <input type="hidden" id="agregar-plapreicode-hidden">

                                <div class="tab-content">
                                        <div class="row">
                                            <div class="col-md-12" {{-- style="margin-bottom: 15px" --}}>

                                             <div class="col-xs-12 col-sm-6 col-lg-6">
                                                 <figure class="primero">
                                                      <img id="agregar-touteavimgt1-tincazo"  style="width: 50%; height: 80px;margin-bottom: 5px;border-radius: 10px" alt="">
                                                      <h5 class="game-result__team-name" id="agregar-touteatname1-tincazo"></h5>
                                                      <input required="" data-toggle="just_number" id="agregar-toufixsscr1-tincazo" onKeypress="return isNumberKey(this)"  style="width: 50%;margin:  auto;border-radius: 10px;text-transform: uppercase;
    font-family: 'Montserrat', sans-serif; font-weight: 700;letter-spacing: -0.02em;color: #31404b;font-size: 25px;"  type="text" class="form-control">
                                                    </figure>
                                                

                                             </div>
                                             <div class="col-xs-12 col-sm-6 col-lg-6">
                                                
                                                 <figure class="segundo">
                                                  <img id="agregar-touteavimgt2-tincazo" style="width: 50%; height: 80px;margin-bottom: 5px;border-radius: 10px" alt="">
                                                  <h5 class="game-result__team-name" id="agregar-touteatname2-tincazo"></h5>
                                                    <input required="" data-toggle="just_number" id="agregar-toufixsscr2-tincazo" onKeypress="return isNumberKey(this)" style="width: 50%;margin:  auto;border-radius: 10px;text-transform: uppercase;
    font-family: 'Montserrat', sans-serif; font-weight: 700;letter-spacing: -0.02em;color: #31404b;font-size: 25px;" type="text" class="form-control">

                                                </figure>
                                             </div>   
                      {{--                           <div class="game-result__content">
            
                      <!-- 1st Team -->
                      <div class="game-result__team game-result__team--first">
                        <figure class="game-result__team-logo">
                          <img src="assets/images/soccer/logos/alchemists_last_game_results_big.png" alt="">
                        </figure>
                        <div class="game-result__team-info">
                          <h5 class="game-result__team-name">Alchemists</h5>
                          <div class="game-result__team-desc">Elric Bros School</div>
                        </div>
                      </div>
                      <!-- 1st Team / End -->
            
                      <div class="game-result__score-wrap">
                        <div class="game-result__score game-result__score--lg">
                          <span class="game-result__score-result game-result__score-result--winner"><input type="text" class="form-control " name=""></span> <span class="game-result__score-dash">-</span> <span class="game-result__score-result game-result__score-result--loser"><input type="text" name="" class="form-control "></span>
                        </div>
                      </div>
            
                      <!-- 2nd Team -->
                      <div class="game-result__team game-result__team--second">
                        <figure class="game-result__team-logo">
                          <img src="assets/images/samples/logo-l-clovers--sm.png" alt="">
                        </figure>
                        <div class="game-result__team-info">
                          <h5 class="game-result__team-name">Clovers</h5>
                          <div class="game-result__team-desc">St Paddy's Institute</div>
                        </div>
                      </div>
                      <!-- 2nd Team / End -->
                    </div> --}}
                               {{--              <div class="game-result__content" style="margin: 0px">
                
                                              <div class="game-result__team game-result__team--first">
                                                <figure class="game-result__team-logo" style="width: 20%;    height: 68px;">
                                                  <img id="agregar-touteavimgt1-tincazo"  alt="">
                                                </figure>
                                                <div class="game-result__team-info" style="padding-top: 20px;">
                                                  <h5 class="game-result__team-name" id="agregar-touteatname1-tincazo" ></h5>
                                                  
                                                </div>
                                              </div>
                        
                        
                
                          <div class="game-result__score-wrap" style="padding: 10px 0 0 0;">
                            <div class="game-result__score game-result__score--lg" style="font-size: 34px; line-height: 1em;margin-bottom: 0px; */">

                                                       
                                                        <input data-toggle="just_number" id="agregar-toufixsscr1-tincazo" onKeypress="return isNumberKey(this)" style="width: 70px;height: 40px" type="text" name="">
                                        
                              

                              <span class="game-result__score-dash"> - </span>
                             
                                                        
                                             <input data-toggle="just_number" id="agregar-toufixsscr2-tincazo"  onKeypress="return isNumberKey(this)" style="width: 70px;height: 40px"type="text" name="">
                                                      </div>
                          </div>
                                          <div class="game-result__team game-result__team--second">
                            <figure class="game-result__team-logo" style="width: 20%;    height: 68px;">
                              <img id="agregar-touteavimgt2-tincazo"  alt="">
                            </figure>
                            <div class="game-result__team-info" style="padding-top: 20px;">
                              <h5 class="game-result__team-name" id="agregar-touteatname2-tincazo"></h5>
                              
                            </div>
                          </div>

                        </div> --}}
                         <div class="form-group form-group--submit" style="margin: 0; text-align: center">
                             <button id="form-agregar-tincazo-button" type="submit" class="btn btn-primary-inverse ">PROCESAR!</button>
                             <button data-dismiss="modal" type="button" class="btn btn-danger">CANCELAR</button>
                          </div>
                                            </div>
                                        
                                        </div>
                                   
                                </div>
                            </div>
                        </form>
                        </div>
                    <!-- Register Form / End -->
                </div>
                <!-- Tab: Register / End -->
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-edit-score" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">
                            ×
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="modal-account-holder">
                           {{--  <button data-toggle="modal" type="button" data-target="#modal-login-nuevo-grupo" class="btn btn-primary-inverse btn-sm btn-block">Agregar</button> --}}
                            <div class="modal-account__item" style="flex-basis: 100%;">
                                <!-- Tab panes -->

                    <form action="{{ route('toufix.store') }}" class="modal-form" enctype="multipart/form-data" id="form-edit-score" method="post">
                        <input type="hidden" id="edit-toufixicode-hidden">

                                <div class="tab-content">
                                        <div class="row">
                                            <div class="col-md-12" style="margin-bottom: 15px">
                                            <h5 style="color: #41acfe;">EDITAR SCORE</h5>

                                            


                                            <div class="game-result__content" style="margin: 0px">
                
                          <!-- 1st Team -->
                          <div class="game-result__team game-result__team--first">
                            <figure class="game-result__team-logo" style="width: 20%;    height: 68px;">
                              <img id="edit-touteavimgt1"  alt="">
                            </figure>
                            <div class="game-result__team-info" style="padding-top: 20px;">
                              <h5 class="game-result__team-name" id="edit-touteatname1" ></h5>
                              
                            </div>
                          </div>
                
                          <div class="game-result__score-wrap" style="padding: 10px 0 0 0;">
                            <div class="game-result__score game-result__score--lg" style="font-size: 34px; line-height: 1em;margin-bottom: 0px; */">

                                                        <input data-toggle="just_number" id="edit-toufixsscr1" onKeypress="return isNumberKey(this)" style="width: 70px;height: 40px" type="text" name="">
                                        
                              

                              <span class="game-result__score-dash"> - </span>
                             
                                             <input data-toggle="just_number" id="edit-toufixsscr2"  onKeypress="return isNumberKey(this)" style="width: 70px;height: 40px"type="text" name="">
                                                      </div>
                          </div>
                
                          <div class="game-result__team game-result__team--second">
                            <figure class="game-result__team-logo" style="width: 20%;    height: 68px;">
                              <img id="edit-touteavimgt2"  alt="">
                            </figure>
                            <div class="game-result__team-info" style="padding-top: 20px;">
                              <h5 class="game-result__team-name" id="edit-touteatname2"></h5>
                              
                            </div>
                          </div>

                        </div>
                         <div class="form-group form-group--submit" style="margin: 0">
                             <button type="submit"style="width:  100px; margin:  auto;" class="btn btn-primary-inverse btn-block">PROCESAR!</button>
                          </div>
                                            </div>
                                        
                                        </div>
                                   
                                </div>
                            </div>
                        </form>
                        </div>
                    <!-- Register Form / End -->
                </div>
                <!-- Tab: Register / End -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-nuevo-mostrar-tinzaso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document" style="max-width: 95%">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">TINCAZO</h4>
          </div>
          <div class="modal-body"> <input id="mostrar-toufixicode-hidden" type="hidden"/>
            <div class="col-md-12">
            <div class="widget__content card__content">
            
                <!-- Match Preview -->
                <div class="match-preview">
                  <section class="match-preview__body">
                {{--     <header class="match-preview__header">
                      <time class="match-preview__date" datetime="2017-05-17">Friday August 14th</time>
                      <h3 class="match-preview__title match-preview__title--lg">Quarter Finals</h3>
                    </header> --}}
                    <div class="match-preview__content">
            
                      <!-- 1st Team -->
                      <div class="match-preview__team match-preview__team--first">
                        <figure class="match-preview__team-logo">
                          <img  id="match-preview__team-img-1"   alt="">
                        </figure>
                        <h5 class="match-preview__team-name" id="match-preview__team-name-1">Alchemists</h5>
                        {{-- <div class="match-preview__team-info">Elric Bros School</div> --}}
                      </div>
                      <!-- 1st Team / End -->
            
                      <div class="match-preview__vs">
                        <div class="match-preview__conj">VS</div>
                       
                      </div>
            
                      <!-- 2nd Team -->
                      <div class="match-preview__team match-preview__team--second">
                        <figure class="match-preview__team-logo">
                          <img  id="match-preview__team-img-2"  alt="">
                        </figure>
                        <h5 class="match-preview__team-name" id="match-preview__team-name-2"></h5>
                        {{-- <div class="match-preview__team-info">Bebop Institute</div> --}}
                      </div>
                      <!-- 2nd Team / End -->
            
                    </div>
                  </section>
                {{--   <div class="countdown__content">
                    <div class="countdown-counter" data-date="September 12, 2017 12:00:00"></div>
                  </div>
                  <div class="match-preview__action match-preview__action--ticket">
                    <a href="#" class="btn btn-primary-inverse btn-lg btn-block">Buy Tickets Now</a>
                  </div> --}}
                </div>
                <!-- Match Preview / End -->
            
              </div>
            
                <div class="row table-responsive">
                    <table class="table table-striped table-hover nowrap" id="table-tincazos-grupo" style="width: 100%">
                            <thead>
                                <tr align="center" style="background-color: #80808099;">
                                     <th>
                                        JUGADOR
                                    </th>
                                   
                                    <th>
                                        TINCAZOS
                                    </th>
                                   
                                   
                                   <th>FECHA</th>
                                   <th>HORA</th>

                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
            </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>


        <div class="modal fade" id="modal-info-player-tinzaso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document"  style="max-width: 95%">
        <div class="modal-content">
          <div class="modal-header" style="padding-bottom: 0px">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">TINCAZO GENERAL</h4>
            <h6 id="modal-info-player-tinzaso-player-name" style="margin-bottom: 0px; font-size: 13px; color: #00a6e1"></h6>

          </div>
          <div class="modal-body" style="padding-top: 0px"> 
            <div class="col-md-12">
                <input type="hidden" id="modal-info-player-tinzaso-plainficode">
                <div class="row table-responsive">
                    <table class="table table-striped table-hover nowrap" id="table-info-player-grupo" style="width: 100%">
                            <thead>
                                <tr align="center" style="background-color: #80808099;">
                                            <th></th>
                                    <th>TINCAZO</th>
                                    <th></th>
                                    <th>PTS</th>

                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
            </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>




        <div class="modal fade" id="modal-info-player-tinzaso-dia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-sm" role="document"  style="max-width: 95%">
        <div class="modal-content">
          <div class="modal-header" style="padding-bottom: 0px">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">TINCAZO x DIA</h4>
             <h6 id="modal-info-player-tinzaso-dia-name" style="margin-bottom: 0px; font-size: 13px; color: #00a6e1" ></h6>

          </div>
          <div class="modal-body" style="padding-top: 0px"> 
            <div class="col-md-12">
                <input type="hidden" id="modal-info-player-tinzaso-plainficode-dia">
                <div class="row table-responsive">
                    <table class="table table-striped table-hover nowrap" id="table-info-player-grupo-dia" style="width: 100%">
                            <thead>
                                <tr align="center" style="background-color: #80808099;">
                                            <th></th>
                                    <th>TINCAZO</th>
                                    <th></th>
                                    <th>PTS</th>

                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
            </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>

@endif
@if (Session::has('contypscode'))
    @if (Session::get('contypscode') == 1)
        <div class="modal fade" id="modal-admin-add-torneo" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg modal--login modal--login-only" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('touinf.store') }}" class="modal-form" enctype="multipart/form-data" id="form-admin-torneo" method="post">
                            <input type="hidden" name="touinfscode" id="touinfscode">
                            <input type="hidden" name="tipo" id="tipo" value="0">

                            <div class="modal-account-holder">
                                <div id="image-preview-admin-torneo">
                                    <label for="image-upload-admin-torneo" id="image-label-admin-torneo">
                                        Tu Foto
                                    </label>
                                    <input id="image-upload-admin-torneo" class="c" name="touinfvlogt" type="file"/>
                                </div>
                                <div class="modal-account__item">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab-register1" role="tabpanel">
                                         
                                            <div class="form-group">
                                                <h5 id="title-admin-torneo">
                                                    AGREGAR TORNEO
                                                </h5>
                                                <div class="form-group">
                                                    <input class="form-control c" id="touinftname"  placeholder="Ingrese del nombre del torneo..." required="" type="text">
                                                    </input>
                                                </div>
                                                <div class="form-group">
                                                   <div class="input-group date" id="datetimepicker2">
                                                       <input class="form-control c" id="touinfdstat" placeholder="Ingrese su fecha inicio" required="" type="text"/>
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar">
                                                                        </span>
                                                                </span>
                                                        </div>
                                                </div>
                                                 <div class="form-group">
                                                   <div class="input-group date" id="datetimepicker3">
                                                        <input class="form-control c" id="touinfdendt" placeholder="Ingrese su fecha fin" required="" type="text"/>
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                                                        </div>
                                                </div>
                                                  <div class="form-group">
                                                    <input class="form-control c" id="touinfsnumt"  placeholder="Ingrese el numero de equipo..." required="" type="number">
                                                    </input>
                                                </div>
                                                <div class="form-group form-group--submit">
                                                    <button class="btn btn-primary-inverse btn-block" id="procesar" type="submit">
                                                       PROCESAR
                                                    </button>
                                                    <button class="btn btn-danger btn-block" id="cancelar" type="button">
                                                       CANCELAR
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Register Form / End -->
                    </div>
                    <!-- Tab: Register / End -->
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-admin-add-equipo" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg modal--login modal--login-only" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('toutea.store') }}" class="modal-form" enctype="multipart/form-data" id="form-admin-equipo" method="post">
                            <input type="hidden" name="touteascode" id="touteascode">
                            <input type="hidden" name="tipo" id="tipo-equipo" value="0">

                            <div class="modal-account-holder">
                                <div id="image-preview-admin-equipo">
                                    <label for="image-upload-admin-equipo" id="image-label-admin-equipo">
                                        Tu Foto
                                    </label>
                                    <input id="image-upload-admin-equipo" class="c" name="touteavimgt" type="file"/>
                                </div>
                                <div class="modal-account__item">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab-register1" role="tabpanel">
                                         
                                            <div class="form-group">
                                                <h5 id="title-admin-equipo">
                                                    AGREGAR PLANTEL
                                                </h5>
                                                <div class="form-group">
                                                    <input class="form-control c" id="touteatname"  placeholder="Ingrese del nombre del equipo..." required="" type="text">
                                                    </input>
                                                </div>
                                                    <div class="form-group">
                                                    <input class="form-control c" id="touteatabrv"  placeholder="Ingrese abreviatura del equipo..." required="" type="text">
                                                    </input>
                                                </div>
                                                  <div class="form-group">
                                                    <select class="select2 form-control" id="contypscode" required="" style="width: 100%">
                                                                    @foreach($listaContypEquipos as $objContypEquipos)
                                                                    <option  value="{{$objContypEquipos->contypscode}}">
                                                                        {{$objContypEquipos->contyptdesc}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                </div>
                                                <div class="form-group form-group--submit">
                                                    <button class="btn btn-primary-inverse btn-block" type="submit">
                                                       PROCESAR
                                                    </button>
                                                    <button class="btn btn-danger btn-block" id="cancelar-equipo" type="button">
                                                       CANCELAR
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Register Form / End -->
                    </div>
                    <!-- Tab: Register / End -->
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-admin-add-torneo-equipo" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-sm" style="width: 550px" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('toutea.store') }}" class="modal-form" enctype="multipart/form-data" id="form-admin-torneo-equipo" method="post">
                         

                            <div class="modal-account-holder">
                                {{-- <div id="image-preview-admin-equipo">
                                    <label for="image-upload-admin-equipo" id="image-label-admin-equipo">
                                        
                                    </label>
                                    <input id="image-upload-admin-equipo" class="c" name="touteavimgt" type="file"/>
                                </div> --}}
                                <div class="modal-account__item">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab-register1" role="tabpanel">
                                         
                                            <div class="form-group">
                                                <h5 id="title-admin-equipo">
                                                    ASIGNACION TORNEOS Y EQUIPOS
                                                </h5>
                                                <div class="form-group">
                                                    <input class="form-control" id="touinfscode-select" type="hidden">

                                                    <input class="form-control" readonly="" id="touinftname-select" required="" type="text">
                                                    </input>
                                                </div>
                                                
                                                  <div class="form-group">
                                                    <select class="select2 form-control" id="contypscode1" required="" style="width: 100%">
                                                                    @foreach($listaContypEquipos as $objContypEquipos)
                                                                    <option  value="{{$objContypEquipos->contypscode}}">
                                                                        {{$objContypEquipos->contyptdesc}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                </div>
                                                <div class="form-group">
                                                    <select class="select2 form-control" id="select-torneo-equipo" multiple="" required="" style="width: 100%">
                                                                    @foreach($listaToutea as $objToutea)
                                                                    <option  value="{{$objToutea->touteascode}}">
                                                                        {{$objToutea->touteatname}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                </div>
                                                <div class="form-group form-group--submit">
                                                    <button class="btn btn-primary-inverse btn-block" type="submit">
                                                       PROCESAR
                                                    </button>
                                                    <button class="btn btn-danger btn-block"  type="button">
                                                       CANCELAR
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Register Form / End -->
                    </div>
                    <!-- Tab: Register / End -->
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-gestionar-fixture" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                <h4 class="modal-title" id="myModalLabel">GESTIONAR FIXTURE</h4>

                    </div>
                    <div class="modal-body">

                        <div class="row table-responsive">
                <div class="col-sm-12">
                <div class="row">
                           <div class="col-md-5">
                            <div class="form-group">
                    <select class="select2 form-control" id="select-torneo-fixture" style="width: 100%">
                                                @foreach($listaTouinf as $objTorneosEquipos)
                                                    <option  value="{{$objTorneosEquipos->touinfscode}}">
                                                        {{$objTorneosEquipos->touinftname}}
                                                    </option>
                                                @endforeach
                                            </select>
                </div>
                    </div>
                    <div class="col-md-3">
                            <div class="form-group">
                    <div class="input-group date" id="datetimepicker-fixture">
                        <input class="form-control" id="date-toufixdplay" placeholder="Ingrese una fecha" type="text"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar">
                            </span>
                        </span>
                    </div>
                </div>
                    </div>
         
                      
                    
                </div>
                                                       
                    <table id="table-fixture" class="table table-striped table-hover" style="width: 100%">
                                        <thead>
                                              <tr align="center" valign="middle" style="background-color: #80808099;">
                                                <th>HORA</th>
                                                <th></th>
                                                <th></th>
                                                <th>PARTIDO</th>
                                                <th></th>
                                                <th></th>
                                                <th>ESTADO</th>
                                                <th>VALOR</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
            
                                              </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                        </table>
                </div>
            </div>

                                            </div>
                                           
                                        </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-admin-gestionar-grupo" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                <h4 class="modal-title" id="myModalLabel">GESTIONAR GRUPOS</h4>

                    </div>
                    <div class="modal-body">

                        <div class="row table-responsive">
                <div class="col-sm-12">
                <div class="row">
                           <div class="col-md-5">
                            <div class="form-group">
                    <select class="select2 form-control" id="select-torneo-admin-torneos" style="width: 100%">
                                                @foreach($listaTouinf as $objTorneosEquipos)
                                                    <option  value="{{$objTorneosEquipos->touinfscode}}">
                                                        {{$objTorneosEquipos->touinftname}}
                                                    </option>
                                                @endforeach
                                            </select>
                </div>
                    </div>
                    
         
                      
                    
                </div>
                                                       
                    <table id="table-admin-gestionar-grupos" class="table table-striped table-hover" style="width: 100%">
                                        <thead>
                                              <tr align="center" valign="middle" style="background-color: #80808099;">
                                                <th></th>
                                                <th>NOMBRE</th>
                                                <th>CREADOR</th>
                                                <th>FECHA</th>
                                                <th>TA</th>
                                                <th>TM</th>
                                                <th>TB</th>
                                                <th>JUG.</th>
                                                <th></th>
            
                                              </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                        </table>
                </div>
            </div>

                                            </div>
                                           
                                        </div>
                </div>
            </div>
        </div>

 <div class="modal fade" id="modal-admin-gestionar-grupo-add" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg modal--login modal--login-only" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tougrp.adminUpdateTougrp') }}" class="modal-form" enctype="multipart/form-data" id="form-admin-gestionar-grupo-add" method="post">
                    <div class="modal-account-holder">
                        <div id="image-preview5">
                            <label for="image-upload5" id="image-label5">
                                Tu Foto
                            </label>
                            <input id="image-upload5" name="admin-gestionar-grupo-tougrpvimgg" type="file"/>
                        </div>
                        <div class="modal-account__item">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab-register2" role="tabpanel">
                                    <input id="admin-gestionar-grupo-touinfscode-hidden" type="hidden"/>
                                    <input id="admin-gestionar-grupo-tougrpicode-hidden" type="hidden"/>
                                        <input id="admin-gestionar-grupo-tipo" type="hidden"/>
                                            <!-- Register Form -->
                                           
                                                <h4 id="title-configurar-grupo">
                                                   
                                                </h4>
                                                    <div class="form-group">

                                                        <input class="form-control" id="admin-gestionar-grupo-touinftname" readonly="" required="" type="text">
                                                        </input>
                                                    </div>
                                                    
                                                <div class="form-group">
                                                    <label for="">
                                                        Responsable
                                                    </label>
                                                        <select required="" class="select2 form-control" id="select-admin-gestionar-grupo-securs" style="width: 100%">
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">
                                                        Nombre del torneo
                                                    </label>
                                                    <input class="form-control" id="admin-gestionar-grupo-tougrptname" required="" type="text">
                                                    </input>
                                                </div>
                                                <div class="form-group row">
                                                <div class="col-xs-6">
                                                    <label for="">
                                                        TA
                                                    </label>
                                                    <input class="form-control" data-max="100000" data-min="0" data-min_max="" data-toggle="just_number" id="admin-gestionar-grupo-tougrpsmaxp" value="0" min="0" onkeypress="return isNumberKey(this)" required="" type="number">
                                                    </input>
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="">
                                                        tM
                                                    </label>
                                                    <input class="form-control" data-max="100000" data-min="0" data-min_max="" data-toggle="just_number" id="admin-gestionar-grupo-tougrpsmedp" value="0" min="0" onkeypress="return isNumberKey(this)" required="" type="number">
                                                    </input>
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="">
                                                        TB
                                                    </label>
                                                    <input class="form-control" data-max="100000" data-min="0" data-min_max="" data-toggle="just_number" id="admin-gestionar-grupo-tougrpsminp" value="0" min="0" onkeypress="return isNumberKey(this)" required="" type="number">
                                                    </input>
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="">
                                                        Valor x Partido
                                                    </label>
                                                    <input class="form-control" data-max="10" data-min="0" data-min_max="" data-toggle="just_number" id="admin-gestionar-grupo-tougrpsxval" value="1" min="1" max="10" onkeypress="return isNumberKey(this)" required="" type="number">
                                                    </input>
                                                </div>
                                            </div>
                                                <div class="form-group form-group--submit">
                                                    <button class="btn btn-primary-inverse btn-block" type="submit">
                                                        LISTO!
                                                    </button>
                                                     <button class="btn btn-danger btn-block" data-dismiss="modal" type="button">
                                                       CANCELAR
                                                    </button>
                                                </div>
                                       
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Register Form / End -->
            </div>
            <!-- Tab: Register / End -->
        </div>
    </div>
</div>

        <div class="modal fade" id="modal-admin-add-fixture" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-sm" style="width: 550px" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('toufix.store') }}" class="modal-form" enctype="multipart/form-data" id="form-admin-toufix" method="post">
                         

                            <div class="modal-account-holder">
                                {{-- <div id="image-preview-admin-equipo">
                                    <label for="image-upload-admin-equipo" id="image-label-admin-equipo">
                                        
                                    </label>
                                    <input id="image-upload-admin-equipo" class="c" name="touteavimgt" type="file"/>
                                </div> --}}
                                <div class="modal-account__item">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab-register1" role="tabpanel">                                    
                                            <div class="form-group">
                                                <h5 id="title-admin-equipo">
                                                    ASIGNACION
                                                </h5>
                                                <div class="form-group">
                                                    <input class="form-control" id="toufixicode-hidden" type="hidden">
                                                    <input class="form-control" id="select-toufixdplay-hidden" type="hidden">
                                                    <input class="form-control" id="select-touinfscode-hidden" type="hidden">
                                                    <input class="form-control" id="toufixicode-tipo" type="hidden">
                                                    </input>
                                                </div>
                                                <div class="form-group">
                                                     <div class="input-group date" id="datetimepicker-toufixdplay">
                                                                    <input id="dates-toufixdplay" class="form-control" placeholder="Ingrese una fecha" type="text"/>
                                                                    <span class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-calendar">
                                                                        </span>
                                                                    </span>
                                                        </div>
                                                </div>
                                                 <div class="form-group">
                                                     <div class="input-group date" id="datetimepicker-toufixthour">
                                                                    <input id="dates-toufixthour" class="form-control" placeholder="Ingrese una hora" type="text"/>
                                                                    <span class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-time">
                                                                        </span>
                                                                    </span>
                                                        </div>
                                                </div>
                                                  <div class="form-group">
                                                    <select class="select2 form-control" id="select-touteascode1" required="" style="width: 100%"></select>

                                                </div>
                                                 <div class="form-group" style="text-align: center;">
                                                    {{-- <label style=" font-size: 15px;font-weight: 700;"> VS </label> --}}
                                                    <img src="images/versus.png" style="width: 50px; height: 50px" alt="">
                                                    
                                                 </div>
                                                <div class="form-group">
                                                    <select class="select2 form-control" id="select-touteascode2" required="" style="width: 100%"></select>
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" class="form-control" value="1" data-toggle="just_number" onKeypress="return isNumberKey(this)"  id="toufix-toufixyxval" >
                                                </div>

                                                <div class="form-group form-group--submit">
                                                    <button class="btn btn-primary-inverse btn-block" type="submit">
                                                       PROCESAR
                                                    </button>
                                                    <button class="btn btn-danger btn-block" data-dismiss="modal" type="button">
                                                       CANCELAR
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Register Form / End -->
                    </div>
                    <!-- Tab: Register / End -->
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-nuevo-torneo" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg modal--login modal--login-only" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="modal-account-holder">
                               {{--  <button data-toggle="modal" type="button" data-target="#modal-login-nuevo-grupo" class="btn btn-primary-inverse btn-sm btn-block">Agregar</button> --}}
                                <div class="modal-account__item" style="flex-basis: 100%;">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                     
                                            <h5>GESTIONAR TORNEOS</h5>
                        
                                        <table id="table-admin-torneo" class="table table-hover table-standings" style="width: 100%">
                                        <thead>
                                              <tr style="background-color: #80808099;">
                                                <th></th>
                                                <th>ID</th>
                                                <th>NOMBRE TORNEO</th>
                                                <th>COMIENZA</th>
                                                <th>TERMINA</th>
                                                <th>EQUIPOS</th>
                                                <TH></TH>
            
                                              </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <!-- Register Form / End -->
                    </div>
                    <!-- Tab: Register / End -->
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-nuevo-equipo" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg modal--login modal--login-only" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">
                            ×
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                        

                        <div class="modal-account-holder">
                           {{--  <button data-toggle="modal" type="button" data-target="#modal-login-nuevo-grupo" class="btn btn-primary-inverse btn-sm btn-block">Agregar</button> --}}
                            <div class="modal-account__item" style="flex-basis: 100%;">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <input type="hidden" id="filtre-touinfscode" value="0">
                                        <h5>GESTIONAR PLANTEL</h5>
                                    <div class="form-group">
                    <select class="select2 form-control" id="select-torneo-admin-torneos" style="width: 100%">
                                                @foreach($listaTouinf as $objTorneosEquipos)
                                                    <option  value="{{$objTorneosEquipos->touinfscode}}">
                                                        {{$objTorneosEquipos->touinftname}}
                                                    </option>
                                                @endforeach
                                            </select>
                </div>
                                    <table id="table-admin-equipo" class="table table-hover table-standings" style="width: 100%">
                                    <thead>
                                          <tr style="background-color: #80808099;">
                                            <th></th>
                                            <th>NOMBRE PLANTEL</th>
                                            <th>ABREVIATURA</th>
                                            <th>TIPO</th>
                                            <TH></TH>
                                            <TH></TH>
        
                                          </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <!-- Register Form / End -->
                </div>
                <!-- Tab: Register / End -->
            </div>
        </div>
        </div>
        <div class="modal fade" id="modal-nuevo-torneo-equipo" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg modal--login modal--login-only" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="modal-account-holder">
                               {{--  <button data-toggle="modal" type="button" data-target="#modal-login-nuevo-grupo" class="btn btn-primary-inverse btn-sm btn-block">Agregar</button> --}}
                                <div class="modal-account__item" style="flex-basis: 100%;">
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                     
                                            <div class="row">
                                                <div class="col-md-6" style="margin-bottom: 15px">
                                                <h5>GESTIONAR EQUIPO Y PLANTEL</h5>
                                                <select class="select2 form-control" id="selectTorneosEquipos" required="" style="width: 100%">
                                                @foreach($listaTouinf as $objTorneosEquipos)
                                                    <option  value="{{$objTorneosEquipos->touinfscode}}">
                                                        {{$objTorneosEquipos->touinftname}}
                                                    </option>
                                                @endforeach
                                            </select>
                                            </div>
                                            
                                            </div>
                                            
                        
                                        <table id="table-admin-torneo-equipo" class="table table-hover table-standings" style="width: 100%">
                                        <thead>
                                              <tr style="background-color: #80808099;">
                                                <th></th>
                                                <th>NOMBRE PLANTEL</th>
                                                <th>TIPO</th>
                                                <TH></TH>
                                                <TH></TH>
            
                                              </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <!-- Register Form / End -->
                    </div>
                    <!-- Tab: Register / End -->
                </div>
            </div>
        </div>

    @endif
@endif
@if(Session::has('plainficode'))

        <div class="modal fade" id="modal-edit-perfil" role="dialog" style="padding-right: 17px;" tabindex="-1">
                    <div class="modal-dialog modal-lg modal--login modal--login-only" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                    <span aria-hidden="true">
                                        ×
                                    </span>
                                </button>
                            <h4 class="modal-title" id="myModalLabel">Actualiza tu perfil</h4>
                             </div>
                            <div class="modal-body">
                               
                                    <div class="modal-account-holder">
                                        <div id="edit-perfil-image-preview" >
                                            <label for="edit-perfil-image-upload" id="edit-perfil-image-label">
                                                Tu Foto
                                            </label>
                                            <input id="edit-perfil-image-upload" name="edit-perfil-plainfvimgp"  type="file"/>
                                            <span id="file_error"></span>
                                        </div>
                                        <div class="modal-account__item">
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="tab-register" role="tabpanel">

                                                     <form action="{{ route('secusr.store') }}" class="modal-form" enctype="multipart/form-data" id="form-edit-perfil" method="post">
                                                    <!-- Register Form -->
                                                    

                                                    <input type="hidden" id="edit-perfil-image-src" value="{{ $listaEditPerfil->plainfvimgp }}" />
                                                    <input type="hidden" id="edit-perfil-plainficode" value="{{ $listaEditPerfil->plainficode }}" />
                                                    <div class="form-group">
                                                        <input class="form-control" id="edit-perfil-secusrtmail" value="{{ $listaEditPerfil->secusrtmail }}" readonly=""   placeholder="Ingrese su correo electronico..." required="" type="email">
                                                        </input>
                                                    </div><div class="form-group">
                                                        <input class="form-control"  id="edit-perfil-plainftname" value="{{ $listaEditPerfil->plainftname }}"  readonly=""  placeholder="Ingrese su nombre completo..." required="" type="text">
                                                        </input>
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control"  id="edit-perfil-plainftnick" value="{{ $listaEditPerfil->plainftnick }}"  placeholder="Ingrese su nick name..." required="" type="text">
                                                        </input>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="input-group date" id="edit-perfil-datetimepicker1">
                                                            <input class="form-control" id="edit-perfil-plainfddobp" value="{{ Carbon\Carbon::parse($listaEditPerfil->plainfddobp)->format('d-m-Y')  }}" placeholder="Ingrese su fecha de nacimiento" type="text"/>
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar">
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                 
                                                    <div class="form-group col-md-12" style="text-align:center;">
                                                        <label class="radio-inline">
                                                            <input name="edit-perfil-plainftgder" @if( $listaEditPerfil->plainftgder == "M") checked="checked" @else @endif type="radio" value="M">
                                                                Hombre
                                                            </input>
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input name="edit-perfil-plainftgder" @if( $listaEditPerfil->plainftgder == "F") checked="checked" @else @endif type="radio" value="F">
                                                                Mujer
                                                            </input>
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                    <div class="input-group">
                                                      <input type="password" readonly="" class="form-control pwd" id="edit-perfil-secusrtpass" value="{{ $listaEditPerfil->secusrtpass }}">
                                                      <span class="input-group-btn">
                                                        <button style="padding:11px 42px" class="btn btn-primary reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
                                                      </span>          
                                                    </div>

                                                     </div>
                                                     <div class="form-group">
                                                    
                                                      <input type="password" class="form-control pwd" placeholder="Nueva contraseña" name="password" id="edit-perfil-secusrtpass1" >
                                                            

                                                     </div>
                                                     <div class="form-group">
                                                      <input type="password"  class="form-control pwd"   placeholder="Repetir nueva contraseña"  name="confirmPassword" id="edit-perfil-secusrtpass2" >
                                                              

                                                     </div>
                                                    
                                                    <div class="form-group form-group--submit">
                                                        <button class="btn btn-primary-inverse btn-block"  type="submit">
                                                            si ! actualizar
                                                        </button>
        <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Cerrar</button>

                                                    </div>
                                                     </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               
                                <!-- Register Form / End -->
                            </div>
                          
                            <!-- Tab: Register / End -->
                        </div>
                    </div>
                </div>


@endif
<!-- Modal -->



@if(!Session::has('plainficode'))
    <div class="modal fade" id="modal-login-register-tabs" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg modal--login modal--login-only" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-account-holder">
                    <div class="modal-account__item modal-account__item--logo">
                    </div>
                    <div class="modal-account__item">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- Tab: Login -->
                            <div class="tab-pane fade in active" id="tab-login" role="tabpanel">
                                <!-- Login Form -->
                                <form action="{{ action('LoginController@login') }}" class="modal-form" id="iniciosession" method="POST">
                                    <h5>
                                        INICIAR SESION
                                    </h5>
                                    <div class="form-group">
                                        <input class="form-control" id="secusrtmail" name="secusrtmail" placeholder="Ingrese su dirección de correo electrónico ..." required="" type="email"/>
                                       
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="secusrtpass" name="secusrtpass" placeholder="Ingrese su contraseña ..." required="" type="password">
                                        </input>
                                    </div>
                                    <div class="alert alert-danger" id="false" style="display: none;">
                                        <strong>
                                            Oh!
                                        </strong>
                                    </div>
                                    <div class="alert alert-success" id="true" style="display: none;">
                                        <strong>
                                            Bien!
                                        </strong>
                                    </div>
                                       <div class="form-group form-group--pass-reminder" style="text-align: center">
                                                       
                                                        <a OnClick="validateMail()">Olvidastes tu contraseña?</a>
                                                      </div>
                                    <div class="form-group form-group--submit">
                                        <!-- 
                        <a href="shop-account.html" class="btn btn-primary-inverse btn-block"></a> -->
                                        <button id="form-login-button-submit" class="btn btn-primary-inverse btn-block" type="submit">
                                            Ingrese a su cuenta
                                        </button>
                                    </div>
                                    <div class="modal-form--social">
                                        <h6>
                                            o Inicia sesión con tu perfil social:
                                        </h6>
                                        <ul class="social-links social-links--btn text-center">
                                            <li class="social-links__item">
                                                <a class="social-links__link social-links__link--lg social-links__link--fb" href="{{ route('social.auth') }}">
                                                    <i class="fa fa-facebook">
                                                    </i>
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </div> 
                                </form>
                                <!-- Login Form / End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-login-register" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg modal--login modal--login-only" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                       x
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('secusr.store') }}" class="modal-form" enctype="multipart/form-data" id="formStore" method="post">
                    <div class="modal-account-holder">
                        <div id="image-preview">
                            <label for="image-upload" id="image-label">
                                Tu Foto
                            </label>
                            <input accept="image/*" id="image-upload" name="plainfvimgp" type="file"/>
                            <span id="file_error" style="color: red">
                            </span>
                        </div>
                        <div class="modal-account__item">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab-register" role="tabpanel">
                                    <!-- Register Form -->
                                    <h5>
                                        Registrate Ahora!
                                    </h5>
                                    <div class="form-group">
                                        <input class="form-control" id="register-secusrtmail" name="secusrtmail" placeholder="Ingrese su correo electronico..." required="" type="email">
                                        </input>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="register-plainftname" name="plainftname" placeholder="Ingrese su nombre completo..." required="" type="text">
                                        </input>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group date" id="datetimepicker1">
                                            <input class="form-control" name="plainfddobp" placeholder="Ingrese su fecha de nacimiento" required="" type="text"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar">
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="form-control pwd" id="register-secusrtpass" name="secusrtpass" placeholder="ingrese su contraseña" required="" type="password"/>
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary reveal" style="padding:11px 42px" type="button">
                                                    <i class="glyphicon glyphicon-eye-open">
                                                    </i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <select class="select2 form-control" id="selectconmemscode" name="conmemscode" required="" style="width: 100%">
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <img alt="" id="imagemember" src="" style="height: auto; width: auto;max-width: 50px; max-height: 50px;">
                                        </img>
                                    </div>
                                    <div class="form-group col-md-12" style="text-align: center;">
                                        <label class="radio-inline">
                                            <input name="plainftgder" required="" type="radio" value="M">
                                                Hombre
                                            </input>
                                        </label>
                                        <label class="radio-inline">
                                            <input name="plainftgder" required="" type="radio" value="F">
                                                Mujer
                                            </input>
                                        </label>
                                    </div>
                                    <div class="form-group form-group--submit">
                                        <button id="form-button-register" class="btn btn-primary-inverse btn-block" id="xD" type="submit">
                                            Crea tu cuenta
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@if(Session::has('plainficode'))
     @foreach ($listaTorneos as $objVerifyTorneoAdmin)
         @if (Session::get('plainficode') == $objVerifyTorneoAdmin->plainficode)
            <div class="modal fade" id="modales" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg modal--login modal--login-only" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
                <div class="modal-body">
                <form action="{{ route('secusr.store') }}" class="modal-form" enctype="multipart/form-data"  method="post">
                    <div class="modal-account-holder">
                        <div id="image-preview3">
                            {{-- <label for="image-upload3" id="image-label3">
                                Tu Foto
                            </label>
                            <input id="image-upload3" name="upload" type="file"/> --}}
                        </div>
                        <div class="modal-account__item" style="padding: 10px 0px 10px 0px; ">
                           <header class="card__header card__header--has-filter" style="padding-top: 12px;padding-bottom: 12px; margin-bottom: 20px">
                <h4>Invitar</h4>
                
              </header>
                         <table id="tableinvitaciones" class="table table-hover table-standings" style="width: 100%">
                    <thead>
                      <tr>
                        <th></th>
                        <th>JUGADOR</th>
                        <th>INVITACION</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                  </table>
                        </div>
                    </div>
                </form>
                <!-- Register Form / End -->
            </div>
            {{-- <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div> --}}
            <!-- Tab: Register / End -->
        </div>
    </div>
</div>
<div class="modal fade" id="modal-config-grupo" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-lg modal--login modal--login-only" role="document">
           <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
    
          <form id="formgrupoconfig"  method="post" enctype="multipart/form-data" action="{{ route('tougrp.updateTougrp') }}" class="modal-form">
              

            <div class="modal-account-holder">
            <div id="image-preview2">
              <label for="image-upload2" id="image-label2">Tu Foto</label>
              <input type="file" name="tougrpvimgg2" id="image-upload2" />
            </div>

              <div class="modal-account__item" style="padding-bottom: 0px">
                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="tab-register2">
                    <input type="hidden" id="touinfscode-edit-hidden">
                    <input type="hidden" id="tougrpicode-edit-hidden">
                    <!-- Register Form -->
                      <div class="form-group">
                      <h5>CONFIGURAR GRUPO</h5>
                      
                        <div class="form-group">
                           <select class="select2 form-control"  id="selecttorneo-edit" style="width: 100%" name="touinfscode" required="">
                            @foreach($listaTouinf as $objTouinf)
                               <option  value="{{$objTouinf->touinfscode}}" data-image="/{{$objTouinf->touinfvlogt}}" > {{$objTouinf->touinftname }} </option>
                            @endforeach
                     
                        </select>
                      </div>
                       
                    


                       <div class="form-group">
                        <label for="">Nombre del torneo</label>
                        <input type="text"  class="form-control" required="" name="tougrptname" id="tougrptname-edit"  >
                      </div>


                      <div class="form-group">
                        <label for=""> TINCAZO mayor (Resultado y Marcador)</label>
                        <input type="number" min="3" data-toggle="just_number" @if($fechaValidar->fecha <= 0) readonly @else @endif  data-max="100" data-min_max data-min="3" onKeypress="return isNumberKey(this)" class="form-control" required="" id="tougrpsmaxp-edit" name="tougrpsmaxp" >
                      </div>
                      <div class="form-group">
                        <label for=""> TINCAZO medio (Solo Resultado)</label>

                        <input type="number" min="2" data-toggle="just_number" @if($fechaValidar->fecha <= 0) readonly @else @endif data-max="100" data-min_max data-min="2" onKeypress="return isNumberKey(this)" class="form-control" required="" id="tougrpsmedp-edit" name="tougrpsmedp"">
                      </div>
                      <div class="form-group">
                        <label for=""> TINCAZO menor (Uno de los marcadores)</label>

                        <input type="number"  min="1" data-toggle="just_number" @if($fechaValidar->fecha <= 0) readonly @else @endif data-max="100" data-min_max data-min="1" onKeypress="return isNumberKey(this)" class="form-control" required="" id="tougrpsminp-edit" name="tougrpsminp" >
                      </div>
                     <div class="form-group">
                        <label for=""> Valor x Partido <span style="color: red">de 1 a 10</span></label>

                        <input type="number" @if($validarTougrpbchva) @if($validarTougrpbchva->tougrpbchva == 0) readonly @else @endif @endif min="1" data-toggle="just_number"  data-max="10" data-min_max data-min="1" onKeypress="return isNumberKey(this)" class="form-control" required="" max="10" id="tougrpsxval-edit" name="tougrpsxval" >
                      </div>
                      <div class="form-group form-group--submit">
                         <button type="submit" class="btn btn-primary-inverse btn-block">LISTO!</button>
                      </div>
                      
                    </form>
                    <!-- Register Form / End -->
    
                  </div>
                  <!-- Tab: Register / End -->
    
                </div>
    
    
              </div>
            </div>
          </div>
</div>
            @break
         @endif
     @endforeach
     
 @endif


