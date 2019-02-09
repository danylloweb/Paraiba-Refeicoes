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
    <h1>Atualizar Cliente</h1>
</header>

<?php echo form_open_multipart(array()) ?>
<fieldset class="grid_4 alpha">
    <ul class="form-list">
        <li>
            <label for="Nome">Nome <em>*</em></label>
            <input type="text" name="cli_nome" id="titulo" value="<?= $cliente->cli_nome?>" required="required" />
        </li>
        <li>
            <label for="RG">CPF <em>*</em></label>
            <input type="text" name="cli_cpf" id="titulo" required="required" class="cpf" value="<?= $cliente->cli_cpf?>" />
        </li>        
    </ul>
</fieldset>
<fieldset class="grid_4 alpha">
    <ul class="form-list">        
        <li>
            <label for="Email">Email <em>*</em></label>
            <input type="email" name="cli_email" id="data" value="<?= $cliente->cli_email?>" required="required" />
        </li>        
        <li>
            <label for="Senha">Senha <em>*</em></label>
            <input type="password" name="cli_senha" id="titulo" />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_4 alpha">
    <ul class="form-list">
        <li>
            <label for="Endereco">Endereço <em>*</em></label>
            <input type="text" name="cli_endereco" id="titulo" required="required" value="<?= $cliente->cli_endereco?>" />
        </li>
        
        <li>
            <label for="Cidade">Cidade <em>*</em></label>
            <input type="text" name="cli_cidade" id="titulo" required="required" value="<?= $cliente->cli_cidade?>" />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_4 alpha">
    <ul class="form-list">
        <li>
            <label for="Bairro">Bairro <em>*</em></label>
            <input type="text" name="cli_bairro" id="titulo" required="required" value="<?= $cliente->cli_bairro?>" />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_4 alpha">
    <ul class="form-list">        
        <li>
            <label for="Telefone">Telefone <em>*</em></label>
            <input type="text" name="cli_telefone" id="titulo" class="phone" required="required" value="<?= $cliente->cli_telefone?>" />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_4 alpha">
    <ul class="form-list">        
        <li>
            <label for="Telefone">Celular <em>*</em></label>
            <input type="text" name="cli_celular" class="phone" id="titulo" required="required" value="<?= $cliente->cli_celular?>" />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_9 alpha">
    <ul class="form-list">
        <li>
            <label for="Descricao">Refêrencia <em>*</em></label>
            <textarea name="cli_referencia" rows="" cols=""><?php echo $cliente->cli_referencia ?></textarea>
        </li>
    </ul>
</fieldset>
<br class="clear" />    

<input type="submit" value="Enviar formulário"/>
</form>