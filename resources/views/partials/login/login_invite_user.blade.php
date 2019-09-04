@extends('layout.welcome_test')
@section('content')
<div class="site-content">
    <div class="container">
        <div class="row">
            <!-- Content -->
            <div class="content col-md-6 offset-md-3">
                <!-- Article -->
                <div class="card">
                    <div class="card__header">
                        <h4 class="text-center">REGISTRATE AHORA!</h4>
                    </div>
                    <div class="card__content">
                        <div class="content col-md-6 offset-md-3 mb-1">
                            <div id="image-preview" style="height: 200px;padding: 5px !important" class="image-preview">
                                <label for="image-upload" class="image-label" id="image-label">
                                    Tu Foto
                                </label>
                                <input accept="image/*" class="image-upload" id="image-upload" name="plainfvimgp"
                                    type="file" />
                                <span id="file_error" style="color: red">
                                </span>
                            </div>
                        </div>
                        <!-- Register Form -->
                        <form action="{{ route('secusr.store') }}" class="modal-form" enctype="multipart/form-data"
                            id="register-invite" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <input type="hidden" id="group" value="{{ $tougrp->secconnuuid }}" name="group">
                                    <input class="form-control " id="register-secusrtmail" name="secusrtmail"
                                        placeholder="Ingrese su correo electronico..." value="{{ $secusrtmail }}" required="" type="email" />
                                </div>
                                <div class="form-group col-6">
                                    <input class="form-control " id="register-plainftname" name="plainftname"
                                        placeholder="Ingrese su nombre completo..." required="" type="text" />
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                            <div class="input-group date" id="datetimepicker1">
                                                    <input class="form-control" name="plainfddobp" placeholder="Ingrese su fecha de nacimiento" required="" type="text"/>
                                                    <div class="input-group-addon input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                            </div>
                                                        </div>
        
                                                </div>
                                    </div> --}}
                                    
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control pwd" id="register-secusrtpass" name="secusrtpass"
                                        placeholder="ingrese su contraseña" required="" type="password" />
                                    <div class="input-group-append">
                                        <button class="btn btn-primary reveal btn-sm" type="button">
                                            <i class="fa fa-eye">
                                            </i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="select2 form-control" id="selectconmemscode" name="conmemscode"
                                    required="" style="width: 100%">
                                </select>
                            </div>
                            <div class="custom-control custom-checkbox text-center">
                                <input required type="checkbox" class="custom-control-input" id="termsConditionsCheck1">
                                <label style="font-size: 9px" class="custom-control-label"
                                    for="termsConditionsCheck1">He leído y acepto los <a
                                        style="text-decoration-line: underline" target="_blank"
                                        href="/TerminosCondiciones">Terminos y Condiciones </a></label>
                            </div>
                            <div style="display: none" class="lds-ring">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                            <div class="form-group form-group--submit">
                                <button id="form-button-register" class="btn btn-primary-inverse btn-block"
                                    type="submit">
                                    Crea tu cuenta
                                </button>
                            </div>
                            {{-- <div class="modal-form--social">
                                                <h6>or Login with your social profile:</h6>
                                                <ul class="social-links social-links--btn text-center">
                                                    <li class="social-links__item">
                                                        <a href="#"
                                                            class="social-links__link social-links__link--lg social-links__link--fb"><i
                                                                class="fa fa-facebook"></i></a>
                                                    </li>
                                                    <li class="social-links__item">
                                                        <a href="#"
                                                            class="social-links__link social-links__link--lg social-links__link--twitter"><i
                                                                class="fa fa-twitter"></i></a>
                                                    </li>
                                                    <li class="social-links__item">
                                                        <a href="#"
                                                            class="social-links__link social-links__link--lg social-links__link--gplus"><i
                                                                class="fa fa-google-plus"></i></a>
                                                    </li>
                                                </ul>
                                            </div> --}}
                        </form><!-- Register Form / End -->
                    </div>
                </div>
                <!-- Article / End -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="/js/register_app.js?v={{ time() }}"></script>

@endsection