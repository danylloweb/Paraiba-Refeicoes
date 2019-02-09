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
    <h1>Nova Galeria</h1>
</header>

<?php echo form_open_multipart() ?>    
<fieldset class="grid_6 alpha">
    <ul class="form-list">        
        <li>
            <label for="Titulo">Nome <em>*</em></label>
            <input type="text" name="gal_titulo" id="titulo" value="<?php echo set_value('gal_titulo') ?>" required="required" />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_4 alpha">
    <ul class="form-list">
        <li>
            <label for="tel">Imagem</label>
            <input type="file" name="gal_imagem" id="tel" />
        </li>
    </ul>
</fieldset>

<br class="clear" />

<input type="submit" value="Enviar formulário"/>
</form>