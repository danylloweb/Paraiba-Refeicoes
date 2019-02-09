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
    <h1>Corporativas</h1>
    <!--<a href="<?= site_url('gerenciador/corporativas/novo/') ?>" class="botao" title="Adicionar corporativa">Adicionar Cporativa</a>-->
    <!--<br/><br/>-->
</header>

<table class="listagem">
    <tr>
        <th class="checkbox"></th>
        <th>Categoria</th>       
        <th>Nome</th>       
        <th>Ações</th>
    </tr>
    <tbody>
    <?php if (count($corporativas) > 0):
            foreach ($corporativas as $corporativa):
    ?>
        <tr>
            <td class="checkbox"></td>
            <td><?php echo $corporativa->coc_nome?></td>            
            <td><?php echo $corporativa->cor_nome?></td>            
            <td>
                <a href="<?= site_url('gerenciador/corporativas/editar/'.$corporativa->cor_id) ?>" class="ico-edit" title="Editar">Editar</a>
                <a href="<?= site_url('gerenciador/corporativas/excluir/'.$corporativa->cor_id) ?>" class="ico-delete" title="Apagar">Apagar</a>
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