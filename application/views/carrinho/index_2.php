<div class="container">
    <h1 class="t-page">Faça seu pedido online</h1>
    <div id="box-pedidos">
        <div class="txt1 n-quentinha">Quentinha R$ <?= number_format($preco_quentinha, 2, ',', '.') ?> - Entregamos apenas no Bessa, Intermares, Poço, Jacaré, Manaíra, Tambaú, Cabo Branco, Bairro dos Estados, Miramar e Tambauzinho as marmitas individuais e os pedidos à la carte, e nas empresas localizadas na grande João Pessoa e Cabedelo.</div>
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
	<?php echo form_open('carrinho/atualizar_carrinho') ?>
        <table class="tab-carrinho">
            <thead>
                <tr>
                    <th class="t-carrinho">Marmita </th>
                    <th class="t-carrinho">Quantidade</th>
                    <th class="t-carrinho">Excluir</th>
                    <th class="t-carrinho">Subtotal</th>
                </tr>
            </thead>
                        <!-- Corpo da tabela -->    
            <tbody>
                <?php $i = 1; ?>
                <?php if (count($this->cart->contents()) > 0): ?>
                    <?php foreach ($this->cart->contents() as $cart): ?>
                        <?php $refeicao = $this->refeicao->get_refeicao(array('ref_id' => $cart['id'])); ?>
                        <?php echo form_hidden($i . '_rowid', $cart['rowid']); ?>

                        <tr>
                            <th class="info-marmita">
                                <?= $refeicao->ref_feijao ? $refeicao->ref_feijao . ' - ' : '' ?>
                                <?= $refeicao->ref_arroz ? $refeicao->ref_arroz : '' ?>
                                <?= $refeicao->ref_macarrao ? ' - ' . $refeicao->ref_macarrao : '' ?>
                                <?= $refeicao->ref_salada_um ? ' - ' . $refeicao->ref_salada_um : '' ?>
                                <?= $refeicao->ref_salada_dois ? ' - ' . $refeicao->ref_salada_dois : '' ?>
                                <?= $refeicao->ref_acompanhamento ? ' - ' . $refeicao->ref_acompanhamento : '' ?>
                                <?= $refeicao->ref_carne_um ? ' - ' . $refeicao->ref_carne_um : '' ?>
                                <?= $refeicao->ref_carne_dois ? ' - ' . $refeicao->ref_carne_dois : '' ?>
                                <?= $refeicao->ref_bebida ? ' - ' . $refeicao->ref_bebida : '' ?>
                                <?= $refeicao->ref_sobremesa ? ' - ' . $refeicao->ref_sobremesa : '' ?>
                            </th>                            
                            <td>
                                <div class="ranger">
                                    <input type="text" name="<?php echo $i ?>_qty" value="<?php echo $cart['qty'] ?>">
                                    <span>
                                        <a href="#" class="mais">+</a>
                                        <a href="#" class="menos">-</a>
                                    </span>
                                </div>
                            </td>
                            <td><a href="<?php echo site_url('carrinho/remover_marmita/' . $cart['rowid']) ?>" class="sprit exclui-m"></a></td>
                            <td class="valor-marmita">R$ <?= number_format($cart['subtotal'], 2, ',', '.') ?></td>
                        </tr>

                        <?php $i++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>                
            </tbody>
            <tfoot> 
                <tr> 
                    <th colspan="4" class="total-carrinho">Total: <?php echo $this->cart->format_number($this->cart->total()); ?>
                     <input type="submit" class="btn-1 bt-atualiza" value="Atualizar Carrinho">
                    </th>
                  
                </tr>
            </tfoot>
        </table>
	<?php echo form_close() ?>

        <div>
            <a href="<?= site_url('cardapio') ?>" class="btn-1 left">Adicionar Marmita</a>
            <a href="<?= site_url('identificacao') ?>" class="btn-1 right">Próxima etapa</a>
        </div>
    </div><!-- box-pedidos -->
</div>
