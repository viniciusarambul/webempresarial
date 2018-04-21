'use-strict';

/**
 * Objeto responsável por toda iteração da view
 * com o controller de forma assincrona que diz respeito a books
 * 
 * @author Jean Otoni <jean.carlos.otoni@gmail.com>
 * @depends App
 * @type Books
 */
var books = {
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
        app.deletarDialog("Deseja realmente deletar este Book?", function () {
            var url = '/books/remover/' + id;

            app.request(
                    url,
                    null,
                    'DELETE',
                    function () {
                        location.reload();
                    },
                    function () {
                        app.alert('Falha ao remover book, tente novamente.');
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
        var url = '/books/detalhes/' + id;
        app.request(
                url,
                null,
                'GET',
                function (res) {

                    if (res) {
                        console.log(res);

//                        var $input = document.getElementById('upload');
//                        var $fileName = document.getElementById('file-name');
//
//                        $input.addEventListener('change', function () {
//                            $fileName.textContent = this.value;
//                        });

                        // popula os dados no modal caso exista
                        $('#idBook').val(res.idBook);
                        $('#tituloBook').val(res.titulo);
                        $('#idEstagio').val(res.idEstagio);
//                        $('#linkBook').val(res.link);
//                        $('#upload').val(res.upload);
//                        tinyMCE.get('descricaoBook').setContent(res.descricao);

                        $('#modal-books').modal('open');
                    } else {
                        app.alert('Ops, book não encontrado.');
                    }
                },
                function () {
                    app.alert('Falha ao carregar dados do book, tente novamente.');
                }
        );
    },
    inserir: function () {
        // zera os campos
        $('#idBook').val('');
        $('#tituloBook').val('');
        $('#idEstagio').val('');
        $('#linkBook').val('');
        $('#upload').val('');
//        tinyMCE.get('descricaoBook').setContent('');

        $('#modal-books').modal('open');
    }

};
