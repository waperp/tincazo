<div class="modal fade" id="modal-nuevo-torneo-equipo" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
                <h4 class="modal-title" id="myModalLabel">GESTIONAR EQUIPO Y PLANTEL</h4>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6" style="margin-bottom: 15px">
                        <select class="select2 form-control" id="selectTorneosEquipos" required="" style="width: 100%">
                            @foreach($listaTouinf as $objTorneosEquipos)
                            <option value="{{$objTorneosEquipos->touinfscode}}">
                                {{$objTorneosEquipos->touinftname}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <table id="table-admin-torneo-equipo" class="table table-hover table-standings" style="width: 100%">
                    <thead>
                        <tr style="background-color: #80808099;">
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