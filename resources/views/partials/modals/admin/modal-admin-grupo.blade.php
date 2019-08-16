<div class="modal fade" id="modal-admin-gestionar-grupo" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
                <h4 class="modal-title" id="myModalLabel">GESTIONAR GRUPOS</h4>
            </div>
            <div class="modal-body">
                <div class="row table-responsive">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <select class="select2 form-control" id="select-torneo-admin-torneos"
                                        style="width: 100%">
                                        @foreach($listaTouinfAll as $objTorneosEquipos)
                                        <option value="{{$objTorneosEquipos->touinfscode}}">
                                            {{$objTorneosEquipos->touinftname}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <table id="table-admin-gestionar-grupos" class="table table-striped table-hover"
                            style="width: 100%">
                            <thead>
                                <tr valign="middle" style="background-color: #80808099;">
                                    <th></th>
                                    <th>NOMBRE</th>
                                    <th>CREADOR</th>
                                    <th>FECHA</th>
                                    <th>TA</th>
                                    <th>TM</th>
                                    <th>TB</th>
                                    <th>JUG.</th>
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