<div class="center">
    <h1 class="t-page">Faça seu pedido online</h1>
    <?php echo form_open('pagamento/processar') ?>
    <div id="box-pedidos">
        <div class="txt1 n-quentinha">Quentinha R$ <?= number_format($preco_quentinha, 2, ',', '.') ?> - Entregamos apenas no Bessa.</div>
        <div class="txt1 pedido-dia"><span>Pedido para hoje: </span><?= $marmita->mar_dia_semana ?> | <?= data_for_humans($marmita->mar_data) ?></div>
        <nav class="nav-etapas">
            <ul>
                <li><span class="sprit ic-car"></span>Meu carrinho</li><span class="sprit set-sep"></span>
                <li><span class="sprit ic-id "></span>Identificação</li><span class="sprit set-sep"></span>
                <li><span class="sprit ic-end "></span>Endereço</li><span class="sprit set-sep"></span>
                <li><span class="sprit ic-pag atv"></span>Pagamento</li>
            </ul>
        </nav>

        <div class="total-compra">Total: <?php echo $this->cart->format_number($this->cart->total()); ?></div>
        <div class="op-pag">
            <input type="radio" name="ped_tipo_pagamento" value="dinheiro" checked="checked">
            Dinheiro
            <span>Troco para:</span>
            <input type="text" name="ped_dinheiro_troco" class="inputs preco" id="troco">
        </div>
        <div class="op-pag maq">
            <input type="radio" name="ped_tipo_pagamento" value="maquineta" >
            Maquineta
        </div>
    </div><!-- box-pedidos -->
    <input type="submit" value="Finalizar Pedido" class="finaliz-p btn-1">
    <?= form_close()?>
</div>