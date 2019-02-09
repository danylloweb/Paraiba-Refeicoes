<!doctype html>
<html lang="pt-br"
      xmlns:fb="http://developers.facebook.com/schema/"
      xmlns:og="http://opengraphprotocol.org/schema/">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title><?php echo $title ?> | <?php echo $titulo ?></title>

        <meta name="description" content="<?php echo $description ?>"/>
        <meta name="keywords" content="<?php echo $keywords ?>"/>
        <meta name="author" content="www.lumenagencia.com.br"/>
        <meta name="robots" content="index, follow"/>
        <meta name="viewport" content="width=1024"/>

        <meta property="og:title" content="Paraíba Refeições">
        <meta property="og:description" content="">
        <meta property="og:url" content="<?= site_url() ?>">
        <meta property="og:image" content="<?= base_url('public/imagens/favicon.png') ?>">
        <meta property="og:locale" content="pt_BR">
        <meta property="og:site_name" content="Paraíba Refeições">
        <meta property="og:type" content="website">

        <script type="text/javascript" src="<?= base_url('public/scripts/jquery-1.9.1.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('public/scripts/jquery.cycle.all.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('public/scripts/jquery.easing.1.3.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('public/scripts/jquery.maskedinput.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('public/scripts/jquery.maskMoney.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('public/scripts/blockui.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('public/scripts/jquery.colorbox.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('public/scripts/jquery.fancybox.js?v=2.1.5') ?>"></script>        
        <script type="text/javascript" src="<?= base_url('public/scripts/jquery-ui.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('public/scripts/functions.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('public/scripts/jquery.tinyscrollbar.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('public/scripts/script.js') ?>"></script>
<!--        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
        <script src="http://malsup.github.io/jquery.cycle2.js"></script>        -->

        <link rel="canonical" href="<?= site_url() ?>">
        <link rel="shortcut icon" href="<?= base_url('public/imagens/favicon.png') ?>">
        <link rel="apple-touch-icon" href="media/img/logo-touch.png">
        <link rel="stylesheet" href="<?= base_url('public/styles/style.css') ?>" type="text/css" />
        <link rel="stylesheet" href="<?= base_url('public/styles/reset-min.css') ?>" type="text/css" />
        <link rel="stylesheet" href="<?= base_url('public/styles/animate.css') ?>" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url('public/styles/jquery.fancybox.css?v=2.1.5') ?>" media="screen" />
        <link rel="stylesheet" href="<?= base_url('public/styles/jquery-ui.css') ?>" type="text/css" />
        <link rel="stylesheet" href="<?= base_url('public/styles/colorbox.css') ?>" type="text/css" />

    <body>
        <header id="topo">
            <div class="center-logo"> <a href="<?= site_url() ?>" id="logo"></a></div>
        </header>

        <?php echo $contents ?>

        <footer id="rodape">
            <?= $adressConf ?><br>
            <span><?= $foneConf ?> / <?= $foneConfTwo ?></span>
        </footer>
        <script type="text/javascript">
            $(document).ready(function() {

                setTimeout(function() {
                    if ($('.mensagem').css('display') != 'none') {
                        $('.mensagem').fadeTo('normal', 0.01, 'swing').slideUp('normal', 'swing');
                    }
                }, 7000);
                $('.mensagem').click(function() {
                    $(this).fadeTo('normal', 0.01, 'swing').slideUp('normal', 'swing');
                });

                $(".phone").mask("(99) 9999-9999");
                $(".date").mask("99/99/9999");
                $(".preco").maskMoney({decimal: ",", thousands: "."});

                $('.linkServico').click(function() {

                    var href = $(this).attr('data-href');

//                    $('#servico').html('');

                    $("#servico").load(href + " #servico", function(data) {
                        $('#servico').html(data);
                    });

                    return false;
                });

                $('.linkEmpresa').click(function() {

                    var href = $(this).attr('data-href');

                    $(".ajaxEmpre").load(href + " .ajaxEmpre", function(data) {
                        $('.ajaxEmpre').html(data);
                    });

                    return false;
                });

                $('#btnRecovery').click(function() {

                    ajax_loading("#modal-top");

                    $.post("<?= site_url('identificacao/recovery') ?>", $('#recuperar-senha').serialize(), function(data) {

                        if (data[0] == "1") {

                            $('.msg_recovery').html('Senha gerada com sucesso. Verifique em seu e-mail.');
                            $('.msg_recovery').show();

                            $('.msg_recovery').css('color', '#3D5509');
                            $('.msg_recovery').fadeOut(12000);

                        } else {

                            data = data.substring(1);

                            $('.msg_recovery').html(data);
                            $('.msg_recovery').show();
                            $('.msg_recovery').css('color', '#BC2035');
                            $('.msg_recovery').fadeOut(12000);

                        }
                        setTimeout(function() {
                            ajax_loading_close("#modal-top");
                        }, 3000);

                        return false;

                    });
                    return false;
                });
            });

            function ajax_loading(campo)
            {
                $(campo).block({
                    message: "<img src=<?php echo base_url('public/imagens') ?>/loading.gif  />",
                    css: {
                        margin: 0,
                        padding: 0,
                        border: 'none',
                        background: 'none'
                    },
                    overlayCSS: {
                        background: '#fff',
                        opacity: '0.9'
                    }
                });
            }
            function ajax_loading_close(campo) {
                $(campo).unblock();
            }
        </script>
    </body>
</html>
