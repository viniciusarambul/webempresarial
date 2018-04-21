'use-strict';

var unidades = {

    remover: function (id) {
        app.deletarDialog("Deseja realmente deletar esta Unidade?", function () {
            var url = '/estagios/remover/' + id;

            app.request(
                    url,
                    null,
                    'DELETE',
                    function () {
                        location.reload();
                    },
                    function () {
                        app.alert('Falha ao remover unidade, tente novamente.');
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
        var url = '/unidades/' + id;
        app.request(
                url,
                null,
                'GET',
                function (res) {

                    if (res) {
                        // popula os dados no modal caso exista
                        $('#idUnidade').val(res.idUnidade);
                        $('#nomeUnidade').val(res.nome);
                        $('#horasIntervalo').val(res.horasIntervalo);

                        $('#modal-unidades').modal('open');
                    } else {
                        app.alert('Ops, unidade não encontrada.');
                    }
                },
                function () {
                    app.alert('Falha ao carregar dados da unidade, tente novamente.');
                }
        );
    },

    inserir: function () {

        // zera os campos
        $('#idUnidade').val('');
        $('#nomeUnidade').val('');
        $('#horasIntervalo').val('');

        $('#modal-unidades').modal('open');
    }

};
