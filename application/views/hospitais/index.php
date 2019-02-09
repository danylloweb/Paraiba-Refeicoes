<section id="wrap-centro">
    <div class="container">
        <div id="content-conteudo">
            <h1 class="titulos-1">Refeições</h1>
            <div id="box-institucional" class="interna-box">
              Refeições com alto padrão de higiene e qualidade:
               <br> <b>Cardápio variado</b>
               <br> <b>Alimentos selecionados</b>
               <br> <b>Refeições saborosas</b>
                <div class="img-inst carda-img"><img src="<?= base_url('public/imagens/img-slid.jpg') ?>" alt=""></div>   
                                                                                
                <? if (count($segunda) > 0): ?>
                <ul class="dia-cardapio">                    
                        <h1 class="t-dia" style="text-transform: uppercase;"><?= $segunda->mar_dia_semana ?></h1>
                        <?
                        $feijoes = $this->marmita->listar_marmita_feijao(array('mtf_mar_id' => $segunda->mar_id), 0, 99, 'fei_nome', 'ASC');

                        $arrozes = $this->marmita->listar_marmita_arroz(array('mta_mar_id' => $segunda->mar_id), 0, 99, 'arr_nome', 'ASC');

                        $macarroes = $this->marmita->listar_marmita_macarrao(array('mtm_mar_id' => $segunda->mar_id), 0, 99, 'mac_nome', 'ASC');

                        $saladas = $this->marmita->listar_marmita_salada(array('mts_mar_id' => $segunda->mar_id), 0, 99, 'sal_nome', 'ASC');

                        $acompanhamentos = $this->marmita->listar_marmita_acompanhamento(array('maa_mar_id' => $segunda->mar_id), 0, 99, 'aco_nome', 'ASC');

                        $carnes = $this->marmita->listar_marmita_carne(array('mtc_mar_id' => $segunda->mar_id), 0, 99, 'car_nome', 'ASC');

                        $bebidas = $this->marmita->listar_marmita_bebida(array('mtb_mar_id' => $segunda->mar_id), 0, 99, 'beb_nome', 'ASC');
                        ?>
                        <? foreach ($feijoes as $feijao): ?>
                            <li><?= $feijao->fei_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($arrozes as $arroz): ?>
                            <li><?= $arroz->arr_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($macarroes as $macarrao): ?>
                            <li><?= $macarrao->mac_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($saladas as $salada): ?>
                            <li><?= $salada->sal_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($acompanhamentos as $acompanhamento): ?>
                            <li><?= $acompanhamento->aco_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($carnes as $carne): ?>
                            <li><?= $carne->car_nome ?></li>
                        <? endforeach; ?>
                                            
                </ul>   
                <? endif; ?>

		<? if (count($terca) > 0): ?>
                <ul class="dia-cardapio">                    
                        <h1 class="t-dia" style="text-transform: uppercase;"><?= $terca->mar_dia_semana ?></h1>
                        <?
                        $feijoes = $this->marmita->listar_marmita_feijao(array('mtf_mar_id' => $terca->mar_id), 0, 99, 'fei_nome', 'ASC');

                        $arrozes = $this->marmita->listar_marmita_arroz(array('mta_mar_id' => $terca->mar_id), 0, 99, 'arr_nome', 'ASC');

                        $macarroes = $this->marmita->listar_marmita_macarrao(array('mtm_mar_id' => $terca->mar_id), 0, 99, 'mac_nome', 'ASC');

                        $saladas = $this->marmita->listar_marmita_salada(array('mts_mar_id' => $terca->mar_id), 0, 99, 'sal_nome', 'ASC');

                        $acompanhamentos = $this->marmita->listar_marmita_acompanhamento(array('maa_mar_id' => $terca->mar_id), 0, 99, 'aco_nome', 'ASC');

                        $carnes = $this->marmita->listar_marmita_carne(array('mtc_mar_id' => $terca->mar_id), 0, 99, 'car_nome', 'ASC');

                        $bebidas = $this->marmita->listar_marmita_bebida(array('mtb_mar_id' => $terca->mar_id), 0, 99, 'beb_nome', 'ASC');
                        ?>
                        <? foreach ($feijoes as $feijao): ?>
                            <li><?= $feijao->fei_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($arrozes as $arroz): ?>
                            <li><?= $arroz->arr_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($macarroes as $macarrao): ?>
                            <li><?= $macarrao->mac_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($saladas as $salada): ?>
                            <li><?= $salada->sal_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($acompanhamentos as $acompanhamento): ?>
                            <li><?= $acompanhamento->aco_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($carnes as $carne): ?>
                            <li><?= $carne->car_nome ?></li>
                        <? endforeach; ?>
                                            
                </ul>   
                <? endif; ?>
		
		<? if (count($quarta) > 0): ?>
                <ul class="dia-cardapio">                    
                        <h1 class="t-dia" style="text-transform: uppercase;"><?= $quarta->mar_dia_semana ?></h1>
                        <?
                        $feijoes = $this->marmita->listar_marmita_feijao(array('mtf_mar_id' => $quarta->mar_id), 0, 99, 'fei_nome', 'ASC');

                        $arrozes = $this->marmita->listar_marmita_arroz(array('mta_mar_id' => $quarta->mar_id), 0, 99, 'arr_nome', 'ASC');

                        $macarroes = $this->marmita->listar_marmita_macarrao(array('mtm_mar_id' => $quarta->mar_id), 0, 99, 'mac_nome', 'ASC');

                        $saladas = $this->marmita->listar_marmita_salada(array('mts_mar_id' => $quarta->mar_id), 0, 99, 'sal_nome', 'ASC');

                        $acompanhamentos = $this->marmita->listar_marmita_acompanhamento(array('maa_mar_id' => $quarta->mar_id), 0, 99, 'aco_nome', 'ASC');

                        $carnes = $this->marmita->listar_marmita_carne(array('mtc_mar_id' => $quarta->mar_id), 0, 99, 'car_nome', 'ASC');

                        $bebidas = $this->marmita->listar_marmita_bebida(array('mtb_mar_id' => $quarta->mar_id), 0, 99, 'beb_nome', 'ASC');
                        ?>
                        <? foreach ($feijoes as $feijao): ?>
                            <li><?= $feijao->fei_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($arrozes as $arroz): ?>
                            <li><?= $arroz->arr_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($macarroes as $macarrao): ?>
                            <li><?= $macarrao->mac_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($saladas as $salada): ?>
                            <li><?= $salada->sal_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($acompanhamentos as $acompanhamento): ?>
                            <li><?= $acompanhamento->aco_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($carnes as $carne): ?>
                            <li><?= $carne->car_nome ?></li>
                        <? endforeach; ?>
                                            
                </ul>   
                <? endif; ?>

		<? if (count($quinta) > 0): ?>
                <ul class="dia-cardapio">                    
                        <h1 class="t-dia" style="text-transform: uppercase;"><?= $quinta->mar_dia_semana ?></h1>
                        <?
                        $feijoes = $this->marmita->listar_marmita_feijao(array('mtf_mar_id' => $quinta->mar_id), 0, 99, 'fei_nome', 'ASC');

                        $arrozes = $this->marmita->listar_marmita_arroz(array('mta_mar_id' => $quinta->mar_id), 0, 99, 'arr_nome', 'ASC');

                        $macarroes = $this->marmita->listar_marmita_macarrao(array('mtm_mar_id' => $quinta->mar_id), 0, 99, 'mac_nome', 'ASC');

                        $saladas = $this->marmita->listar_marmita_salada(array('mts_mar_id' => $quinta->mar_id), 0, 99, 'sal_nome', 'ASC');

                        $acompanhamentos = $this->marmita->listar_marmita_acompanhamento(array('maa_mar_id' => $quinta->mar_id), 0, 99, 'aco_nome', 'ASC');

                        $carnes = $this->marmita->listar_marmita_carne(array('mtc_mar_id' => $quinta->mar_id), 0, 99, 'car_nome', 'ASC');

                        $bebidas = $this->marmita->listar_marmita_bebida(array('mtb_mar_id' => $quinta->mar_id), 0, 99, 'beb_nome', 'ASC');
                        ?>
                        <? foreach ($feijoes as $feijao): ?>
                            <li><?= $feijao->fei_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($arrozes as $arroz): ?>
                            <li><?= $arroz->arr_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($macarroes as $macarrao): ?>
                            <li><?= $macarrao->mac_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($saladas as $salada): ?>
                            <li><?= $salada->sal_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($acompanhamentos as $acompanhamento): ?>
                            <li><?= $acompanhamento->aco_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($carnes as $carne): ?>
                            <li><?= $carne->car_nome ?></li>
                        <? endforeach; ?>
                                            
                </ul>   
                <? endif; ?>

		<? if (count($sexta) > 0): ?>
                <ul class="dia-cardapio">                    
                        <h1 class="t-dia" style="text-transform: uppercase;"><?= $sexta->mar_dia_semana ?></h1>
                        <?
                        $feijoes = $this->marmita->listar_marmita_feijao(array('mtf_mar_id' => $sexta->mar_id), 0, 99, 'fei_nome', 'ASC');

                        $arrozes = $this->marmita->listar_marmita_arroz(array('mta_mar_id' => $sexta->mar_id), 0, 99, 'arr_nome', 'ASC');

                        $macarroes = $this->marmita->listar_marmita_macarrao(array('mtm_mar_id' => $sexta->mar_id), 0, 99, 'mac_nome', 'ASC');

                        $saladas = $this->marmita->listar_marmita_salada(array('mts_mar_id' => $sexta->mar_id), 0, 99, 'sal_nome', 'ASC');

                        $acompanhamentos = $this->marmita->listar_marmita_acompanhamento(array('maa_mar_id' => $sexta->mar_id), 0, 99, 'aco_nome', 'ASC');

                        $carnes = $this->marmita->listar_marmita_carne(array('mtc_mar_id' => $sexta->mar_id), 0, 99, 'car_nome', 'ASC');

                        $bebidas = $this->marmita->listar_marmita_bebida(array('mtb_mar_id' => $sexta->mar_id), 0, 99, 'beb_nome', 'ASC');
                        ?>
                        <? foreach ($feijoes as $feijao): ?>
                            <li><?= $feijao->fei_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($arrozes as $arroz): ?>
                            <li><?= $arroz->arr_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($macarroes as $macarrao): ?>
                            <li><?= $macarrao->mac_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($saladas as $salada): ?>
                            <li><?= $salada->sal_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($acompanhamentos as $acompanhamento): ?>
                            <li><?= $acompanhamento->aco_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($carnes as $carne): ?>
                            <li><?= $carne->car_nome ?></li>
                        <? endforeach; ?>
                                            
                </ul>   
                <? endif; ?>

                <? if (count($sabado) > 0): ?>
                <ul class="dia-cardapio">                    
                        <h1 class="t-dia" style="text-transform: uppercase;"><?= $sabado->mar_dia_semana ?></h1>
                        <?
                        $feijoes = $this->marmita->listar_marmita_feijao(array('mtf_mar_id' => $sabado->mar_id), 0, 99, 'fei_nome', 'ASC');

                        $arrozes = $this->marmita->listar_marmita_arroz(array('mta_mar_id' => $sabado->mar_id), 0, 99, 'arr_nome', 'ASC');

                        $macarroes = $this->marmita->listar_marmita_macarrao(array('mtm_mar_id' => $sabado->mar_id), 0, 99, 'mac_nome', 'ASC');

                        $saladas = $this->marmita->listar_marmita_salada(array('mts_mar_id' => $sabado->mar_id), 0, 99, 'sal_nome', 'ASC');

                        $acompanhamentos = $this->marmita->listar_marmita_acompanhamento(array('maa_mar_id' => $sabado->mar_id), 0, 99, 'aco_nome', 'ASC');

                        $carnes = $this->marmita->listar_marmita_carne(array('mtc_mar_id' => $sabado->mar_id), 0, 99, 'car_nome', 'ASC');

                        $bebidas = $this->marmita->listar_marmita_bebida(array('mtb_mar_id' => $sabado->mar_id), 0, 99, 'beb_nome', 'ASC');
                        ?>
                        <? foreach ($feijoes as $feijao): ?>
                            <li><?= $feijao->fei_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($arrozes as $arroz): ?>
                            <li><?= $arroz->arr_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($macarroes as $macarrao): ?>
                            <li><?= $macarrao->mac_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($saladas as $salada): ?>
                            <li><?= $salada->sal_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($acompanhamentos as $acompanhamento): ?>
                            <li><?= $acompanhamento->aco_nome ?></li>
                        <? endforeach; ?>
                        <? foreach ($carnes as $carne): ?>
                            <li><?= $carne->car_nome ?></li>
                        <? endforeach; ?>
                                            
                </ul>   
                <? endif; ?>
            </div><!--/box-institucional-->   


        </div><!--/content-conteudo-->
        <div id="sid-right">
            <nav id="nav-interna">
                <ul>
                    <li class="activ"><a href="<?= site_url('cardapio_semanal') ?>">Cardápio</a></li>
                    <li><a href="<?= site_url('alacartes') ?>">À la Carte</a></li>
                </ul>
            </nav>
            <? $this->load->view('sidebar/right') ?>
        </div><!--/sid-right-->
    </div><!--/center-->
</section><!--/wrap-centro-->
