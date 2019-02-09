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

<?php echo form_open_multipart('', '') ?>

<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="titulo">Dia da semana <em>*</em></label>
            <select name="hor_dia">
                <option value="domingo">Domingo</option>
                <option value="segunda">Segunda-Feira</option>
                <option value="terca">Terça-Feira</option>
                <option value="quarta">Quarta-Feira</option>
                <option value="quinta">Quinta-Feira</option>
                <option value="sexta">Sexta-Feira</option>
                <option value="sabado">Sabádo</option>
            </select>
        </li>      
    </ul>
</fieldset>   
<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="destaque">Hora</label>
            <input type="text" class="hora" name="hor_hora" value="<?= set_value('hor_hora')?>" />
        </li>           
    </ul>
</fieldset>
<fieldset class="grid_4 alpha">
    <ul class="form-list">
        <li>
            <label for="ativo">Ativo</label>
            <input type="checkbox" class="" name="hor_ativo" value="1" />
        </li>           
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">
        <li>
            <label for="fixo">Fixo</label>
            <input type="checkbox" class="" name="hor_fixo" value="1" />
        </li>           
    </ul>
</fieldset>


<br class="clear" />

<input type="submit" value="Enviar formulário"/>
</form>