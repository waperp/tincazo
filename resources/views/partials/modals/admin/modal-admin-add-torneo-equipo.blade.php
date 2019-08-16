<div class="modal fade" id="modal-admin-add-torneo-equipo" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" style="width: 550px" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('toutea.store') }}" class="modal-form" enctype="multipart/form-data"
                    id="form-admin-torneo-equipo" method="post">


                    <div class="modal-account-holder">
                        {{-- <div id="image-preview-admin-equipo">
                                <label for="image-upload-admin-equipo" id="image-label-admin-equipo">
                                    
                                </label>
                                <input id="image-upload-admin-equipo" class="c" name="touteavimgt" type="file"/>
                            </div> --}}
                        <div class="modal-account__item">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-register1" role="tabpanel">

                                    <div class="form-group">
                                        <h5 id="title-admin-equipo">
                                            ASIGNACION TORNEOS Y EQUIPOS
                                        </h5>
                                        <div class="form-group">
                                            <input class="form-control" id="touinfscode-select" type="hidden">
                                            <input class="form-control" readonly="" id="touinftname-select" required=""
                                                type="text" />

                                        </div>

                                        <div class="form-group">
                                            <select class="select2 form-control" id="contypscode1" required=""
                                                style="width: 100%">
                                                @foreach($listaContypEquipos as $objContypEquipos)
                                                <option value="{{$objContypEquipos->contypscode}}">
                                                    {{$objContypEquipos->contyptdesc}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="select2 form-control" id="select-torneo-equipo" multiple=""
                                                required="" style="width: 100%">
                                                @foreach($listaToutea as $objToutea)
                                                <option value="{{$objToutea->touteascode}}">
                                                    {{$objToutea->touteatname}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group form-group--submit">
                                            <button class="btn btn-primary-inverse btn-block" type="submit">
                                                PROCESAR
                                            </button>
                                            <button data-toggle="modal" data-target="#modal-nuevo-torneo-equipo"
                                                data-dismiss="modal" class="btn btn-danger btn-block" type="button">
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