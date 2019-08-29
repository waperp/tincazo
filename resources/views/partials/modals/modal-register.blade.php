<div class="modal fade" id="modal-login-register" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal--login modal--login-only" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="modal-account-holder">
                    <div id="image-preview" class="image-preview">
                        <label for="image-upload" class="image-label" id="image-label">
                            Tu Foto
                        </label>
                        <input accept="image/*" class="image-upload" id="image-upload" name="plainfvimgp" type="file" />
                        <span id="file_error" style="color: red">
                        </span>
                    </div>
                    <div class="modal-account__item">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- Tab: Login -->
                            <div role="tabpanel" class="tab-pane fade show active" id="tab-register-1">
                                <!-- Login Form -->
                                <form action="{{ route('secusr.store') }}" class="modal-form"
                                    enctype="multipart/form-data" id="formStore" method="post">
                                    @csrf
                                    <h5>Registrate Ahora!</h5>
                                    <div class="form-group">
                                        <input class="form-control " id="register-secusrtmail" name="secusrtmail"
                                            placeholder="Ingrese su correo electronico..." required="" type="email" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control " id="register-plainftname" name="plainftname"
                                            placeholder="Ingrese su nombre completo..." required="" type="text" />
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
                                        <input required type="checkbox" class="custom-control-input"
                                            id="termsConditionsCheck1">
                                        <label style="font-size: 9px" class="custom-control-label"
                                            for="termsConditionsCheck1">He leído y acepto los <a
                                                style="text-decoration-line: underline" target="_blank"
                                                href="/TerminosCondiciones">Termino Condiciones </a></label>
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
                                </form>
                                <!-- Login Form / End -->

                            </div>
                            <!-- Tab: Login / End -->

                            <!-- Tab: Register -->
                            {{-- <div role="tabpanel" class="tab-pane fade" id="tab-register-register">
		
                                    <!-- Register Form -->
                                    <div style="height: 285px;overflow-y:  auto; margin: -20px">
                                            @include('partials.layout.terminoscondiciones')
                                    </div>
                                    <!-- Register Form / End -->
                                </div> --}}
                            <!-- Tab: Register / End -->

                        </div>

                        <!-- Nav tabs -->
                        {{-- <div class="nav-tabs-login-wrapper">
                                <ul class="nav nav-tabs nav-justified nav-tabs--login" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" href="#tab-register-1" role="tab" data-toggle="tab">Registro</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#tab-register-register" role="tab" data-toggle="tab">Termino y condiciones</a></li>
                                </ul>
                            </div> --}}
                        <!-- Nav tabs / End -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>