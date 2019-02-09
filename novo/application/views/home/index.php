<div class="center">
    <h1 class="t-page">Faça seu pedido online</h1>
    <div id="box-pedidos">
        <div class="txt1 n-quentinha">Quentinha R$ <?= number_format($preco_quentinha, 2, ',', '.') ?> - Entregamos apenas no Bessa.</div>
        <div class="txt1 pedido-dia"><span>Pedido para hoje: </span><?= $marmita->mar_dia_semana ?> | <?= data_for_humans($marmita->mar_data) ?></div>
        <div class="bloco-monte">
            <div class="txt1 "><span>Monte sua marmita: </span></div>
            <div class="txt1 escolha">Selecione as opções:</div>
            <?php echo form_open('home/add_marmita') ?>

            <select name="ref_feijao" id="" class="selects type1">
                <? if (count($feijoes > 0)): ?>
                    <option value="">Selecione o Feijão</option>
                    <? foreach ($feijoes as $feijao): ?>
                        <option value="<?= $feijao->fei_nome ?>"><?= $feijao->fei_nome ?></option>
                    <? endforeach; ?>
                <? else: ?>
                    <option value="">Não há opções</option>
                <? endif; ?>
            </select>
            <select name="ref_arroz" id="" class="selects type1">
                <? if (count($arrozes > 0)): ?>
                    <option value="">Selecione o Arroz</option>
                    <? foreach ($arrozes as $arroz): ?>
                        <option value="<?= $arroz->arr_nome ?>"><?= $arroz->arr_nome ?></option>
                    <? endforeach; ?>
                <? else: ?>
                    <option value="">Não há opções</option>
                <? endif; ?>                    
            </select>
            <select name="ref_macarrao" id="" class="selects type1">
                <? if (count($macarroes > 0)): ?>
                    <option value="">Selecione o Macarrão</option>
                    <? foreach ($macarroes as $macarrao): ?>
                        <option value="<?= $macarrao->mac_nome ?>"><?= $macarrao->mac_nome ?></option>
                    <? endforeach; ?>
                <? else: ?>
                    <option value="">Não há opções</option>
                <? endif; ?>

            </select>
            <select name="ref_salada_um" id="" class="selects type1">
                <? if (count($saladas > 0)): ?>
                    <option value="">Selecione o 1ª opção de salada</option>
                    <? foreach ($saladas as $salada): ?>
                        <option value="<?= $salada->sal_nome ?>"><?= $salada->sal_nome ?></option>
                    <? endforeach; ?>
                <? else: ?>
                    <option value="">Não há opções</option>
                <? endif; ?>                    
            </select>
            <select name="ref_salada_dois" id="" class="selects type1">
                <? if (count($saladas > 0)): ?>
                    <option value="">Selecione o 2ª opção de salada</option>
                    <? foreach ($saladas as $salada): ?>
                        <option value="<?= $salada->sal_nome ?>"><?= $salada->sal_nome ?></option>
                    <? endforeach; ?>
                <? else: ?>
                    <option value="">Não há opções</option>
                <? endif; ?>                    
            </select>
            <select name="ref_acompanhamento" id="" class="selects type1">
                <? if (count($acompanhamentos > 0)): ?>
                    <option value="">Selecione o Acompanhamento</option>
                    <? foreach ($acompanhamentos as $acompanhamento): ?>
                        <option value="<?= $acompanhamento->aco_nome ?>"><?= $acompanhamento->aco_nome ?></option>
                    <? endforeach; ?>
                <? else: ?>
                    <option value="">Não há opções</option>
                <? endif; ?>                    
            </select>
            <select name="ref_carne_um" id="" class="selects type1">
                <? if (count($carnes > 0)): ?>
                    <option value="">Selecione o 1ª opção de carne</option>
                    <? foreach ($carnes as $carne): ?>
                        <option value="<?= $carne->car_nome ?>"><?= $carne->car_nome ?></option>
                    <? endforeach; ?>
                <? else: ?>
                    <option value="">Não há opções</option>
                <? endif; ?>
            </select>
            <select name="ref_carne_dois" id="" class="selects type1">
                <? if (count($carnes > 0)): ?>
                    <option value="">Selecione o 2ª opção de carne</option>
                    <? foreach ($carnes as $carne): ?>
                        <option value="<?= $carne->car_nome ?>"><?= $carne->car_nome ?></option>
                    <? endforeach; ?>
                <? else: ?>
                    <option value="">Não há opções</option>
                <? endif; ?>
            </select>
            <select name="ref_bebida" id="" class="selects type1">
                <? if (count($bebidas > 0)): ?>
                    <option value="">Selecione a bebida</option>
                    <? foreach ($bebidas as $bebida): ?>
                        <option value="<?= $bebida->beb_nome ?>"><?= $bebida->beb_nome ?></option>
                    <? endforeach; ?>
                <? else: ?>
                    <option value="">Não há opções</option>
                <? endif; ?>
            </select>
            <div class="txt1 obs">* Você tem direito a 2 tipos de carnes, no total de 2 pedaços. </div>
            <input type="submit" value="Adicionar Marmita" class=" btn-1">
            <?= form_close() ?>
        </div><!-- bloco-monte -->
        <? if ($this->cart->total_items() != 0): ?>
        <div class="box-carrinho">
            <div class="img-car"></div>
            <h1>Meu Carrinho</h1>
            <div class="qtd-car">Você tem:<br><span><?= $this->cart->total_items(); ?></span><br>Marmita(s)</div>            
                <a href="<?= site_url('carrinho') ?>" class="btn-1">Próxima Etapa</a>            
        </div>
        <? endif; ?>
    </div><!-- box-pedidos -->
</div>