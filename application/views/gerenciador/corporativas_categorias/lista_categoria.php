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
    <h1>Categorias Corporativas</h1>
    <a href="<?= site_url('gerenciador/corporativas_categorias/novo/') ?>" class="botao" title="Adicionar Categoria">Nova Categoria</a>
</header>
<br>
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
            <td><?php echo $categoria->coc_nome?></td>
            <td>
                <a href="<?= site_url('gerenciador/corporativas_categorias/editar/'.$categoria->coc_id) ?>" class="ico-edit" title="Editar">Editar</a>
                <a href="<?= site_url('gerenciador/corporativas_categorias/excluir/'.$categoria->coc_id) ?>" class="ico-delete funcao-apagar" title="Apagar">Apagar</a>
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