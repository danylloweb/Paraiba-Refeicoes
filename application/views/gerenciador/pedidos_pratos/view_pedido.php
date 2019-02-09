<link rel="stylesheet" type="text/css" href="print.css" media="print" />
<div class="dialog">
    <?php if (isset($sucesso)): ?>    
        <div class="success">
            <p>
                <span class="ui-icon ui-icon-circle-check"></span>
                <strong>Sucesso:</strong>
                <?php echo $sucesso ?>
            </p>
        </div>
    <?php endif; ?>
    <?php if ($oksend != ''): ?>    
        <div class="success">
            <p>
                <span class="ui-icon ui-icon-circle-check"></span><?php echo $oksend != '' ? $oksend : '' ?>
            </p>
        </div>
    <?php endif; ?>
</div>

<style type="text/css">
    .detalhes_pedido legend{ color: #0073EA; font-weight: bold; font-size: 16px; margin: 15px 0px 15px 0px; }
    .detalhes_pedido ul li{ color: #555; border-bottom: 1px solid #ccc; padding-bottom: 5px; }
    .detalhes_pedido table { margin: 0px 0px 20px 0px; width: 100%; }
    .detalhes_pedido table tr th { 
        background-color: #ddd;
        color: #666;
    }
    .detalhes_pedido table tr td, .detalhes_pedido table tr th { text-align: left; padding: 10px; margin: 0px; border-radius: 5px; }
    .detalhes_pedido table tr td {
        background: #fff;
        color: #777;
    }
</style>

<header id="head">
    <h1>Detalhe do pedido Cód. <?php echo $pedido->pep_id ?> - 
        <a href="javascript:;" onclick="window.print();
                return false"><img src="http://lh5.ggpht.com/_evBfd-eZVO0/TMQ63ipSMII/AAAAAAAAA4s/tAPNVq7fVYw/print.png" title="Imprimir" /></a></h1>    
    <br/><br/>
</header>
<fieldset class="grid_6 alpha detalhes_pedido">
    <legend>Dados Cliente</legend><br>
    <ul class="form-list">
        <li>
            Cliente: <?php echo $pedido->cli_nome ?>
        </li>        
        <li class="email-print">
            Email: <?php echo $pedido->cli_email ?>
        </li>
        <li>
            Telefone: <?php echo $pedido->cli_telefone ?>
        </li>
        <li>
            Celular: <?php echo $pedido->cli_celular ?>
        </li>
        <li>
            Endereço: <?php echo $pedido->cli_endereco ?>
        </li>
        <li>
            Referência: <?php echo $pedido->cli_referencia ?>
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha detalhes_pedido">
    <legend style="font-weight: bold; margin: 15px 0 15px 0; font-size: 14px">Dados Pedido</legend><br>
    <ul class="form-list">
        <li>
            Data do pedido: <?php echo dh_for_humans($pedido->pep_data_criacao) ?>
        </li>            
        <li>
            Tipo de pagamento: <?php echo ucfirst($pedido->pep_tipo_pagamento) ?>
        </li>            
        <li>
            Valor do pedido: <?php echo number_format($pedido->pep_valor_pedido, 2, ",", ".")?>
        </li>            
        <li>
            Dinheiro para troco: <?php echo $pedido->pep_dinheiro_troco != 0.00 ? number_format($pedido->pep_dinheiro_troco, 2, ",", ".") : 'Sem troco'?>
        </li>            
        <li>
            <?php echo form_open() ?>
            Status: 
            <select name="pep_status" style="width: 250px !important">
                'cancelado','pendente','encaminhado entrega','finalizado'                
                <option value="pendente" <?php echo set_selecionado('pendente', $pedido->pep_status, 'selected') ?>>Pendente</option>                                
                <option value="encaminhado" <?php echo set_selecionado('encaminhado', $pedido->pep_status, 'selected') ?>>Encaminhado</option>
                <option value="entregue" <?php echo set_selecionado('entregue', $pedido->pep_status, 'selected') ?>>Entregue</option>
            </select>
            <br/><br/>
            <input type="submit" class="btnPedido none" value="Atualizar"/>
            <?php echo form_close() ?>
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha detalhes_pedido">
    <legend>Itens da Cotação</legend><br>
    <?php if (count($itens) > 0): ?>
        <table>
            <tbody>
                <tr>                    
                    <th>Quantidade</th>                                        
                    <th>Codigo do Prato</th>                                        
                    <th>Nome do Prato</th>                                        
                    <th>Valor do Prato</th>                                        
                </tr>
            </tbody>
            <tbody>
                <?php foreach ($itens as $item): ?>
                    <tr>
                        <td><?= $item->ppi_quantidade?></td>
                        <td><?= $item->pra_id?></td>                        
                        <td><?= $item->pra_nome?></td>                        
                        <td><?= number_format($item->pra_valor, 2, ",", ".")?></td>                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</fieldset>

<br class="clear" />

<a href="<?= site_url('gerenciador/pedidos_pratos') ?>" class="botao none" title="Voltar">&crarr; Voltar</a>
