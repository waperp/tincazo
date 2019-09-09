<div class="modal fade" id="modal-elegir-campeon" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <h4 class="modal-title" id="">ELEGIR CAMPEON</h4>

                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                    <span aria-hidden="true">
                        ×
                    </span>
                </button>
            </div>
            <div class="modal-body">
                
                            <aside class="widget widget--sidebar card card--has-table widget-team-stats"
                                style="height: 450px; overflow-y: scroll;overflow-x: hidden">
                                {{-- <div class="widget__title card__header">
                        <h4>ELEGIR CAMPEON</h4>
                      </div> --}}
                                <div class="widget__content card__content">
                                    <ul class="team-stats-box">

                                        @foreach (App\toutea::teamChampions() as $objEquiposELegir)

                                        @if($objEquiposELegir->touttescode != null )
                                        <li id="li-equipo-selected-{{ $objEquiposELegir->touttescode1 }}"
                                            onclick="miCampeon({{ $objEquiposELegir->touttescode1 }})"
                                            class="team-stats__item team-stats__item--clean select-gb">
                                            <div id="div-circle-selected-{{ $objEquiposELegir->touttescode1 }}"
                                                class="team-stats__icon team-stats__icon--circle">
                                                <img style="height: 90px"
                                                    id="img-elegir-equipo-{{ $objEquiposELegir->touttescode1 }}"
                                                    src="images/{{ $objEquiposELegir->touteavimgt }}" alt=""
                                                    class="team-stats__icon-primary">
                                            </div>
                                            <div id="equipo-elegir-name-{{ $objEquiposELegir->touttescode1 }}"
                                                class="team-stats__label"
                                                style="color: black;font-size: 14px;font-weight: 600;">
                                                {{ $objEquiposELegir->touteatname }}</div>
                                        </li>
                                        @else
                                        <li id="li-equipo-unselected-{{ $objEquiposELegir->touttescode1}}"
                                            onclick="miCampeon({{ $objEquiposELegir->touttescode1 }})"
                                            class="team-stats__item team-stats__item--clean">
                                            <div id="div-circle-unselected-{{ $objEquiposELegir->touttescode1 }}"
                                                class="team-stats__icon team-stats__icon--circle">
                                                <img style="height: 90px"
                                                    id="img-elegir-equipo-{{ $objEquiposELegir->touttescode1 }}"
                                                    src="images/{{ $objEquiposELegir->touteavimgt }}" alt=""
                                                    class="team-stats__icon-primary">
                                            </div>
                                            <div id="equipo-elegir-name-{{ $objEquiposELegir->touttescode1 }}"
                                                class="team-stats__label"
                                                style="color: black;font-size: 14px;font-weight: 600;">
                                                {{ $objEquiposELegir->touteatname }}</div>
                                        </li>
                                        @endif

                                        @endforeach



                                    </ul>
                                </div>
                            </aside>
                 
                <!-- Register Form / End -->
            </div>
            <!-- Tab: Register / End -->
        </div>
    </div>
</div>