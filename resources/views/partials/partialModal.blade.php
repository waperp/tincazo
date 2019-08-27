<!-- Login/Register Tabs Modal / End -->

@if (Session::get('conmemscode') != 1)

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
                            <aside class="widget widget--sidebar card card--has-table widget-team-stats"
                                style="height: 450px; overflow-y: scroll;overflow-x: hidden">
                                {{-- <div class="widget__title card__header">
                        <h4>ELEGIR CAMPEON</h4>
                      </div> --}}
                                <div class="widget__content card__content">
                                    <ul class="team-stats-box">

                                        @foreach (App\toutea::teamChampions() as $objEquiposELegir)

                                        @if($objEquiposELegir->touttescode != null )
                                        <li id="li-equipo-selected-{{ $objEquiposELegir->touttescode1 }}"
                                            onclick="miCampeon({{ $objEquiposELegir->touttescode1 }})"
                                            class="team-stats__item team-stats__item--clean select-gb">
                                            <div id="div-circle-selected-{{ $objEquiposELegir->touttescode1 }}"
                                                class="team-stats__icon team-stats__icon--circle-select">
                                                <img style="height: 90px"
                                                    id="img-elegir-equipo-{{ $objEquiposELegir->touttescode1 }}"
                                                    src="images/{{ $objEquiposELegir->touteavimgt }}" alt=""
                                                    class="team-stats__icon-primary">
                                            </div>
                                            <div id="equipo-elegir-name-{{ $objEquiposELegir->touttescode1 }}"
                                                class="team-stats__label"
                                                style="color: black;font-size: 14px;font-weight: 600;">
                                                {{ $objEquiposELegir->touteatname }}</div>
                                        </li>
                                        @else
                                        <li id="li-equipo-unselected-{{ $objEquiposELegir->touttescode1}}"
                                            onclick="miCampeon({{ $objEquiposELegir->touttescode1 }})"
                                            class="team-stats__item team-stats__item--clean">
                                            <div id="div-circle-unselected-{{ $objEquiposELegir->touttescode1 }}"
                                                class="team-stats__icon team-stats__icon--circle">
                                                <img style="height: 90px"
                                                    id="img-elegir-equipo-{{ $objEquiposELegir->touttescode1 }}"
                                                    src="images/{{ $objEquiposELegir->touteavimgt }}" alt=""
                                                    class="team-stats__icon-primary">
                                            </div>
                                            <div id="equipo-elegir-name-{{ $objEquiposELegir->touttescode1 }}"
                                                class="team-stats__label"
                                                style="color: black;font-size: 14px;font-weight: 600;">
                                                {{ $objEquiposELegir->touteatname }}</div>
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
                    <div class="modal-account__item" style="flex-basis: 100%">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <input type="hidden" id="filtre-touinfscode" value="0">

                            <aside class="widget widget--sidebar card card--has-table widget-team-stats">
                                <div class="widget__title card__header">
                                    <img id="title-image-campeon" style="width: 40px;height: 40px; border-radius: 50%"
                                        alt="">
                                    <h4 style="display:  inline-block;" id="title-equipo-campon"></h4>

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
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
                <h4 class="modal-title" >TU TINCAZO</h4>

            </div>
            <div class="modal-body">
                <div class="modal-account-holder">
                    {{--  <button data-toggle="modal" type="button" data-target="#modal-login-nuevo-grupo" class="btn btn-primary-inverse btn-sm btn-block">Agregar</button> --}}
                    <div class="modal-account__item" style="flex-basis: 100%;">
                        <!-- Tab panes -->

                        <form action="{{ route('plapre.store') }}"
                            onsubmit="document.getElementById('form-agregar-tincazo-button').disabled = 1"
                            class="modal-form" enctype="multipart/form-data" id="form-agregar-tincazo" method="post">
                            <input type="hidden" id="agregar-toufixicode-hidden">
                            <input type="hidden" id="agregar-plapreicode-hidden">

                            <div class="tab-content">
                                <div class="row">
                                    <div class="col-6">
                                        <figure class="primero">
                                            <img id="agregar-touteavimgt1-tincazo"
                                                style="width: auto; height: 70px;"
                                                alt="">
                                            <h6 class="game-result__team-name" id="agregar-touteatname1-tincazo"></h6>
                                            <input required="" data-toggle="just_number"
                                                id="agregar-toufixsscr1-tincazo" onKeypress="return isNumberKey(this)"
                                                style="text-align:center; 10px;text-transform: uppercase;
    font-family: 'Montserrat', sans-serif; font-weight: 700;letter-spacing: -0.02em;color: #31404b;font-size: 15px;"
                                                type="text" class="form-control">
                                        </figure>


                                    </div>
                                    <div class="col-6">

                                        <figure class="segundo">
                                            <img id="agregar-touteavimgt2-tincazo"
                                                style="width: auto; height: 70px;"
                                                alt="">
                                            <h6 class="game-result__team-name" id="agregar-touteatname2-tincazo"></h6>
                                            <input required="" data-toggle="just_number"
                                                id="agregar-toufixsscr2-tincazo" onKeypress="return isNumberKey(this)"
                                                style="text-align:center;border-radius: 10px;text-transform: uppercase;
    font-family: 'Montserrat', sans-serif; font-weight: 700;letter-spacing: -0.02em;color: #31404b;font-size: 15px;"
                                                type="text" class="form-control">

                                        </figure>
                                    </div>
                                   
                                </div>

                            </div>

                    </div>
                    <div class="form-row">
                            <div class=" col-lg-6 col-md-6 col-12 mb-1">
                                    <button id="form-agregar-tincazo-button" type="submit"
                                    class="btn btn-primary-inverse btn-block ">PROCESAR!</button>
                            </div>
                            <div class=" col-lg-6 col-md-6 col-12">
                                    <button data-dismiss="modal" type="button"
                                    class="btn btn-danger btn-block">CANCELAR</button>
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

                        <form action="{{ route('toufix.store') }}" class="modal-form" enctype="multipart/form-data"
                            id="form-edit-score" method="post">
                            <input type="hidden" id="edit-toufixicode-hidden">

                            <div class="tab-content">
                                <div class="row">
                                    <div class="col-md-12" style="margin-bottom: 15px">
                                        <h5 style="color: #41acfe;">EDITAR SCORE</h5>




                                        <div class="game-result__content" style="margin: 0px">

                                            <!-- 1st Team -->
                                            <div class="game-result__team game-result__team--first">
                                                <figure class="game-result__team-logo"
                                                    style="width: 20%;    height: 68px;">
                                                    <img id="edit-touteavimgt1" alt="">
                                                </figure>
                                                <div class="game-result__team-info" style="padding-top: 20px;">
                                                    <h5 class="game-result__team-name" id="edit-touteatname1"></h5>

                                                </div>
                                            </div>

                                            <div class="game-result__score-wrap" style="padding: 10px 0 0 0;">
                                                <div class="game-result__score game-result__score--lg"
                                                    style="font-size: 34px; line-height: 1em;margin-bottom: 0px; */">

                                                    <input data-toggle="just_number" id="edit-toufixsscr1"
                                                        onKeypress="return isNumberKey(this)"
                                                        style="width: 70px;height: 40px" type="text" name="">



                                                    <span class="game-result__score-dash"> - </span>

                                                    <input data-toggle="just_number" id="edit-toufixsscr2"
                                                        onKeypress="return isNumberKey(this)"
                                                        style="width: 70px;height: 40px" type="text" name="">
                                                </div>
                                            </div>

                                            <div class="game-result__team game-result__team--second">
                                                <figure class="game-result__team-logo"
                                                    style="width: 20%;    height: 68px;">
                                                    <img id="edit-touteavimgt2" alt="">
                                                </figure>
                                                <div class="game-result__team-info" style="padding-top: 20px;">
                                                    <h5 class="game-result__team-name" id="edit-touteatname2"></h5>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group form-group--submit" style="margin: 0">
                                            <button type="submit" style="width:  100px; margin:  auto;"
                                                class="btn btn-primary-inverse btn-block">PROCESAR!</button>
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
    <div class="modal-dialog modal-lg" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">TINCAZO</h4>
            </div>
            <div class="modal-body"> <input id="mostrar-toufixicode-hidden" type="hidden" />
                <div class="col-md-12">
                    <div class="widget__content card__content p-0">

                        <!-- Match Preview -->
                        <div class="match-preview">
                            <section class="match-preview__body">
                                {{--     <header class="match-preview__header">
                      <time class="match-preview__date" datetime="2017-05-17">Friday August 14th</time>
                      <h3 class="match-preview__title match-preview__title--lg">Quarter Finals</h3>
                    </header> --}}
                                <div class="match-preview__content p-0">

                                    <!-- 1st Team -->
                                    <div class="match-preview__team match-preview__team--first">
                                        <figure style="height: 50px" class="match-preview__team-logo">
                                            <img style="height: 50px" id="match-preview__team-img-1" alt="">
                                        </figure>
                                        <h5 class="match-preview__team-name" id="match-preview__team-name-1">Alchemists
                                        </h5>
                                        {{-- <div class="match-preview__team-info">Elric Bros School</div> --}}
                                    </div>
                                    <!-- 1st Team / End -->

                                    <div class="match-preview__vs text-center">
                                        <div class="match-preview__conj">VS</div>

                                    </div>

                                    <!-- 2nd Team -->
                                    <div class="match-preview__team match-preview__team--second">
                                        <figure style="height: 50px" class="match-preview__team-logo">
                                            <img style="height: 50px" id="match-preview__team-img-2" alt="">
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
                        <table class="table table-striped table-hover nowrap" id="table-tincazos-grupo"
                            style="width: 100%">
                            <thead>
                                <tr style="background-color: #80808099;">
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="padding-bottom: 0px">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">TINCAZO GENERAL</h4>
                <h6 id="modal-info-player-tinzaso-player-name"
                    style="margin-bottom: 0px; font-size: 13px; color: #00a6e1"></h6>

            </div>
            <div class="modal-body" style="padding-top: 0px">
                <div class="col-md-12">
                    <input type="hidden" id="modal-info-player-tinzaso-plainficode">
                    <div class="row table-responsive">
                        <table class="table table-striped table-hover nowrap" id="table-info-player-grupo"
                            style="width: 100%">
                            <thead>
                                <tr style="background-color: #80808099;">
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="padding-bottom: 0px">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">TINCAZO x DIA</h4>

            </div>
            <div class="modal-body" style="padding-top: 0px">
                <div class="col-md-12">
                    <h6 id="modal-info-player-tinzaso-dia-name"
                        style="margin-bottom: 0px; font-size: 13px; color: #00a6e1"></h6>

                    <input type="hidden" id="modal-info-player-tinzaso-plainficode-dia">
                    <div class="row table-responsive">
                        <table class="table table-striped table-hover nowrap" id="table-info-player-grupo-dia"
                            style="width: 100%">
                            <thead>
                                <tr style="background-color: #80808099;">
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










