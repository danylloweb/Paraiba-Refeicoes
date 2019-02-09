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
    <h1>Atualizar Serviço</h1>
</header>

<?php echo form_open_multipart('') ?>
<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="titulo">Nome <em>*</em></label>
            <input type="text" name="ser_titulo" id="titulo" value="<?php echo $servico->ser_titulo ?>" required="required" />
        </li>                  
    </ul>
</fieldset>
<fieldset class="grid_9 alpha">
    <ul class="form-list">
        <li>
            <label for="Descricao">Descrição <em>*</em></label>
            <textarea name="ser_descricao" class="ckeditor" rows="" cols=""><?php echo $servico->ser_descricao ?></textarea>
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">
       <li>
            <label for="tel">Imagem</label>
            <input type="file" name="ser_imagem" id="tel" />
            <span class="img"><img src="<?= base_url() ?>public/uploads/servicos/<?php echo $servico->ser_imagem?>" alt="" /></span>
        </li>  
    </ul>
</fieldset>

<br class="clear" />

<input type="submit" value="Enviar formulário"/>
</form>
