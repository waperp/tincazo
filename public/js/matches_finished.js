$(document).ready(function () {
tusTincazosFinalizados("");
});
function tusTincazosFinalizados(shearh) {
    $('#game-result-finalizado').empty();

    $.ajax({
        url: '/tusTincazosFinalizados',
        type: 'get',
        dataType: 'json',
        data: {
          
            shearh: shearh
        },
        success: function (data) {
            var array = data.listaPartidosFinalizados;
            var game__result__section = '';
            $.each(array, function (i, item) {

                game__result__section += '<section class="game-result__section pt-0">';
                game__result__section += '<header class="game-result__header game-result__header--alt mb-2">';
                game__result__section += '<span class="game-result__league m-auto">' + moment(item.toufixdplay).locale('es').format('ddd DD [de] MMM') + '</span>';
                game__result__section += '<div class="game-result__title">' + tincazos_user(item) + '</div>';
                game__result__section += '<time class="game-result__date m-auto" datetime="2017-03-17">' + moment(item.toufixdplay + " " + item.toufixthour).locale('es').format('HH:mm A') + '</time>';
                game__result__section += '</header>';
                game__result__section += '<div class="game-result__content">';

                game__result__section += '<div class="game-result__team game-result__team--first">';
                game__result__section += '<figure class="game-result__team-logo">';
                game__result__section += '<img class="game-result__team-logo-img" src="images/' + item.touteavimgt + '" alt="">';
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
                game__result__section += '<img class="game-result__team-logo-img" src="images/' + item.touteavimgt2 + '" alt="">';
                game__result__section += '</figure>';
                game__result__section += '<div class="game-result__team-info">';
                game__result__section += '<h5 class="game-result__team-name">' + item.touteatname2 + '</h5>';
                // game__result__section += '<div class="game-result__team-desc">Elric Bros School</div>';
                game__result__section += '</div>';
                game__result__section += '</div>';
                game__result__section += '</div>';
                game__result__section += '</section>';
                $('#game-result-finalizado').append(game__result__section);
                game__result__section = '';
            });
        }
    });
}
function tincazos_user(item) {
    return '<a  onclick="tincazos(' + item.toufixicode + ')" class="btn btn-success btn-outline btn-xs card-header__button">Ver Tincazos &nbsp;<i class="fa fa-search"></i></a>';
}
