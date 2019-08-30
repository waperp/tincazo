var touinfscode_static;
$(document).ready(function() {
    $('#datetimepicker-toufixdplay-matches-full').datetimepicker({
        locale: 'es',
        format: 'DD-MM-YYYY',
        defaultDate: new Date(),
    }).on('dp.hide', function(e) {
        matches_all(touinfscode_static);
    });
    var touinfscode = $("#post-torneos li:first").data('touinfscode');
    if (touinfscode) {
        touinfscode_static = touinfscode;
        matches_all(touinfscode_static);
    }
});
$(".refresh-button-all").on('click', function() {
    matches_all(touinfscode_static);
});
$("#shearh-matches-all").on('click', function() {
    matches_all(touinfscode_static);
});
$(".refresh-button-matches").on('click', function () {
    $('#matches_all').empty();
    matches_all(touinfscode_static);
});
function matches_all(touinfscode) {
    $('body').Wload({ text: ' Cargando' })
    var touteatname = $(".buscar").val();
    touinfscode_static = touinfscode;
    var toufixdplay = $('#datetimepicker-toufixdplay-matches-full').data('DateTimePicker').date().format('YYYY-MM-DD');
    $.ajax({
        url: '/matches_all_web',
        type: 'get',
        dataType: 'json',
        data: {
            touinfscode: touinfscode,
            toufixdplay: toufixdplay,
            touteatname: touteatname
        },
        success: function(data) {

            $('#matches_all').empty();
            $.each(data, function(i, item) {
                var game__result__section = '';
                var game__result__title = '';
                if (item.constascode == 3){
                    game__result__title = '<span style="font-size: 12px !important;" class="badge badge-success">'+ item.constatdesc +'</span>'
                }else if (item.constascode == 1){
                    game__result__title = '<span style="font-size: 12px !important;background-color: #007bff;" class="badge badge-primary">'+ item.constatdesc +'</span>'
                }
                game__result__section += '<section class="game-result__section mt-2">';
                game__result__section += '<header class="game-result__header game-result__header--alt mb-1">';
                game__result__section += '<span class="game-result__league m-auto">' + moment(item.toufixdplay).locale('es').format('ddd DD [de] MMM') + '</span>';
                game__result__section += '<div class="game-result__title">'+game__result__title+'</div>';
                game__result__section += '<time class="game-result__date m-auto">' + moment(item.toufixdplay + " " + item.toufixthour).locale('es').format('HH:mm A') + '</time>';
                game__result__section += '</header>';
                game__result__section += '<div class="game-result__content mb-3">';

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
                if (item.constascode == 2){
                    game__result__section += '<div style="font-size:14px" class="game-result__score-label"><img style="height: 40px;" src="/images/enjuego.gif"></div>';

                }
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
                $('#matches_all').append(game__result__section);
                game__result__section = '';

                // Create with DOM
                // var spacer = $('<div>', { class: 'spacer' })
                // var progress = $('<div >', {
                //     class: 'progress',
                //     style: "height:15px; margin-bottom:0px;top: 0px; ",
                //     html: $('<div class="' + constatdesc_matches(item) + '">' + item.constatdesc + '</div>')
                // });
                // var span_col_2 = $('<div>', { class: 'col-md-2', html: [progress], });
                // var span_col_3 = $('<div>', { class: 'col-md-2', html: $('<time>', { class: 'game-result__date', text: moment(item.toufixdplay + " " + item.toufixthour).locale('es').format('HH:mm A') }) });
                // var header = $('<header>', { style: 'margin-top:0px;margin-bottom:0px', class: 'game-result__header game-result__header--alt', html: [ span_col_3, span_col_2], });
                // var game_result_team_first = $('<div>', {
                //     class: 'game-result__team game-result__team--first',
                //     html: [
                //         $('<figure>', {
                //             class: 'game-result__team-logo',
                //             html: $('<img>', {
                //                 src: 'images/' + item.touteavimgt
                //             })
                //         }),
                //         $('<div>', {
                //             class: 'game-result__team-info',
                //             html: $('<h5>', {
                //                 class: 'game-result__team-name',
                //                 text: item.touteatname
                //             })
                //         })
                //     ]
                // });
                // var game_result_team_score = $('<div>', {
                //     class: 'game-result__score-wrap',
                //     html: $('<div>', {
                //         class: 'game-result__score game-result__score--lg',
                //         html: [
                //             $('<span>', {
                //                 class: matches_score_type_team1(item),
                //                 text: item.toufixsscr1
                //             }),
                //             $('<span>', {
                //                 class: 'game-result__score-dash',
                //                 text: '-'
                //             }),
                //             $('<span>', {
                //                 class: matches_score_type_team2(item),
                //                 text: item.toufixsscr2
                //             })
                //         ]
                //     })
                // });
                // var game_result_team_second = $('<div>', {
                //     class: 'game-result__team game-result__team--second',
                //     html: [
                //         $('<figure>', {
                //             class: 'game-result__team-logo',
                //             html: $('<img>', {
                //                 src: 'images/' + item.touteavimgt2
                //             })
                //         }),
                //         $('<div>', {
                //             class: 'game-result__team-info',
                //             html: $('<h5>', {
                //                 class: 'game-result__team-name',
                //                 text: item.touteatname2
                //             })
                //         })
                //     ]
                // });
                // var game_result = $('<div>', {
                //     class: 'game-result__content',
                //     style: 'margin: 10px 0 10px 0;',
                //     html: [game_result_team_first, game_result_team_score, game_result_team_second]
                // });

                // var section = $('<section>', {
                //     class: 'game-result__section pt-0',
                //     html: [header, game_result]
                // })
                // $("#matches_all").append(section);
            });
        
        },
        complete: function(data) {
            $('body').Wload('hide', { time: 1000 })
        }
    });
}
function load_matches(touinfscode, elm) {
    
    touinfscode_static = touinfscode;
    $('li.posts__item').removeClass('post__items__custom__selected');
    $('li > figure > img.post__items__custom__img').removeClass('post__items__custom__img__selected');
    $(elm).addClass('post__items__custom__selected');
    var img = $(elm).children().children()[0];
    $(img).removeClass('post__items__custom__img__selected');
    $(img).addClass('post__items__custom__img__selected');

    matches_all(touinfscode);
}

