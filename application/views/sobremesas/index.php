<style>
    img{ max-width: 100%; height: auto !important; }
</style>

<section id="wrap-centro">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="content-conteudo">
                    <h1 class="titulos-1">Sobremesas</h1>
                    <div id="box-institucional" class="interna-box">
                        <?= $estatico->est_descricao?>
                        <!--img src="<?= base_url('public/imagens/sorvetes-mareni.png') ?>" alt="Cardápio dos Sorvetes Mareni" class="cardapio-sorvetes"-->
                    </div><!--/box-institucional-->   
                </div><!--/content-conteudo-->
            </div>
            <div class="col-md-4">
                <div id="sid-right">
                    <nav id="nav-interna">
                        <ul>
                            <li class="activ"><a href="<?= site_url('cardapio_semanal') ?>">Cardápio</a></li>
                            <li><a href="<?= site_url('alacartes') ?>">À la Carte</a></li>
                        </ul>
                    </nav>
                    <? $this->load->view('sidebar/right') ?>
                </div><!--/sid-right-->
            </div>
        </div>
    </div><!--/center-->
</section><!--/wrap-centro-->
