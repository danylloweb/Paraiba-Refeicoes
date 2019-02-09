$(function(){ 
    main();
});
function main()
{
    VerDropCat();
    $("#content-conteudo #box-promo #nav").css({'width' : (21 * $('#content-conteudo #box-promo #nav span').length)});
    $("#box-fotos-ambiente #nav").css({'width' : (18 * $('#box-fotos-ambiente #nav span').length)});
    $(".group1").colorbox({rel:'group1'}); 
    $(".box-pager-2").css({'width' : (14 * $('.box-pager-2 span').length)});
    $(".box-pager-3").css({'width' : (14 * $('.box-pager-3 span').length)});
}
/*Função de navegação do site */
function scrollPage() {
    $('#topo #menu ul a').bind('click',function(event){
        var $anchor = $(this);
 
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1800,'easeInOutExpo');
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
    if ( $(div).attr('class') == "link-modal") {
         $('#modal-top').animate({'height' : 'toggle'},0500);
    }
   
    else
    {

    }
}

function VerDropCat()
{
    $('#carousel-cat,#carosel-destaq3').mouseover(
        function(){
           $(this).css({'overflow' : 'visible'});
           $(this).css({'z-index' : '999'});
        }).mouseout(
           function(){
           
        });
}

function clickImg(div)
{
    var imageImovel = $($(div).find('img')).attr("src");
    $('#box-slid-imgs #img-full img').attr("src", imageImovel);
}
