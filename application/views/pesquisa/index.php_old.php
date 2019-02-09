<style>
    /*#formPesquisaSatis fieldset{ display: block; clear: both; }*/
    #formPesquisaSatis{ font-family: "Times New"; }
    #formPesquisaSatis .left{ width: 30%; float: left; }
    /*#formPesquisaSatis .left span{ display: block; line-height: 40px; }*/
    #formPesquisaSatis .right{ width: 69%; float: right; margin-right: -40px; }
    #formPesquisaSatis .linha{ display: block; clear: both; height: 40px; line-height: 40px; }
    #formPesquisaSatis .right span{ width: 24%; vertical-align: middle; text-align: center; display: inline-block; position: relative; }
    #formPesquisaSatis .right span *{ vertical-align: middle; }
    #formPesquisaSatis textarea{ width: 100%;
    height: 100px;
    float: left;
    margin-bottom: 10px;
    border-radius: 7px;
    border: 1px solid #e3e3e3;
    border-bottom: 3px solid #8e1813;
    font-family: 'Times New';
    font-size: 23px; }
    #formPesquisaSatis .labelBox{ display: block; margin: auto; border: 1px solid #3C3C3C; padding: 2px; width: 22px; height: 22px; }
    #formPesquisaSatis .labelBox span{ width: 100%; height: 100%; display: block; background: transparent; }
    #formPesquisaSatis .labelBox:hover span, #formPesquisaSatis .radio:checked + .labelBox span, 
    #formPesquisaSatis .labelBox.active span{ background: #3C3C3C; }
    #formPesquisaSatis .radio{ display: none; }
</style>

