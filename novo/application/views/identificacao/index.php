<div class="center">
    <h1 class="t-page">Faça seu pedido online</h1>
    <div id="box-pedidos">
        <div class="txt1 n-quentinha">Quentinha R$ <?= number_format($preco_quentinha, 2, ',', '.') ?> - Entregamos apenas no Bessa.</div>
        <div class="txt1 pedido-dia"><span>Pedido para hoje: </span><?= $marmita->mar_dia_semana ?> | <?= data_for_humans($marmita->mar_data) ?></div>
        <nav class="nav-etapas">
            <ul>
                <li><span class="sprit ic-car"></span>Meu carrinho</li><span class="sprit set-sep"></span>
                <li><span class="sprit ic-id atv"></span>Identificação</li><span class="sprit set-sep"></span>
                <li><span class="sprit ic-end "></span>Endereço</li><span class="sprit set-sep"></span>
                <li><span class="sprit ic-pag "></span>Pagamento</li>
            </ul>
        </nav>
        <div id="box-login">
            <?php echo form_open('identificacao/do_login') ?>
            <h1 class="t-acesso">Já sou cadastrado</h1>
            <div class="mensagem" style="color: #BC2035"><?php echo $erro != '' ? $erro : '' ?></div>
            <div class="mensagem" style="color: #3D5509"><?php echo $oklog != '' ? $oklog : '' ?></div>            
            <label class="txt-form" for="name">Email:</label>
            <input class="inputs" type="text" placeholder="" name="cli_email" required="required" autofocus="autofocus"/>
            <label class="txt-form" for="name">Senha:</label>
            <input class="inputs" type="password" placeholder="" name="cli_senha" required="required" />
            <a href="javascript:;" onclick="abreModal(this)"  class="link-modal">Esqueceu sua senha</a>            
            <input type="submit" value="OK" class="btn-1 right" id="bt-ok-login">
            <?= form_close() ?>
            <div class="box-login" id="modal-top">
                <div class="set"></div>
                <div class="msg_recovery mensagem" style="font-size: 15px;"></div>
                <?php echo form_open('', array('id' => 'recuperar-senha')) ?>
                    <a href="#" class="t-acesso">Esqueceu sua senha ?</a>
                    <div class="txt-form">Insira seu e-mail de cadastro. Uma nova senha será enviada para ele.</div>
                    <input type="text" name="cli_email" class="input1 emailRec" placeholder="E-mail">
                    <div class="bt-login btn-1">
                        <input type="submit" id="btnRecovery" value="Recuperar senha">
                    </div>
                <?= form_close() ?>
            </div><!--/box-login-->
        </div><!-- box-login -->
        <div id="box-cadastro">
            <?php echo form_open('identificacao/cadastro') ?>
                <h1 class="t-acesso">Meu primeiro pedido</h1>
                <div class="mensagem" style="color: #BC2035"><?php echo $errocad != '' ? $errocad : '' ?></div>
                <div class="mensagem" style="color: #3D5509"><?php echo $okcad != '' ? $okcad : '' ?></div>
                <div class="input-box type2">
                    <label class="txt-form " for="nome">Nome*:</label>
                    <input class="inputs" type="text" placeholder="" name="cli_nome" value="<?= set_value('cli_nome')?>" required="required" />
                </div>
                <div class="input-box type2">
                    <label class="txt-form" for="email">Email*:</label>
                    <input class="inputs " type="text" placeholder="" name="cli_email" value="<?= set_value('cli_email')?>" required="required"/>
                </div>
                <div class="input-box type2">
                    <label class="txt-form " for="endereco">Endereço*:</label>
                    <input class="inputs " type="text" placeholder="" name="cli_endereco" value="<?= set_value('cli_endereco')?>" required="required"/>
                </div>
                <div class="input-box type3">
                    <label class="txt-form type3" for="endereco">Telefone*:</label>
                    <input class="inputs type3 phone" type="text" placeholder="" name="cli_telefone" value="<?= set_value('cli_telefone')?>" required="required"/>
                </div>
                <div class="input-box type3">
                    <label class="txt-form" for="endereco">Celular*:</label>
                    <input class="inputs phone" type="text" placeholder="" name="cli_celular" value="<?= set_value('cli_celular')?>" required="required"/>
                </div>
                <div class="senhas">
                    <label class="txt-form" for="senha">Senha*:</label>
                    <input class="inputs" type="password" placeholder="" name="cli_senha" required="required"/>
                    <label class="txt-form" for="confirma-senha">Confirmar Senha:</label>
                    <input class="inputs" type="password" placeholder="" name="senha_two" required="required"/>
                </div>
                <label class="txt-form" id="referencia" for="">Referência de entrega*</label>
                <textarea name="cli_referencia" id="" class="inputs referencia"><?= set_value('cli_referencia')?></textarea>
                <input type="submit" value="Cadastre-se" class="btn-1 right cadastre-bt" id="bt-ok-login">
            <?= form_close()?>

        </div>
    </div><!-- box-pedidos -->
</div>