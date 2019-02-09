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
                    <div id="box-fotos-ambiente">
                        <h1 class="titulos-1">Fotos do <span>Local</span></h1>
                        <script src="http://malsup.github.io/jquery.cycle2.carousel.js"></script>
                        <script>$.fn.cycle.defaults.autoSelector = '.slideshow';</script>
                        <div class="slideshow owl-slide-4" id="slid-empresa" >
                            <div class="item"><img src="<?= base_url('public/imagens/img-slid.jpg')?>" alt=""></div>
                            <div class="item"><img src="<?= base_url('public/imagens/img-slid.jpg')?>" alt=""></div>
                            <div class="item"><img src="<?= base_url('public/imagens/img-slid.jpg')?>" alt=""></div>
                            <div class="item"><img src="<?= base_url('public/imagens/img-slid.jpg')?>" alt=""></div>
                            <div class="item"><img src="<?= base_url('public/imagens/img-slid.jpg')?>" alt=""></div>
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
                            <li><a href="<?= site_url('institucional')?>">Institucional</a></li>
                            <li class="activ"><a href="<?= site_url('institucional/ambiente')?>">Ambiente</a></li>
                            <li><a href="<?= site_url('institucional/clientes')?>">Clientes</a></li>
                        </ul>
                    </nav>
                    <? $this->load->view('sidebar/right')?>
                </div><!--/sid-right-->
            </div>
        </div>
    </div><!--/center-->
</section><!--/wrap-centro-->

<script>
    $("#slid-empresa.slideshow").ready(function(){
        // alert($("#slid-empresa.slideshow").text);
        // $("#slid-empresa.slideshow").hide();
        $("#slid-empresa.slideshow").css({'width': '100%'});
        // $("#slid-empresa.slideshow img").css({'width': '24%'});
    });
</script>