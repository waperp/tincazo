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
                <form action="{{ route('tougrp.adminUpdateTougrp') }}" class="modal-form" enctype="multipart/form-data"
                    id="form-admin-gestionar-grupo-add" method="post">
                    <div class="modal-account-holder">
                        <div id="image-preview5">
                            <label for="image-upload5" id="image-label5">
                                Tu Foto
                            </label>
                            <input id="image-upload5" name="admin-gestionar-grupo-tougrpvimgg" type="file" />
                        </div>
                        <div class="modal-account__item">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade show in active" id="tab-register2" role="tabpanel">
                                    <input id="admin-gestionar-grupo-touinfscode-hidden" type="hidden" />
                                    <input id="admin-gestionar-grupo-tougrpicode-hidden" type="hidden" />
                                    <input id="admin-gestionar-grupo-tipo" type="hidden" />
                                    <!-- Register Form -->

                               
                                    <div class="form-group">
                                            <label for="">
                                                Responsable
                                            </label>
                                            <select required="" class="select2 form-control"
                                                id="select-admin-gestionar-grupo-securs" style="width: 100%">
                                            </select>
                                        </div>
                                    <div class="form-group">

                                        <input class="form-control form-control-sm modify" id="admin-gestionar-grupo-touinftname" readonly=""
                                            required="" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="">
                                            Nombre del grupo
                                        </label>
                                        <input class="form-control form-control-sm modify" id="admin-gestionar-grupo-tougrptname" required=""
                                            type="text">
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-md-6 mb-3">
                                            <label for="">
                                                TA
                                            </label>
                                            <input class="form-control form-control-sm modify" data-max="100000" data-min="0" data-min_max=""
                                                data-toggle="just_number" id="admin-gestionar-grupo-tougrpsmaxp"
                                                value="0" min="0" onkeypress="return isNumberKey(this)" required=""
                                                type="number">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">
                                                tM
                                            </label>
                                            <input class="form-control form-control-sm modify" data-max="100000" data-min="0" data-min_max=""
                                                data-toggle="just_number" id="admin-gestionar-grupo-tougrpsmedp"
                                                value="0" min="0" onkeypress="return isNumberKey(this)" required=""
                                                type="number">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">
                                                TB
                                            </label>
                                            <input class="form-control form-control-sm modify" data-max="100000" data-min="0" data-min_max=""
                                                data-toggle="just_number" id="admin-gestionar-grupo-tougrpsminp"
                                                value="0" min="0" onkeypress="return isNumberKey(this)" required=""
                                                type="number">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">
                                                Valor x Partido
                                            </label>
                                            <input class="form-control form-control-sm modify" data-max="10" data-min="0" data-min_max=""
                                                data-toggle="just_number" id="admin-gestionar-grupo-tougrpsxval"
                                                value="1" min="1" max="10" onkeypress="return isNumberKey(this)"
                                                required="" type="number">
                                        </div>
                                    </div>
                                    <div class="form-row form-group--submit">
                                        <div class="col-6">
                                                <button class="btn btn-primary-inverse btn-block" type="submit">
                                                        LISTO!
                                                    </button>
                                        </div>
                                        <div class="col-6">
                                        
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