@endif
@endif
@if(Session::has('plainficode'))
<div class="modal fade" id="modal-invitaciones" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <div class="card card--has-table">
                    <div class="card__header">
                        <h4>Mis invitaciones ({{ count($listaInvitaciones) }})</h4>
                    </div>
                    <div class="card__content">

                        <div class="table-responsive">
                            <table class="table shop-table">
                                <thead>
                                    <tr>
                                        <th class="product__photo"></th>
                                        <th class="product__info">Grupo</th>
                                        <th class="product__desc visible-md visible-lg">Torneo</th>
                                        <th class="product__price">Aceptar</th>
                                        <th class="product__availability">Rechazar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listaInvitaciones as $objInvitacionesTorneos)
                                    <tr>
                                        <td class="product__photo" style="width: 12%;padding: 5px;">
                                            <figure class="product__thumb">
                                                <a><img src="/images/{{ $objInvitacionesTorneos->tougrpvimgg  }}"
                                                        alt=""></a>
                                            </figure>
                                        </td>
                                        <td class="product__info" style="font-size: 12px;">
                                            <h5 class="product__name">{{ $objInvitacionesTorneos->tougrptname }}</h5>
                                        </td>
                                        <td class="product__desc visible-md visible-lg">
                                            {{ $objInvitacionesTorneos->touinftname }}
                                        </td>
                                        <td class="product__price">
                                            <span id="aceptarInvitacion{{ $objInvitacionesTorneos->tougrpicode }}"
                                                onclick="aceptarInvitacion(2,{{ $objInvitacionesTorneos->tougrpicode }})"
                                                class="label label-success" onmouseover=""
                                                style="cursor: pointer;">Aceptar</span>

                                        </td>

                                        <td class="product__remove">
                                            <span id="rechazarInvitacion{{ $objInvitacionesTorneos->tougrpicode }}"
                                                onclick="aceptarInvitacion(0,{{ $objInvitacionesTorneos->tougrpicode }})"
                                                class="label label-danger" onmouseover=""
                                                style="cursor: pointer;">Rechazar</span>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>

        </div>


    </div>
