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
    <h1>Enviar Newsletter</h1>
</header>

<?php echo form_open()?>
    
    <fieldset class="grid_9 alpha">
        <ul class="form-list">
            <li>
                <label for="titulo">Assunto <em>*</em></label>
                <input type="text" name="assunto" id="titulo" value="<?php echo set_value('assunto')?>" required="required" />
            </li>
            
        </ul>
    </fieldset>

    <fieldset class="grid_9 alpha">
        <ul class="form-list">
        <li>
            <label for="conteudo">Newsletter </label>
            <textarea name="mensagem" class="ckeditor" id="conteudo"><?php echo set_value('mensagem')?></textarea>
        </li>
        
        </ul>
    </fieldset>

    <br class="clear" />
    
    <input type="submit" value="Enviar formulário"/>
</form>