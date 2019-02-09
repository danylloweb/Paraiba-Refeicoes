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
    <h1>Atualizar Estatico</h1>
</header>

<?php echo form_open_multipart('') ?>
<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="titulo">Categoria <em>*</em></label>
            <select name="est_esc_id">
                <?php foreach ($categorias as $categoria):?>
                <option value="<?= $categoria->esc_id?>" <?= set_selecionado($categoria->esc_id, $estatico->est_esc_id, 'selected')?>><?= $categoria->esc_nome?></option>
                <?php endforeach;?>
            </select>
        </li>                  
    </ul>
</fieldset>
<fieldset class="grid_9 alpha">
    <ul class="form-list">
        <li>
            <label for="Descricao">Descrição <em>*</em></label>
            <textarea name="est_descricao" class="ckeditor" rows="" cols=""><?php echo $estatico->est_descricao ?></textarea>
        </li>
    </ul>
</fieldset>

<br class="clear" />

<input type="submit" value="Enviar formulário"/>
</form>
