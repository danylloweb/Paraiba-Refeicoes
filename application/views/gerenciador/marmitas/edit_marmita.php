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
    <h1>Atualizar Marmita</h1>
</header>

<?php echo form_open_multipart() ?>  
<fieldset class="grid_6 alpha">
    <ul class="form-list">        
        <li>
            <label for="Titulo" style="color: #0073ea">Dia da Semana <em>*</em></label>
            <select name="mar_dia_semana">
                <option value="Segunda-Feira" <?= set_selecionado('Segunda-Feira', $marmita->mar_dia_semana, 'selected')?>>Segunda-Feira</option>
                <option value="Terça-Feira" <?= set_selecionado('Terça-Feira', $marmita->mar_dia_semana, 'selected')?>>Terça-Feira</option>
                <option value="Quarta-Feira" <?= set_selecionado('Quarta-Feira', $marmita->mar_dia_semana, 'selected')?>>Quarta-Feira</option>
                <option value="Quinta-Feira" <?= set_selecionado('Quinta-Feira', $marmita->mar_dia_semana, 'selected')?>>Quinta-Feira</option>
                <option value="Sexta-Feira" <?= set_selecionado('Sexta-Feira', $marmita->mar_dia_semana, 'selected')?>>Sexta-Feira</option>
                <option value="Sábado" <?= set_selecionado('Sábado', $marmita->mar_dia_semana, 'selected')?>>Sábado</option>
                <option value="Domingo" <?= set_selecionado('Domingo', $marmita->mar_dia_semana, 'selected')?>>Domingo</option>
            </select>
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">        
        <li>
            <label for="Titulo" style="color: #0073ea">Data da marmita <em>*</em></label>
            <input type="text" name="mar_data" id="titulo" class="dataMask" value="<?php echo data_for_humans($marmita->mar_data) ?>" required="required" />
        </li>
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">        

            <label for="Titulo" style="color: #0073ea">Escolha os feijões disponíveis <em>*</em></label>            
            <? foreach ($feijoes as $feijao): ?>                
        <li>
                <input type="checkbox" name="mtf_fei_id[]" value="<?= $feijao->fei_id ?>" <?php if (in_array_field($feijao->fei_id, 'mtf_fei_id', $feijoes_tem)):?>checked="checked"<?php endif;?>>
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
                <input type="checkbox" name="mta_arr_id[]" value="<?= $arroz->arr_id ?>" <?php if (in_array_field($arroz->arr_id, 'mta_arr_id', $arrozes_tem)):?>checked="checked"<?php endif;?>>
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
                <input type="checkbox" name="mtm_mac_id[]" value="<?= $macarrao->mac_id ?>" <?php if (in_array_field($macarrao->mac_id, 'mtm_mac_id', $macarroes_tem)):?>checked="checked"<?php endif;?>>
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
                <input type="checkbox" name="mts_sal_id[]" value="<?= $salada->sal_id ?>" <?php if (in_array_field($salada->sal_id, 'mts_sal_id', $saladas_tem)):?>checked="checked"<?php endif;?>>
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
                <input type="checkbox" name="maa_aco_id[]" value="<?= $acompanhamento->aco_id ?>" <?php if (in_array_field($acompanhamento->aco_id, 'maa_aco_id', $acompanhamentos_tem)):?>checked="checked"<?php endif;?>>
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
                <input type="checkbox" name="mtc_car_id[]" value="<?= $carne->car_id ?>" <?php if (in_array_field($carne->car_id, 'mtc_car_id', $carnes_tem)):?>checked="checked"<?php endif;?>>
                <span><?= $carne->car_nome ?></span>
        </li>
            <? endforeach; ?>

    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">        

            <label for="Titulo" style="color: #0073ea">Escolha as bebidas disponíveis <em>*</em></label>            
            <? foreach ($bebidas as $bebida): ?>                
        <li>
            <input type="checkbox" name="mtb_beb_id[]" value="<?= $bebida->beb_id ?>" <?php if (in_array_field($bebida->beb_id, 'mtb_beb_id', $bebidas_tem)):?>checked="checked"<?php endif;?>>
            <span><?= $bebida->beb_nome ?> </span>
        </li>
            <? endforeach; ?>        
    </ul>
</fieldset>
<fieldset class="grid_6 alpha">
    <ul class="form-list">        

            <label for="Titulo" style="color: #0073ea">Escolha as sobremesas disponíveis <em>*</em></label>            
            <? foreach ($sobremesas as $sobremesa): ?>                
        <li>
            <input type="checkbox" name="mas_sob_id[]" value="<?= $sobremesa->sob_id ?>" <?php if (in_array_field($sobremesa->sob_id, 'mas_sob_id', $sobremesas_tem)):?>checked="checked"<?php endif;?>>
            <span><?= $sobremesa->sob_nome ?> </span>
        </li>
            <? endforeach; ?>        
    </ul>
</fieldset>

<br class="clear" />

<input type="submit" value="Enviar formulário"/>
</form>
