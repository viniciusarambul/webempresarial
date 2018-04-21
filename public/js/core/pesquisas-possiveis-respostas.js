'use-strict';

/**
 * Objeto responsável por toda iteração da view
 * com o controller de forma assincrona que diz respeito a books
 * 
 * @author Jean Otoni <jean.carlos.otoni@gmail.com>
 * @depends App
 * @type Books
 */
var possiveisRespostas = {
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
        app.deletarDialog("Deseja realmente deletar esta Pergunta?", function () {
            var url = '/perguntas/remover/' + id;
            
            alert(url);

            app.request(
                    url,
                    null,
                    'DELETE',
                    function () {
                        location.reload();
                    },
                    function () {
                        app.alert('Falha ao remover pergunta, tente novamente.');
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
        var url = '/possiveis-respostas/detalhes/' + id;
        app.request(
                url,
                null,
                'GET',
                function (res) {
                    if (res) {
                        console.log(res);

                        // popula os dados no modal caso exista
                        $('#idPesquisaPergunta').val(res.idPesquisaPergunta);
                        $('#idPesquisaPossivelResposta').val(res.idPesquisaPossivelResposta);
                        $('#descricaoResposta').val(res.resposta);
                        
//                        tinyMCE.get('descricaoResposta').setContent(res.resposta);
                        
                        $('#modal-possiveis-respostas').modal('open');

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
        // zera os campos
        $('#idPesquisaPossivelResposta').val('');        
        $('#descricaoResposta').val('');
        
//        tinyMCE.get('descricaoResposta').setContent('');
//        $('#fotoThumb').prop('src', null);

        $('#modal-possiveis-respostas').modal('open');
    }

};
