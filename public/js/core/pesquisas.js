'use-strict';

/**
 * Objeto responsável por toda iteração da view
 * com o controller de forma assincrona que diz respeito a books
 * 
 * @author Jean Otoni <jean.carlos.otoni@gmail.com>
 * @depends App
 * @type Books
 */
var pesquisas = {
    /**
     * Método para remover uma unidade
     * 
     * Exibe uma confirmação ao usuário e caso seja confirmado
     * faz uma requisição assincrona informado ao backend o código da 
     * unidade que é pra ser removida 
     * Caso a remoção aconteça, atualiza a página para atualizar a lista de unidades.
     * Do contrário, mostra um alerta informando ao usuário que não foi possível
     * remover a unidade. 
     * 
     * @param int id
     * @returns void
     */
    remover: function (id) {
        app.deletarDialog("Deseja realmente deletar esta Pesquisa?", function () {
            var url = '/pesquisas/remover/' + id;

            app.request(
                    url,
                    null,
                    'DELETE',
                    function () {
//                        location.reload();
                    },
                    function () {
                        app.alert('Falha ao remover pesquisa, tente novamente.');
                    }
            );
        });
    },
    /**
     * Método para editar uma unidade
     * 
     * Carrega os dados da unidade selecionada para edição e abre o modal
     * Caso a unidade não exista, exibe um toast informado o usuário
     * caso ocorra um erro ao listar os dados da unidade, exibe também um toast
     * Após carregar a unidade e abrir o formulário, segue os processos do cadastro,
     * a diferenciação da ação é feita no backend.
     * 
     * @param int id
     * @returns void
     */
    editar: function (id) {
        var url = '/pesquisas/detalhes/' + id;
        app.request(
                url,
                null,
                'GET',
                function (res) {

                    if (res) {
                        console.log(res);

                        // popula os dados no modal caso exista
                        $('#idPesquisa').val(res.idPesquisa);
                        $('#tituloPesquisa').val(res.titulo);
                        $('#descricaoPesquisa').val(res.descricao);
                        $('#dataInicialPesquisa').val(res.dataInicial);
                        $('#dataFinalPesquisa').val(res.dataFinal);

                        if (res.estado === 1) {
                            $('#estadoPesquisa').attr('checked', true);
                        } else {
                            $('#estadoPesquisa').attr('checked', false);
                        }

                        $('#modal-pesquisas').modal('open');

                    } else {
                        app.alert('Ops, pesquisa não encontrada.');
                    }
                },
                function () {
                    app.alert('Falha ao carregar dados da pesquisa, tente novamente.');
                }
        );
    },
    inserir: function () {
        // zera os campos
        $('#idPesquisa').val('');
        $('#tituloPesquisa').val('');
        $('#descricaoPesquisa').val('');
        $('#upload').val('');
        $('#dataInicialPesquisa').val('');
        $('#dataFinalPesquisa').val('');
        $('#estadoPesquisa').attr('checked', true);

        $('#modal-pesquisas').modal('open');
    },
    /**
     * Método para inserir um filtro. Zera o formulário e abre o modal
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
        var url = '/filtros/detalhes/' + id;

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

                        $('#idPesquisaFiltro').val(id);

                        $('#modal-filtros').modal('open');
                    } else {
                        app.alert('Ops, filtro não encontrado.');
                    }
                },
                function () {
                    app.alert('Falha ao carregar dados do filtro, tente novamente.');
                }
        );
    },
    /**
     * Método para remover um filtro da pesquisa
     */
    removerFiltro: function (id) {
        app.deletarDialog("Deseja realmente deletar este filtro?", function () {
            var url = '/filtros/remover/' + id;

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
