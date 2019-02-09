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
    <h1>Novo Produto</h1>
</header>

<?php echo form_open_multipart('', '') ?>
<fieldset class="grid_4 alpha">
    <ul class="form-list">
        <li>
            <label for="titulo">Nome <em>*</em></label>
            <input type="text" name="pro_titulo" id="titulo" value="<?php echo set_value('pro_titulo') ?>" required="required" />
        </li>
    </ul>
</fieldset>    
<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="titulo">Categoria <em>*</em></label>
            <select name="pro_prc_id" id="selCategoria" data-controller="<?php echo site_url('gerenciador/subcategorias/lista/categoria') ?>" required="required">
                <option value="">Selecione uma categoria</option>
                <?php
                if (count($categorias) > 0):
                    foreach ($categorias as $categoria):
                        ?>
                        <option value="<?php echo $categoria->prc_id ?>" <?php echo set_select('prc_id') ?>><?php echo $categoria->prc_nome ?></option>
                        <?php
                    endforeach;
                endif;
                ?>
            </select>
        </li>
        <li style="min-height: 50px" class="test">
            <label for="titulo">SubCategoria</label>
            <div id="respsubcat">
                <select name="id_subcatproduto" disabled="disabled" required="required">
                    <option value="">Nenhuma categoria selecionada</option>
                </select>
            </div>
        </li>
    </ul>
</fieldset> 
<fieldset class="grid_9 alpha">
    <ul class="form-list">
        <li>
            <label for="Descricao">Descrição <em>*</em></label>
            <textarea name="pro_descricao" class="ckeditor" rows="" cols=""><?php echo set_value('pro_descricao') ?></textarea>
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="tel">Imagem</label>
            <input type="file" name="pro_imagem" id="tel" />
        </li>
    </ul>
</fieldset>


<br class="clear" />

<input type="submit" value="Enviar formulário"/>
</form>