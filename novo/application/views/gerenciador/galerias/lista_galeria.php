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
    <h1>Galerias</h1>
    
</header>

<table class="listagem">
    <tr>
        <th class="checkbox"></th>
        <th>Titulo</th>        
        <th>Ações</th>
    </tr>
    <tbody>
    <?php if (count($galerias) > 0):
            foreach ($galerias as $galeria):
    ?>
        <tr>
            <td class="checkbox"></td>
            <td><?php echo $galeria->gal_titulo?></td>            
            <td>
                <a href="<?= site_url('gerenciador/galerias/fotos/'.$galeria->gal_id) ?>" class="ico-image" title="Fotos da Galeria">Fotos</a>
                <a href="<?= site_url('gerenciador/galerias/editar/'.$galeria->gal_id) ?>" class="ico-edit" title="Editar">Editar</a>
                <a href="<?= site_url('gerenciador/galerias/excluir/'.$galeria->gal_id) ?>" class="ico-delete" title="Apagar">Apagar</a>                
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