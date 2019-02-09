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
    <?php /* if ($oksend != ''): ?>    
      <div class="success">
      <p>
      <span class="ui-icon ui-icon-circle-check"></span><?php echo $oksend != '' ? $oksend : ''?>
      </p>
      </div>
      <?php endif; */ ?>
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
    .detalhes_pedido p {color: #0073EA}
</style>

<header id="head">
    <h1>Resposta da Cotação - Cód. <?php echo $pedido->ped_id ?></h1>    
    <br/><br/>
</header>
<!-- Mensagem para a resposta do orçamento-->
<div class="detalhes_pedido">
    <?php echo form_open('gerenciador/pedidos/enviar/' . $pedido->ped_id, array('id' => 'formEnvio')) ?>
    <fieldset class="grid_9 alpha">
        <ul class="form-list">
            <li>
                <label for="Descricao">Texto da resposta <em>*</em></label>    
                <textarea name="texto" class="ckeditor" rows="" placeholder="Coloque sua resposta da cotação aqui" cols=""></textarea>    
            </li>
        </ul>
    </fieldset>

    
    <input type="hidden" name="id_pedido" value="<?php echo $pedido->ped_id ?>"/>
    <input type="hidden" name="email" value="<?php echo $pedido->ped_email_cliente ?>"/>
    <input type="hidden" name="cliente" value="<?php echo $pedido->ped_nome_cliente ?>"/>

    <input type="submit" class="btnPedido" value="Enviar"/>
    <?php echo form_close() ?>
</div>

<br class="clear" />

<a href="<?= site_url('gerenciador/pedidos/visualizar/' . $pedido->ped_id) ?>" class="botao" title="Voltar">&crarr; Voltar</a>
