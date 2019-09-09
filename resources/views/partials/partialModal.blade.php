<!-- Login/Register Tabs Modal / End -->

@if (Session::get('conmemscode') != 1)

@endif
@if (Session::has('secusricode'))







@endif
@if (Session::has('contypscode'))
@if (Session::get('contypscode') == 1)










@endif
@endif
@if(Session::has('plainficode'))




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