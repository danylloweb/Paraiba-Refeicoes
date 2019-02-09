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
    <h1>Atualizar Corporativa</h1>
</header>

<?php echo form_open_multipart() ?>  
<fieldset class="grid_6 alpha">
    <ul class="form-list">        
        <li>
            <label for="Titulo">Categoria <em>*</em></label>
            <select name="cor_coc_id" required="required">
                <? foreach ($categorias as $categoria): ?>
                <option value="<?= $categoria->coc_id ?>" <?= set_selecionado($categoria->coc_id, $corporativa->cor_coc_id, 'selected')?>><?= $categoria->coc_nome ?></option>
                <? endforeach; ?>
            </select>
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">        
        <li>
            <label for="Titulo">Nome <em>*</em></label>
            <input type="text" name="cor_nome" id="titulo" value="<?php echo $corporativa->cor_nome ?>" required="required" />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">        
        <li>
            <label for="Titulo">Link </label>
            <input type="text" name="cor_link" id="titulo" value="<?php echo $corporativa->cor_link ?>"  />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_7 alpha">
    <ul class="form-list">
        <li>
            <label for="Descricao">Endereço </label>
            <textarea name="cor_endereco" class="" rows="" cols=""><?php echo $corporativa->cor_endereco ?></textarea>
        </li>
    </ul>
</fieldset>
<fieldset class="grid_4 alpha">
    <ul class="form-list">
        <li>
            <label for="tel">Imagem</label>
            <input type="file" name="cor_imagem" id="tel" />
            <span class="img"><img src="<?= base_url() ?>public/uploads/corporativas/<?php echo $corporativa->cor_imagem?>" alt="" /></span>
        </li>
    </ul>
</fieldset>

<br class="clear" />

<input type="submit" value="Enviar formulário"/>
</form>
