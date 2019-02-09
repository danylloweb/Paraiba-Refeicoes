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
    <h1>Lista de Newsletter</h1>
    
</header>

<table class="listagem">
    <tr>
        <th class="checkbox"><input type="checkbox" name="checkall" id="checkall" /></th>
        <th>Título</th>
        <th>Imagem</th>
        <th></th>
        <th>Ações</th>
    </tr>
    <tbody>
    <?php if (count($newsletters) > 0):
            foreach ($newsletters as $newsletter):
    ?>
        <tr>
            <td class="checkbox"><input type="checkbox" name="id_email[]" value="<?php echo $newsletter->new_id?>" /></td>
            <td><?php echo $newsletter->new_titulo?></td>            
            <td><span class="img"><img src="<?= base_url() ?>public/uploads/newsletters/<?php echo $newsletter->new_imagem?>" width="100" height="50" alt="" /></span></td>
            <td></td>
            <td>
                <a href="<?= site_url('gerenciador/newsletters/editar/'.$newsletter->new_id) ?>" class="ico-edit" title="Editar">Editar</a>
                <a href="<?= site_url('gerenciador/newsletters/excluir/'.$newsletter->new_id) ?>" class="ico-delete funcao-apagar" title="Apagar">Apagar</a>
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