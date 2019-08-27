<div class="modal fade" id="modal-nuevo-equipo" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title" id="">GESTIONAR PLANTEL</h4>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="filtre-touinfscode" value="0">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="select2 form-control" id="select-modal-nuevo-equipo" style="width: 100%">
                                @foreach($listaTipoPlantel as $onjListaTipoPlante)
                                <option value="{{$onjListaTipoPlante->contypscode}}">
                                    {{$onjListaTipoPlante->contyptdesc}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                        <table id="table-admin-equipo" class="table table-hover table-standings" style="width: 100%">
                            <thead>
                                <tr style="background-color: #80808099;">
                                    <th>PLANTEL</th>
                                    <th>ABREV.</th>
                                    <th>TIPO</th>
                                    <TH></TH>
                                    <TH></TH>

                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                </div>

                <!-- Register Form / End -->
            </div>
            <!-- Tab: Register / End -->
        </div>
    </div>
</div>