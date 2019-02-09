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
            <label for="titulo">Categoria <em>*</em></label>
            <select name="emp_categoria">
                <option value="empresa">Empresa</option>
                <option value="história">História</option>
                <option value="visão">Visão</option>
                <option value="valores">Valores</option>
            </select>
        </li>      
    </ul>
</fieldset>   
<fieldset class="grid_9 alpha">
    <ul class="form-list">
        <li>
            <label for="Descricao">Descrição <em>*</em></label>
            <textarea name="emp_descricao" class="ckeditor" rows="" cols=""><?php echo set_value('emp_descricao') ?></textarea>
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="tel">Imagem</label>
            <input type="file" name="emp_imagem" id="tel" />
        </li>
    </ul>
</fieldset>


<br class="clear" />

<input type="submit" value="Enviar formulário"/>
</form>