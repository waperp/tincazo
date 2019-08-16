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
                <form action="{{ route('toutea.store') }}" class="modal-form" enctype="multipart/form-data"
                    id="form-admin-equipo" method="post">
                    <input type="hidden" name="touteascode" id="touteascode">
                    <input type="hidden" name="tipo" id="tipo-equipo" value="0">

                    <div class="modal-account-holder">
                        <div id="image-preview-admin-equipo">
                            <label for="image-upload-admin-equipo" id="image-label-admin-equipo">
                                Tu Foto
                            </label>
                            <input id="image-upload-admin-equipo" class="c" name="touteavimgt" type="file" />
                        </div>
                        <div class="modal-account__item">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade show in active" id="tab-register1" role="tabpanel">

                                    <div class="form-group">
                                        <h5 id="title-admin-equipo">
                                            AGREGAR PLANTEL
                                        </h5>
                                        <div class="form-group">
                                            <input class="form-control c" id="touteatname"
                                                placeholder="Ingrese del nombre del equipo..." required="" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control c" id="touteatabrv"
                                                placeholder="Ingrese abreviatura del equipo..." required="" type="text">
                                        </div>
                                        <div class="form-group">
                                            <select class="select2 form-control" id="contypscode" required=""
                                                style="width: 100%">
                                                @foreach($listaContypEquipos as $objContypEquipos)
                                                <option value="{{$objContypEquipos->contypscode}}">
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