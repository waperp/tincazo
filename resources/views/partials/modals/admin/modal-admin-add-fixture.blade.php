<div class="modal fade" id="modal-admin-add-fixture" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" style="width: 550px" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('toufix.store') }}" class="modal-form" enctype="multipart/form-data"
                    id="form-admin-toufix" method="post">


                    <div class="modal-account-holder">
                        {{-- <div id="image-preview-admin-equipo">
                                <label for="image-upload-admin-equipo" id="image-label-admin-equipo">
                                    
                                </label>
                                <input id="image-upload-admin-equipo" class="c" name="touteavimgt" type="file"/>
                            </div> --}}
                        <div class="modal-account__item">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade show in active" id="tab-register1" role="tabpanel">
                                    <div class="form-group">
                                        <h5 id="title-admin-equipo">
                                            ASIGNACION
                                        </h5>
                                        <div class="form-group">
                                            <input class="form-control" id="toufixicode-hidden" type="hidden">
                                            <input class="form-control" id="select-toufixdplay-hidden" type="hidden">
                                            <input class="form-control" id="select-touinfscode-hidden" type="hidden">
                                            <input class="form-control" id="toufixicode-tipo" type="hidden">
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group date" id="datetimepicker-toufixdplay">
                                                    <input id="dates-toufixdplay" class="form-control"
                                                        placeholder="Ingrese una fecha" type="text" />
                                                    <div class="input-group-addon input-group-append">
                                                        <div class="input-group-text">
                                                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="input-group date" id="datetimepicker-toufixthour">
                                                    <input id="dates-toufixthour" class="form-control"
                                                        placeholder="Ingrese una hora" type="text" />
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-time">
                                                        </span>
                                                    </span>
                                                    <div class="input-group-addon input-group-append">
                                                        <div class="input-group-text">
                                                            <i class="glyphicon glyphicon-time fa fa-clock-o"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-5 mb-3">
                                                <select class="select2 form-control" id="select-touteascode1"
                                                    required="" style="width: 100%"></select>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <div><img src="images/versus.png" style="width: 35px;display:block;
                                                    margin:auto;" alt=""></div>
                                            </div>
                                            <div class="col-md-5 mb-3">
                                                <select class="select2 form-control" id="select-touteascode2"
                                                    required="" style="width: 100%"></select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" value="1"
                                                data-toggle="just_number" onKeypress="return isNumberKey(this)"
                                                id="toufix-toufixyxval">
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