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
    <h1>SubCategorias de Produtos</h1>
    <a href="<?= site_url('gerenciador/subcategorias/novo/') ?>" class="botao" title="Adicionar SubCategoria">Nova SubCategoria</a>
</header>
<br>
<table class="listagem">
    <tr>
        <th class="checkbox"></th>
        <th>SubCategoria</th>
        <th>Categoria</th>
        <th>Ações</th>
    </tr>
    <tbody>
    <?php if (count($subcategorias) > 0):
            foreach ($subcategorias as $subcategoria):
    ?>
        <tr>
            <td class="checkbox"></td>
            <td><?php echo $subcategoria->prs_nome?></td>
            <td><?php echo $subcategoria->prc_nome?></td>
            <td>
                <a href="<?= site_url('gerenciador/subcategorias/editar/'.$subcategoria->prs_id) ?>" class="ico-edit" title="Editar">Editar</a>
                <a href="<?= site_url('gerenciador/subcategorias/excluir/'.$subcategoria->prs_id) ?>" class="ico-delete funcao-apagar" title="Apagar">Apagar</a>
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