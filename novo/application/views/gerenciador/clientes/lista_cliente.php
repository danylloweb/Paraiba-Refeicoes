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
    <h1>Clientes</h1>
    <?php /* echo form_open('gerenciador/clientes/busca', array('class' => 'busca'), array('busca' => 'busca') ) ?>
    <ul class="form-list" style="float: right">
            <li>
                <input type="text" style="width: 200px !important;" name="keyword" placeholder="Digite o nome do cliente" />
                <input type="submit" name="enviar" value="Buscar" />
            </li>
        </ul>
    <?php echo form_close() ?>
     <? */?>
</header>

<table class="listagem">
    <tr>
        <th class="checkbox"></th>
        <th>Nome</th>
        <th>Email</th>
        <th>Cidade</th>
        <th>CPF</th>
        <th>Ações</th>
    </tr>
    <tbody>
    <?php if (count($clientes) > 0):
            foreach ($clientes as $cliente):
    ?>
        <tr>
            <td class="checkbox"></td>
            <td><?php echo $cliente->cli_nome?></td>
            <td><?php echo $cliente->cli_email?></td>
            <td><?php echo $cliente->cli_cidade?></td>
            <td><?php echo $cliente->cli_cpf?></td>
            <td>
                <a href="<?= site_url('gerenciador/clientes/editar/'.$cliente->cli_id) ?>" class="ico-edit" title="Editar">Editar</a>
                <a href="<?= site_url('gerenciador/clientes/excluir/'.$cliente->cli_id) ?>" class="ico-delete funcao-apagar" title="Apagar">Apagar</a>
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