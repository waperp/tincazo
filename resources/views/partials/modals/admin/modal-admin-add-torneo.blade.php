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
                <form action="{{ route('touinf.store') }}" class="modal-form" enctype="multipart/form-data"
                    id="form-admin-torneo" method="post">
                    <input type="hidden" name="touinfscode" id="touinfscode">
                    <input type="hidden" name="tipo" id="tipo" value="0">

                    <div class="modal-account-holder">
                        <div id="image-preview-admin-torneo">
                            <label for="image-upload-admin-torneo" id="image-label-admin-torneo">
                                Tu Foto
                            </label>
                            <input id="image-upload-admin-torneo" class="c" name="touinfvlogt" type="file" />
                        </div>
                        <div class="modal-account__item">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade show in active" id="tab-register1" role="tabpanel">

                                    <div class="form-group">
                                        <h5 id="title-admin-torneo">
                                            AGREGAR TORNEO
                                        </h5>
                                        <div class="form-group">
                                            <input class="form-control c" id="touinftname"
                                                placeholder="Ingrese del nombre del torneo..." required="" type="text">
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group date" id="datetimepicker2">
                                                <input class="form-control c" id="touinfdstat"
                                                    placeholder="Ingrese su fecha inicio" required="" type="text" />
                                                    <div class="input-group-addon input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group date" id="datetimepicker3">
                                                <input class="form-control c" id="touinfdendt"
                                                    placeholder="Ingrese su fecha fin" required="" type="text" />
                                                    <div class="input-group-addon input-group-append">
                                                            <div class="input-group-text">
                                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control c" id="touinfsnumt"
                                                placeholder="Ingrese el numero de equipo..." required="" type="number">
                                        </div>
                                        <div class="form-group form-group--submit">
                                            <button class="btn btn-primary-inverse btn-block" id="procesar"
                                                type="submit">
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