'use-strict';

var data = new Date();

var app = {

    init: function () {
        $('.modal').modal();
        tinymce.init({
            selector : "textarea:not(.default)",
            language: 'pt_BR',
            menubar: false,
            toolbar: 'undo redo | styleselect | bold italic underline | bullist numlist | alignleft aligncenter alignright alignjustify | bullist numlist | forecolor backcolor ',
            plugins: "textcolor",
            statusbar: false,
            content_css: [
                '/css/tinymce.css'
            ]
            
        });

        $('.datepicker').pickadate({
            monthsFull: ['Janeiro', 'Fevereiro', 'Marco', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            weekdaysFull: ['Domingo', 'Segunda-Feira', 'Terca-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sabado'],
            weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            weekdaysLetter: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
            selectMonths: true,
            selectYears: true,
            clear: false,
            format: 'yyyy-mm-dd',
            today: "Hoje",
            close: "Fechar",
            min: new Date(data.getFullYear() - 1, 0, 1),
            max: new Date(data.getFullYear() + 1, 11, 31),
            closeOnSelect: true,

            onSet: function (arg) {
                if ('select' in arg) { //prevent closing on selecting month/year
                    this.close();
                }
            }

        });

    },
    alert: function (message, style) {
        if (!style) {
            style = 'error';
        }

        Materialize.toast(message, 5000, style);
    },
    deletarDialog: function (mensagem, confirmada) {
        swal({
            title: "Tem certeza?",
            text: mensagem,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#e53935",
            confirmButtonText: "Sim, remover."
        }, confirmada);
    },
    request: function (url, data, method, callback, error) {
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': window.csrf_token}});
        $.ajax({
            url: url,
            data: data,
            type: method,
            success: callback,
            error: error
        });
    }
};
