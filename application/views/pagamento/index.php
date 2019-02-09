<div class="container">
    <h1 class="t-page">Faça seu pedido online</h1>
    <?php echo $this->session->userdata('tipo_cardapio') == 'marmita' ? form_open('pagamento/processar') : form_open('pagamento/processar_alacarte') ?>
    <div id="box-pedidos">
        <div class="txt1 n-quentinha">Quentinha R$ <?= number_format($preco_quentinha, 2, ',', '.') ?> - Entregamos apenas no Bessa, Intermares, Poço, Jacaré, Manaíra, Tambaú, Cabo Branco, Bairro dos Estados, Miramar e Tambauzinho as marmitas individuais e os pedidos à la carte, e nas empresas localizadas na grande João Pessoa e Cabedelo.</div>
        <div class="txt1 pedido-dia"><span>Pedido para hoje: </span><?= $marmita->mar_dia_semana ?> | <?= data_for_humans($marmita->mar_data) ?></div>
        <nav class="nav-etapas">
            <div class="row">
                <ul>
                    <div class="col-md-3"><li><span class="sprit ic-car"></span>Meu carrinho<span class="sprit set-sep"></span></li></div>
                    <div class="col-md-3"><li><span class="sprit ic-id "></span>Identificação<span class="sprit set-sep"></span></li></div>
                    <div class="col-md-3"><li><span class="sprit ic-end "></span>Endereço<span class="sprit set-sep"></span></li></div>
                    <div class="col-md-3"><li class="active"><span class="sprit ic-pag atv"></span>Pagamento</li></div>
                </ul>
            </div>
        </nav>
                <?php if ($this->session->userdata('tipo_cardapio')=='marmita'): ?>
                    <table class="tab-carrinho">
            <thead>
                <tr>
                    <th class="t-carrinho">Marmita </th>
                    <th class="t-carrinho">Quantidade</th>
                    
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
                                    
                                </div>
                            </td>
                            
                            <td class="valor-marmita">R$ <?= number_format($cart['subtotal'], 2, ',', '.') ?></td>
                        </tr>

                        <?php $i++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>                
            </tbody>
            <tfoot> 
                <tr> 
                    <th colspan="4" class="total-carrinho">Total: <?php echo $this->cart->format_number($this->cart->total()); ?>
                     
                    </th>
                  
                </tr>
            </tfoot>
        </table>
                <?php endif ?>
                 <?php if ($this->session->userdata('tipo_cardapio')!='marmita'): ?>
                 <table class="tab-carrinho">
                <thead>
                    <tr>
                        <th class="t-carrinho">Itens Pedidos </th>
                        <th class="t-carrinho">Quantidade </th>
                      
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
              <?php endif ?>  
        <div class="op-pag" style="margin: 60px 0 0 !important; float: none; display: block; ">
            <div class="row">
                <div class="col-md-3">
                    <?php if ($this->session->userdata('tipo_cardapio')=='marmita'): ?>
                        <div class="total-compra">Total: <?php echo $this->cart->format_number($this->cart->total()); ?></div>
                    
                    <?php endif ?>
                    <?php if ($this->session->userdata('tipo_cardapio')!='marmita'): ?>
                        <div class="total-compra">Total: <?php echo $this->cart->format_number($this->cart->total()); ?></div>
                    
                    <?php endif ?>
                </div>
                <div class="col-md-3">                    
                    <div>
                        <br><br>
                        <input type="radio" name="ped_tipo_pagamento" value="dinheiro" checked="checked">
                        Dinheiro
                    </div>
                </div>
                <div class="col-md-5">
                    <div>
                        <br><br>
                        <span>Troco para:</span>
                        <input type="text" name="ped_dinheiro_troco" class="inputs preco" id="troco">
                    </div>
                </div>
            </div>
        </div>
		<?php /*
        <div class="op-pag maq">
            <input type="radio" name="ped_tipo_pagamento" value="maquineta" >
            Maquineta
        </div>
		*/ ?>
    </div><!-- box-pedidos -->
    <input type="submit" value="Finalizar Pedido" class="finaliz-p btn-1">
    <?= form_close()?>
</div>