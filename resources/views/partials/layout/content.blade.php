<div class="tab-content widget-tabbed__tab-content col-md-12">
    <div role="tabpanel" class="tab-pane fade show active" id="TAB-1">
        <div class="content ">
            <div class="posts posts--cards post-grid row">
                <div class="post-grid__item col-12 col-sm-4 col-md-4 col-lg-3 col-xl-3">
                    @include('partials.layout.your_champion')
                </div>
                <div class="post-grid__item col-12 col-sm-4 col-md-8 col-lg-8 col-xl-8">
                    @include('partials.layout.other_champions')
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="TAB-2">
        <div class="content ">
            <div class="row">
                <div class="col-6">@include('partials.layout.table_general')</div>
                <div class="col-6">@include('partials.layout.table_day')</div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="TAB-3">
        <div class="content ">
            <div class="posts posts--cards post-grid" id="tustincazos-div">
                @include('partials.layout.tincazos')
            </div>
        </div>
    </div>
    @if (Session::has('touinf') && Session::has('tougrp'))
    @if(App\tougrp::isUserGroupAdmin() > 0)
    <div role="tabpanel" class="tab-pane fade" id="TAB-4">
        <div class="content col-md-8 offset-md-2">
            <!-- Article -->
            <div class="card">
                <div class="card__header">
                    <h4 class="text-center">CONFIGURA TU GRUPO!</h4>
                </div>
                <div class="card__content">
                    <div class="content col-md-6 offset-md-3 mb-1">
                        <div id="image-preview2" style="height: 200px;padding: 5px !important" class="image-preview">
                            <label for="image-upload2" class="image-label" id="image-label2">
                                Tu Foto
                            </label>
                            <input accept="image/*" class="image-upload" id="image-upload2" name="tougrpvimgg2"
                                type="file" />
                            <span id="file_error" style="color: red">
                            </span>
                        </div>

                        {{-- <div id="image-preview2">
                                            <label for="image-upload2" id="image-label2">Tu Foto</label>
                                            <input type="file" name="tougrpvimgg2" id="image-upload2" />
                                        </div> --}}
                    </div>
                    <form id="formgrupoconfig" method="post" enctype="multipart/form-data"
                        action="{{ route('tougrp.updateTougrp') }}" class="modal-form">

                        <input type="hidden" id="touinfscode-edit-hidden">
                        <input type="hidden" id="tougrpicode-edit-hidden">
                        <!-- Register Form -->
                        <div class="form-group col-md-6 offset-md-3">
                            <select disabled class="select2 form-control" id="selecttorneo-edit" style="width: 100%"
                                name="touinfscode" required="">
                                @foreach(App\touinf::all() as $objTouinf)
                                <option value="{{$objTouinf->touinfscode}}" data-image="/{{$objTouinf->touinfvlogt}}">
                                    {{$objTouinf->touinftname }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-6">
                                <label for="">Nombre del torneo</label>
                                <input type="text" class="form-control" required="" name="tougrptname"
                                    id="tougrptname-edit">
                            </div>
                            <div class="form-group col-6">
                                <label for=""> TINCAZO mayor (Resultado y Marcador)</label>
                                <input type="number" min="3" data-toggle="just_number"
                                    @if(App\touinf::TournamentDateValidate()->fecha
                                <= 0) readonly @else @endif data-max="100" data-min_max data-min="3"
                                    onKeypress="return isNumberKey(this)" class="form-control" required=""
                                    id="tougrpsmaxp-edit" name="tougrpsmaxp">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for=""> TINCAZO medio (Solo Resultado)</label>
                                <input type="number" min="2" data-toggle="just_number"
                                    @if(App\touinf::TournamentDateValidate()->fecha
                                <= 0) readonly @else @endif data-max="100" data-min_max data-min="2"
                                    onKeypress="return isNumberKey(this)" class="form-control" required=""
                                    id="tougrpsmedp-edit" name="tougrpsmedp">
                            </div>

                            <div class="form-group  col-6">
                                <label for=""> TINCAZO menor (Uno de los marcadores)</label>
                                <input type="number" min="1" data-toggle="just_number"
                                    @if(App\touinf::TournamentDateValidate()->fecha
                                <= 0) readonly @else @endif data-max="100" data-min_max data-min="1"
                                    onKeypress="return isNumberKey(this)" class="form-control" required=""
                                    id="tougrpsminp-edit" name="tougrpsminp">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for=""> Valor x Partido <strong style="color: red">(0 a
                                        10)</strong></label>
                                <input type="number" @if($validarTougrpbchva) @if($validarTougrpbchva->tougrpbchva == 0)
                                readonly @else @endif @endif
                                min="1" data-toggle="just_number" data-max="10" data-min_max data-min="1"
                                onKeypress="return isNumberKey(this)" class="form-control" required=""
                                max="10" id="tougrpsxval-edit" name="tougrpsxval" >
                            </div>

                            <div class="form-group col-6">
                                <label for=""> Puntos x Campeon <strong style="color: red">(0 a
                                        50)</strong></label>
                                <input type="number" min="0" max="50" data-toggle="just_number"
                                    @if(App\touinf::TournamentDateValidate()->fecha <= 0) readonly @else @endif
                                    data-max="50" data-min_max data-min="0" onKeypress="return isNumberKey(this)"
                                    class="form-control" required="" id="tougrpschpt-edit" name="tougrpschpt">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary-inverse btn-block">LISTO!</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!-- Article / End -->
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="TAB-5">
        <div class="content col-md-6 offset-md-3">
            <div class="card card--has-table">
                <div class="card__header">
                    <div class="input-group input-group-sm">
                        <input id="secusrtmail-invite" type="text" class="form-control"
                            placeholder="Correo Electronico">
                        <div class="input-group-append ">
                            <button class="btn btn-success btn-sm" id="btn-invite-email" type="button">Enviar</button>
                        </div>
                    </div>
                </div>
                <div class="card__content">
                    <div class="table-responsive col-12">
                        <table id="tableinvitaciones" style="width: 100%" class="table table--lg team-roster-table">
                            <thead>
                                <tr>
                                    <th>JUGADOR</th>
                                    <th>EMAIL</th>
                                    <th>INVITACION</th>
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
    @endif
            @endif
</div>