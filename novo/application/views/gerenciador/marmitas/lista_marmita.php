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
    <h1>Marmitas</h1>    
</header>

<table class="listagem">
    <tr>
        <th class="checkbox"></th>
        <th>Dia da Semana</th>       
        <th>Data</th>       
        <th>Ações</th>
    </tr>
    <tbody>
    <?php if (count($marmitas) > 0):
            foreach ($marmitas as $marmita):
    ?>
        <tr>
            <td class="checkbox"></td>
            <td><?php echo $marmita->mar_dia_semana?></td>            
            <td><?php echo data_for_humans($marmita->mar_data)?></td>            
            <td>
                <a href="<?= site_url('gerenciador/marmitas/editar/'.$marmita->mar_id) ?>" class="ico-edit" title="Editar">Editar</a>
                <!--<a href="<?= site_url('gerenciador/noticias/excluir/'.$noticia->not_id) ?>" class="ico-delete" title="Apagar">Apagar</a>-->
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