function constatdesc_matches(item) {

    if (item.constascode == 1) {
        return 'progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%;font-size: 10px;line-height: 15px;'
    }
    if (item.constascode == 2) {
        return 'progress-bar progress-bar-warning progress-bar-striped active role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%;font-size: 10px;line-height: 15px;'
    }
    if (item.constascode == 3) {
        return 'progress-bar progress-bar-success progress-bar-striped activ" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%;font-size: 10px;line-height: 15px;'
    }
}

function matches_score_type_team1(item) {
    if (item.constascode == 1) {
        return 'game-result__score-result';
    }
    if (item.constascode == 3 || item.constascode == 2) {
        if (item.toufixsscr1 > item.toufixsscr2) {
            return 'game-result__score-result game-result__score-result--winner';
        } else if (item.toufixsscr1 < item.toufixsscr2) {
            return 'game-result__score-result game-result__score-result--loser--winner';
        } else {
            return 'game-result__score-result game-result__score-result--draw-1';
        }
    }
}

function matches_score_type_team2(item) {
    if (item.constascode == 1) {
        return 'game-result__score-result';
    }
    if (item.constascode == 3 || item.constascode == 2) {
        if (item.toufixsscr2 > item.toufixsscr1) {
            return 'game-result__score-result game-result__score-result--winner--loser';
        } else if (item.toufixsscr2 < item.toufixsscr1) {
            return 'game-result__score-result game-result__score-result--winner--loser';
        } else {
            return 'game-result__score-result game-result__score-result--draw-2';
        }
    }
}