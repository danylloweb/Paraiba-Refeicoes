<div class="dialog">
    <?php if (isset($erros)):?>
    <div class="error">
        <p>
            <span class="ui-icon ui-icon-alert"></span>
            <strong>Alerta:</strong>
            <?php echo $erros?>
        </p>
    </div>
    <?php endif;?>
    
</div>
<header id="head">
    <h1>Atualizar SubCategoria</h1>
</header>

<?php echo form_open()?>
    <fieldset class="grid_4 alpha">
        <ul class="form-list">
            <li>
                <label for="titulo">Nome <em>*</em></label>
                <input type="text" name="prs_nome" id="titulo" value="<?php echo $subcategoria->prs_nome?>" required="required" />
            </li>
            <li>
                <label for="cidade">Categoria <em>*</em></label>
                <select name="prs_prc_id" id="cidade" required="required">
                    <option value="">Escolha um categoria</option>
                    <?php if(count($categorias) > 0){
                           foreach($categorias as $categoria){
                    ?>
                    <option value="<?php echo $categoria->prc_id?>" <?php echo set_selecionado($subcategoria->prs_prc_id, $categoria->prc_id, 'selected')?>><?php echo $categoria->prc_nome?></option>
                    <?php }}?>                    
                </select>
            </li>
            
        </ul>
    </fieldset>

    <br class="clear" />
    
    <input type="submit" value="Enviar formulário"/>
</form>