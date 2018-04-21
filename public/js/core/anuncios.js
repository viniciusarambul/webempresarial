'use-strict';

/**
 * Objeto responsável por toda iteração da view
 * com o controller de forma assincrona que diz respeito a anuncios
 * 
 * @author André Fernando <andre.f.conceicao@outlook.com>
 * @depends App
 * @type Anuncios
 */
var anuncios = {

    /**
     * Método para remover um anúncio
     * 
     * Exibe uma confirmação ao usuário e caso seja confirmado
     * faz uma requisição assincrona informado ao backend o código do
     * anúncio que é pra ser removido 
     * Caso a remoção aconteça, atualiza a página para atualizar a lista de anúncios.
     * Do contrário, mostra um alerta informando ao usuário que não foi possível
     * remover o anúncio. 
     * 
     * @param int id
     * @returns void
     */
    remover: function (id) {
        app.deletarDialog("Deseja realmente deletar este Anúncio?", function () {
            var url = '/anuncios/remover/' + id;

            app.request(
                    url,
                    null,
                    'DELETE',
                    function () {
                        location.reload();
                    },
                    function () {
                        app.alert('Falha ao remover anúncio, verifique se existe algum filtro, tente novamente.');
                    }
            );
        });
    },
    /**
     * Método para editar um anúncio
     * 
     * Carrega os dados do anúncio selecionado para edição e abre o modal
     * Caso o anúncio não exista, exibe um toast informado o usuário
     * caso ocorra um erro ao listar os dados do anúncio, exibe também um toast
     * Após carregar o anúncio e abrir o formulário, segue os processos do cadastro,
     * a diferenciação da ação é feita no backend.
     * 
     * @param int id
     * @returns void
     */
    editar: function (id) {
        var url = '/anuncios/detalhes/' + id;
        app.request(
                url,
                null,
                'GET',
                function (res) {

                    if (res) {

                        // popula os dados no modal caso exista
                        $('#idAnuncio').val(res.idAnuncio);
                        $('#tituloAnuncio').val(res.titulo);
                        $('#linkAnuncio').val(res.link);
                        $('#dataInicioAnuncio').val(res.dataInicial);
                        $('#dataFinalAnuncio').val(res.dataFinal);
                        $('#estadoAnuncio').attr('checked', false);
                        $('#imagemAnuncioThumb').prop('src', null);
                        $('.container-imagem-thumb').addClass('hide');
                        tinyMCE.get('descricaoAnuncio').setContent(res.descricao);

                        if (res.estado != 0) {
                            $('#estadoAnuncio').attr('checked', true);
                        }

                        if (res.imagem) {
                            $('#imagemAnuncioThumb').prop('src', 'storage/' + res.imagem);
                            $('.container-imagem-thumb').removeClass('hide');
                        }

                        $('#modal-anuncios').modal('open');
                    } else {
                        app.alert('Ops, anúncio não encontrado.');
                    }
                },
                function () {
                    app.alert('Falha ao carregar dados do anúncio, tente novamente.');
                }
        );
    },
    inserir: function () {
        // zera os campos
        $('#idAnuncio').val('');
        $('#tituloAnuncio').val('');
        $('#linkAnuncio').val('');
        $('#estadoAnuncio').attr('checked', true);
        $('#dataInicioAnuncio').val('');
        $('#dataFinalAnuncio').val('');
        $('#imagemAnuncioThumb').prop('src', null);
        $('#imagemAnuncio').val('');
        $('#imagemAnuncioWrapper').val('');
        $('.container-imagem-thumb').addClass('hide');
        tinyMCE.get('descricaoAnuncio').setContent('');

        $('#modal-anuncios').modal('open');
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
            $('#imagemAnuncioThumb').prop("src", e.target.result);
            $('.container-imagem-thumb').removeClass('hide');
        };

        // read the image file as a data URL.
        reader.readAsDataURL(elem.files[0]);
    },

    /**
     * Método para inserir um filtro. Zera o formul�rio e abre o modal
     */
    inserirFiltro: function () {
        $("#tipoFiltro").removeClass("hide");
        $("#container-curso").addClass("hide");
        $("#container-estado").addClass("hide");
        $("#container-unidade").addClass("hide");

        $('#tipoFiltro').val(0);
        $('#curso').val('');
        $('#estado').val('');
        $('#unidade').val('');

        $('#modal-filtros').modal('open');

    },
    /**
     * Método para editare um filtro selecionado
     */
    editarFiltro: function (id) {
        var url = '/anuncios/filtros/detalhes/' + id;

        app.request(
                url,
                null,
                'GET',
                function (res) {

                    $("#tipoFiltro").addClass("hide");
                    $("#container-curso").addClass("hide");
                    $("#container-estado").addClass("hide");
                    $("#container-unidade").addClass("hide");

                    if (res) {
                        // popula os dados no modal caso exista
                        if (res.idCurso) {
                            $('#idCurso').val(res.idCurso);
                            $("#container-curso").removeClass("hide");
                        } else if (res.idUnidade) {
                            $("#container-unidade").removeClass("hide");
                            $('#idUnidade').val(res.idUnidade);
                        } else if (res.estado) {
                            $("#container-estado").removeClass("hide");
                            $('#estado').val(res.estado);
                        }

                        $('#idAnuncioFiltro').val(id);

                        $('#modal-filtros').modal('open');
                    } else {
                        app.alert('Ops, filtro n�o encontrado.');
                    }
                },
                function () {
                    app.alert('Falha ao carregar dados do filtro, tente novamente.');
                }
        );
    },
    /**
     * Método para remover um filtro do anuncio
     */
    removerFiltro: function (id) {
        app.deletarDialog("Deseja realmente deletar este filtro?", function () {
            var url = '/anuncios/filtros/remover/' + id;

            app.request(
                    url,
                    null,
                    'DELETE',
                    function () {
                        location.reload();
                    },
                    function () {
                        app.alert('Falha ao remover filtro, tente novamente.');
                    }
            );
        });
    },
    /**
     * É disparada no onchange do filtro, alternando entre os campos curso, estado e unidade
     * @param value do input
     */
    selectFiltro: function (res) {
        $("#container-curso").addClass("hide");
        $("#container-estado").addClass("hide");
        $("#container-unidade").addClass("hide");

        if (res.value == 1) {
            $("#container-curso").removeClass("hide");
        } else if (res.value == 2) {
            $('#container-estado').removeClass('hide');
        } else if (res.value == 3) {
            $('#container-unidade').removeClass('hide');
        }

    }


};

