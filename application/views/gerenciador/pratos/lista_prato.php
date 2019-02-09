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
    <h1>Pratos - À la carte.</h1>    
</header>
<?php  echo form_open('gerenciador/pratos/busca_prato', array('class' => 'busca'), array('busca' => 'busca') ) ?>

<ul class="form-list" style="float: right">
    <li>
        <input type="text" style="width: 200px !important;" name="keyword" placeholder="Digite o nome do Prato" />
        <input type="submit" name="enviar" value="Buscar" />
    </li>
</ul>
<?php echo form_close() ?>
<table class="listagem">
    <tr>
        <th class="checkbox"></th>
        <th>Categoria</th>
        <th>Titulo</th>
        <th>Preço</th>
        <th>Ações</th>
    </tr>
    <tbody>
    <?php if (count($pratos) > 0):
            foreach ($pratos as $prato):
    ?>
        <tr>
            <td class="checkbox"></td>
            <td><?php echo $prato->prc_nome?></td>
            <td><?php echo $prato->pra_nome?></td>
            <td><?php echo number_format($prato->pra_valor, 2, ',', '.')?></td>
            <td>
                <a href="<?= site_url('gerenciador/pratos/editar/'.$prato->pra_id) ?>" class="ico-edit" title="Editar">Editar</a>
                <a href="<?= site_url('gerenciador/pratos/excluir/'.$prato->pra_id) ?>" class="ico-delete" title="Apagar">Apagar</a>
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