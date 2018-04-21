'use-strict';

var user = {
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
        app.deletarDialog("Deseja realmente desativar este Usuário?", function () {
            var url = '/usuarios/remover/' + id;

            app.request(
                    url,
                    null,
                    'DELETE',
                    function () {
                        location.reload();
                    },
                    function () {
                        app.alert('Falha ao remover usuário, tente novamente.');
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
        var url = '/usuarios/detalhes/' + id;
        app.request(
                url,
                null,
                'GET',
                function (res) {

                    if (res) {
                        console.log(res);
                        
                        $('#id').val(res.id);
                        $('#nome').val(res.name);
                        $('#email').val(res.email);
                        $('#senha').val('');
                        $('#confirmacao').val('');

                        $('#modal-user').modal('open');
                    } else {
                        app.alert('Ops, usuario não encontrado.');
                    }
                },
                function () {
                    app.alert('Falha ao carregar dados do usuario, tente novamente.');
                }
        );
    },
    inserir: function () {
        // zera os campos
        $('#id').val('');
        $('#nome').val('');
        $('#email').val('');
        $('#senha').val('');
        $('#confirmacao').val('');

        $('#modal-user').modal('open');
    }

};
