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

<?php echo form_open_multipart('') ?>
<fieldset class="grid_4 alpha">
    <ul class="form-list">
        <li>
            <label for="titulo">Nome <em>*</em></label>
            <input type="text" name="pro_titulo" id="titulo" value="<?php echo $produto->pro_titulo ?>" required="required" />
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
                        <option value="<?php echo $categoria->prc_id ?>" <?php echo set_selecionado($produto->pro_prc_id, $categoria->prc_id, 'selected') ?>><?php echo $categoria->prc_nome ?></option>
                        <?php
                    endforeach;
                endif;
                ?>
            </select>
        </li>
        <li style="min-height: 50px">
            <label for="titulo">SubCategoria <em>*</em></label>
            <div id="respsubcat">
                <select name="pro_prs_id" id="selSubCategoria" data-controller="<?= site_url('gerenciador/subcategories/lista/subcategoria')?>" required="required">
                    <option value="0">Sem SubCategoria</option>
                    <?php
                    if (count($subcategorias) > 0):
                        foreach ($subcategorias as $subcat):
                            $ids_subcats = explode(',', $produto->pro_prs_id);
                            ?>
                            <option value="<?php echo $subcat->prs_id ?>" <?php echo set_selecionado($subcat->prs_id, $ids_subcats, 'selected') ?>><?php echo $subcat->prs_nome ?></option>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </select>
            </div>
        </li>
    </ul>
</fieldset>
<fieldset class="grid_9 alpha">
    <ul class="form-list">
        <li>
            <label for="Descricao">Descrição <em>*</em></label>
            <textarea name="pro_descricao" class="ckeditor" rows="" cols=""><?php echo $produto->pro_descricao ?></textarea>
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="tel">Imagem</label>
            <input type="file" name="pro_imagem" id="tel" />
            <span class="img"><img src="<?= base_url() ?>public/uploads/produtos/<?php echo $produto->pro_imagem?>" alt="" /></span>
        </li>
    </ul>
</fieldset>

<br class="clear" />

<input type="submit" value="Enviar formulário"/>
</form>
