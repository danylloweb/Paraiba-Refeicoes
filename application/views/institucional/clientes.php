<section id="wrap-centro">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="content-conteudo">
                    <h1 class="titulos-1">Clientes </h1>
                    <div id="box-institucional" class="interna-box">
                        É uma empresa que atua no ramo do fornecimento de refeições coletivas, atendendo a todos os tipos de solicitações por parte de unidades industriais de todos os portes,já que a sua diretoria conta com uma vasta experiência no ramo, trabalhando há mais de dez anos no mercado alimentar. <br><br>

                    </div><!--/box-institucional-->   
                    <div id="box-fotos-ambiente">
                       
                        <div class="slideshow owl-slide-4" id="slid-empresa">
                            <?  foreach ($clientes as $cliente):?>
                                <a href="<?= prep_url($cliente->emc_link)?>" title="<?= $cliente->emc_titulo?>" target="_blank">
                                    <img src="<?= image_thumb('public/uploads/clientes/' . $cliente->emc_imagem, 140, 135, FALSE, FALSE) ?>" alt="Imagem do cliente">
                                </a>
                            <?  endforeach;?>     
                        </div>
                        <div id="box-navega">
                            <div id="nav"></div>
                        </div>
                    </div>
                </div><!--/content-conteudo-->
            </div>
            <div class="col-md-4">
                <div id="sid-right">
                    <nav id="nav-interna">
                        <ul>
                            <li ><a href="<?= site_url('institucional')?>">Institucional</a></li>
                            <li><a href="<?= site_url('institucional/ambiente')?>">Ambiente</a></li>
                            <li class="activ"><a href="<?= site_url('institucional/clientes')?>">Clientes</a></li>
                        </ul>
                    </nav>
                    <? $this->load->view('sidebar/right')?>
                </div><!--/sid-right-->
            </div>
        </div>
    </div><!--/center-->
</section><!--/wrap-centro-->
