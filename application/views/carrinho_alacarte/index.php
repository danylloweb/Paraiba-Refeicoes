<div class="container">

    <h1 class="t-page">Faça seu pedido online</h1>
    <div id="box-pedidos">
        <div class="txt1 n-quentinha">Entregamos apenas no Bessa, Intermares, Poço, Jacaré, Manaíra, Tambaú, Cabo Branco, Bairro dos Estados, Miramar e Tambauzinho as marmitas individuais e os pedidos à la carte, e nas empresas localizadas na grande João Pessoa e Cabedelo. <b>Horário de entrega de 11h as 14h
                de segunda à sábado.</b></div>
        <div class="txt1 pedido-dia"><span>Pedido para hoje: </span><?= $marmita->mar_dia_semana ?> | <?= data_for_humans($marmita->mar_data) ?></div>
        <nav class="nav-etapas">
            <div class="row">
                <ul>
                    <div class="col-md-3"><li class="active"><span class="sprit ic-car atv"></span>Meu carrinho<span class="sprit set-sep"></span></li></div>
                    <div class="col-md-3"><li><span class="sprit ic-id "></span>Identificação<span class="sprit set-sep"></span></li></div>
                    <div class="col-md-3"><li><span class="sprit ic-end "></span>Endereço<span class="sprit set-sep"></span></li></div>
                    <div class="col-md-3"><li><span class="sprit ic-pag "></span>Pagamento</li></div>
                </ul>
            </div>
        </nav>
        <?php echo form_open('carrinho_alacarte/atualizar_carrinho') ?>
            <table class="tab-carrinho">
                <thead>
                    <tr>
                        <th class="t-carrinho">Itens Pedidos </th>
                        <th class="t-carrinho">Quantidade </th>
                        <th class="t-carrinho">Excluir</th>
                        <th class="t-carrinho">Subtotal</th>
                    </tr>
                </thead>
                <!-- Corpo da tabela -->    
                <tbody>
                <?php $i = 1; ?>
                <?php if (count($this->cart->contents()) > 0): ?>
                    <?php foreach ($this->cart->contents() as $cart): ?>
                        <?php $prato = $this->prato->get_prato(array('pra_id' => $cart['id'])); ?>
                        <?php echo form_hidden($i . '_rowid', $cart['rowid']); ?>

                        <tr>
                            <th class="info-marmita">
                                <?= $prato->pra_nome ?>                                
                            </th>                            
                            <td>
                                <span style="margin-left: 50px;"><?php echo $cart['qty'] ?></span>
                            </td>
                            <td><a href="<?php echo site_url('carrinho_alacarte/remover_marmita/' . $cart['rowid']) ?>" >Remove</a></td>
                            <td class="valor-marmita">R$ <?= number_format($cart['subtotal'], 2, ',', '.') ?></td>
                        </tr>

                        <?php $i++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>                    
                </tbody>
                <tfoot> 
                    <tr> 
                        <th colspan="4" class="total-carrinho">Total: <?php echo $this->cart->format_number($this->cart->total()); ?></th>
                    </tr>
                </tfoot>
            </table>
        </form>

        <a href="<?= site_url('cardapio_alacarte')?>" class="btn-1 left">Adicionar Prato</a>
        <a href="<?= site_url('identificacao')?>" class="btn-1 right">Próxima etapa</a>
    </div><!-- box-pedidos -->
</div>