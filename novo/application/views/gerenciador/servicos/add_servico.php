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
    <h1>Novo Serviço</h1>
</header>

<?php echo form_open_multipart('', '') ?>

<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="titulo">Nome <em>*</em></label>
            <input type="text" name="ser_titulo" id="titulo" value="<?php echo set_value('ser_titulo') ?>" required="required" />
        </li>      
    </ul>
</fieldset>   
<fieldset class="grid_9 alpha">
    <ul class="form-list">
        <li>
            <label for="Descricao">Descrição <em>*</em></label>
            <textarea name="ser_descricao" class="ckeditor" rows="" cols=""><?php echo set_value('ser_descricao') ?></textarea>
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="tel">Imagem</label>
            <input type="file" name="ser_imagem" id="tel" />
        </li>
    </ul>
</fieldset>


<br class="clear" />

<input type="submit" value="Enviar formulário"/>
</form>