<div class="container">
	<h1 class="t-page">Faça seu pedido online</h1>
	<div class="txt1 n-quentinha"><b>Quentinha R$ <?= number_format($preco_quentinha, 2, ',', '.') ?></b>  -Entregamos apenas no Bessa, Intermares, Poço, Jacaré, Manaíra, Tambaú, Cabo Branco, Bairro dos Estados, Miramar e Tambauzinho as marmitas individuais e os pedidos à la carte, e nas empresas localizadas na grande João Pessoa e Cabedelo.<br><b>Horário para realizar os pedidos inicia as 8h da manhã, entregas serão feitas das 10h às 14h.</b></div>
	
	<div class="txt1 pedido-dia"><span>Pedido para hoje: </span><?= $marmita->mar_dia_semana ?> | <?= data_for_humans($marmita->mar_data) ?></div>
	<a href="<?= site_url('cardapio_alacarte')?>" class="btn-1 bt-pedidoala">Pedidos A la Carte</a>  

	<div class="row">
		<div class="col-md-8">
			<div id="box-pedidos">
				<?php echo form_open('cardapio/add_marmita') ?>
					<div class="bloco-monte">
							<div class="txt1 "><span>Monte sua marmita: </span></div>
							<div class="txt1 escolha">Selecione as opções:</div>

							<div class="row">
								<div class="col-md-4">
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
								</div>
								<div class="col-md-4">
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
								</div>
								<div class="col-md-4">
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
								</div>
							</div> <!-- /row -->						
							<div class="txt1 obs">* Você tem direito a 2 tipos de carnes, no total de 2 pedaços. </div>
							<div>
								<input type="submit" value="Adicionar Marmita" class="right btn-1">
							</div>
					</div><!-- bloco-monte -->				
					<div class="bloco-monte">
							<div class="txt1 "><span>Itens Adicionais: </span></div>
							<div class="txt1 escolha">Selecione as opções:</div>
							<div class="row">
								<div class="col-md-4">
									<select name="ref_bebida" id="" class="selects type1">
											<? if (count($bebidas > 0)): ?>
													<option value="">Selecione a bebida</option>
													<? foreach ($bebidas as $bebida): ?>
													<option value="<?= $bebida->beb_nome ?>"><?= $bebida->beb_nome ?> (+ <?= number_format($bebida->beb_preco, 2, ',', '.')?>)</option>
													<? endforeach; ?>
											<? else: ?>
													<option value="">Não há opções</option>
											<? endif; ?>
									</select>								
								</div>
								<div class="col-md-4">
									<select name="ref_sobremesa" id="" class="selects type1">
											<? if (count($sobremesas > 0)): ?>
													<option value="">Selecione a sobremesa</option>
													<? foreach ($sobremesas as $sobremesa): ?>
													<option value="<?= $sobremesa->sob_nome ?>"><?= $sobremesa->sob_nome ?> (+ <?= number_format($sobremesa->sob_preco, 2, ',', '.')?>)</option>
													<? endforeach; ?>
											<? else: ?>
													<option value="">Não há opções</option>
											<? endif; ?>
									</select>
								</div>
							</div>
							<div class="txt1 obs">* Serão cobrados a parte. Estes itens não estão inclusos no valor da marmita. </div>
							<a href="<?= site_url('') ?>" class="btn-1 right">Voltar para Home</a>            
					</div>
				<?= form_close() ?>
			</div><!-- box-pedidos --> 
		</div>
		<div class="col-md-4">
			
			<div class="box-carrinho">
				<div class="img-car"></div>
				<h1>Meu Carrinho</h1>
				<? if ($this->cart->total_items() != 0): ?>
					<div class="qtd-car">Você tem:<br><span><?= $this->cart->total_items(); ?></span><br>Marmita(s)</div>            
					<a href="<?= site_url('carrinho') ?>" class="btn-1">Próxima Etapa</a>            
				<? endif; ?>

				<? if ($this->cart->total_items() == 0): ?>
					<div class="qtd-car">Você não tem pedidos no carrinho.</div>
				<? endif; ?>
			</div>
		</div>
	</div>
</div>
