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
    <h1>Novo Banner</h1>
</header>

<?php echo form_open_multipart() ?>    

<fieldset class="grid_6 alpha">
    <ul class="form-list">        
        <li>
            <label for="Titulo">Data (por extenso) <em>*</em></label>
            <input type="text" name="ban_data" id="titulo" value="<?php echo set_value('ban_data') ?>" />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="link">Descrição do banner</label>
            <textarea name="ban_descricao" class="ckeditor" rows="" cols=""><?php echo set_value('ban_descricao') ?></textarea>
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="link">Link do banner</label>
            <input type="text" name="link" id="link" value="<?php echo set_value('link') ?>" />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_4 alpha">
    <ul class="form-list">
        <li>
            <label for="tel">Imagem</label>
            <input type="file" name="ban_imagem" id="tel" />
        </li>


    </ul>
</fieldset>

<br class="clear" />

<input type="submit" value="Enviar formulário"/>
</form>