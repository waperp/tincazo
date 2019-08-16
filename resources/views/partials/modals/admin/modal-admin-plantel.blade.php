<div class="modal fade" id="modal-nuevo-equipo" role="dialog" tabindex="-1">
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
                    {{--  <button data-toggle="modal" type="button" data-target="#modal-login-nuevo-grupo" class="btn btn-primary-inverse btn-sm btn-block">Agregar</button> --}}
                    <div class="modal-account__item" style="flex-basis: 100%;">
                        <!-- Tab panes -->
                        <div class="tab-content">

                            <input type="hidden" id="filtre-touinfscode" value="0">
                            <h5>GESTIONAR PLANTEL</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="select2 form-control" id="select-modal-nuevo-equipo"
                                            style="width: 100%">
                                            @foreach($listaTipoPlantel as $onjListaTipoPlante)
                                            <option value="{{$onjListaTipoPlante->contypscode}}">
                                                {{$onjListaTipoPlante->contyptdesc}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table id="table-admin-equipo" class="table table-hover table-standings"
                                    style="width: 100%">
                                    <thead>
                                        <tr style="background-color: #80808099;">
                                            <th></th>
                                            <th>NOMBRE PLANTEL</th>
                                            <th>ABREVIATURA</th>
                                            <th>TIPO</th>
                                            <TH></TH>
                                            <TH></TH>

                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Register Form / End -->
            </div>
            <!-- Tab: Register / End -->
        </div>
    </div>
</div>