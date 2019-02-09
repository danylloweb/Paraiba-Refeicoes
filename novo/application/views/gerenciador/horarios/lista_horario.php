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
    <h1>Horários</h1>    
</header>

<table class="listagem">
    <tr>
        <th class="checkbox"></th>
        <th>Dia</th>
        <th>Hora</th>
        <th>Ativo</th>
        <th>Fixo</th>
        <th>Ações</th>
    </tr>
    <tbody>
    <?php if (count($horarios) > 0):
            foreach ($horarios as $horario):
    ?>
        <tr>
            <td class="checkbox"></td>
            <td><?php echo ucfirst($horario->hor_dia)?></td>
            <td><?php echo $horario->hor_hora?></td>
            <td><?php echo $horario->hor_ativo == 1 ? 'Sim' : 'Não'?></td>
            <td><?php echo $horario->hor_fixo == 1 ? 'Sim' : 'Não'?></td>
            <td>
                <a href="<?= site_url('gerenciador/horarios/editar/'.$horario->hor_id) ?>" class="ico-edit" title="Editar">Editar</a>
                <a href="<?= site_url('gerenciador/horarios/excluir/'.$horario->hor_id) ?>" class="ico-delete" title="Apagar">Apagar</a>
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