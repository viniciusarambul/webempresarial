'use-strict';

/**
 * Objeto responsável por toda iteração da view
 * com o controller de forma assincrona que diz respeito à respostas
 *
 * @author Henrique Araujo <henrique.004@hotmail.com>
 * @depends App
 * @type Licoes
 */
var licoesRespostas = {
    /**
     * Método para remover uma resposta
     *
     * Exibe uma confirmação ao usuário e caso seja confirmado
     * faz uma requisição assincrona informado ao backend o código da
     * respostas que é pra ser removido
     * Caso a remoção aconteça, atualiza a página para atualizar a lista de respostas.
     * Do contrário, mostra um alerta informando ao usuário que não foi possível
     * remover o áudio.
     *
     * @param int id
     * @returns void
     */
    remover: function (id) {
        app.deletarDialog("Deseja realmente deletar esta Resposta?", function () {
            var url = '/licoes-respostas/remover/' + id;

            app.request(
                    url,
                    null,
                    'DELETE',
                    function () {
                        location.reload();
                    },
                    function () {
                        app.alert('Falha ao remover lição, tente novamente.');
                    }
            );
        });
    },
    /**
     * Método para editar uma Lição
     *
     * Carrega os dados da resposta selecionado para edição e abre o modal
     * Caso a resposta não exista, exibe um toast informado o usuário
     * caso ocorra um erro ao listar os dados da lição, exibe também um toast
     * Após carregar a resposta e abrir o formulário, segue os processos do cadastro,
     * a diferenciação da ação é feita no backend.
     *
     * @param int id
     * @returns void
     */
    editar: function (idLicao, idResposta) {
        var url = '/licoes/' + idLicao + '/respostas/' + idResposta;

        app.request(
                url,
                null,
                'GET',
                function (res) {

                    if (res) {
                        // popula os dados no modal caso exista
                        $('#idLicaoResposta').val(res.idLicaoResposta);
                        $('#fotoRespostas').val(res.foto);
//                        tinyMCE.get('descricaoResposta').setContent(res.descricao);
                        $('#descricaoResposta').val(res.descricao);
                        //$('#descricaoResposta').val(res.descricao);
                        $('#audioRespostas').val(res.audio);

                        /**
                         * Caso a resposta seja a correta, marque o checkbox.
                         */
                        $('#respostaCorreta').prop("checked", false);
                        if (res.respostaCorreta) {
                            $('#respostaCorreta').prop("checked", true);
                        }

                        $('#modal-respostas').modal('open');
                    } else {
                        app.alert('Ops, resposta não encontrada.');
                    }
                },
                function () {
                    app.alert('Falha ao carregar dados da resposta, tente novamente.');
                }
        );
    },
    inserir: function () {

        /**
         * Caso a lição seja do tipo "Texto Livre" não deixe cadastrar.
         */
        if ($('#tipo').val() === "1" || $('#tipo').val() === "5") {
            swal({
                type: 'error',
                title: 'Oops!',
                text: 'Não é possível cadastrar respostas para lições do tipo "Texto Livre" e "Completar"'
            });
            return false;
        }

        // zera os campos
        $('#idLicaoResposta').val('');
        $('#fotoRespostas').val('');
        $('#respostaCorreta').prop("checked", false);
//        tinyMCE.get('descricaoResposta').setContent('');
        $('#descricaoResposta').val('');
        $('#urlRespostas').val('');

        $('#modal-respostas').modal('open');

    }

};
