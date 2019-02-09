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
    <h1>Categoria de À la carte</h1>
    <a href="<?= site_url('gerenciador/alacartes_categorias/novo/') ?>" class="botao" title="Adicionar Categoria de alacarte">Adicionar Categoria de À la carte</a>
    <br/><br/>
</header>

<table class="listagem">
    <tr>
        <th class="checkbox"></th>
        <th>Nome</th>       
        <th>Imagem</th>       
        <th>Ações</th>
    </tr>
    <tbody>
    <?php if (count($categorias) > 0):
            foreach ($categorias as $categoria):
    ?>
        <tr>
            <td class="checkbox"></td>
            <td><?php echo $categoria->alc_nome?></td>            
            <td><span class="img"><img src="<?= base_url() ?>public/uploads/alacartes/<?php echo $categoria->alc_imagem?>" width="120" height="50" alt="" /></span></td>
            <td>
                <a href="<?= site_url('gerenciador/alacartes_categorias/editar/'.$categoria->alc_id) ?>" class="ico-edit" title="Editar">Editar</a>
                <a href="<?= site_url('gerenciador/alacartes_categorias/excluir/'.$categoria->alc_id) ?>" class="ico-delete" title="Apagar">Apagar</a>
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