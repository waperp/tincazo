<div class="modal fade" id="modal-nuevo-agregar-tinzaso" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
                <h4 class="modal-title">TU TINCAZO</h4>

            </div>
            <div class="modal-body">

                <!-- Tab panes -->
                <form action="{{ route('plapre.store') }}"
                    onsubmit="document.getElementById('form-agregar-tincazo-button').disabled = 1" class="modal-form"
                    enctype="multipart/form-data" id="form-agregar-tincazo" method="post">
                    <input type="hidden" id="agregar-toufixicode-hidden">
                    <input type="hidden" id="agregar-plapreicode-hidden">
                    <div class="tab-content">
                        <div class="row">
                            <div class="col-6">
                                <figure class="primero">
                                    <img id="agregar-touteavimgt1-tincazo" style="width: auto; height: 70px;" alt="">
                                    <h6 class="game-result__team-name" id="agregar-touteatname1-tincazo"></h6>
                                    <input required="" data-toggle="just_number" id="agregar-toufixsscr1-tincazo"
                                        onKeypress="return isNumberKey(this)"
                                        style="text-align:center; 10px;text-transform: uppercase;font-weight: 700;letter-spacing: -0.02em;color: #31404b;font-size: 15px;"
                                        type="text" class="form-control">
                                </figure>
                            </div>
                            <div class="col-6">

                                <figure class="segundo">
                                    <img id="agregar-touteavimgt2-tincazo" style="width: auto; height: 70px;" alt="">
                                    <h6 class="game-result__team-name" id="agregar-touteatname2-tincazo"></h6>
                                    <input required="" data-toggle="just_number" id="agregar-toufixsscr2-tincazo"
                                        onKeypress="return isNumberKey(this)"
                                        style="text-align:center;border-radius: 10px;text-transform: uppercase; font-weight: 700;letter-spacing: -0.02em;color: #31404b;font-size: 15px;"
                                        type="text" class="form-control">

                                </figure>
                            </div>

                        </div>

                    </div>
                    <div class="form-row">
                            <div class=" col-lg-6 col-md-6 col-12 mb-1">
                                <button id="form-agregar-tincazo-button" type="submit"
                                    class="btn btn-primary-inverse btn-block ">PROCESAR!</button>
                            </div>
                            <div class=" col-lg-6 col-md-6 col-12">
                                <button data-dismiss="modal" type="button" class="btn btn-danger btn-block">CANCELAR</button>
                            </div>
                        </div>
                        </form>
            </div>
            

            <!-- Tab: Register / End -->
        </div>
    </div>
</div>