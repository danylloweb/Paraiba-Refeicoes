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
    <h1>Editar Email</h1>
</header>

<?php echo form_open() ?>    
<fieldset class="grid_4 alpha">
    <ul class="form-list">        
        <li>
            <label for="Email">Email <em>*</em></label>
            <input type="text" name="ema_email" id="email" value="<?php echo $email->ema_email ?>" required="required" />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="Nome">Nome</label>
            <input type="text" name="ema_user" id="link" value="<?php echo $email->ema_user ?>" />
        </li>

    </ul>
</fieldset>
<fieldset class="grid_4 alpha">
    <ul class="form-list">
        <li>
            <label for="Status">Status</label>
            <input type="checkbox" class="checkbox" name="ema_status" <?if ($email->ema_status): ?>checked="checked"<? endif; ?> value="1" />
        </li>
    </ul>
</fieldset>

<br class="clear" />

<input type="submit" value="Enviar formulário"/>
</form>