<section id="wrap-centro">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="content-conteudo">
                    <h1 class="titulos-1">Bebidas</h1>
                    <div id="box-institucional" class="interna-box">
                        <img src="<?= base_url('public/imagens/bebidas.png') ?>" alt="Bebidas Banner" class="bebidas-banner">
                        <?= $estatico->est_descricao?>

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
