<div class="dialog">
    
    <?php if ($erro != ''):?>    
    <div class="error">
        <p>
            <span class="ui-icon ui-icon-alert"></span>
            <strong>Alerta:</strong>
            <?php echo $erro?>
        </p>
    </div>
    <?php endif;?>
    <?php if ($msg != ''):?>    
    <div class="success">
        <p>
            <span class="ui-icon ui-icon-circle-check"></span>
            <strong>Sucesso:</strong>
            <?php echo $msg?>
        </p>
    </div>
    <?php endif;?>
    
</div>
<header id="head">
    <h1>Pedidos de pratos (À la carte)</h1>
</header>
<br>
<table class="listagem">
    <tr>
        <th class="checkbox"></th>
        <th>Cód.</th>
        <th>Data</th>
        <th>Cliente</th>
        <th>Status</th>        
        <th>Ações</th>
    </tr>
    <tbody>
    <?php if (count($pedidos) > 0):
            foreach ($pedidos as $pedido):
    ?>
        <tr <?php  if ($pedido->pep_status == "pendente"):?>style="font-weight: bold; color: #000;"<?php endif;?>>
            <td class="checkbox"></td>
            <td><?php echo $pedido->pep_id?></td>
            <td><?php echo dh_for_humans($pedido->pep_data_criacao) ?></td>
            <td><?php echo $pedido->cli_email?></td>
            <td><?php echo ucwords($pedido->pep_status) ?></td>            
            <td>
                <a href="<?= site_url('gerenciador/pedidos_pratos/visualizar/'.$pedido->pep_id) ?>" class="ico-edit" title="Visualizar">Visualizar</a>
            </td>
        </tr>
      <?php 
            endforeach;
        endif;
      
      ?> 
    </tbody>
</table>

<footer id="foot">
    <nav class="paginacao">
        <?php echo $this->pagination->create_links()?>
    </nav>
<!--    <nav class="batch">-->
<!--        <a href="#" class="ico-bin" title="Apagar Selecionados">Apagar Selecionados</a>-->
<!--    </nav>-->
</footer>
