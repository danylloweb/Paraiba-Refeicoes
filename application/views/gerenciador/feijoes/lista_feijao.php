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
    <h1>Feijões</h1>
    <a href="<?= site_url('gerenciador/feijoes/novo/') ?>" class="botao" title="Adicionar Feijão">Adicionar Feijão</a>
    <?php echo form_open('gerenciador/feijoes/busca', array('class' => 'busca'), array('busca' => 'busca') ) ?>
    <ul class="form-list" style="float: right">
            <li>
                <input type="text" style="width: 200px !important;" name="keyword" placeholder="Digite o nome" />
                <input type="submit" name="enviar" value="Buscar" />
            </li>
        </ul>
    </form> 
</header>

<table class="listagem">
    <tr>
        <th class="checkbox"></th>
        <th>Nome</th>       
        <th>Ações</th>
    </tr>
    <tbody>
    <?php if (count($feijoes) > 0):
            foreach ($feijoes as $feijao):
    ?>
        <tr>
            <td class="checkbox"></td>
            <td><?php echo $feijao->fei_nome?></td>            
            <td>
                <a href="<?= site_url('gerenciador/feijoes/editar/'.$feijao->fei_id) ?>" class="ico-edit" title="Editar">Editar</a>
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