$(document).ready(function () {
    tusTincazosPendientes("");
});
function tusTincazosPendientes(shearh) {
    $('#game-result-pendientes').empty();
    var tougplicode = $('#session-select-tougplicode').val();
    var touinfscode = $('#session-select-touinfscode').val();
    $.ajax({
        url: '/tusTincazosPendientes',
        type: 'get',
        dataType: 'json',
        data: {
            tougplicode: tougplicode,
            touinfscode: touinfscode,
            shearh: shearh
        },
        success: function (data) {
            var array = data.listaPartidosPendiente;
            var game__result__section = '';
            $.each(array, function (i, item) {
                    
                game__result__section += '<section class="game-result__section pt-0">';
                game__result__section += '<header class="game-result__header game-result__header--alt">';
                game__result__section += '<span class="game-result__league m-auto">' + moment(item.toufixdplay).locale('es').format('dddd DD [de] MMMM') + '</span>';
                game__result__section += '<div class="game-result__title">' + tincazos_add_update(item) + '</div>';
                game__result__section += '<time class="game-result__date m-auto" datetime="2017-03-17">' + moment(item.toufixdplay + " " + item.toufixthour).locale('es').format('HH:mm A') + '</time>';
                game__result__section += '</header>';
                game__result__section += '<div class="game-result__content">';

                game__result__section += '<div class="game-result__team game-result__team--first">';
                game__result__section += '<figure class="game-result__team-logo">';
                game__result__section += '<img style="height:70px" src="images/' + item.touteavimgt + '" alt="">';
                game__result__section += '</figure>';
                game__result__section += '<div class="game-result__team-info">';
                game__result__section += '<h5 class="game-result__team-name">' + item.touteatname + '</h5>';
                // game__result__section += '<div class="game-result__team-desc">Elric Bros School</div>';
                game__result__section += '</div>';
                game__result__section += '</div>';

                game__result__section += '<div class="game-result__score-wrap">';
                game__result__section += '<div class="game-result__score game-result__score--lg">';

                game__result__section += winner_loser_team1(item);
                game__result__section += '<span class="game-result__score-dash">-</span>';
                game__result__section += winner_loser_team2(item);
                game__result__section += '</div>';
                game__result__section += '<div class="game-result__score-label">' + item.constatdesc + '</div>';
                game__result__section += '</div>';

                game__result__section += '<div class="game-result__team game-result__team--second">';
                game__result__section += '<figure class="game-result__team-logo">';
                game__result__section += '<img style="height:70px" src="images/' + item.touteavimgt2 + '" alt="">';
                game__result__section += '</figure>';
                game__result__section += '<div class="game-result__team-info">';
                game__result__section += '<h5 class="game-result__team-name">' + item.touteatname2 + '</h5>';
                // game__result__section += '<div class="game-result__team-desc">Elric Bros School</div>';
                game__result__section += '</div>';
                game__result__section += '</div>';
                game__result__section += '</div>';
                game__result__section += '</section>';
                $('#game-result-pendientes').append(game__result__section);
                game__result__section = '';

            });

        }
    });


}
function tincazos_add_update(item) {
    
    if (item.plapreicode == null) {
        return '<a onclick="mi_tincazo(' + item.toufixicode + ',' + item.plapreicode + ',' + item.plapresscr1 + ',' + item.plapresscr2 + ')"  class="btn btn-danger btn-outline btn-xs card-header__button">Sin Tincazo <i class="fa fa-question"></i></a>';
    } else {
        return '<a onclick="mi_tincazo(' + item.toufixicode + ',' + item.plapreicode + ',' + item.plapresscr1 + ',' + item.plapresscr2 + ')"  class="btn btn-success btn-outline btn-xs card-header__button"> <strong style="color:black;font-size:16px;vertical-align: middle;">' + item.plapresscr1 + '</strong> &nbsp;Tu Tincazo &nbsp;<strong style="color:black;font-size:16px;vertical-align: middle;">' + item.plapresscr2 + '</strong></a>';
    }
}
