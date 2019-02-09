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
    <h1>Atualizar Notícia</h1>
</header>

<?php echo form_open_multipart() ?>  
<fieldset class="grid_6 alpha">
    <ul class="form-list">        
        <li>
            <label for="Titulo">Titulo <em>*</em></label>
            <input type="text" name="not_titulo" id="titulo" value="<?php echo $noticia->not_titulo ?>" required="required" />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">        
        <li>
            <label for="Titulo">Data</label>
            <input type="text" name="not_data" id="titulo" value="<?php echo data_for_humans($noticia->not_data) ?>" />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_9 alpha">
    <ul class="form-list">
        <li>
            <label for="Descricao">Descrição <em>*</em></label>
            <textarea name="not_descricao" class="ckeditor" rows="" cols=""><?php echo $noticia->not_descricao ?></textarea>
        </li>
    </ul>
</fieldset>
<fieldset class="grid_4 alpha">
    <ul class="form-list">
        <li>
            <label for="tel">Imagem</label>
            <input type="file" name="not_imagem" id="tel" />
            <span class="img"><img src="<?= base_url() ?>public/uploads/notlpapers/<?php echo $noticia->not_imagem?>" alt="" /></span>
        </li>
    </ul>
</fieldset>

<br class="clear" />

<input type="submit" value="Enviar formulário"/>
</form>