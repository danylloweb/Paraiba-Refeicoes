<div class="container">

    <h1 class="t-page">Faça seu pedido online</h1>
    <div id="box-pedidos">
        <div class="txt1 n-quentinha">Entregamos apenas no Bessa, Intermares, Poço, Jacaré, Manaíra, Tambaú, Cabo Branco, Bairro dos Estados, Miramar e Tambauzinho as marmitas individuais e os pedidos à la carte, e nas empresas localizadas na grande João Pessoa e Cabedelo.<br><b>Horário para realizar os pedidos inicia as 8h da manhã, entregas serão feitas das 10h às 14h.</b></div>

        <div class="txt1 pedido-dia"><span>Pedido para hoje: </span><?= $marmita->mar_dia_semana ?> | <?= data_for_humans($marmita->mar_data) ?></div>

        <div class="row">
            <div class="col-md-8">
                <div class="bloco-monte">
                    <div class="txt1 ">
                        <span>Cardápio:
                            <select name="" id="" class="selects type1 changeCat"> 
                                <?php foreach ($categorias as $categoria): ?>
                                    <option value="<?= $categoria->prc_id ?>" data-href="<?= site_url('cardapio_alacarte/categoria/' . $categoria->prc_id)?>" <?= set_selecionado($categoria->prc_id, $this->uri->segment(3), 'selected') ?> <?php if ($this->uri->segment(2) != 'categoria' && $categoria->prc_nome == 'Carnes'):?> selected="selected"<?php endif;?>><?= $categoria->prc_nome ?></option> 
                                <?php endforeach; ?>
                            </select>
                        </span>
                    </div>

                    <ul class="list-ala">
                        <?php foreach ($pratos as $prato): ?>
                            <?= form_open('cardapio_alacarte/add_alacarte') ?>                    
                            <li>
                                <input type="hidden" name="id" value="<?= $prato->pra_id?>" />
                                <div class="n-item"><?= $prato->pra_nome ?></div>
                                <input type="hidden" name="name" value="<?= convert_accented_characters($prato->pra_nome)?>" />
                                <div class="desc-item"><?= $prato->pra_descricao ?></div>
                                <div class="valor">R$ <?= number_format($prato->pra_valor, 2, ',', '.') ?></div>                        
                                <div class="ranger cont-ala">
                                    <input type="text" name="qty" value="1">
                                    <span>
                                        <a href="#" class="mais">+</a>
                                        <a href="#" class="menos">-</a>
                                    </span>
                                </div>
                                <input type="submit" class="btn-1 bt-compra" value="Comprar" />
                                <!--<a href="<?= site_url('cardapio_alacarte/add_alarcarte/' . $prato->pra_id) ?>" class="btn-1 bt-compra">Comprar</a>-->
                            </li>
                            <?= form_close() ?>
                        <?php endforeach; ?>                    
                    </ul>
                    <!--<input type="submit" value="Adicionar Marmita" class=" btn-1">-->
                    <a href="<?= site_url() ?>" class="btn-1 right">Voltar para Home</a>            
                    </form>        
                </div><!-- bloco-monte -->
            </div>
            <div class="col-md-4">
                <div class="box-carrinho">
                    <div class="img-car"></div>
                    <h1>Meu Carrinho</h1>
                    <?php if ($this->cart->total_items() != 0): ?>
                        <div class="qtd-car">Você tem:<br><span><?= $this->cart->total_items(); ?></span><br>Prato(s)</div>
                        <a href="<?= site_url('carrinho_alacarte') ?>" class="btn-1">Próxima Etapa</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div><!-- box-pedidos --> 
</div>