<section id="wrap-centro">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="content-conteudo">
                    <h1 class="titulos-1">Pesquisa de  <span>Satisfação</span></h1>
                    <p>Obrigado por escolher o Paraíba Refeições. Para aprimorarmos nossos serviços, por favor, dê sua opnião sobre nosso restaurante.</p>
                    
                    <form action="<?= base_url('public/scripts/enviapesquisa.php') ?>" method="post" id="formPesquisaSatis">
                        <fieldset>
                            <div class="left">
                                <span class="linha">
                                    <span>&nbsp;</span>
                                </span>
                                <span class="linha"><strong>1) Ambientes</strong></span>
                                <span class="linha"><strong>2) Atendimento</strong></span>
                                <span class="linha"><strong>3) Qualidade dos Alimentos</strong></span>
                                <span class="linha"><strong>4) Qualidade das Bebidas</strong></span>
                                <span class="linha"><strong>5) Delivery </strong></span>
                            </div>
                            <div class="right">
                                <fieldset class="linha">
                                    <span><strong>Ótimo</strong></span>
                                    <span><strong>Bom</strong></span>
                                    <span><strong>Regular</strong></span>
                                    <span><strong>Ruim</strong></span>
                                </fieldset>
                                <fieldset class="linha">
                                    <span>
                                        <input type="radio" name="amb" value="Ótimo" class="radio" id="amb-4" required >
                                        <label for="amb-4" class="labelBox" title="Ótimo"><span></span></label> 
                                    </span>
                                    <span>
                                        <input type="radio" name="amb" value="Bom" class="radio" id="amb-3" checked required >
                                        <label for="amb-3" class="labelBox" title="Bom"><span></span></label> 
                                    </span>
                                    <span>
                                        <input type="radio" name="amb" value="Regular" class="radio" id="amb-2" required >
                                        <label for="amb-2" class="labelBox" title="Regular"><span></span></label> 
                                    </span>
                                    <span>
                                        <input type="radio" name="amb" value="Ruim" class="radio" id="amb-1" required >
                                        <label for="amb-1" class="labelBox" title="Ruim"><span></span></label> 
                                    </span>
                                </fieldset>
                                <fieldset class="linha">
                                    <span>
                                        <input type="radio" name="atend" value="Ótimo" class="radio" id="atend-4" required >
                                        <label for="atend-4" class="labelBox" title="Ótimo"><span></span></label> 
                                    </span>
                                    <span>
                                        <input type="radio" name="atend" value="Bom" class="radio" id="atend-3" checked required >
                                        <label for="atend-3" class="labelBox" title="Bom"><span></span></label> 
                                    </span>
                                    <span>
                                        <input type="radio" name="atend" value="Regular" class="radio" id="atend-2" required >
                                        <label for="atend-2" class="labelBox" title="Regular"><span></span></label> 
                                    </span>
                                    <span>
                                        <input type="radio" name="atend" value="Ruim" class="radio" id="atend-1" required >
                                        <label for="atend-1" class="labelBox" title="Ruim"><span></span></label> 
                                    </span>
                                </fieldset>
                                <fieldset class="linha">
                                    <span>
                                        <input type="radio" name="alimentos" value="Ótimo" class="radio" id="alimentos-4" required >
                                        <label for="alimentos-4" class="labelBox" title="Ótimo"><span></span></label> 
                                    </span>
                                    <span>
                                        <input type="radio" name="alimentos" value="Bom" class="radio" id="alimentos-3" checked required >
                                        <label for="alimentos-3" class="labelBox" title="Bom"><span></span></label> 
                                    </span>
                                    <span>
                                        <input type="radio" name="alimentos" value="Regular" class="radio" id="alimentos-2" required >
                                        <label for="alimentos-2" class="labelBox" title="Regular"><span></span></label> 
                                    </span>
                                    <span>
                                        <input type="radio" name="alimentos" value="Ruim" class="radio" id="alimentos-1" required >
                                        <label for="alimentos-1" class="labelBox" title="Ruim"><span></span></label> 
                                    </span>
                                </fieldset>
                                <fieldset class="linha">
                                    <span>
                                        <input type="radio" name="bebidas" value="Ótimo" class="radio" id="bebidas-4" required >
                                        <label for="bebidas-4" class="labelBox" title="Ótimo"><span></span></label> 
                                    </span>
                                    <span>
                                        <input type="radio" name="bebidas" value="Bom" class="radio" id="bebidas-3" checked required >
                                        <label for="bebidas-3" class="labelBox" title="Bom"><span></span></label> 
                                    </span>
                                    <span>
                                        <input type="radio" name="bebidas" value="Regular" class="radio" id="bebidas-2" required >
                                        <label for="bebidas-2" class="labelBox" title="Regular"><span></span></label> 
                                    </span>
                                    <span>
                                        <input type="radio" name="bebidas" value="Ruim" class="radio" id="bebidas-1" required >
                                        <label for="bebidas-1" class="labelBox" title="Ruim"><span></span></label> 
                                    </span>
                                </fieldset>
                                <fieldset class="linha">
                                    <span>
                                        <input type="radio" name="delivery" value="Ótimo" class="radio" id="delivery-4" required >
                                        <label for="delivery-4" class="labelBox" title="Ótimo"><span></span></label> 
                                    </span>
                                    <span>
                                        <input type="radio" name="delivery" value="Bom" class="radio" id="delivery-3" checked required >
                                        <label for="delivery-3" class="labelBox" title="Bom"><span></span></label> 
                                    </span>
                                    <span>
                                        <input type="radio" name="delivery" value="Regular" class="radio" id="delivery-2" required >
                                        <label for="delivery-2" class="labelBox" title="Regular"><span></span></label> 
                                    </span>
                                    <span>
                                        <input type="radio" name="delivery" value="Ruim" class="radio" id="delivery-1" required >
                                        <label for="delivery-1" class="labelBox" title="Ruim"><span></span></label> 
                                    </span>
                                </fieldset>
                            </div>
                        </fieldset>

                        <div style="clear: both; overflow:hiden; display: block; margin-top: 40px;"></div>

                        <fieldset>
                            <label for="mensagem">Sugestões e Comentários</label>
                            <textarea name="mensagem" id="mensagem"></textarea>
                        </fieldset>
                        <fieldset>
                            <div class="bt-login btn-1 bt-enviar-contato">
                                <input type="submit" value="Enviar">
                            </div>
                        </fieldset>
                    </form>
                </div><!--/content-conteudo-->
            </div>
            <div class="col-md-4">
                <div id="sid-right">
                    <nav id="nav-interna">
                        <ul>
                            <li class="activ"><a href="<?= site_url('institucional')?>">Institucional</a></li>
                            <li><a href="<?= site_url('institucional/ambiente')?>">Ambiente</a></li>
                            <li><a href="<?= site_url('institucional/clientes')?>">Clientes</a></li>
                        </ul>
                    </nav>
                    <? $this->load->view('sidebar/right')?>
                </div><!--/sid-right-->
            </div>
        </div>
    </div><!--/center-->
</section><!--/wrap-centro-->