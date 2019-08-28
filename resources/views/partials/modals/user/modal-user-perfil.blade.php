<div class="modal fade" id="modal-edit-perfil" role="dialog"  tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Actualiza tu perfil</h4>

                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div id="edit-perfil-image-preview" class="mt-2 mb-2">
                            <label for="edit-perfil-image-upload" id="edit-perfil-image-label">
                                Tu Foto
                            </label>
                            <input id="edit-perfil-image-upload" name="edit-perfil-plainfvimgp" type="file" />
                            <span id="file_error"></span>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('secusr.store') }}" class="modal-form" enctype="multipart/form-data"
                            id="form-edit-perfil" method="post">
                            <!-- Register Form -->
                            <input type="hidden" id="edit-perfil-image-src"
                                value="{{ \Auth::user()->playerInfo()->plainfvimgp }}" />
                            <input type="hidden" id="edit-perfil-plainficode"
                                value="{{ \Auth::user()->playerInfo()->plainficode }}" />

                            <div class="form-row">
                                <div class="form-group  col-lg-6 col-md-6 col-12">
                                    <input class="form-control" id="edit-perfil-secusrtmail"
                                        value="{{ \Auth::user()->playerInfo()->secusrtmail }}" readonly=""
                                        placeholder="Ingrese su correo electronico..." required="" type="email">
                                </div>
                                <div class="form-group  col-lg-6 col-md-6 col-12">
                                    <input class="form-control" id="edit-perfil-plainftname"
                                        value="{{ \Auth::user()->playerInfo()->plainftname }}" readonly=""
                                        placeholder="Ingrese su nombre completo..." required="" type="text">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group  col-lg-6 col-md-6 col-12">
                                    <input class="form-control" id="edit-perfil-plainftnick"
                                        value="{{ \Auth::user()->playerInfo()->plainftnick }}"
                                        placeholder="Ingrese su nick name..." required="" type="text">
                                </div>
                                <div class="form-group  col-lg-6 col-md-6 col-12">
                                    <div class="input-group date" id="edit-perfil-datetimepicker1">
                                        <input class="form-control" id="edit-perfil-plainfddobp"
                                            value="{{ Carbon\Carbon::parse(\Auth::user()->playerInfo()->plainfddobp)->format('d-m-Y')  }}"
                                            placeholder="Ingrese su fecha de nacimiento" type="text" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar">
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12 col-lg-12 col-md-12" style="text-align:center;">
                                    <label class="radio-inline">
                                        <input name="edit-perfil-plainftgder" @if(
                                            \Auth::user()->playerInfo()->plainftgder
                                        ==
                                        "M") checked="checked" @else @endif type="radio" value="M">
                                        Hombre
                                    </label>
                                    <label class="radio-inline">
                                        <input name="edit-perfil-plainftgder" @if(
                                            \Auth::user()->playerInfo()->plainftgder
                                        ==
                                        "F") checked="checked" @else @endif type="radio" value="F">
                                        Mujer
                                    </label>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form-group  col-lg-6 col-md-6 col-12">
                                    <input type="password" class="form-control pwd" placeholder="Nueva contraseña"
                                        name="password" id="edit-perfil-secusrtpass1">
                                </div>
                                <div class="form-group  col-lg-6 col-md-6 col-12">
                                    <input type="password" class="form-control pwd"
                                        placeholder="Repetir nueva contraseña" name="confirmPassword"
                                        id="edit-perfil-secusrtpass2">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class=" col-lg-6 col-md-6 col-12 mb-3">
                                    <button class="btn btn-primary-inverse btn-block" type="submit">
                                        Actualizar
                                    </button>
                                </div>
                                <div class=" col-lg-6 col-md-6 col-12 mb-3">
                                    <button type="button" class="btn btn-danger btn-block"
                                        data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Register Form / End -->
            </div>
            <!-- Tab: Register / End -->
        </div>
    </div>
</div>