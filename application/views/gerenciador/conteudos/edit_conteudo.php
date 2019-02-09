<div class="dialog">
    <?php if (isset($erros)): ?>
        <div class="error">
            <p>
                <span class="ui-icon ui-icon-alert"></span>
                <strong>Alerta:</strong>
                <?php echo $erros ?>
            </p>
        </div>
    <?php endif; ?>

</div>
<header id="head">
    <h1>Novo Episodio</h1>
</header>

<?php echo form_open_multipart('') ?>
<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="titulo">Titulo <em>*</em></label>
            <input type="text" name="cow_titulo" id="titulo" value="<?php echo $conteudo->cow_titulo ?>" required="required" />
        </li>                  
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="data">Data do conteudo</label>
            <input type="text" name="cow_data" class="data" value="<?= data_for_humans($conteudo->cow_data)?>" />
        </li>            
    </ul>
</fieldset>
<fieldset class="grid_4 alpha">
    <ul class="form-list">
        <li>
            <label for="url">Url do video <em>*</em></label>
            <input type="text" name="cow_url" class="" value="<?php echo $conteudo->cow_url ? 'http://vimeo.com/' . $conteudo->cow_url : ''?>" />
        </li>            
    </ul>
</fieldset>
<!--<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="titulo">Galeria</label>
            <select name="cow_gal_id" id="" data-controller="<?php echo site_url('gerenciador/subcategorias/lista/categoria') ?>">
                <option value="0">Selecione uma galeria</option>
                <option value="0">Não tem galeria para esse conteudo</option>
                <?php
                if (count($galerias) > 0):
                    foreach ($galerias as $galeria):
                        ?>
                        <option value="<?php echo $galeria->gal_id ?>" <?php echo set_selecionado($conteudo->cow_gal_id, $galeria->gal_id, 'selected') ?>><?php echo $galeria->gal_titulo ?></option>
                        <?php
                    endforeach;
                endif;
                ?>
            </select>
        </li>      
    </ul>
</fieldset>-->
<fieldset class="grid_9 alpha">
    <ul class="form-list">
        <li>
            <label for="Descricao">Descrição <em>*</em></label>
            <textarea name="cow_descricao" class="ckeditor" rows="" cols=""><?php echo $conteudo->cow_descricao ?></textarea>
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="destaque">Destaque</label>
            <input type="checkbox" name="cow_destaque" class="" value="1" <?php echo $conteudo->cow_destaque == 1 ? 'checked="checked"' : ''?> />
        </li>    
        <li>
            <label for="destaque">Lançamento</label>
            <input type="checkbox" name="cow_lancamento" class="" value="1" <?php echo $conteudo->cow_lancamento == 1 ? 'checked="checked"' : ''?> />
        </li>    
        <li>
            <label for="tel">Imagem</label>
            <input type="file" name="cow_imagem" id="tel" />
            <span class="img"><img src="<?= base_url() ?>public/uploads/conteudos/<?php echo $conteudo->cow_imagem?>" alt="" /></span>
        </li>
    </ul>
</fieldset>

<br class="clear" />

<input type="submit" value="Enviar formulário"/>
</form>
