'use-strict';

/**
 * Objeto responsável por toda iteração da view
 * com o controller de forma assincrona que diz respeito às perguntas
 * 
 * @author Jean Otoni <jean.carlos.otoni@gmail.com>
 * @depends App
 * @type Perguntas
 */
var perguntas = {
    
    /**
     * Mostra um preview da imagem selecionada
     * @param DOMElement elem
     * @returns void
     */
    showThumb: function (elem) {
        var reader = new FileReader();

        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            $('#imagemThumb').prop("src", e.target.result);
            $('.container-imagem-thumb').removeClass('hide');
        };
        
        // read the image file as a data URL.
        reader.readAsDataURL(elem.files[0]);
    },
    
    
    
    /*
     * O RESTANTE POR ENQUANTO NÃO É UTILIZADO
     */
    
    
    
    
    
    
    
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
                        } else{
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

        $('#modal-pesquisas-perguntas').modal('open');
    }

};
