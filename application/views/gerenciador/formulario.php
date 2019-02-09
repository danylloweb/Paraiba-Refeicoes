<header id="head">
    <h1>Nova Notícia</h1>
</header>

<form method="get" action="">
    <fieldset class="grid_4 alpha">
        <ul class="form-list">
            <li>
                <label for="titulo">Título <em>*</em></label>
                <input type="text" name="titulo" id="titulo" required="required" />
            </li>
            <li>
                <label for="email">E-mail <em>*</em></label>
                <input type="email" name="email" id="email" required="required" />
            </li>
            <li>
                <label for="cidade">Cidade <em>*</em></label>
                <select name="cidade" id="cidade">
                    <option value="0">Escolher a Cidade</option>
                </select>
            </li>
            <li>
                <label for="foto">Capa <em>*</em></label>
                <input type="file" name="foto" required="required" /> <!-- input file também pode ser required -->
                <span class="img"><img src="<?= base_url() ?>media/gerenciador/images/apagar/deserto.jpg" alt="" /></span>
            </li>
        </ul>
    </fieldset>

    <fieldset class="grid_5 omega">
        <ul class="form-list">
            <li>
                <label for="assunto">Assunto <em>*</em></label>
                <input type="text" name="assunto" id="assunto" required="required" />
            </li>
            <li>
                <label for="data">Data de Publicação <em>*</em></label>
                <input type="date" name="data" id="data" required="required" />
            </li>
            <li>
                <label for="number">Número <em>*</em></label>
                <input type="number" name="number" id="number" max="10" min="0" required="required" />
                <span class="obs">OBS: Apenas números</span>
            </li>
            <li>
                <label for="checkbox">Checkbox</label>
                <label><input type="checkbox" name="checkbox" id="checkbox" /> Opção 1</label>
                <label><input type="checkbox" name="checkbox" id="checkbox" /> Opção 2</label>
            </li>
            <li>
                <label for="radio">Radio</label>
                <label><input type="radio" name="radio" id="radio" /> Opção 1</label>
                <label><input type="radio" name="radio" id="radio" /> Opção 2</label>
                <label><input type="radio" name="radio" id="radio" /> Opção 3</label>
            </li>
            <li>
                <label for="textarea">Textarea <em>*</em></label>
                <textarea name="textarea" id="textarea" required="required"></textarea>
            </li>
        </ul>
    </fieldset>

    <br class="clear" />
    <ul class="form-list">
        <li id="tabs">
            <ul>
                <li><a href="#tab-1">Tab 1</a></li>
                <li><a href="#tab-2">Tab 2</a></li>
                <li><a href="#tab-3">Tab 3</a></li>
            </ul>
            <div id="tab-1">
                <span>Conteúdo da Tab 1</span>
            </div>
            <div id="tab-2">
                <span>Conteúdo da Tab 2</span>
            </div>
            <div id="tab-3">
                <span>Conteúdo da Tab 3</span>
            </div>
        </li>
        <li>
            <label for="conteudo">Conteúdo do E-mail <em>*</em></label>
            <textarea name="conteudo" id="conteudo" class="ckeditor" required="required"></textarea>
        </li>
        <li>
            <label for="fotos">Galeria de Imagens</label>
            <input type="file" name="fotos" value="" />
            <input type="button" class="btn" title="Enviar" value="Enviar" rel="envia_foto" />
            <img src="<?= base_url() ?>media/gerenciador/images/loading.gif" alt="Carregando" class="loading" />

            <div id="erro_file" title="Erro!"><!-- se esta div nao existir, nao exibira mensagem de erro --></div>

            <ul class="galeria">
                <li>
                    <a href="#" class="remove" title="Excluir">Excluir</a>
                    <a href="<?= base_url() ?>media/gerenciador/images/apagar/deserto.jpg" class="view" title="Visualizar">Visualizar</a>
                    <img src="<?= base_url() ?>media/gerenciador/images/apagar/deserto.jpg" alt="" />
                </li>
                <li>
                    <a href="#" class="remove" title="Excluir">Excluir</a>
                    <a href="<?= base_url() ?>media/gerenciador/images/apagar/deserto.jpg" class="view" title="Visualizar">Visualizar</a>
                    <img src="<?= base_url() ?>media/gerenciador/images/apagar/deserto.jpg" alt="" />
                </li>
                <li>
                    <a href="#" class="remove" title="Excluir">Excluir</a>
                    <a href="<?= base_url() ?>media/gerenciador/images/apagar/deserto.jpg" class="view" title="Visualizar">Visualizar</a>
                    <img src="<?= base_url() ?>media/gerenciador/images/apagar/deserto.jpg" alt="" />
                </li>
                <li>
                    <a href="#" class="remove" title="Excluir">Excluir</a>
                    <a href="<?= base_url() ?>media/gerenciador/images/apagar/deserto.jpg" class="view" title="Visualizar">Visualizar</a>
                    <img src="<?= base_url() ?>media/gerenciador/images/apagar/deserto.jpg" alt="" />
                </li>
                <li>
                    <a href="#" class="remove" title="Excluir">Excluir</a>
                    <a href="<?= base_url() ?>media/gerenciador/images/apagar/deserto.jpg" class="view" title="Visualizar">Visualizar</a>
                    <img src="<?= base_url() ?>media/gerenciador/images/apagar/deserto.jpg" alt="" />
                </li>
                <li>
                    <a href="#" class="remove" title="Excluir">Excluir</a>
                    <a href="<?= base_url() ?>media/gerenciador/images/apagar/deserto.jpg" class="view" title="Visualizar">Visualizar</a>
                    <img src="<?= base_url() ?>media/gerenciador/images/apagar/deserto.jpg" alt="" />
                </li>
                <li>
                    <a href="#" class="remove" title="Excluir">Excluir</a>
                    <a href="<?= base_url() ?>media/gerenciador/images/apagar/deserto.jpg" class="view" title="Visualizar">Visualizar</a>
                    <img src="<?= base_url() ?>media/gerenciador/images/apagar/deserto.jpg" alt="" />
                </li>
                <li>
                    <a href="#" class="remove" title="Excluir">Excluir</a>
                    <a href="<?= base_url() ?>media/gerenciador/images/apagar/deserto.jpg" class="view" title="Visualizar">Visualizar</a>
                    <img src="<?= base_url() ?>media/gerenciador/images/apagar/deserto.jpg" alt="" />
                </li>
                <li>
                    <a href="#" class="remove" title="Excluir">Excluir</a>
                    <a href="<?= base_url() ?>media/gerenciador/images/apagar/deserto.jpg" class="view" title="Visualizar">Visualizar</a>
                    <img src="<?= base_url() ?>media/gerenciador/images/apagar/deserto.jpg" alt="" />
                </li>
            </ul>
            <script type="text/javascript">
                $(document).ready(function(){
                    //tabs
                    $('#tabs').tabs();
                    
                    //galeria de fotos
                    $('input[rel="envia_foto"]').click(function(){
                        if($('input[type="file"]', this.parentNode).val() != ''){ //se input nao estiver vazio
                            $(this).attr('disabled', true).addClass('ui-state-disabled');
                            $('input[type="file"]', this.parentNode).attr('disabled', true).val(null);
                            $('img.loading').fadeIn('fast');
                            
                            //////////////////////////////
                            //crie a funcao em ajax aqui//
                            //////////////////////////////
                            
                            //callback inicio - nao esqueca de alterar o html
                            var html =
                                '<li>'+
                                    '<a href="#" class="remove" title="Excluir">Excluir</a>'+
                                    '<a href="<?= base_url() ?>media/gerenciador/images/apagar/deserto.jpg" class="view" title="Visualizar">Visualizar</a>'+
                                    '<img src="<?= base_url() ?>media/gerenciador/images/apagar/deserto.jpg" alt="" />'+
                                '</li>';
                        
                            $('ul.galeria').prepend(html);
                            $('ul.galeria li:first-child').hide().fadeIn('normal', 'swing');
                            
                            $(this).attr('disabled', false).removeClass('ui-state-disabled');
                            $('input[type="file"]', this.parentNode).attr('disabled', false);
                            $('img.loading').fadeOut('fast');
                            galeriaInit(); //executa a funcao para remover imagens e adiciona colorbox
                            //callback fim
                        }else{ //se input estiver vazio
                            $("#erro_file").html('<p>Por favor, selecione uma arquivo.</p>'); //mensagem de erro
                            $("#erro_file").dialog({
                                height: 140,
                                modal: true
                            });
                        }
                    });
                    
                    galeriaInit(); //executa a funcao para remover imagens e adiciona colorbox
                })
                
                function galeriaInit(){
                    $('ul.galeria a.remove').click(function(){ //quando o botao .remove for acionado
                        $(this.parentNode).fadeTo('normal', 0.01, 'swing')
                        .animate({width : '0px', padding : '0px', margin : '0px'}, 'normal', 'swing', function(){
                            $(this).remove();
                        });
                        
                        //////////////////////////////
                        //crie a funcao em ajax aqui//
                        //////////////////////////////
                        
                        return false; //mantenha o return false
                    })
                    
                    $('ul.galeria a.view').colorbox({rel : 'galeria'}); //executa colorbox
                }
            </script>
        </li>
    </ul>
    <input type="submit" value="Enviar formulário"/>
</form>