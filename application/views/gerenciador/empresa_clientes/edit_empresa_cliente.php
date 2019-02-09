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
    <h1>Atualizar Banner</h1>
</header>

<?php echo form_open_multipart() ?>  
<fieldset class="grid_6 alpha">
    <ul class="form-list">        
        <li>
            <label for="Titulo">Nome </label>
            <input type="text" name="emc_titulo" id="titulo" value="<?php echo $empresa_cliente->emc_titulo ?>"/>
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">        
        <li>
            <label for="Titulo">Link </label>
            <input type="text" name="emc_link" id="titulo" value="<?php echo $empresa_cliente->emc_link ?>"/>
        </li>
    </ul>
</fieldset>
<fieldset class="grid_4 alpha">
    <ul class="form-list">
        <li>
            <label for="tel">Imagem</label>
            <input type="file" name="emc_imagem" id="tel" />
            <span class="img"><img src="<?= base_url() ?>public/uploads/clientes/<?php echo $empresa_cliente->emc_imagem?>" alt="" /></span>
        </li>


    </ul>
</fieldset>

<br class="clear" />

<input type="submit" value="Enviar formulário"/>
</form>