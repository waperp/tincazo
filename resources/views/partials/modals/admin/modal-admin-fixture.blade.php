<div class="modal fade" id="modal-gestionar-fixture" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
                <h4 class="modal-title" id="myModalLabel">GESTIONAR FIXTURE</h4>

            </div>
            <div class="modal-body">

                <div class="row table-responsive">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <select class="select2 form-control" id="select-torneo-fixture" style="width: 100%">
                                        @foreach($listaTouinf as $objTorneosEquipos)
                                        <option value="{{$objTorneosEquipos->touinfscode}}">
                                            {{$objTorneosEquipos->touinftname}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group date" id="datetimepicker-fixture">
                                        <input class="form-control" id="date-toufixdplay"
                                            placeholder="Ingrese una fecha" type="text" />
                                            <div class="input-group-addon input-group-append">
                                                    <div class="input-group-text">
                                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <table id="table-fixture" class="table table-hover table-standings" style="width: 100%">
                            <thead>
                                <tr style="background-color: #80808099;">
                                    <th>HORA</th>
                                    <th></th>
                                    <th></th>
                                    <th>PARTIDO</th>
                                    <th></th>
                                    <th></th>
                                    <th>ESTADO</th>
                                    <th>VALOR</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
</div>