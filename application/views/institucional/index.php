<section id="wrap-centro">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="content-conteudo">
                    <h1 class="titulos-1">Conheça o <span>Restaurante</span></h1>
                    <div id="box-institucional" class="interna-box">
                        <div class="img-inst"><img src="<?= base_url('public/imagens/img-slid.jpg')?>" alt=""></div>   
                        <?= $estatico->est_descricao?>
                    </div><!--/box-institucional-->   
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
    </div><!--/container-->
</section><!--/wrap-centro-->