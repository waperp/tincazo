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
                                <input accept="image/*" class="image-upload" id="image-upload" name="plainfvimgp" type="file"/>
                                <span id="file_error" style="color: red">
                                </span>
                            </div>
                    <div class="modal-account__item">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- Tab: Login -->
                            <div role="tabpanel" class="tab-pane fade show active" id="tab-register">
                                <!-- Login Form -->
                                <form action="{{ route('secusr.store') }}" class="modal-form" enctype="multipart/form-data" id="formStore" method="post">
                                    @csrf
                                    <h5>Registrate Ahora!</h5>
                                    <div class="form-group">
                                        <input class="form-control " id="register-secusrtmail" name="secusrtmail" placeholder="Ingrese su correo electronico..." required="" type="email"/>
                                    </div>
                                    <div class="form-group">
                                            <input class="form-control " id="register-plainftname" name="plainftname" placeholder="Ingrese su nombre completo..." required="" type="text"/>
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
                                                <input class="form-control pwd" id="register-secusrtpass" name="secusrtpass" placeholder="ingrese su contraseña" required="" type="password"/>
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary reveal btn-sm" type="button">
                                                        <i class="fa fa-eye">
                                                        </i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <select class="select2 form-control" id="selectconmemscode" name="conmemscode" required="" style="width: 100%">
                                                </select>
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

                            <!-- Tab: Register / End -->

                        </div>

                        <!-- Nav tabs -->

                        <!-- Nav tabs / End -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>