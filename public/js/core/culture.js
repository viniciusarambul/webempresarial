'use-strict';

/**
 * Objeto responsável por toda iteração da view
 * com o controller de forma assincrona que diz respeito a culture
 *
 * @author André Fernando da Conceição <andre.f.conceicao@outlook.com>
 * @depends App
 * @type Culture
 */
var culture = {

    /**
     * Método para remover uma culture
     *
     * Exibe uma confirmação ao usuário e caso seja confirmado
     * faz uma requisição assincrona informado ao backend o código do
     * culture que é pra ser removido
     * Caso a remoção aconteça, atualiza a página para atualizar a lista de cultures.
     * Do contrário, mostra um alerta informando ao usuário que não foi possível
     * remover a culture.
     *
     * @param int id
     * @returns void
     */
    remover: function (idUnidade, idCulture) {
        app.deletarDialog("Deseja realmente deletar esta culture?", function () {
            var url = '/unidades/' + idUnidade + '/culture/' + idCulture;

            app.request(
                    url,
                    null,
                    'DELETE',
                    function () {
                        location.reload();
                    },
                    function () {
                        app.alert('Falha ao remover culture, tente novamente.');
                    }
            );
        });
    },

    /**
     * Método para editar uma culture
     *
     * Carrega os dados da culture selecionado para edição e abre o modal
     * Caso a culture não exista, exibe um toast informado o usuário
     * caso ocorra um erro ao listar os dados da culture, exibe também um toast
     * Após carregar o conteúdo extra e abrir o formulário, segue os processos do cadastro,
     * a diferenciação da ação é feita no backend.
     *
     * @param int id
     * @returns void
     */
    editar: function (idUnidade, idCulture) {
        var url = '/unidades/' + idUnidade + '/culture/' + idCulture;

        app.request(
                url,
                null,
                'GET',
                function (res) {

                    if (res) {
                        // popula os dados no modal caso exista
                        $('#idCulture').val(res.idCulture);
                        $('#tituloCulture').val(res.titulo);
                        tinyMCE.get('conteudoCulture').setContent(res.conteudo);

                        if (res.imagem) {
                            $('#imagemCultureThumb').prop('src', res.imagem);
                            $('#imagemCultureThumb').parent().removeClass('hide');
                        }

                        $('#linkVideoCulture').val(res.video);
                        $('#linkAudioCulture').val(res.audio);
                        $('#modal-culture').modal('open');
                    } else {
                        app.alert('Ops, culture não encontrada.');
                    }
                },
                function () {
                    app.alert('Falha ao carregar dados da culture, tente novamente.');
                }
        );
    },

    /**
     * Método para inserir uma culture
     *
     * Zera o formulário e abre o modal
     *
     * @param int id
     * @returns void
     */
    inserir: function () {

        // zera os campos
        $('#idCulture').val('');
        $('#tituloCulture').val('');
        tinyMCE.get('conteudoCulture').setContent('');
        $('#imagemCultureThumb').prop('src', null);
        $('#linkVideoCulture').val('');
        $('#linkAudioCulture').val('');
        $('#modal-culture').modal('open');

    },

    /**
     * Mostra um preview da imagem selecionada
     * @param DOMElement elem
     * @returns void
     */
    showThumb: function (elem) {
        var reader = new FileReader();

        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            $('#imagemCultureThumb').prop("src", e.target.result);
            $('.container-imagem-thumb').removeClass('hide');
        };

        // read the image file as a data URL.
        reader.readAsDataURL(elem.files[0]);
    }


};
