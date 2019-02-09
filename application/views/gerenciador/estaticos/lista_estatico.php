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
    <h1>Estáticos</h1>    
</header>

<table class="listagem">
    <tr>
        <th class="checkbox"></th>
        <th>Categoria</th>
        <th>Descriçao</th>
        <th>Ações</th>
    </tr>
    <tbody>
    <?php if (count($estaticos) > 0):
            foreach ($estaticos as $estatico):
    ?>
        <tr>
            <td class="checkbox"></td>
            <td><?php echo $estatico->esc_nome?></td>
            <td><?php echo strip_tags(word_limiter($estatico->est_descricao, 4))?></td>
            <td>
                <a href="<?= site_url('gerenciador/estaticos/editar/'.$estatico->est_id) ?>" class="ico-edit" title="Editar">Editar</a>
                <!--<a href="<?= site_url('gerenciador/estaticos/excluir/'.$estatico->est_id) ?>" class="ico-delete" title="Apagar">Apagar</a>-->
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