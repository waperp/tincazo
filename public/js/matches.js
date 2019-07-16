
$(document).ready(function () {
    
});

function matches_all(touinfscode) {
    var touinfscode = touinfscode;
    var toufixdplay = $('#datetimepicker-toufixdplay-matches-full').data('DateTimePicker').date().format('YYYY-MM-DD');
debugger
    $.ajax({
        url: '/matches_all_web',
        type: 'get',
        dataType: 'json',
        data: {
            touinfscode: touinfscode,
            toufixdplay: toufixdplay
        },
        success: function (data) {

            $('#matches_all').empty();
            $.each(data, function (i, item) {
                // Create with DOM
                var spacer = $('<div>',{class:'spacer'})
                var progress = $('<div >', { class: 'progress', style: "height:15px; margin-bottom:0px;top: 0px; ", 
                html: $('<div class="'+ constatdesc_matches(item)+'">'+item.constatdesc+'</div>') });
                var span_col_1 = $('<div>', { class: 'col-md-5', style: 'text-align: left', html: $('<span>', { class: 'game-result__league', text: moment(item.toufixdplay).lang('es').format('dddd DD [de] MMMM') }) });
                var span_col_2 = $('<div>', { class: 'col-md-2', html: [progress], });
                var span_col_3 = $('<div>', { class: 'col-md-5', html: $('<time>', { class: 'game-result__date', text: moment(item.toufixdplay + " " + item.toufixthour).lang('es').format('HH:mm A') }) });
                var header = $('<header>',{  style:'margin-top:0px;margin-bottom:0px',class: 'game-result__header game-result__header--alt', html: [span_col_1, span_col_2, span_col_3], });
                var game_result_team_first = $('<div>',{class:'game-result__team game-result__team--first',
                    html: [
                        $('<figure>',{class:'game-result__team-logo',
                            html:$('<img>',{
                                src: 'images/'+item.touteavimgt
                            })
                        }),
                        $('<div>',{class:'game-result__team-info',
                            html:$('<h5>',{
                                class:'game-result__team-name',
                                text: item.touteatname
                            })
                        })
                    ]
                });
                var game_result_team_score = $('<div>',{class:'game-result__score-wrap',
                    html: $('<div>',{
                        class: 'game-result__score game-result__score--lg',
                        html:[
                            $('<span>',{
                                class: matches_score_type_team1(item),
                                text: item.toufixsscr1
                            }),
                            $('<span>',{
                                class: 'game-result__score-dash',
                                text:'-'
                            }),
                            $('<span>',{
                                class: matches_score_type_team2(item),
                                text: item.toufixsscr2
                            })
                        ]
                    })
                });
                var game_result_team_second = $('<div>',{class:'game-result__team game-result__team--second',
                    html: [
                        $('<figure>',{class:'game-result__team-logo',
                            html:$('<img>',{
                                src: 'images/'+item.touteavimgt2
                            })
                        }),
                        $('<div>',{class:'game-result__team-info',
                            html:$('<h5>',{
                                class:'game-result__team-name',
                                text: item.touteatname2
                            })
                        })
                    ]
                });
                var game_result = $('<div>',{class:'game-result__content',
                style: 'margin: 0 0 5px 0;',
                html: [game_result_team_first,game_result_team_score,game_result_team_second]
                });

                var section = $('<section>', { class: 'game-result__section pt-0', 
                    html: [header,game_result]
                })
                $("#matches_all").append(section);
            });
            //     for (var i = 0; i < data.listaPartidosPendiente.length; i++) {


            //         htmlPendientes = "<section class='game-result__section pt-0'>
            // <header class='game-result__header game-result__header--alt'>
            //<span class='game-result__league'> " 
            //+ moment(data.listaPartidosPendiente[i].toufixdplay).lang('es').format('dddd DD [de] MMMM') + " 
            //</span> " + tincazoFinal + "
            //<time class='game-result__date' >" + moment(data.listaPartidosPendiente[i].toufixdplay + " " + data.listaPartidosPendiente[i].toufixthour).lang('es').format('HH:mm A') + "</time>
            //</header> <div class='game-result__content'>
            //<div class='game-result__team game-result__team--first'><figure class='game-result__team-logo'><img src='images/" + data.listaPartidosPendiente[i].touteavimgt + "' alt=''></figure><div class='game-result__team-info'><h5 class='game-result__team-name'>" + data.listaPartidosPendiente[i].touteatname + "</h5></div></div><div class='game-result__score-wrap'><div class='game-result__score game-result__score--lg'>" + toufixsscr1Pendientes + "<span class='game-result__score-dash'>" + score_dash + "</span> " + toufixsscr2Pendientes + "</div><div class='game-result__score-label'>" + data.listaPartidosPendiente[i].constatdesc + "</div></div><div class='game-result__team game-result__team--second'><figure class='game-result__team-logo'><img src='images/" + data.listaPartidosPendiente[i].touteavimgt2 + "' alt=''></figure><div class='game-result__team-info'><h5 class='game-result__team-name'>" + data.listaPartidosPendiente[i].touteatname2 + 
            //"</h5></div></div></div></section><div class='spacer'></div> ";
            //         $('#game-result-pendientes').append(htmlPendientes);
            //                    }
            //     // for (var o = 0; o < data.listaPartidosJuego.length; o++) {
            //     //     $('#game-result-juego').append(html)
            //     // }
            //     // for (var u = 0; u < data.listaPartidosFinalizados.length; u++) {
            //     //     $('#game-result-finalizados').append(html)
            //     // }
        }
    });
}
function load_matches(touinfscode){
    matches_all(touinfscode);
}
function constatdesc_matches (item){

    if(item.constascode == 1){
        return 'progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%;font-size: 10px;line-height: 15px;'
    }
    if(item.constascode == 2){
        return 'progress-bar progress-bar-warning progress-bar-striped active role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%;font-size: 10px;line-height: 15px;'
    }
    if(item.constascode == 3){
        return 'progress-bar progress-bar-success progress-bar-striped activ" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%;font-size: 10px;line-height: 15px;'
    }
}

function matches_score_type_team1(item){
    if(item.constascode == 1){
        return 'game-result__score-result';
    }
    if(item.constascode == 3 || item.constascode == 2){
        if(item.toufixsscr1 > item.toufixsscr2){
            return 'game-result__score-result game-result__score-result--winner';
        }else if(item.toufixsscr1 < item.toufixsscr2){
            return 'game-result__score-result game-result__score-result--loser--winner';
        }else {
            return 'game-result__score-result';
        }
    }
}
function matches_score_type_team2(item){
    if(item.constascode == 1){
        return 'game-result__score-result';
    }
    if(item.constascode == 3 || item.constascode == 2){
        if(item.toufixsscr2 > item.toufixsscr1){
            return 'game-result__score-result game-result__score-result--winner--loser';
        }else if(item.toufixsscr2 < item.toufixsscr1){
            return 'game-result__score-result game-result__score-result--winner--loser';
        }else {
            return 'game-result__score-result';
        }
    }
}