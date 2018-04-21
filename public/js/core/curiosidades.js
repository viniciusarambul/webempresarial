'use-strict';

/**
 * Objeto responsável por toda iteração da view
 * com o controller de forma assincrona que diz respeito a àudios
 *
 * @author Jeferson Capobianco <henrique004.rick@gmail.com>
 * @depends App
 * @type Curiosidade
 */
var curiosidade = {
    /**
     * Método para remover um registro
     *
     * Exibe uma confirmação ao usuário e caso seja confirmado
     * faz uma requisição assincrona informado ao backend o código do
     * registro que é pra ser removido
     * Caso a remoção aconteça, atualiza a página para atualizar a lista de registros.
     * Do contrário, mostra um alerta informando ao usuário que não foi possível
     * remover o registro.
     *
     * @param int id
     * @returns void
     */
    remover: function (idUnidade, idCuriosidade) {
        app.deletarDialog("Deseja realmente deletar esta curiosidade?", function () {
            var url = '/unidades/' + idUnidade + '/curiosidades/' + idCuriosidade;

            app.request(
                    url,
                    null,
                    'DELETE',
                    function () {
                        location.reload();
                    },
                    function () {
                        app.alert('Falha ao remover curiosidade, tente novamente.');
                    }
            );
        });
    },
    /**
     * Método para editar um registro
     *
     * Carrega os dados do registro selecionado para edição e abre o modal
     * Caso o registro não exista, exibe um toast informado o usuário
     * caso ocorra um erro ao listar os dados do audio, exibe também um toast
     * Após carregar o registro e abrir o formulário, segue os processos do cadastro,
     * a diferenciação da ação é feita no backend.
     *
     * @param int id
     * @returns void
     */
    editar: function (idUnidade, idCuriosidade) {
        var url = '/unidades/' + idUnidade + '/curiosidades/' + idCuriosidade;

        app.request(
                url,
                null,
                'GET',
                function (res) {

                    if (res) {
                        console.log(res);
                        // popula os dados no modal caso exista
                        $('#idCuriosidade').val(res.idCuriosidade);
                        $('#tituloCuriosidade').val(res.titulo);

                        if (res.imagem) {
                            $('#imagemCuriosidadeThumb').parent().removeClass('hide');
                            $('#imagemCuriosidadeThumb').prop('src', res.imagem);
                        }

                        $('#linkVideo').val(res.video);
                        $('#linkAudio').val(res.audio);


                        tinyMCE.get('conteudoCuriosidade').setContent(res.conteudo);

                        $('#modal-curiosidades').modal('open');
                    } else {
                        app.alert('Ops, curiosidade não encontrado.');
                    }
                },
                function () {
                    app.alert('Falha ao carregar dados da curiosidade, tente novamente.');
                }
        );
    },
    /**
     * Método para inserir um registro
     *
     * Zera o formulário e abre o modal
     *
     * @param int id
     * @returns void
     */
    inserir: function () {

        // zera os campos
        $('#idCuriosidade').val('');
        $('#tituloCuriosidade').val('');
        $('#imagemCuriosidadeThumb').prop('src', null);
        $('#imagemCuriosidade').val('');
        $('#imagemCuriosidadeWrapper').val('');
        $('#linkVideo').val('');
        $('#linkAudio').val('');
        tinyMCE.get('conteudoCuriosidade').setContent('');

        $('#modal-curiosidades').modal('open');

    },
    /**
     * Mostra um previeu da imagem selecionada
     * @param DOMElement elem
     * @returns void
     */
    showThumb: function (elem) {
        var reader = new FileReader();

        reader.onload = function (e) {
            console.log(e.target);
            // get loaded data and render thumbnail.
            $('#imagemCuriosidadeThumb').prop("src", e.target.result);
            $('.container-imagem-thumb').removeClass('hide');
        };

        // read the image file as a data URL.
        reader.readAsDataURL(elem.files[0]);
    },
    /**
     * Adiciona ou remove a classe hide variando a seleção do usuario e o target
     * da option
     * @param DOMElement elem
     * @returns void
     */
    displayField: function (elem) {

        var options = $(elem).find("option");
        var toDisplay = $(elem).find("option:selected").data("target");

        $.each(options, function (index, option) {

            var optionEach = $(option).data("target");

            $(optionEach).addClass('hide');

            if (optionEach === toDisplay) {
                $(toDisplay).removeClass('hide');
            }
        });
    }
};
