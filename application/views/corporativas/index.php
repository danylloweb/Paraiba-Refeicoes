<section id="wrap-centro">
    <div class="container">
        <div id="content-conteudo">
            <h1 class="titulos-1"><?= $categoria->coc_nome?></h1>
            <div id="box-institucional" class="interna-box">
              	
				<ul class="list-corp">
					<?php foreach($corporativas as $corporativa):?>
						<li class="empresa-corp">
							<div class="t-corp"><?= $corporativa->cor_nome?></div>
							<div class="desc-corp">
								<?= $corporativa->cor_endereco?>
								<a href="<?= prep_url($corporativa->cor_link)?>" title="<?= $corporativa->cor_nome?>" target="_blank"><?= $corporativa->cor_link?></a>
							</div>
							<div class="img-corp"><img src="<?= image_thumb('public/uploads/corporativas/' . $corporativa->cor_imagem, 130, 142, FALSE, FALSE) ?>" alt="Imagem da empresa corporativa"></div>
						</li>
					<?php endforeach; ?>					
				</ul>


            </div><!--/box-institucional-->   


        </div><!--/content-conteudo-->
        <div id="sid-right">
            <nav id="nav-interna">
                <ul>
					<?php foreach($categorias as $cat):?>					
						<li <?php if($this->uri->segment(3) == $cat->coc_id):?>class="activ"<?php endif; ?>>
							<a href="<?= site_url('corporativas/categoria/' . $cat->coc_id) ?>"><?= $cat->coc_nome?></a>
						</li>
					<?php endforeach; ?>                    
                </ul>
            </nav>
            <? $this->load->view('sidebar/right') ?>
        </div><!--/sid-right-->
    </div><!--/center-->
</section><!--/wrap-centro-->
