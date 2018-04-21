'use-strict';

/**
 * Objeto responsável por toda iteração da view
 * com o controller de forma assincrona que diz respeito a anuncios
 * 
 * @author André Fernando <andre.f.conceicao@outlook.com>
 * @depends App
 * @type Anuncios
 */

$(window).on('load', function () {

    var scroll = $( ".mensagem:last" );
    var focus = $('textarea');

    $('#mensagem-main').animate({
        scrollTop: scroll.offset().top
    }, 500);

    focus.focus();
});