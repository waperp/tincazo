<div class="modal fade" id="modal-invitaciones" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="card card--has-table">
                    <div class="card__header">
                        <h4>Mis invitaciones ({{ count($listaInvitaciones) }})</h4>
                    </div>
                    <div class="card__content">
                        <div class="table-responsive">
                            <table class="table shop-table">
                                <thead>
                                    <tr>
                                        <th class="product__photo"></th>
                                        <th class="product__info">Grupo</th>
                                        <th class="product__desc visible-md visible-lg">Torneo</th>
                                        <th class="product__price">Aceptar</th>
                                        <th class="product__availability">Rechazar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listaInvitaciones as $objInvitacionesTorneos)
                                    <tr>
                                        <td class="product__photo" style="width: 12%;padding: 5px;">
                                            <figure class="product__thumb">
                                                <a><img src="/images/{{ $objInvitacionesTorneos->tougrpvimgg  }}"
                                                        alt=""></a>
                                            </figure>
                                        </td>
                                        <td class="product__info" style="font-size: 12px;">
                                            <h5 class="product__name">{{ $objInvitacionesTorneos->tougrptname }}</h5>
                                        </td>
                                        <td class="product__desc visible-md visible-lg">
                                            {{ $objInvitacionesTorneos->touinftname }}
                                        </td>
                                        <td class="product__price">
                                            <span id="aceptarInvitacion{{ $objInvitacionesTorneos->tougrpicode }}"
                                                onclick="aceptarInvitacion(2,{{ $objInvitacionesTorneos->tougrpicode }})"
                                                class="label label-success" onmouseover=""
                                                style="cursor: pointer;">Aceptar</span>

                                        </td>

                                        <td class="product__remove">
                                            <span id="rechazarInvitacion{{ $objInvitacionesTorneos->tougrpicode }}"
                                                onclick="aceptarInvitacion(0,{{ $objInvitacionesTorneos->tougrpicode }})"
                                                class="label label-danger" onmouseover=""
                                                style="cursor: pointer;">Rechazar</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>