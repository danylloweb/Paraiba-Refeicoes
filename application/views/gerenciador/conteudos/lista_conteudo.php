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
    <h1>Conteúdos Web's</h1>    
</header>

<table class="listagem">
    <tr>
        <th class="checkbox"></th>
        <th>Titulo</th>
        <th>Imagem</th>
        <th>Lançamento</th>
        <th>Destaque</th>
        <th>Ações</th>
    </tr>
    <tbody>
    <?php if (count($conteudos) > 0):
            foreach ($conteudos as $conteudo):
    ?>
        <tr>
            <td class="checkbox"></td>
            <td><?php echo $conteudo->cow_titulo?></td>
            <td><span class="img"><img src="<?= base_url() ?>public/uploads/conteudos/<?php echo $conteudo->cow_imagem?>" width="80" height="50" alt="" /></span></td>
            <td><?= $conteudo->cow_lancamento == 1 ? 'Sim' : 'Não'?></td>
            <td><?= $conteudo->cow_destaque == 1 ? 'Sim' : 'Não'?></td>
            <td>
                <a href="<?= site_url('gerenciador/conteudos/editar/'.$conteudo->cow_id) ?>" class="ico-edit" title="Editar">Editar</a>
                <a href="<?= site_url('gerenciador/conteudos/excluir/'.$conteudo->cow_id) ?>" class="ico-delete" title="Apagar">Apagar</a>
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