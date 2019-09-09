<div class="modal fade" id="modal-edit-score" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="">EDITAR SCORE</h4>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('toufix.store') }}" class="modal-form" enctype="multipart/form-data"
                    id="form-edit-score" method="post">
                    <input type="hidden" id="edit-toufixicode-hidden">
                    <div class="row">
                        <div class="col-6">
                            <figure class="primero">
                                <img id="edit-touteavimgt1" style="width: auto; height: 70px;" alt="">
                                <h6 class="game-result__team-name" id="edit-touteatname1"></h6>
                                <input required="" data-toggle="just_number" id="edit-toufixsscr1"
                                    onKeypress="return isNumberKey(this)"
                                    style="text-align:center; 10px;text-transform: uppercase;font-weight: 700;letter-spacing: -0.02em;color: #31404b;font-size: 15px;"
                                    type="text" class="form-control">
                            </figure>
                        </div>
                        <div class="col-6">

                            <figure class="segundo">
                                <img id="edit-touteavimgt2" style="width: auto; height: 70px;" alt="">
                                <h6 class="game-result__team-name" id="edit-touteatname2"></h6>
                                <input required="" data-toggle="just_number" id="edit-toufixsscr2"
                                    onKeypress="return isNumberKey(this)"
                                    style="text-align:center; 10px;text-transform: uppercase;font-weight: 700;letter-spacing: -0.02em;color: #31404b;font-size: 15px;"
                                    type="text" class="form-control">
                            </figure>
                        </div>

                    </div>

                    <div class="form-group form-group--submit">
                        <button type="submit" class="btn btn-primary-inverse btn-block">PROCESAR!</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Register Form / End -->
    </div>
    <!-- Tab: Register / End -->
</div>