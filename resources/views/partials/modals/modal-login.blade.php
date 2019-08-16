<div class="modal fade" id="modal-login-register-tabs" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal--login modal--login-only" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="modal-account-holder">
                    <div class="modal-account__item modal-account__item--logo">
                    </div>
                    <div class="modal-account__item">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- Tab: Login -->
                            <div role="tabpanel" class="tab-pane fade show active" id="tab-login">
                                <!-- Login Form -->
                                <form action="{{ action('LoginController@login') }}" id="iniciosession" method="POST"
                                    class="modal-form">
                                    @csrf
                                    <h5>Ingrese a su cuenta</h5>
                                    <div class="form-group">
                                        <input class="form-control" id="secusrtmail" name="secusrtmail"
                                            placeholder="Ingrese su dirección de correo electrónico ..." required=""
                                            type="email" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" id="password" name="password"
                                            placeholder="Ingrese su contraseña ..." required="" type="password" />
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
                                    <div class="form-group form-group--pass-reminder">

                                        <a OnClick="validateMail()">Olvidastes tu contraseña?</a>
                                    </div>
                                    <div class="form-group form-group--submit">

                                        <button id="form-login-button-submit" class="btn btn-primary-inverse btn-block"
                                            type="submit">
                                            Ingrese a su cuenta
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