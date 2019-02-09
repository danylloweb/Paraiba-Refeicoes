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
    <h1>Nova Marmita</h1>
</header>

<?php echo form_open_multipart() ?>    
<fieldset class="grid_6 alpha">
    <ul class="form-list">        
        <li>
            <select name="mar_dia_semana">
                <label for="Titulo">Nome <em>*</em></label>
                <option value="Segunda-Feira">Segunda-Feira</option>
                <option value="Terça-Feira">Terça-Feira</option>
                <option value="Quarta-Feira">Quarta-Feira</option>
                <option value="Quinta-Feira">Quinta-Feira</option>
                <option value="Sexta-Feira">Sexta-Feira</option>
                <option value="Sábado">Sábado</option>
                <option value="Domingo">Domingo</option>
            </select>
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">        
        <li>
            <label for="Titulo">Data da marmita <em>*</em></label>
            <input type="text" name="mar_data" id="titulo" class="dataMask" value="<?php echo set_value('mar_data') ?>" required="required" />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">        

            <label for="Titulo" style="color: #0073ea">Escolha os feijões disponíveis <em>*</em></label>            
            <? foreach ($feijoes as $feijao): ?>                
        <li>
                <input type="checkbox" name="mtf_fei_id[]" value="<?= $feijao->fei_id ?>">
                <span><?= $feijao->fei_nome ?></span>
        </li>
            <? endforeach; ?>

    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">        

            <label for="Titulo" style="color: #0073ea">Escolha os arrozes disponíveis <em>*</em></label>            
            <? foreach ($arrozes as $arroz): ?>                
        <li>
                <input type="checkbox" name="mta_arr_id[]" value="<?= $arroz->arr_id ?>">
                <span><?= $arroz->arr_nome ?></span>
        </li>
            <? endforeach; ?>

    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">        

            <label for="Titulo" style="color: #0073ea">Escolha os macarrões disponíveis <em>*</em></label>            

            <? foreach ($macarroes as $macarrao): ?>                
        <li>
                <input type="checkbox" name="mtm_mac_id[]" value="<?= $macarrao->mac_id ?>">
                <span><?= $macarrao->mac_nome ?></span>
        </li>
            <? endforeach; ?>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">        

            <label for="Titulo" style="color: #0073ea">Escolha os saladas disponíveis <em>*</em></label>            

            <? foreach ($saladas as $salada): ?>                
        <li>
                <input type="checkbox" name="mts_sal_id[]" value="<?= $salada->sal_id ?>">
                <span><?= $salada->sal_nome ?></span>
        </li>
            <? endforeach; ?>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">        

            <label for="Titulo" style="color: #0073ea">Escolha os acompanhamentos disponíveis <em>*</em></label>            

            <? foreach ($acompanhamentos as $acompanhamento): ?>                
        <li>
                <input type="checkbox" name="maa_aco_id[]" value="<?= $acompanhamento->aco_id ?>">
                <span><?= $acompanhamento->aco_nome ?></span>
        </li>
            <? endforeach; ?>

    </ul>
</fieldset>
<fieldset class="grid_9 alpha">
    <ul class="form-list">        
            <label for="Titulo" style="color: #0073ea">Escolha os carnes disponíveis <em>*</em></label>            


            <? foreach ($carnes as $carne): ?>                
        <li>
                <input type="checkbox" name="mtc_car_id[]" value="<?= $carne->car_id ?>">
                <span><?= $carne->car_nome ?></span>
        </li>
            <? endforeach; ?>


    </ul>
</fieldset>
<fieldset class="grid_9 alpha">
    <ul class="form-list">        
            <label for="Titulo" style="color: #0073ea">Escolha os bebidas disponíveis <em>*</em></label>            

            
            <? foreach ($bebidas as $bebida): ?>                
        <li>
                <input type="checkbox" name="mtb_beb_id[]" value="<?= $bebida->beb_id ?>">
                <span><?= $bebida->beb_nome ?></span>
        </li>
            <? endforeach; ?>


    </ul>
</fieldset>
<fieldset class="grid_9 alpha">
    <ul class="form-list">        
            <label for="Titulo" style="color: #0073ea">Escolha as sobremesas disponíveis <em>*</em></label>            

            
            <? foreach ($sobremesas as $sobremesa): ?>                
        <li>
                <input type="checkbox" name="mas_sob_id[]" value="<?= $sobremesa->sob_id ?>">
                <span><?= $sobremesa->sob_nome ?></span>
        </li>
            <? endforeach; ?>


    </ul>
</fieldset>

<br class="clear" />

<input type="submit" value="Enviar formulário"/>
</form>
