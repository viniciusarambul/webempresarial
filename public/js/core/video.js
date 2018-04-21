'use-strict';

/**
 * Objeto responsável por toda iteração da view
 * com o controller de forma assincrona que diz respeito a àudios
 * 
 * @author Jeferson Capobianco <jefersoncapobianco@gmail.com>
 * @depends App
 * @type Audio
 */
var video = {

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
        app.deletarDialog("Deseja realmente deletar este vídeo?", function () {
            var url = '/videos/remover/' + id;

            app.request(
                    url,
                    null,
                    'DELETE',
                    function () {
                        location.reload();
                    },
                    function () {
                        app.alert('Falha ao remover vídeo, tente novamente.');
                    }
            );
        });
    },

    /**
     * Método para editar um áudio
     * 
     * Carrega os dados do áudio selecionado para edição e abre o modal
     * Caso o áudio não exista, exibe um toast informado o usuário
     * caso ocorra um erro ao listar os dados do audio, exibe também um toast
     * Após carregar o áudio e abrir o formulário, segue os processos do cadastro,
     * a diferenciação da ação é feita no backend.
     * 
     * @param int id
     * @returns void
     */
    editar: function (id) {
        var url = '/videos/detalhes/' + id;

        app.request(
                url,
                null,
                'GET',
                function (res) {

                    if (res) {
                        // popula os dados no modal caso exista
                        $('#idVideo').val(res.idVideo);
                        $('#nomeVideo').val(res.nome);
                        $('#descricaoVideo').val(res.descricao);
                        $('#urlVideo').val(res.url);

                        $('#modal-video').modal('open');
                    } else {
                        app.alert('Ops, vídeo não encontrado.');
                    }
                },
                function () {
                    app.alert('Falha ao carregar dados do vídeo, tente novamente.');
                }
        );
    },

    /**
     * Método para inserir um áudio
     * 
     * Zera o formulário e abre o modal
     * 
     * @param int id
     * @returns void
     */
    inserir: function () {

        // zera os campos
        $('#idVideo').val('');
        $('#nomeVideo').val('');
        $('#descricaoVideo').val('');
        $('#urlVideo').val('');

        $('#modal-video').modal('open');

    }
};
