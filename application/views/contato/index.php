<section id="wrap-centro">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="content-conteudo">
                    <h1 class="titulos-1">Entre em <span>Contato</span></h1>
                    <p class="txt-contato">Entre em contato conosco para encaminhar alguma duvida, crítica, elogio ou sugestão, preencha o formulário abaixo e retornaremos o mais breve possível.</p>

                    <?php echo form_open('contato', array('id' => 'form-contato')) ?>                
                    <?php if (isset($erros)): ?>
                        <div class="mensagem"><?php echo $erros ?></div>
                    <?php endif; ?>
                    <input type="text" name="nome" value="<?= isset($limpar) ? '' : set_value('nome') ?>" class="type-form" placeholder="Nome">
                    <input type="text" name="email" class="type-form" value="<?= isset($limpar) ? '' : set_value('email') ?>" placeholder="E-mail">
                    <input type="text" name="telefone" class="type-form phone" value="<?= isset($limpar) ? '' : set_value('telefone') ?>" placeholder="Telefone">
                    <textarea name="mensagem" class="type-form" id="area-form" placeholder="Mensagem"><?= isset($limpar) ? '' : set_value('mensagem') ?></textarea>
                    <div class="bt-login btn-1 bt-enviar-contato">
                        <input type="submit" value="Enviar">
                    </div>
                    <?php echo form_close() ?>
                </div><!--/content-conteudo-->                
            </div>
            <div class="col-md-4">
                <div id="sid-right">
                    <? $this->load->view('sidebar/right') ?>
                </div><!--/sid-right-->
            </div>
        </div>
    </div><!--/center-->
</section><!--/wrap-centro-->