$(function () {
    main();
    $("#box-promo #nav").css({'width': (21 * $('#box-promo #nav span').length)});
});

$(function () {
    //Abre o Popup
    $('[data-modal-open]').on('click', function (e) {
        $("html").addClass("modal-aberto");
        var targeted_modal_class = $(this).attr('data-modal-open');
        //$('[data-modal="' + targeted_modal_class + '"]').fadeIn(550);
        $('[data-modal="' + targeted_modal_class + '"]').css("display", "flex").hide().fadeIn();
        e.preventDefault();
    });

    //Fecha o Popup
    $('[data-modal-close]').on('click', function (e) {
        $("html").removeClass("modal-aberto");
        var targeted_modal_class = $(this).attr('data-modal-close');
        $('[data-modal="' + targeted_modal_class + '"]').fadeOut(550);
        e.preventDefault();
    });

    //Fecha o Popup quando clicar fora
    $('.modal').bind('click', function (e) {
        if (e.target === this) {
            $("html").removeClass("modal-aberto");
            $('.modal').fadeOut(550);
        }
    });
});


function main()
{
    masked();
    $("#box-fotos-ambiente #nav").css({'width': (18 * $('#box-fotos-ambiente #nav span').length)});
    //$(".group1").colorbox({rel:'group1'}); 
    $(".box-pager-2").css({'width': (14 * $('.box-pager-2 span').length)});
    $(".box-pager-3").css({'width': (14 * $('.box-pager-3 span').length)});
}
/*Função de navegação do site */
function scrollPage() {
    $('#topo #menu ul a').bind('click', function (event) {
        var $anchor = $(this);

        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1800, 'easeInOutExpo');
        /*
         if you don't want to use the easing effects:
         $('html, body').stop().animate({
         scrollTop: $($anchor.attr('href')).offset().top
         }, 1000);
         */
        event.preventDefault();
    });
}

function abreModal(div)
{
    if ($(div).attr('class') == "login-top") {
        $('#modal-top').animate({'height': 'toggle'}, 0500);
    } else if ($(div).attr('class') == "login-top cadastro-top")
    {
        $('#modal-cadastro-top').animate({'height': 'toggle'}, 0500);
    } else if ($(div).attr('class') == "publica-anuncio-modal")
    {
        $('#publicar-home-modal').animate({'height': 'toggle'}, 0500);
    } else if ($(div).attr('class') == "empregos-anuncio-modal")
    {
        $('#emprego-home-modal').animate({'height': 'toggle'}, 0500);
    } else if ($(div).attr('class') == "abreModalEmpregos")
    {
        $($(div).find('.modal-descri-emprego')).animate({'height': 'toggle'}, 0500);
    } else
    {

    }
}
function masked() {

    $(".phone").mask("(99) 9999-9999");

}
function VerDropCat()
{
    $('#carousel-cat,#carosel-destaq3').mouseover(
            function () {
                $(this).css({'overflow': 'visible'});
                $(this).css({'z-index': '999'});
            }).mouseout(
            function () {

            });
}

function clickImg(div)
{
    var imageImovel = $($(div).find('img')).attr("src");
    $('#box-slid-imgs #img-full img').attr("src", imageImovel);
}


$(document).ready(function () {
    if ($('.box-car-select').length > 0) {
        $('.box-car-select').hide();
        $('.box-car-select.active').show();

        $('.dia-card-bt').click(function (event) {
            event.preventDefault();
            $('.dia-card-bt').removeClass('active');
            $(this).addClass('active');

            var content = $(this).attr('href');
            $('.box-car-select').hide(function () {
                $(this).removeClass('active');
            });
            $(content).show(function () {
                $(this).addClass('active');
            });
        });
    }
});