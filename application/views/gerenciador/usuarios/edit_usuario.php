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
    <h1>Atualizar Usuário</h1>
</header>

<?php echo form_open() ?>
<fieldset class="grid_4 alpha">
    <ul class="form-list">
        <li>
            <label for="titulo">Nome <em>*</em></label>
            <input type="text" name="usu_nome" id="titulo" value="<?php echo $usuario->usu_nome ?>" required="required" />
        </li>
        <li>
            <label for="data">Senha <em>*</em></label>
            <input type="password" name="usu_senha" id="senha" />
        </li>
    </ul>
</fieldset>

<fieldset class="grid_5 omega">
    <ul class="form-list">
        <li>
            <label for="email">Email <em>*</em></label>
            <input type="email" name="usu_email" id="email" value="<?php echo $usuario->usu_email ?>" disabled="disabled" required="required" />
        </li>
        <input type="hidden" name="usu_perfil" value="administrador" />
        <li>
            <label for="cidade">Perfil <em>*</em></label>
            <select name="usu_perfil" id="cidade">
                <option value="administrador" <?php echo set_selecionado($usuario->usu_perfil, 'administrador', 'selected') ?>>Administrador</option>                
                <option value="funcionario" <?php echo set_selecionado($usuario->usu_perfil, 'funcionario', 'selected') ?>>Funcionario</option>                
            </select>
        </li>
    </ul>
</fieldset>

<br class="clear" />

<input type="submit" value="Enviar formulário"/>
</form>
