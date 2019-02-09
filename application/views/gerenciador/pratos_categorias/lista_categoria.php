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
    <h1>Categoria de Pratos</h1>
    <a href="<?= site_url('gerenciador/pratos_categorias/novo/') ?>" class="botao" title="Adicionar Categoria de prato">Adicionar Categoria de Prato</a>
    <br/><br/>
</header>

<table class="listagem">
    <tr>
        <th class="checkbox"></th>
        <th>Nome</th>       
        <th>Ações</th>
    </tr>
    <tbody>
    <?php if (count($categorias) > 0):
            foreach ($categorias as $categoria):
    ?>
        <tr>
            <td class="checkbox"></td>
            <td><?php echo $categoria->prc_nome?></td>            
            <td>
                <a href="<?= site_url('gerenciador/pratos_categorias/editar/'.$categoria->prc_id) ?>" class="ico-edit" title="Editar">Editar</a>
                <a href="<?= site_url('gerenciador/pratos_categorias/excluir/'.$categoria->prc_id) ?>" class="ico-delete" title="Apagar">Apagar</a>
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