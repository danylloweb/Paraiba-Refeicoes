<div class="container">
    <h1 class="t-page">Faça seu pedido online</h1>
    <div id="box-pedidos">
        <div class="txt1 n-quentinha">Quentinha R$ <?= number_format($preco_quentinha, 2, ',', '.') ?> - Entregamos apenas no Bessa, Intermares, Poço, Jacaré, Manaíra, Tambaú, Cabo Branco, Bairro dos Estados, Miramar e Tambauzinho as marmitas individuais e os pedidos à la carte, e nas empresas localizadas na grande João Pessoa e Cabedelo.</div>
        <div class="txt1 pedido-dia"><span>Pedido para hoje: </span><?= $marmita->mar_dia_semana ?> | <?= data_for_humans($marmita->mar_data) ?></div>
        <nav class="nav-etapas">
            <div class="row">
                <ul>
                    <div class="col-md-3"><li><span class="sprit ic-car"></span>Meu carrinho<span class="sprit set-sep"></span></li></div>
                    <div class="col-md-3"><li><span class="sprit ic-id "></span>Identificação<span class="sprit set-sep"></span></li></div>
                    <div class="col-md-3"><li class="active"><span class="sprit ic-end atv"></span>Endereço<span class="sprit set-sep"></span></li></div>
                    <div class="col-md-3"><li><span class="sprit ic-pag "></span>Pagamento</li></div>
                </ul>
            </div>
        </nav>

        <div id="box-confirma-dados">
            <?php echo form_open('confirmacao_endereco/atualizar') ?>
                <h1 class="t-acesso">Confira seus dados:</h1>
                <div class="mensagem" style="color: #BC2035"><?php echo $errocad != '' ? $errocad : '' ?></div>
                <div class="mensagem" style="color: #3D5509"><?php echo $okcad != '' ? $okcad : '' ?></div>
                <div class="input-box type2">
                    <label class="txt-form " for="nome">Nome Completo:</label>
                    <input class="inputs" type="text" placeholder="" name="cli_nome" value="<?= $cliente->cli_nome?>" required="required" ></input>
                </div>
                <div class="input-box type2">
                    <label class="txt-form" for="email">Email:</label>
                    <input class="inputs " type="text" value="<?= $cliente->cli_email?>" placeholder="" name="cli_email" required="required"></input>
                </div>
                <div class="input-box type2">
                    <label class="txt-form " for="endereco">Endereço:</label>
                    <input class="inputs " type="text" value="<?= $cliente->cli_endereco?>" placeholder="" name="cli_endereco" required="required"></input>
                </div>
                <div class="input-box type3">
                    <label class="txt-form type3" for="endereco">Telefone:</label>
                    <input class="inputs type3 phone" type="text" value="<?= $cliente->cli_telefone?>" placeholder="" name="cli_telefone" required="required"></input>
                </div>
                <div class="input-box type3">
                    <label class="txt-form" for="endereco">Celular:</label>
                    <input class="inputs phone" type="text" value="<?= $cliente->cli_celular?>" placeholder="" name="cli_celular" required="required"></input>
                </div>
                <div class="senhas">
                    <label class="txt-form" for="senha">Senha:</label>
                    <input class="inputs" type="password" value="" placeholder="" name="cli_senha" required="required"></input>
                    <label class="txt-form" for="confirma-senha">Confirmar Senha:</label>
                    <input class="inputs" type="password" placeholder="" value="" name="senha_two" required="required"></input>
                </div>
                <label class="txt-form" id="referencia" for="confirma-senha">Referencia de entrega</label>
                <textarea name="cli_referencia" id="" class="inputs referencia"><?= $cliente->cli_referencia?></textarea>                
                <a href="<?= site_url('pagamento')?>" class="btn-1 right cadastre-bt" style="margin-top: 10px;" title="">Próxima etapa</a>                
                <input type="submit" value="Atualizar" class="btn-1 right cadastre-bt" id="bt-ok-login">
            <?= form_close()?>

        </div>
    </div><!-- box-pedidos -->
</div>