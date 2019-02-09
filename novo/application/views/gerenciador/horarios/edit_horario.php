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
    <h1>Novo Horário</h1>
</header>

<?php echo form_open_multipart('') ?>
<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="titulo">Dia da semana <em>*</em></label>
            <select name="hor_dia">
                <option value="domingo" <?= set_selecionado("domingo", $horario->hor_dia, "selected")?>>Domingo</option>
                <option value="segunda" <?= set_selecionado("segunda", $horario->hor_dia, "selected")?>>Segunda-Feira</option>
                <option value="terca" <?= set_selecionado("terca", $horario->hor_dia, "selected")?>>Terça-Feira</option>
                <option value="quarta" <?= set_selecionado("quarta", $horario->hor_dia, "selected")?>>Quarta-Feira</option>
                <option value="quinta" <?= set_selecionado("quinta", $horario->hor_dia, "selected")?>>Quinta-Feira</option>
                <option value="sexta" <?= set_selecionado("sexta", $horario->hor_dia, "selected")?>>Sexta-Feira</option>
                <option value="sabado" <?= set_selecionado("sabado", $horario->hor_dia, "selected")?>>Sabádo</option>
            </select>
        </li>      
    </ul>
</fieldset>   
<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="destaque">Hora</label>
            <input type="text" class="hora" name="hor_hora" value="<?= $horario->hor_hora?>" />
        </li>           
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="ativo">Ativo</label>
            <input type="checkbox" class="hora" name="hor_ativo" value="1" <?= $horario->hor_ativo == 1 ? 'checked="checked"' : ''?> />
        </li>           
    </ul>
</fieldset>
<fieldset class="grid_4 alpha">
    <ul class="form-list">
        <li>
            <label for="Fixo">Fixo</label>
            <input type="checkbox" class="hora" name="hor_fixo" value="1" <?= $horario->hor_fixo == 1 ? 'checked="checked"' : ''?> />
        </li>           
    </ul>
</fieldset>

<br class="clear" />

<input type="submit" value="Enviar formulário"/>
</form>
