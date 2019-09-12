<div class="modal fade" id="modal-login-nuevo-grupo" role="dialog" tabindex="-1">
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
                <form action="{{ route('secusr.store') }}" class="modal-form" enctype="multipart/form-data"
                    id="formgrupo" method="post">
                    <div class="modal-account-holder">
                        <div id="image-preview1">
                            <label for="image-upload1" id="image-label1">
                                Tu Foto
                            </label>
                            <input id="image-upload1" name="tougrpvimgg" type="file" />
                        </div>
                        <div class="modal-account__item">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade show in active" id="tab-register1" role="tabpanel">
                                    {{ csrf_field() }}
                                    <!-- Register Form -->
                                    <div class="form-group">
                                        <h5>
                                            GESTIONAR GRUPO
                                        </h5>
                                        <div class="form-group">
                                            <input class="form-control" name="tougrptnamec"
                                                placeholder="Ingrese del nombre del grupo..." required="" type="text">
                                        </div>
                                        <div class="form-group">
                                            <select class="select2 form-control" id="selecttorneo" name="touinfscode"
                                                required="" style="width: 100%">
                                                @foreach(App\touinf::tournamentActive()->get() as $objTouinf)
                                                <option data-image="{{$objTouinf->touinfvlogt}}"
                                                    value="{{$objTouinf->touinfscode}}">
                                                    {{$objTouinf->touinftname }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12"
                                            style="display: flex; justify-content: center;">
                                            <img alt="" id="imagetorneo" src=""
                                                style=" height: auto; width: auto;max-width: 150px; max-height: 150px;">
                                        </div>
                                        <div class="form-group form-group--submit">
                                            <button class="btn btn-primary-inverse btn-block"
                                                id="crear-grupo-btn-subtmit" type="submit">
                                                Crea tu grupo
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