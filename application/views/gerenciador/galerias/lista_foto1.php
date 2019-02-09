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

<style type="text/css">
    .detalhes_pedido legend{ color: #0073EA; font-weight: bold; font-size: 16px; margin: 15px 0px 15px 0px; }
    .detalhes_pedido ul li{ color: #555; border-bottom: 1px solid #ccc; padding-bottom: 5px; }
    .detalhes_pedido table { margin: 0px 0px 20px 0px; width: 100%; }
    .detalhes_pedido table tr th { 
        background-color: #ddd;
        color: #666;
    }
    .detalhes_pedido table tr td, .detalhes_pedido table tr th { text-align: left; padding: 10px; margin: 0px; border-radius: 5px; }
    .detalhes_pedido table tr td {
        background: #fff;
        color: #777;
    }
</style>

<header id="head">
    <h1>Cadastro/Listagem de Fotos</h1>
</header>

<fieldset class="grid_6 alpha detalhes_pedido">    
    <ul class="form-list">                            
        <?php echo form_open_multipart('gerenciador/galerias/add_foto/' . $this->uri->segment(4)); ?>
        <li>
            <p>
                <label for="foto">Foto</label>
                <input type="file" name="gaf_imagem" value="">        
                <br>
                <label for="legenda">Legenda</label>        
                <input type="text" name="gaf_legenda" value="" id="legenda1">    
                <label for="legenda">Imagem Principal</label>        
                <input type="checkbox" name="gaf_principal" value="1" id="legenda1">    
            </p>            

            <p><input type="submit" value="Enviar foto!"/></p></li>
        <?php form_close() ?>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha detalhes_pedido">
    <legend>Fotos Cadastradas</legend>
    <a href="#" class="botao atualizarFoto" title="Atualizar Foto Principal">Atualizar Foto Principal</a><br/><br/> 
    <table>
        <tbody>
            <tr>
                <th>Foto</th>
                <th>Legenda</th>
                <th>Principal</th>
                <th>Ação</th>
            </tr>
        </tbody>
        <tbody>                

            <? if (count($galerias_foto) > 0): ?>
                <? foreach ($galerias_foto as $foto): ?>
                    <tr>
                        <td><span class="img"><img src="<?= base_url() ?>public/uploads/galerias/<?php echo $foto->gaf_imagem ?>" width="125" height="80" alt="" /></span></td>
                        <td><?php echo $foto->gaf_legenda ?></td>
                        <td><input type="radio" id="<?= $foto->gaf_id?>" name="gaf_principal" data-id="<?= $foto->gaf_gal_id?>" class="checkFoto" <?= $foto->gaf_principal == 1 ? 'checked="checked"' : '' ?> /></td>
                        <td><a href="<?= site_url('gerenciador/galerias/excluir_foto/' . $foto->gaf_id . "/" . $foto->gaf_gal_id) ?>" class="ico-delete" title="Apagar">Apagar</a></td>
                    </tr>
                <? endforeach; ?>
            <? endif; ?>


        </tbody>
    </table>    
</fieldset>


<br class="clear" />

<a href="<?= site_url('gerenciador/galerias/') ?>" class="botao" title="Voltar">&crarr; Voltar</a>
