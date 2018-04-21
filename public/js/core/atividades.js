'use-strict';

/**
 * Objeto responsável por toda iteração da view
 * com o controller de forma assincrona que diz respeito a atividades
 *
 * @author André Fernando <andre.f.conceicao@outlook.com>
 * @depends App
 * @type Atividades
 */
var atividades = {

    loadModalCorrecao: function(atividade){
        $('#descricaoResposta').html(atividade.resposta);   
        $('#modal-resposta').modal('open');
    }


};
