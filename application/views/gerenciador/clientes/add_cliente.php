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
    <h1>Novo Cliente</h1>
</header>

<?php echo form_open_multipart('', '', array('cli_data_cadastro' => date('Y-m-d'))) ?>
<fieldset class="grid_4 alpha">
    <ul class="form-list">
        <li>
            <label for="Nome">Nome <em>*</em></label>
            <input type="text" name="cli_nome" id="titulo" value="<?= set_value('cli_nome')?>" required="required" />
        </li>
        <li>
            <label for="CPF">CPF <em>*</em></label>
            <input type="text" name="cli_cpf" class="cpf" value="<?= set_value('cli_cpf')?>" id="titulo" required="required" />
        </li>
        
    </ul>
</fieldset>
<fieldset class="grid_4 alpha">
    <ul class="form-list">
        <li>
            <label for="Email">Email <em>*</em></label>
            <input type="email" name="cli_email" id="data" value="<?= set_value('cli_email')?>" required="required" />
        </li>
        <li>
            <label for="Senha">Senha <em>*</em></label>
            <input type="password" name="cli_senha" id="titulo" required="required" />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_4 alpha">
    <ul class="form-list">
        <li>
            <label for="Endereco">Endereço <em>*</em></label>
            <input type="text" name="cli_endereco" id="titulo" value="<?= set_value('cli_endereco')?>" required="required" />
        </li>        

        <li>
            <label for="Cidade">Cidade <em>*</em></label>
            <input type="text" name="cli_cidade" id="titulo" value="<?= set_value('cli_cidade')?>" required="required" />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_4 alpha">
    <ul class="form-list">
        <li>
            <label for="Bairro">Bairro <em>*</em></label>
            <input type="text" name="cli_bairro" id="titulo" value="<?= set_value('cli_bairro')?>" required="required" />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_4 alpha">
    <ul class="form-list">        
        <li>
            <label for="Telefone">Telefone <em>*</em></label>
            <input type="text" name="cli_telefone" class="phone" value="<?= set_value('cli_telefone')?>" id="titulo" required="required" />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_4 alpha">
    <ul class="form-list">        
        <li>
            <label for="Telefone">Celular <em>*</em></label>
            <input type="text" name="cli_celular" value="<?= set_value('cli_celular')?>" class="phone" id="titulo" required="required" />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_9 alpha">
    <ul class="form-list">
        <li>
            <label for="Descricao">Refêrencia <em>*</em></label>
            <textarea name="cli_referencia" rows="" cols=""><?php echo set_value('cli_referencia') ?></textarea>
        </li>
    </ul>
</fieldset>
<br class="clear" />    

<input type="submit" value="Enviar formulário"/>
</form>