</div>
</div>
</div>



@endif
<!-- Modal -->



@if(!Session::has('plainficode'))
{{-- <div class="modal fade" id="modal-login-register-tabs" role="dialog" tabindex="-1">
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
                                <form action="{{ action('LoginController@login') }}" class="modal-form"
id="iniciosession" method="POST">
<h5>
    INICIAR SESION
</h5>
<div class="form-group">
    <input class="form-control" id="secusrtmail" name="secusrtmail"
        placeholder="Ingrese su dirección de correo electrónico ..." required="" type="email" />

</div>
<div class="form-group">
    <input class="form-control" id="password" name="password" placeholder="Ingrese su contraseña ..." required=""
        type="password" />
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
            <a class="social-links__link social-links__link--lg social-links__link--fb"
                href="{{ route('social.auth') }}">
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
</div> --}}
{{-- <div class="modal fade" id="modal-login-register" role="dialog" tabindex="-1">
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
                <form action="{{ route('secusr.store') }}" class="modal-form" enctype="multipart/form-data"
id="formStore" method="post">
<div class="modal-account-holder">
    <div id="image-preview">
        <label for="image-upload" id="image-label">
            Tu Foto
        </label>
        <input accept="image/*" id="image-upload" name="plainfvimgp" type="file" />
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
                    <input class="form-control" id="register-secusrtmail" name="secusrtmail"
                        placeholder="Ingrese su correo electronico..." required="" type="email">
                    </input>
                </div>
                <div class="form-group">
                    <input class="form-control" id="register-plainftname" name="plainftname"
                        placeholder="Ingrese su nombre completo..." required="" type="text">
                    </input>
                </div>
                <div class="form-group">
                    <div class="input-group date" id="datetimepicker1">
                        <input class="form-control" name="plainfddobp" placeholder="Ingrese su fecha de nacimiento"
                            required="" type="text" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar">
                            </span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control pwd" id="register-secusrtpass" name="secusrtpass"
                            placeholder="ingrese su contraseña" required="" type="password" />
                        <span class="input-group-btn">
                            <button class="btn btn-primary reveal" style="padding:11px 42px" type="button">
                                <i class="glyphicon glyphicon-eye-open">
                                </i>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <select class="select2 form-control" id="selectconmemscode" name="conmemscode" required=""
                        style="width: 100%">
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <img alt="" id="imagemember" src=""
                        style="height: auto; width: auto;max-width: 50px; max-height: 50px;">
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
</div> --}}
@endif
@if(Session::has('plainficode'))
@foreach (App\tougrp::tournamentsWithGroups() as $objVerifyTorneoAdmin)
@if (Session::get('plainficode') == $objVerifyTorneoAdmin->plainficode)


@break
@endif
@endforeach

@endif