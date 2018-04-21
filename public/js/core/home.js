
'use-strict';

var home = {

	data: null,

	indicadores: function(idAluno){
		var url = '/alunos/' + idAluno + '/indicadores';
		var container = $(".indicadores  li[data-aluno=" + idAluno + "] .registros");

		container.html("<p>Carregando...</p>");



		app.request(
			url,
			null,
			'GET',
			function (indicadores) {


				if(indicadores.length == 0){
					container.html("<p>Este aluno não possúi indicadores.</p>");
					return false;
				}

				home.data = indicadores;

				htmlUl = '<ul class="lista-indicadores"></ul>';
				container.html(htmlUl);

				$.each(indicadores, function(index, registro){

					htmlLi = '<li><p><strong>' + registro.acao + '</strong> no dia ' + registro.data + ' às '+ registro.hora +' </p></li>';

					$(".lista-indicadores").append(htmlLi);
				});

			},
			function () {
				app.alert('Falha ao buscar indicadores, tente novamente.');
			}
			);
	}

};
