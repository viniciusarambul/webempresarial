'use-strict';

/**
 * Objeto responsável por toda iteração da view
 * com o controller de forma assincrona que diz respeito a grammar hints
 *
 * @author André Fernando da Conceição <andre.f.conceicao@outlook.com>
 * @depends App
 * @type Culture
 */
var grammarHint = {

    /**
     * Método para remover uma grammar hint
     *
     * Exibe uma confirmação ao usuário e caso seja confirmado
     * faz uma requisição assincrona informado ao backend o código da
     * grammar hint que é pra ser removido
     * Caso a remoção aconteça, atualiza a página para atualizar a lista de grammar hints.
     * Do contrário, mostra um alerta informando ao usuário que não foi possível
     * remover a grammar hint.
     *
     * @param int id
     * @returns void
     */
    remover: function (idUnidade, idGrammarHint) {
        app.deletarDialog("Deseja realmente deletar esta grammar hint?", function () {
            var url = '/unidades/' + idUnidade + '/grammar-hint/' + idGrammarHint;

            app.request(
                    url,
                    null,
                    'DELETE',
                    function () {
                        location.reload();
                    },
                    function () {
                        app.alert('Falha ao remover grammar hint, tente novamente.');
                    }
            );
        });
    },

    /**
     * Método para editar uma grammar hint
     *
     * Carrega os dados da grammar hint selecionado para edição e abre o modal
     * Caso a grammar hint não exista, exibe um toast informado o usuário
     * caso ocorra um erro ao listar os dados da grammar hint, exibe também um toast
     * Após carregar o a grammar hint e abrir o formulário, segue os processos do cadastro,
     * a diferenciação da ação é feita no backend.
     *
     * @param int id
     * @returns void
     */
    editar: function (idUnidade, idGrammarHint) {
        var url = '/unidades/' + idUnidade + '/grammar-hint/' + idGrammarHint;

        app.request(
                url,
                null,
                'GET',
                function (res) {

                    if (res) {
                        // popula os dados no modal caso exista
                        $('#idGrammarHint').val(res.idGrammarHint);
                        $('#tituloGrammar').val(res.titulo);
                        tinyMCE.get('conteudoGrammar').setContent(res.conteudo);

                        if (res.imagem) {
                            $('#imagemGrammarThumb').prop('src', res.imagem);
                            $('#imagemGrammarThumb').parent().removeClass('hide');
                        }

                        $('#linkVideoGrammar').val(res.video);
                        $('#linkAudioGrammar').val(res.audio);
                        $('#modal-grammar-hint').modal('open');
                    } else {
                        app.alert('Ops, grammar hint não encontrada.');
                    }
                },
                function () {
                    app.alert('Falha ao carregar dados da grammar hint, tente novamente.');
                }
        );
    },

    /**
     * Método para inserir uma grammar hint
     *
     * Zera o formulário e abre o modal
     *
     * @param int id
     * @returns void
     */
    inserir: function () {

        // zera os campos
        $('#idGrammarHint').val('');
        $('#tituloGrammar').val('');
        tinyMCE.get('conteudoGrammar').setContent('');
        $('#imagemGrammarThumb').prop('src', null);

        $('#imagemGrammarThumb').prop('src', null);
        $('#imagemGrammar').val('');
        $('#imagemGrammarWrapper').val('');

        $('#linkVideoGrammar').val('');
        $('#linkAudioGrammar').val('');
        $('#modal-grammar-hint').modal('open');
    },

    /**
     * Mostra um previeu da imagem selecionada
     * @param DOMElement elem
     * @returns void
     */
    showThumb: function (elem) {
        var reader = new FileReader();

        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            $('#imagemGrammarThumb').prop("src", e.target.result);
            $('.container-imagem-thumb').removeClass('hide');
        };

        // read the image file as a data URL.
        reader.readAsDataURL(elem.files[0]);
    }
};
