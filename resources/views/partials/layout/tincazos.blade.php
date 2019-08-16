<div class="col-12">
        <div class="card">
            <header class="card__header card__header--has-filter">
                <h4>TUS TINCAZOS</h4>
                <ul class="category-filter category-filter--featured nav nav-tabs">
                    <li class=" category-filter__item"><a
                            data-category="posts__item--category-1"
                            class="category-filter__link active" data-toggle="tab"
                            href="#pendientes">Pendientes</a>
                    </li>

                    <li class="category-filter__item"><a data-toggle="tab" href="#juego"
                            class="category-filter__link"
                            data-category="posts__item--category-3">En juego</a></li>
                    <li class="category-filter__item"><a data-toggle="tab" href="#finalizado"
                            class="category-filter__link"
                            data-category="posts__item--category-2">Finalizados</a></li>
                            <li class="category-filter__item refresh-button"><a style="color:#38a9ff;font-size:15px" data-toggle="tab" 
                                class="category-filter__link"
                                data-category="posts__item--category-2"><i class="fa fa-refresh"></i></a></li>
                </ul>
            </header>

            <!-- Slider -->

            <div class="tab-content">
                <div class="tab-pane fade show active" id="pendientes">
                    <div class="card__content"
                        style="height: 680px;overflow-y:  auto;">
                        <div class="game-result" id="game-result-pendientes">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="juego">
                    <div class="card__content" style="height: 680px;overflow-y:  auto;">
                        <div class="game-result" id="game-result-juego">

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="finalizado">
                    <div class="card__content"
                        style="height: 680px;overflow-y:  auto;">
                        <div class="game-result" id="game-result-finalizado">

                        </div>
                    </div>
                </div>
            </div>

            <!-- Slider / End -->

        </div>
    </div>