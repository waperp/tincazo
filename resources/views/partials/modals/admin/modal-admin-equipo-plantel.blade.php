<div class="modal fade" id="modal-nuevo-torneo-equipo" role="dialog" tabindex="-1">
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
                            <div class="row">
                                <div class="col-md-6" style="margin-bottom: 15px">
                                    <h5>GESTIONAR EQUIPO Y PLANTEL</h5>
                                    <select class="select2 form-control" id="selectTorneosEquipos" required="" style="width: 100%">
                                        @foreach($listaTouinf as $objTorneosEquipos)
                                        <option value="{{$objTorneosEquipos->touinfscode}}">
                                            {{$objTorneosEquipos->touinftname}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <table id="table-admin-torneo-equipo" class="table table-hover table-standings"
                                style="width: 100%">
                                <thead>
                                    <tr style="background-color: #80808099;">
                                        <th></th>
                                        <th>NOMBRE PLANTEL</th>
                                        <th>TIPO</th>
                                        <TH></TH>
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
                <!-- Register Form / End -->
            </div>
            <!-- Tab: Register / End -->
        </div>
    </div>
</div>