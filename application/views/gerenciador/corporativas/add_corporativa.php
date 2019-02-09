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
    <h1>Nova Corporativa</h1>
</header>

<?php echo form_open_multipart() ?>    
<fieldset class="grid_6 alpha">
    <ul class="form-list">        
        <li>
            <label for="Titulo">Categoria <em>*</em></label>
            <select name="cor_coc_id" required="required">
                <? foreach ($categorias as $categoria): ?>
                <option value="<?= $categoria->coc_id ?>" ><?= $categoria->coc_nome ?></option>
                <? endforeach; ?>
            </select>
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">        
        <li>
            <label for="Titulo">Nome <em>*</em></label>
            <input type="text" name="cor_nome" id="titulo" value="<?php echo set_value('cor_nome') ?>" required="required" />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">        
        <li>
            <label for="Titulo">Link <em>*</em></label>
            <input type="text" name="cor_link" id="titulo" value="<?php echo set_value('cor_link') ?>"  />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_7 alpha">
    <ul class="form-list">
        <li>
            <label for="Descricao">Endereço </label>
            <textarea name="cor_endereco" class="ckeditor" rows="" cols=""><?php echo set_value('cor_endereco') ?></textarea>
        </li>
    </ul>
</fieldset>
<fieldset class="grid_4 alpha">
    <ul class="form-list">
        <li>
            <label for="tel">Imagem</label>
            <input type="file" name="cor_imagem" id="tel" />
        </li>
    </ul>
</fieldset>

<br class="clear" />

<input type="submit" value="Enviar formulário"/>
</form>