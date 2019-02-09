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
    <h1>Emails</h1>
    
</header>

<table class="listagem">
    <tr>
        <th class="checkbox"></th>
        <th>Email</th>
        <th>Nome</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>
    <tbody>
    <?php if (count($emails) > 0):
            foreach ($emails as $email):
    ?>
        <tr>
            <td class="checkbox"></td>
            <td><?php echo $email->ema_email?></td>
            <td><?php echo $email->ema_user?></td>
            <td align="center"><input type="checkbox" <? if ($email->ema_status): ?>checked="checked"<? endif;?> disabled="disabled" /></td>            
            <td>
                <a href="<?= site_url('gerenciador/emails/editar/'.$email->ema_id) ?>" class="ico-edit" title="Editar">Editar</a>
                <a href="<?= site_url('gerenciador/emails/excluir/'.$email->ema_id) ?>" class="ico-delete" title="Apagar">Apagar</a>
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