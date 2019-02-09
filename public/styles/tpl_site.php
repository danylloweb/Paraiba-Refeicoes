<!doctype html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $title ?> | <?php echo $titulo ?></title>

        <meta name="description" content="<?php echo $description ?>"/>
        <meta name="keywords" content="<?php echo $keywords ?>"/>
        <meta name="author" content="www.lumenagencia.com.br"/>
        <meta name="robots" content="index, follow"/>

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
        <script type="text/javascript" src="<?= base_url('public/scripts/script_site.js') ?>"></script>
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>-->
        <script src="http://malsup.github.io/jquery.cycle2.js"></script>        

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <link href="<?= base_url('public/bootstrap-3.3.4-dist/css/bootstrap.css') ?>" rel="stylesheet">
        <link rel="canonical" href="<?= site_url() ?>">
        <link rel="shortcut icon" href="<?= base_url('public/imagens/favicon.png') ?>">
        <link rel="apple-touch-icon" href="media/img/logo-touch.png">
        <link rel="stylesheet" href="<?= base_url('public/styles/style_site.css') ?>" type="text/css" />
        <link rel="stylesheet" href="<?= base_url('public/styles/reset-min.css') ?>" type="text/css" />
        <link rel="stylesheet" href="<?= base_url('public/styles/animate.css') ?>" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url('public/styles/jquery.fancybox.css?v=2.1.5') ?>" media="screen" />
        <link rel="stylesheet" href="<?= base_url('public/styles/jquery-ui.css') ?>" type="text/css" />
        <link rel="stylesheet" href="<?= base_url('public/styles/colorbox.css') ?>" type="text/css" />

    <body>
        <header id="topo">
            <div class="container">
                <div id="box-acesso">
                    <!--<a href="javascript:;" onclick="abreModal(this)" class="login-top"><span class="sprit ic-login"></span>Login</a>-->
                    <div class="box-login" id="modal-top">
                        <div class="set"></div>
                        <form action="">
                            <input type="text" class="input1" placeholder="E-mail" required="required">
                            <input type="text" class="input1" placeholder="Senha" required="required">
                            <a href="javascript:void" class="link-modal">Esqueceu sua senha</a>
                            <div class="bt-login btn-1">
                                <span class="sprit ic-chave"></span>       
                                <input type="submit" value="Login">
                            </div>
                        </form>
                    </div><!--/box-login-->
                    <!--<a href="javascript:;" onclick="abreModal(this)" class="login-top cadastro-top" id="cadastro-top"><span class="sprit ic-login"></span>Cadastre-se</a>-->
                    <div class="box-cadastre" id="modal-cadastro-top">
                        <div class="set"></div>
                        <input type="radio" id="abaCadastroF" name="abas" checked="checked" />
                        <label for="abaCadastroF">Para sua Família</label>
                        <input type="radio" id="abaCadastroE" name="abas"/>
                        <label for="abaCadastroE">Para sua Empresa</label>
                        <div class="forms-cadastro">
                            <form action="" class="f-cadastro" id="cadastroF">
                                <input type="text" class="input1 type1"  placeholder="Nome Completo" >
                                <input type="text" class="input1 type1"  placeholder="Endereço" >
                                <input type="text" class="input1 type1"  placeholder="CPF" >
                                <input type="text" class="input1 type1"  placeholder="Bairro" >
                                <input type="text" class="input1 type1"  placeholder="Cidade" >
                                <input type="text" class="input1 type1"  placeholder="E-mail" >
                                <input type="text" class="input1 type1"  placeholder="Telefone" >
                                <input type="text" class="input1 type1"  placeholder="Celular" >
                                <input type="text" class="input1 type1"  placeholder="Senha" >
                                <input type="text" class="input1 type1"  placeholder="Comfirmar Senha" >
                                <textarea name="" id="" class="input1 type2" placeholder="Referências para entrega"></textarea>
                                <div class="bt-login btn-1">
                                    <span class="sprit ic-chave"></span>       
                                    <input type="submit" value="Cadastre-se">
                                </div>
                            </form><!--/Form-Cadastro-Familia-->
                        </div><!--/forms-cadastro-->
                    </div><!--/box-cadastre-->
                </div><!--/box-acesso-->
                <div class="row">
                    <div class="col-md-4">
                        <a href="<?= site_url()?>" id="logo"></a>
                    </div>
                    <div class="col-md-8">
                        <div id="box-fone"><?= $foneConf?> | <?= $foneConfTwo?></div>
                        <br style="clear: both;">
                        <nav id="menu">
                            <ul class="btn-1">
                                <li <? if ($this->uri->segment(1) == ''): ?>class="activ"<? endif; ?>><a href="<?= site_url() ?>">Home</a></li>
                                <li <? if ($this->uri->segment(1) == 'institucional'): ?>class="activ" <? endif; ?>><a href="<?= site_url('institucional') ?>">O Restaurante</a></li>
                                <li <? if ($this->uri->segment(1) == 'cardapio_semanal' || $this->uri->segment(1) == 'alacartes'): ?>class="activ" <? endif; ?>>
                                <a href="javascript:void">Refeições</a>
                                <ul class="drop-menu btn-1">
                                <div class="set drop-set"></div>
                                    <li><a href="<?= site_url('marmitas')?>">Marmitas</a></li>
                                    <li><a href="<?= site_url('refeicoes')?>">Refeições</a></li>
                                    <li><a href="<?= site_url('cardapio_semanal')?>">Cardápio</a></li>
                                    <li><a href="<?= site_url('alacartes')?>">À la carte</a></li>
                                    <li><a href="<?= site_url('bebidas')?>">Bebidas</a></li>
                                    <li><a href="<?= site_url('sobremesas')?>">Sobremesas</a></li>
                                </ul>
                            </li>
                            <!--<li <? if ($this->uri->segment(1) == 'corporativas'): ?>class="activ"<? endif; ?>>
                                <a href="#">Corporativas</a>
                                <ul class="drop-menu btn-1">
                                <div class="set drop-set"></div>
                                    <?php $menu_corporativas = $this->corporativa_categoria->listar_corporativa_categoria(array(),0,99,'coc_nome','ASC');
                                    
                                    ?>
                                    <?php foreach($menu_corporativas as $menu):?>
                                    
                                        <li>
                                            <a href="<?= site_url('corporativas/categoria/' . $menu->coc_id)?>"><?= $menu->coc_nome?></a>
                                        </li>
                                    <?php endforeach; ?>                            
                                </ul>
                            </li>-->
                                <li <? if ($this->uri->segment(1) == 'pedido'): ?>class="activ"<? endif; ?>><a href="<?= site_url('escolha') ?>">Faça seu Pedido</a></li>
                                <li <? if ($this->uri->segment(1) == 'servicos'): ?>class="activ"<? endif; ?>><a href="<?= site_url('servicos') ?>">Serviços</a></li>
                                <li <? if ($this->uri->segment(1) == 'contato'): ?>class="activ"<? endif; ?>><a href="<?= site_url('contato') ?>">Contato</a></li>
                            </ul>
                        </nav>
                    </div>
                </div> <!-- /row -->
            </div><!--/center-->

            <!-- * Menu Mobile -->
            <a href="javascript:void"  class="btn-menu-mob" title="Abrir Menu"><i class="fa fa-bars"></i></a>
            <nav id="menu-mob">
                <ul>
                    <li><a href="javascript:void" onClick="abrirMenuMob('menu-mob')" class="fechar" title="Fechar Menu"><i class="fa fa-bars"></i> Fechar</a></li>
                    <li <? if ($this->uri->segment(1) == ''): ?>class="activ"<? endif; ?>><a href="<?= site_url() ?>">Home</a></li>
                    <li <? if ($this->uri->segment(1) == 'institucional'): ?>class="activ" <? endif; ?>><a href="<?= site_url('institucional') ?>">O Restaurante</a></li>
                    <li class="btn-drop" <? if ($this->uri->segment(1) == 'cardapio_semanal' || $this->uri->segment(1) == 'alacartes'): ?> class="activ" <? endif; ?>>                        
                        <a href="javascript:void">Refeições <i class="fa fa-ellipsis-h"></i></a>
                        <ul class="drop-menu btn-1">
                            <div class="set drop-set"></div>
                            <li><a href="<?= site_url('marmitas')?>">Marmitas</a></li>
                            <li><a href="<?= site_url('refeicoes')?>">Refeições</a></li>
                            <li><a href="<?= site_url('cardapio_semanal')?>">Cardápio</a></li>
                            <li><a href="<?= site_url('alacartes')?>">À la carte</a></li>
                            <li><a href="<?= site_url('bebidas')?>">Bebidas</a></li>
                            <li><a href="<?= site_url('sobremesas')?>">Sobremesas</a></li>
                        </ul>
                    </li>

                    <!--<li <? if ($this->uri->segment(1) == 'corporativas'): ?>class="activ"<? endif; ?>>
                        <a href="#">Corporativas</a>
                        <ul class="drop-menu btn-1">
                        <div class="set drop-set"></div>
                            <?php $menu_corporativas = $this->corporativa_categoria->listar_corporativa_categoria(array(),0,99,'coc_nome','ASC');
                            
                            ?>
                            <?php foreach($menu_corporativas as $menu):?>
                            
                                <li>
                                    <a href="<?= site_url('corporativas/categoria/' . $menu->coc_id)?>"><?= $menu->coc_nome?></a>
                                </li>
                            <?php endforeach; ?>                            
                        </ul>
                    </li>-->
                        <li <? if ($this->uri->segment(1) == 'pedido'): ?>class="activ"<? endif; ?>><a href="<?= site_url('escolha') ?>">Faça seu Pedido</a></li>
                        <li <? if ($this->uri->segment(1) == 'servicos'): ?>class="activ"<? endif; ?>><a href="<?= site_url('servicos') ?>">Serviços</a></li>
                        <li <? if ($this->uri->segment(1) == 'contato'): ?>class="activ"<? endif; ?>><a href="<?= site_url('contato') ?>">Contato</a></li>
                </ul>
            </nav>
        </header><!--/topo-->

        <?php echo $contents ?>

        <footer id="rodape">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div id="box-news">
                            <div class="form-rp">
                                <h1 class="t-footer">Cadastre-se</h1>
                                <div class="mensagem msg_news"></div>
                                <?php echo form_open("", array('class' => 'formNewsletter')) ?>
                                    <div class="input-group">
                                        <input type="hidden" name="ema_status" value="1">
                                        <input type="text" name="ema_email" class="ipt-news" placeholder="Digite seu e-mail" required="required">
                                        <div class="input-group-btn">
                                            <input type="submit" class="bt-assina" id="submitNewsletter" value="ok">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <span class="txt-rp">Cadastre-se e receba novidades em seu e-mail.</span>
                        </div><!--/box-news-->
                    </div>
                    <div class="col-md-4">
                        <div id="box-contato-rp">
                            <h1 class="t-footer">Contatos</h1>
                            <div class="info-rp txt-rp"><span class="sprit ic-mail"></span> <?= $emailConf?>  </div>                            
                        </div><!--/box-contato-rp-->
                    </div>
                    <div class="col-md-2">
                        <div class="info-rp2 txt-rp txt-tel ">
                            <!-- <span class="sprit ic-fone"></span> -->
                            <?= $foneConf?> <?= $foneConfTwo?> 
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="http://www.lumenagencia.com.br" id="lumen" title="Lumen Agência Web"></a>
                    </div>                                       
                </div>
            </div>
            <div class="end-rp txt-rp "> <div class="box"><?= $adressConf ?></div> </div>
        </footer><!--/rodape-->

        <script src="<?= base_url('public/bootstrap-3.3.4-dist/js/bootstrap.js') ?>"></script>

        <script type="text/javascript">
	$(document).ready(function(){
		var tamanho_box = $('#box-promo #nav span').length;

	    $("#box-promo #nav").css("width", (21 * tamanho_box));
	});
            $('#submitNewsletter').click(function() {

                    $.post("<?= site_url('home/newsletter')?>", $('.formNewsletter').serialize(), function(data) {

                        if (data[0] == "1") {
                            
                            $(".formNewsletter")[0].reset();
                            $('.msg_news').html("Email cadastrado com sucesso");
                            $('.msg_news').show();
                            $('.msg_news').fadeOut(10000);

                        } else {

                            data = data.substring(1);

                            $('.msg_news').html(data);
                            $('.msg_news').show();
                            $('.msg_news').fadeOut(8000);

                        }

                        return false;

                    });
                    return false;
                });
        </script>
        <div id="fb-root"></div>
        <script>
            $(".btn-drop").click(function(){
                $(".btn-drop .drop-menu").toggle();
                // alert("");
            });
        </script>
        <script>(function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id))
                                    return;
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
    </body>
</html>
