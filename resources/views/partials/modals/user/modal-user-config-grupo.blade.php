{{-- <div class="modal fade" id="modal-config-grupo" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal--login modal--login-only" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="formgrupoconfig" method="post" enctype="multipart/form-data"
                    action="{{ route('tougrp.updateTougrp') }}" class="modal-form">
                    <div class="modal-account-holder">
                        <div id="image-preview2">
                            <label for="image-upload2" id="image-label2">Tu Foto</label>
                            <input type="file" name="tougrpvimgg2" id="image-upload2" />
                        </div>
                        <div class="modal-account__item" style="padding-bottom: 0px">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show in active" id="tab-register2">
                                    <input type="hidden" id="touinfscode-edit-hidden">
                                    <input type="hidden" id="tougrpicode-edit-hidden">
                                    <!-- Register Form -->

                                    <div class="form-group">
                                        <select disabled class="select2 form-control" id="selecttorneo-edit"
                                            style="width: 100%" name="touinfscode" required="">
                                            @foreach(App\touinf::all() as $objTouinf)
                                            <option value="{{$objTouinf->touinfscode}}"
                                                data-image="/{{$objTouinf->touinfvlogt}}">
                                                {{$objTouinf->touinftname }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nombre del torneo</label>
                                        <input type="text" class="form-control" required="" name="tougrptname"
                                            id="tougrptname-edit">
                                    </div>
                                    <div class="form-group">
                                        <label for=""> TINCAZO mayor (Resultado y Marcador)</label>
                                        <input type="number" min="3" data-toggle="just_number" @if(App\touinf::TournamentDateValidate()->fecha
                                        <= 0) readonly @else @endif data-max="100" data-min_max data-min="3"
                                            onKeypress="return isNumberKey(this)" class="form-control" required=""
                                            id="tougrpsmaxp-edit" name="tougrpsmaxp">
                                    </div>
                                    <div class="form-group">
                                        <label for=""> TINCAZO medio (Solo Resultado)</label>
                                        <input type="number" min="2" data-toggle="just_number" @if(App\touinf::TournamentDateValidate()->fecha
                                        <= 0) readonly @else @endif data-max="100" data-min_max data-min="2"
                                            onKeypress="return isNumberKey(this)" class="form-control" required=""
                                            id="tougrpsmedp-edit" name="tougrpsmedp">
                                    </div>
                                    <div class=" form-group">
                                        <label for=""> TINCAZO menor (Uno de los marcadores)</label>
                                        <input type="number" min="1" data-toggle="just_number" @if(App\touinf::TournamentDateValidate()->fecha
                                        <= 0) readonly @else @endif data-max="100" data-min_max data-min="1"
                                            onKeypress="return isNumberKey(this)" class="form-control" required=""
                                            id="tougrpsminp-edit" name="tougrpsminp">
                                    </div>
                                    <div class="form-row">
                                        <label for=""> Valor x Partido <strong style="color: red">(0 a
                                                10)</strong></label>
                                        <input type="number" @if($validarTougrpbchva)
                                            @if($validarTougrpbchva->tougrpbchva == 0) readonly @else @endif @endif
                                        min="1" data-toggle="just_number" data-max="10" data-min_max data-min="1"
                                        onKeypress="return isNumberKey(this)" class="form-control" required=""
                                        max="10" id="tougrpsxval-edit" name="tougrpsxval" >
                                    </div>

                                    <div class="form-group">
                                        <label for=""> Puntos x Campeon <strong style="color: red">(0 a
                                                50)</strong></label>
                                        <input type="number" min="0" max="50" data-toggle="just_number"
                                            @if(App\touinf::TournamentDateValidate()->fecha <= 0) readonly @else @endif data-max="50"
                                            data-min_max data-min="0" onKeypress="return isNumberKey(this)"
                                            class="form-control" required="" id="tougrpschpt-edit" name="tougrpschpt">
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                        <button type="submit" class="btn btn-primary-inverse btn-block">LISTO!</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}