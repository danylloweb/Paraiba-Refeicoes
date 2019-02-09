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
    <h1>Empresa</h1>    
</header>

<table class="listagem">
    <tr>
        <th class="checkbox"></th>
        <th>Categoria</th>
        <th>Descrição</th>
        <th>Imagem</th>
        <th>Ações</th>
    </tr>
    <tbody>
    <?php if (count($empresas) > 0):
            foreach ($empresas as $empresa):
    ?>
        <tr>
            <td class="checkbox"></td>
            <td><?php echo ucwords($empresa->emp_categoria)?></td>
            <td><?php echo strip_tags(word_limiter($empresa->emp_descricao,15))?></td>
            <td><span class="img"><img src="<?= base_url() ?>public/uploads/empresas/<?php echo $empresa->emp_imagem?>" width="80" height="50" alt="" /></span></td>
            <td>
                <a href="<?= site_url('gerenciador/empresas/editar/'.$empresa->emp_id) ?>" class="ico-edit" title="Editar">Editar</a>
                <a href="<?= site_url('gerenciador/empresas/excluir/'.$empresa->emp_id) ?>" class="ico-delete" title="Apagar">Apagar</a>
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