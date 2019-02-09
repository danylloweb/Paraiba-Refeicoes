<section id="wrap-centro">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="content-conteudo">
                    <div id="box-promo">
                        <h1 class="titulos-1">Veja nossas <span>Promoções</span></h1>
                        <div id="slid-box">
                            <script src="http://malsup.github.io/jquery.cycle2.carousel.js"></script>
                            <script>$.fn.cycle.defaults.autoSelector = '.slideshow';</script>
                            <div class="slideshow"
                                 data-cycle-fx="scrollHorz"
                                 data-cycle-timeout=5000
                                 data-cycle-prev="#prev-slid"
                                 data-cycle-next="#next-slid"
                                 data-cycle-pause-on-hover="true"
                                 data-cycle-carousel-visible=1
                                 data-allow-wrap=true
                                 data-cycle-slides="> li"
                                 >
                                <li><a href="<?= base_url('/pesquisa') ?>"><img src="<?= base_url('public/imagens/bannerpesquisa.jpg') ?>" alt=""></a></li>
                                <? foreach ($banners as $banner): ?>
                                <li>
                                    <img src="<?= image_thumb('public/uploads/banners/' . $banner->ban_imagem, 686, 240, FALSE, FALSE) ?>" alt="Imagem do banner">
                                    <?php if (!empty($banner->ban_data)): ?>
                                        <div class="desc-slid">
                                            <div class="dt-slid"><?= $banner->ban_data ?></div>
                                            <div class="txt-slid">
                                                <?= word_limiter($banner->ban_descricao, 35) ?>
                                            </div><!--/txt-slid-->
                                        </div><!--/desc-slid-->
                                    <?php endif; ?>
                                </li>
                                <? endforeach; ?>
                            </div><!--/slideshow-->
                            <a href="" id="prev-slid" class="sprit"></a>
                            <a href="" id="next-slid" class="sprit"></a>
                        </div><!--/slid-box-->
                    </div><!--/box-promo-->
                    <div id="card-semana">
                        <h1 class="titulos-1">Cardápio do <span>Dia</span></h1>
                        <div id="box-card">
                            <!--<a href="#pratoSegunda" class="btn-1 dia-card-bt" id="segunda"><span class="sprit ic-cardp"></span><?= $marmita->mar_dia_semana ?></a>-->
                            <? if (count($segunda) > 0): ?><a href="#pratoSegunda" class="btn-1 dia-card-bt <?= $id_marmita == $segunda->mar_id ? 'active' : '' ?>" id="segunda"></span>Segunda-feira</a><? endif; ?>
                            <? if (count($terca) > 0): ?><a href="#pratoTerca" class="btn-1 dia-card-bt <?= $id_marmita == $terca->mar_id ? 'active' : '' ?>" id="terca"></span>Terça-Feira</a><? endif; ?>
                            <? if (count($quarta) > 0): ?><a href="#pratoQuarta" class="btn-1 dia-card-bt <?= $id_marmita == $quarta->mar_id ? 'active' : '' ?>" id="quarta"></span>Quarta-Feira</a><? endif; ?>           
                            <? if (count($quinta) > 0): ?><a href="#pratoQuinta" class="btn-1 dia-card-bt <?= $id_marmita == $quinta->mar_id ? 'active' : '' ?>" id="quinta"></span>Quinta-Feira</a><? endif; ?>        
                            <? if (count($sexta) > 0): ?><a href="#pratoSexta" class="btn-1 dia-card-bt <?= $id_marmita == $sexta->mar_id ? 'active' : '' ?>" id="sexta"></span>Sexta-Feira</a><? endif; ?>     
                            <? if (count($sabado) > 0): ?><a href="#pratoSabado" class="btn-1 dia-card-bt <?= $id_marmita == $sabado->mar_id ? 'active' : '' ?>" id="sabado"></span>Sábado</a><? endif; ?>     
                        </div><!--/box-card-->
                    </div><!--/card-semana-->
                    <div class="pratos-semana-container">
                        <? if (count($segunda) > 0): ?>
                        <div id="pratoSegunda" class="box-car-select <?= $segunda->mar_data == date('Y-m-d') ? 'active' : '' ?>">                    
                            <div class="t-2"><h1 class="titulos-2">Segunda-Feira</h1></div>
                            <?
                            $feijoes = $this->marmita->listar_marmita_feijao(array('mtf_mar_id' => $segunda->mar_id), 0, 99, 'fei_nome', 'ASC');

                            $arrozes = $this->marmita->listar_marmita_arroz(array('mta_mar_id' => $segunda->mar_id), 0, 99, 'arr_nome', 'ASC');

                            $macarroes = $this->marmita->listar_marmita_macarrao(array('mtm_mar_id' => $segunda->mar_id), 0, 99, 'mac_nome', 'ASC');

                            $saladas = $this->marmita->listar_marmita_salada(array('mts_mar_id' => $segunda->mar_id), 0, 99, 'sal_nome', 'ASC');

                            $acompanhamentos = $this->marmita->listar_marmita_acompanhamento(array('maa_mar_id' => $segunda->mar_id), 0, 99, 'aco_nome', 'ASC');

                            $carnes = $this->marmita->listar_marmita_carne(array('mtc_mar_id' => $segunda->mar_id), 0, 99, 'car_nome', 'ASC');

                            $bebidas = $this->marmita->listar_marmita_bebida(array('mtb_mar_id' => $segunda->mar_id), 0, 99, 'beb_nome', 'ASC');
                            ?>
                            <ul class="list-pratos">
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
                                <?/* foreach ($bebidas as $bebida): ?>
                                <li><?= $bebida->beb_nome ?></li>
                                <? endforeach; */?>
                            </ul>
                        </div>
                        <? endif;?>
                        <? if (count($terca) > 0): ?>
                        <div id="pratoTerca" class="box-car-select <?= $terca->mar_data == date('Y-m-d') ? 'active' : '' ?>">
                            <!--<div class="t-2"><h1 class="titulos-2"><?= $marmita->mar_dia_semana ?></h1></div>-->
                            <div class="t-2"><h1 class="titulos-2">Terça-Feira</h1></div>
                            <?
                            $feijoes = $this->marmita->listar_marmita_feijao(array('mtf_mar_id' => $terca->mar_id), 0, 99, 'fei_nome', 'ASC');

                            $arrozes = $this->marmita->listar_marmita_arroz(array('mta_mar_id' => $terca->mar_id), 0, 99, 'arr_nome', 'ASC');

                            $macarroes = $this->marmita->listar_marmita_macarrao(array('mtm_mar_id' => $terca->mar_id), 0, 99, 'mac_nome', 'ASC');

                            $saladas = $this->marmita->listar_marmita_salada(array('mts_mar_id' => $terca->mar_id), 0, 99, 'sal_nome', 'ASC');

                            $acompanhamentos = $this->marmita->listar_marmita_acompanhamento(array('maa_mar_id' => $terca->mar_id), 0, 99, 'aco_nome', 'ASC');

                            $carnes = $this->marmita->listar_marmita_carne(array('mtc_mar_id' => $terca->mar_id), 0, 99, 'car_nome', 'ASC');

                            $bebidas = $this->marmita->listar_marmita_bebida(array('mtb_mar_id' => $terca->mar_id), 0, 99, 'beb_nome', 'ASC');
                            ?>
                            <ul class="list-pratos">
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
                                <?/* foreach ($bebidas as $bebida): ?>
                                <li><?= $bebida->beb_nome ?></li>
                                <? endforeach; */?>
                            </ul>
                        </div>                
                        <? endif;?>
                        <? if (count($quarta) > 0): ?>
                        <div id="pratoQuarta" class="box-car-select <?= $quarta->mar_data == date('Y-m-d') ? 'active' : '' ?>">
                            <!--<div class="t-2"><h1 class="titulos-2"><?= $marmita->mar_dia_semana ?></h1></div>-->
                            <div class="t-2"><h1 class="titulos-2">Quarta-Feira</h1></div>
                            <?
                            $feijoes = $this->marmita->listar_marmita_feijao(array('mtf_mar_id' => $quarta->mar_id), 0, 99, 'fei_nome', 'ASC');

                            $arrozes = $this->marmita->listar_marmita_arroz(array('mta_mar_id' => $quarta->mar_id), 0, 99, 'arr_nome', 'ASC');

                            $macarroes = $this->marmita->listar_marmita_macarrao(array('mtm_mar_id' => $quarta->mar_id), 0, 99, 'mac_nome', 'ASC');

                            $saladas = $this->marmita->listar_marmita_salada(array('mts_mar_id' => $quarta->mar_id), 0, 99, 'sal_nome', 'ASC');

                            $acompanhamentos = $this->marmita->listar_marmita_acompanhamento(array('maa_mar_id' => $quarta->mar_id), 0, 99, 'aco_nome', 'ASC');

                            $carnes = $this->marmita->listar_marmita_carne(array('mtc_mar_id' => $quarta->mar_id), 0, 99, 'car_nome', 'ASC');

                            $bebidas = $this->marmita->listar_marmita_bebida(array('mtb_mar_id' => $quarta->mar_id), 0, 99, 'beb_nome', 'ASC');
                            ?>
                            <ul class="list-pratos">
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
                                <?/* foreach ($bebidas as $bebida): ?>
                                <li><?= $bebida->beb_nome ?></li>
                                <? endforeach; */?>
                            </ul>
                        </div>                
                        <? endif;?>
                        <? if (count($quinta) > 0): ?>
                        <div id="pratoQuinta" class="box-car-select <?= $quinta->mar_data == date('Y-m-d') ? 'active' : '' ?>">
                            <!--<div class="t-2"><h1 class="titulos-2"><?= $marmita->mar_dia_semana ?></h1></div>-->
                            <div class="t-2"><h1 class="titulos-2">Quinta-Feira</h1></div>
                            <?
                            $feijoes = $this->marmita->listar_marmita_feijao(array('mtf_mar_id' => $quinta->mar_id), 0, 99, 'fei_nome', 'ASC');

                            $arrozes = $this->marmita->listar_marmita_arroz(array('mta_mar_id' => $quinta->mar_id), 0, 99, 'arr_nome', 'ASC');

                            $macarroes = $this->marmita->listar_marmita_macarrao(array('mtm_mar_id' => $quinta->mar_id), 0, 99, 'mac_nome', 'ASC');

                            $saladas = $this->marmita->listar_marmita_salada(array('mts_mar_id' => $quinta->mar_id), 0, 99, 'sal_nome', 'ASC');

                            $acompanhamentos = $this->marmita->listar_marmita_acompanhamento(array('maa_mar_id' => $quinta->mar_id), 0, 99, 'aco_nome', 'ASC');

                            $carnes = $this->marmita->listar_marmita_carne(array('mtc_mar_id' => $quinta->mar_id), 0, 99, 'car_nome', 'ASC');

                            $bebidas = $this->marmita->listar_marmita_bebida(array('mtb_mar_id' => $quinta->mar_id), 0, 99, 'beb_nome', 'ASC');
                            ?>
                            <ul class="list-pratos">
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
                                <?/* foreach ($bebidas as $bebida): ?>
                                <li><?= $bebida->beb_nome ?></li>
                                <? endforeach; */?>
                            </ul>
                        </div>
                        <? endif;?>
                        <? if (count($sexta) > 0): ?>
                        <div id="pratoSexta" class="box-car-select <?= $sexta->mar_data == date('Y-m-d') ? 'active' : '' ?>">
                            <!--<div class="t-2"><h1 class="titulos-2"><?= $marmita->mar_dia_semana ?></h1></div>-->
                            <div class="t-2"><h1 class="titulos-2">Sexta-Feira</h1></div>
                            <?
                            $feijoes = $this->marmita->listar_marmita_feijao(array('mtf_mar_id' => $sexta->mar_id), 0, 99, 'fei_nome', 'ASC');

                            $arrozes = $this->marmita->listar_marmita_arroz(array('mta_mar_id' => $sexta->mar_id), 0, 99, 'arr_nome', 'ASC');

                            $macarroes = $this->marmita->listar_marmita_macarrao(array('mtm_mar_id' => $sexta->mar_id), 0, 99, 'mac_nome', 'ASC');

                            $saladas = $this->marmita->listar_marmita_salada(array('mts_mar_id' => $sexta->mar_id), 0, 99, 'sal_nome', 'ASC');

                            $acompanhamentos = $this->marmita->listar_marmita_acompanhamento(array('maa_mar_id' => $sexta->mar_id), 0, 99, 'aco_nome', 'ASC');

                            $carnes = $this->marmita->listar_marmita_carne(array('mtc_mar_id' => $sexta->mar_id), 0, 99, 'car_nome', 'ASC');

                            $bebidas = $this->marmita->listar_marmita_bebida(array('mtb_mar_id' => $sexta->mar_id), 0, 99, 'beb_nome', 'ASC');
                            ?>
                            <ul class="list-pratos">
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
                                <?/* foreach ($bebidas as $bebida): ?>
                                <li><?= $bebida->beb_nome ?></li>
                                <? endforeach; */?>
                            </ul>
                        </div>
                        <? endif;?>
                        <? if (count($sabado) > 0): ?>
                        <div id="pratoSabado" class="box-car-select <?= $sabado->mar_data == date('Y-m-d') ? 'active' : '' ?>">
                            <!--<div class="t-2"><h1 class="titulos-2"><?= $marmita->mar_dia_semana ?></h1></div>-->
                            <div class="t-2"><h1 class="titulos-2">Sábado</h1></div>
                            <?
                            $feijoes = $this->marmita->listar_marmita_feijao(array('mtf_mar_id' => $sabado->mar_id), 0, 99, 'fei_nome', 'ASC');

                            $arrozes = $this->marmita->listar_marmita_arroz(array('mta_mar_id' => $sabado->mar_id), 0, 99, 'arr_nome', 'ASC');

                            $macarroes = $this->marmita->listar_marmita_macarrao(array('mtm_mar_id' => $sabado->mar_id), 0, 99, 'mac_nome', 'ASC');

                            $saladas = $this->marmita->listar_marmita_salada(array('mts_mar_id' => $sabado->mar_id), 0, 99, 'sal_nome', 'ASC');

                            $acompanhamentos = $this->marmita->listar_marmita_acompanhamento(array('maa_mar_id' => $sabado->mar_id), 0, 99, 'aco_nome', 'ASC');

                            $carnes = $this->marmita->listar_marmita_carne(array('mtc_mar_id' => $sabado->mar_id), 0, 99, 'car_nome', 'ASC');

                            $bebidas = $this->marmita->listar_marmita_bebida(array('mtb_mar_id' => $sabado->mar_id), 0, 99, 'beb_nome', 'ASC');
                            ?>
                            <ul class="list-pratos">
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
                                <?/* foreach ($bebidas as $bebida): ?>
                                <li><?= $bebida->beb_nome ?></li>
                                <? endforeach; */?>
                            </ul>
                        </div>
                        <? endif;?>
                    </div>
                </div><!--/content-conteudo-->
            </div>
            <div class="col-md-4">
                <div id="sid-right">
                    <? $this->load->view('sidebar/right')?>
                </div><!--/sid-right-->
            </div>
        </div>
    </div><!--/center-->
</section><!--/wrap-centro-->

<!--
    POPUP SALEX
-->


<a id="demo01" href="#animatedModal" style="visibility: hidden;"></a>
<div id="animatedModal">
    <div class="close-animatedModal" style="position: absolute; top: 20px; left: 20px; z-index: 1; padding: 10px 40px; background-color: orange; color: #ffffff; text-transform: uppercase; border-radius: 10px; cursor: pointer;">Fechar</div>
    <div class="modal-content" style="width: 100%;height: 100%;position: relative;">
        <iframe src="http://gruposalex.com.br/" frameborder="0" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; z-index: 0;"></iframe>
    </div>
</div>

<!-- Modal -->
<!--<div class="modal ativo" data-modal="facebook-menssenger">
    <div class="modal-inner">
        <div class="btn-fechar-modal" data-modal-close="facebook-menssenger" title="Fechar">
            <svg viewBox="0 0 40 40"><path d="M10,10 L30,30 M30,10 L10,30"></path></svg>
        </div>
        <div class="modal-miolo">
            <img class="img-responsive" src="//lexrestaurante.com.br/assets/images/flutuante/feliz-natal.jpg" alt=""/>
        </div>
    </div>
</div>-->