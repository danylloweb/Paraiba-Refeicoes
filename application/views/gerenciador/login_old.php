<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Lumen - Gerenciador</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="<?= base_url() ?>public/scripts/jquery1.8.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/scripts/jquery-ui-1.8.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>public/scripts/blockui.js"></script>
        <!--<script type="text/javascript" src="<?= base_url() ?>public/js/jquery.colorbox.js"></script>-->
        <script type="text/javascript" src="<?= base_url() ?>public/scripts/modernizr-2.6.2.min.js"></script>

        <link rel="stylesheet" href="<?= base_url() ?>public/styles/admin/geral.css" />
        <link rel="stylesheet" href="<?= base_url() ?>public/styles/admin/colorbox.css" />
        <link rel="stylesheet" href="<?= base_url() ?>public/styles/admin/grid.css" />
        <link rel="stylesheet" href="<?= base_url() ?>public/styles/admin/jquery-ui-1.8.css" />
    </head>
    <body>
        <header id="topo">
            <div class="container_12">
                <div class="grid_12">
                    <h1 class="logo"><a href="#" title="Lumen Agência"><img src="<?= base_url() ?>public/imagens/admin/lumen.png" alt="Lumen Agência" /></a></h1>
                </div>
            </div>
        </header>

        <?php
        echo form_open('gerenciador/login/do_login', array('class' => 'container_12'), array('controller' => site_url('gerenciador/login'))
        )
        ?>
            <?php if ($erros != '') { ?>
            <div class="dialog">
                <div class="error">
                    <p>
                        <span class="ui-icon ui-icon-alert"></span>
                        <strong>Alerta:</strong>
                        <?php echo $erros ?>
                    </p>
                </div>
            </div>
            <?php } ?>
        <ul class="form-list grid_4 suffix_4 prefix_4">
            <li>
                <label for="login">Login</label>
                <input type="text" name="email" id="email_usuario" required="required" />
            </li>
            <li>
                <label for="senha">Password</label>
                <input type="password" name="senha" id="senha_usuario" required="required" />
            </li>
            <li>
                <input type="submit" value="Entrar"/>
            </li>
        </ul>
        </form>

        <script type="text/javascript">
            $(document).ready(function() {
                $('input:submit').button();
            })

        </script>
    </body>
</html>