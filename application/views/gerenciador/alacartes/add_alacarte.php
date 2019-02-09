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
    <h1>Nova À la Carte</h1>
</header>

<?php echo form_open_multipart() ?>    
<fieldset class="grid_6 alpha">
    <ul class="form-list">        
        <li>
            <label for="Titulo">Categoria <em>*</em></label>
            <select name="ala_alc_id" required="required">
                <? foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria->alc_id ?>"><?= $categoria->alc_nome ?></option>
                <? endforeach; ?>
            </select>
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">        
        <li>
            <label for="Titulo">Nome <em>*</em></label>
            <input type="text" name="ala_nome" id="titulo" value="<?php echo set_value('ala_nome') ?>" required="required" />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_9 alpha">
    <ul class="form-list">
        <li>
            <label for="Descricao">Descrição <em>*</em></label>
            <textarea name="ala_descricao" class="ckeditor" rows="" cols=""><?php echo set_value('ala_descricao') ?></textarea>
        </li>
    </ul>
</fieldset>

<br class="clear" />

<input type="submit" value="Enviar formulário"/>
</form>