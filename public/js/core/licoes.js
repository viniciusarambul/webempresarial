'use-strict';

/**
 * Objeto responsável por toda iteração da view
 * com o controller de forma assincrona que diz respeito à lições
 * 
 * @author Henrique Araujo <henrique.004@hotmail.com>
 * @depends App
 * @type Licoes
 */
var licoes = {

    /**
     * Método para remover um áudio
     * 
     * Exibe uma confirmação ao usuário e caso seja confirmado
     * faz uma requisição assincrona informado ao backend o código do 
     * audio que é pra ser removido
     * Caso a remoção aconteça, atualiza a página para atualizar a lista de áudios.
     * Do contrário, mostra um alerta informando ao usuário que não foi possível
     * remover o áudio. 
     * 
     * @param int id
     * @returns void
     */
    remover: function (id) {
        app.deletarDialog("Deseja realmente deletar esta Lição?", function () {
            var url = '/licoes/remover/' + id;

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
     * Carrega os dados da lição selecionado para edição e abre o modal
     * Caso a lição não exista, exibe um toast informado o usuário
     * caso ocorra um erro ao listar os dados da lição, exibe também um toast
     * Após carregar a lição e abrir o formulário, segue os processos do cadastro,
     * a diferenciação da ação é feita no backend.
     * 
     * @param int id
     * @returns void
     */
    editar: function () {
        
    },

    inserir: function () {

    }

};
