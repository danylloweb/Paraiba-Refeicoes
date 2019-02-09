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
    <h1>Novo Conteudo Web</h1>
</header>

<?php echo form_open_multipart('', '') ?>

<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="titulo">Titulo <em>*</em></label>
            <input type="text" name="cow_titulo" id="titulo" value="<?php echo set_value('cow_titulo') ?>" required="required" />
        </li>      
    </ul>
</fieldset>  
<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="data">Data do conteudo</label>
            <input type="text" name="cow_data" class="" value="<?php echo set_value('cow_data')?>" />
        </li>            
    </ul>
</fieldset>
<fieldset class="grid_4 alpha">
    <ul class="form-list">
        <li>
            <label for="url">Url do video</label>
            <input type="text" name="cow_url" class="" value="<?php echo set_value('cow_url')?>" />
        </li>            
    </ul>
</fieldset>
<!--<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="titulo">Galeria</label>
            <select name="cow_gal_id" id="" data-controller="<?php echo site_url('gerenciador/subcategorias/lista/categoria') ?>">
                <option value="0">Selecione uma galeria</option>
                <option value="0">Não tem galeria para esse conteudo.</option>
                <?php
                if (count($galerias) > 0):
                    foreach ($galerias as $galeria):
                        ?>
                        <option value="<?php echo $galeria->gal_id ?>" <?php echo set_select('gal_id') ?>><?php echo $galeria->gal_titulo ?></option>
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
            <textarea name="cow_descricao" class="ckeditor" rows="" cols=""><?php echo set_value('cow_descricao') ?></textarea>
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="destaque">Destaque</label>
            <input type="checkbox" name="cow_destaque" value="1" />
        </li>    
        <li>
            <label for="destaque">Lançamento</label>
            <input type="checkbox" name="cow_lancamento" value="1" />
        </li>    
        <li>
            <label for="tel">Imagem</label>
            <input type="file" name="cow_imagem" id="tel" />            
        </li>
    </ul>
</fieldset>


<br class="clear" />

<input type="submit" value="Enviar formulário"/>
</form>