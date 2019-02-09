<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $titulo ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="<?= base_url() ?>public/scripts/jquery1.8.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/scripts/blockui.js"></script>
        <!--<script type="text/javascript" src="<?= base_url() ?>public/js/jquery.colorbox.js"></script>-->
        <script type="text/javascript" src="<?= base_url() ?>public/scripts/modernizr-2.6.2.min.js"></script>
        <script type="text/javascript" src="<?= base_url('public/scripts/jquery.maskedinput.min.js') ?>"></script>

        <link rel="stylesheet" href="<?= base_url() ?>public/styles/admin/geral.css" />
        <link rel="stylesheet" href="<?= base_url() ?>public/styles/admin/form.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/styles/print.css" media="print" />
        <link rel="stylesheet" href="<?= base_url() ?>public/styles/admin/colorbox.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/styles/print.css" media="print" />
        <link rel="stylesheet" href="<?= base_url() ?>public/styles/admin/grid.css" />
        <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo base_url() ?>public/ckeditor/ckeditor.js"></script>
    <!--<link href="<?php echo base_url() ?>ckeditor/sample.css" rel="stylesheet" type="text/css" />-->
        <script type="text/javascript" src="<?php echo base_url() ?>public/ckeditor/sample.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>public/scripts/jquery.form.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>public/scripts/custom.js"></script>

    </head>
    <body>
        <div id="alerta-recipiente" style="z-index: 1000; display: none; width: 242px; height: 162px; position: fixed; bottom: 0px; right: 20px; overflow: hidden;">
            <div id="alerta" style="display: block; position: absolute; width: 200px; height: 100px; top: 200px; right: 0px; background-color: #fff2c3; border: 1px solid gray; border-radius: 4px; padding: 20px;">
                <a href="#" title="Fechar" style="position: absolute; top: 10px; right: 10px; font-family: sans-serif; color: #fff; font-size: 10px; font-weight: bold; background-color: #222; border-radius: 20px; padding: 2px 5px; display: block; text-decoration: none;" class="fechar">X</a>
                <p class="mensagem" style="font-family: sans-serif;"></p>
            </div>
        </div>
        <header id="topo">
            <div class="container_12">
                <div class="grid_12">
                    <h1 class="logo"><a href="<?php echo site_url('gerenciador') ?>" title="Lumen Agência"><img src="<?= base_url() ?>public/imagens/admin/lumen.png" alt="Lumen Agência" /></a></h1>
                    <nav class="menu">
                        <?php if($this->session->userdata('log_administrador')){
                        		$usuario = $this->session->userdata('log_administrador');
                        	  }else{
                        	  	$usuario = $this->session->userdata('log_funcionario');
                        	  }
                                  
                        ?>                        
                        <span>Olá <?php echo $usuario['nome_user'] ?>,</span>
                        <a href="<?php echo site_url('gerenciador/configuracoes') ?>" title="Configurações" class="settings">Configurações</a>
                        <a href="<?php echo site_url('gerenciador/login/logout') . "/" . $usuario['perfil'] ?>" title="Logout">Logout</a>
                    </nav>
                </div>
            </div>
        </header>
        <section id="content" class="container_12">
            <aside class="grid_3">              
                <? if ($usuario['perfil'] == "administrador"): ?>
                <section>
                    <h1>Pedidos</h1>
                    <nav>
                        <a href="<?php echo site_url('gerenciador/pedidos') ?>" title="Pedidos">Pedidos</a>
                    </nav>
                </section>
                
                <section>
                    <h1>Marmitas</h1>
                    <nav>                                                
                        <a href="<?php echo site_url('gerenciador/marmitas/novo') ?>" title="Nova Marmita" >Nova Marmita</a>
                        <a href="<?php echo site_url('gerenciador/marmitas') ?>" title="Marmitas">Marmitas</a>
                    </nav>
                </section>             
                
                <section>
                    <h1>Itens da Marmita</h1>
                    <nav>                        
                        <a href="<?php echo site_url('gerenciador/feijoes') ?>" title="Feijão">Feijão</a>
                        <a href="<?php echo site_url('gerenciador/arrozes') ?>" title="Arroz">Arroz</a>
                        <a href="<?php echo site_url('gerenciador/macarroes') ?>" title="Macarrão">Macarrão</a>
                        <a href="<?php echo site_url('gerenciador/saladas') ?>" title="Salada">Salada</a>
                        <a href="<?php echo site_url('gerenciador/acompanhamentos') ?>" title="Acompanhamentos">Acompanhamentos</a>
                        <a href="<?php echo site_url('gerenciador/carnes') ?>" title="Carnes">Carnes</a>
                        <a href="<?php echo site_url('gerenciador/bebidas') ?>" title="Bebidas">Bebidas</a>
                    </nav>
                </section>
                                                
                <section>
                    <h1>Clientes</h1>
                    <nav>
                        <a href="<?php echo site_url('gerenciador/clientes/novo') ?>" title="Novo Cliente" >Novo Cliente</a>
                        <a href="<?php echo site_url('gerenciador/clientes') ?>" title="Clientes">Clientes</a>
                    </nav>
                </section>
                                                
                <section>
                    <h1>Usuários</h1>
                    <nav>
                        <a href="<?php echo site_url('gerenciador/usuarios/novo') ?>" title="Novo Usuário" >Novo Usuário</a>
                        <a href="<?php echo site_url('gerenciador/usuarios') ?>" title="Listar Usuários">Usuários</a>
                    </nav>
                </section>                                
                                
                <section>
                    <h1>Configurações</h1>
                    <nav>
                        <a href="<?php echo site_url('gerenciador/configuracoes') ?>" title="Configurações" >Configurar Sistema</a>
                    </nav>
                </section>
                <? endif;?>

            </aside>

            <div class="grid_9">
