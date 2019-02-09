

<section>
    <div class="grid_9">
        <div class="dialog">

        </div>
        <header id="head">
            <h1>Cadastro/Listagem de Fotos</h1>
        </header>

        <form action="<?= site_url('gerenciador/galerias/register/' . $this->uri->segment(4)) ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <fieldset class="grid_6 alpha">
                <form action="" method="post" enctype="multipart/form-data">

                    <input type="hidden" name="gal_id" value="">

                    <h2>Galeria
                        <!--<small>Dados da Galeria</small>-->
                    </h2>
                    <fieldset>
                        <ul>
                            <li>
    <!--                            <p><span class="title">Categoria</span>
                                    <select name="gal_category">
                                        <option value="Infantil">Infantil</option>
                                        <option value="15 Anos">15 Anos</option>
                                        <option value="Casamento">Casamento</option>
                                        <option value="Aniversário">Aniversário</option>
                                        <option value="header">Header</option>
                                    </select>
                                </p>-->
                            </li>
<!--                            <li>
                                <p><span class="title">Tema</span>
                                    <input type="text" name="gal_legenda" value="">
                                </p>
                            </li>-->
                        </ul>
                    </fieldset>
                    <? if (count($galerias_foto) > 0):?>
                    <fieldset>
                        <? foreach ($galerias_foto as $foto):?>
                            <span class="picture">
                                <img src="<?= base_url('public/uploads/galerias/' . $foto->gaf_imagem)?>" alt="">
                                <a href="#" rel="<?= $foto->gaf_imagem?>" title="Apagar">x</a>
                                <input type="radio" id="<?= $foto->gaf_id?>" name="gaf_principal" data-id="<?= $foto->gaf_gal_id?>" class="checkFoto" <?= $foto->gaf_principal == 1 ? 'checked="checked"' : '' ?> />
                            </span>
                        <? endforeach;?>                        
                    </fieldset>
                    <a href="#" class="botao atualizarFoto" title="Atualizar Foto Principal">Atualizar Foto Principal</a><br/><br/> 
                    <? endif;?>
                    <h2>Envio de Arquivos<br>
                        <small>Seleciona logo abaixo a imagem </small>
                    </h2><br><br>
                    <fieldset class="upload">
                        <div class="input">
                            <a href="#" class="button green" id="select-files">Selecionar Arquivos</a>
                            <a href="#" class="button blue" id="start-upload">Iniciar Transferência</a>
                            <input type="file" multiple="multiple" id="input-files">
                        </div>
                        <ul id="fileList" class="container">

                        </ul>
                    </fieldset>

                    <fieldset class="buttons">
                        <a href="#" title="Salvar" class="button green submit">Salvar</a>
                    </fieldset>
                </form>
            </fieldset>

            <br class="clear" />
            <script>

                function FileAPI(t, f) {

                    var fileList = t,
                            fileField = f,
                            fileQueue = new Array(),
                            preview = null;

                    $('#fileList').find('.delete').live('click', function() {
                        var id = parseInt($(this).attr('href').replace('#', ''));

                        for (var i in fileQueue) {
                            if (id == i) {
                                delete fileQueue[i];
                            }
                        }

                        $(this).parent().parent().fadeTo(300, 0, function() {
                            $(this).slideUp('fast', function() {
                                $(this).remove();
                            });
                        });
                        return false;
                    });


                    this.init = function() {
                        fileField.onchange = this.addFiles;
                    }

                    this.addFiles = function() {
                        addFileListItems(this.files);
                    }

                    this.clearList = function(ev) {
                        ev.preventDefault();
                        while (fileList.childNodes.length > 0) {
                            fileList.removeChild(
                                    fileList.childNodes[fileList.childNodes.length - 1]
                                    );
                        }
                    }

                    this.uploadQueue = function(ev) {
                        ev.preventDefault();

                        for (var i in fileQueue) {
                            var item = fileQueue[i];

                            if (item.file.size < 1048576) {
                                uploadFile(item.file, item.li);
                            } else {
                                alert("Arquivo muito grande");
                            }
                        }

                        fileQueue = new Array();
                    }

                    var addFileListItems = function(files) {
                        //if(files.length == 1 && fileQueue.length == 0){
                        for (var i = 0; i < files.length; i++) {
                            var fr = new FileReader();
                            fr.file = files[i];
                            fr.onloadend = showFileInList;
                            fr.readAsDataURL(files[i]);
                        }
                        //}else{
                        //alert('Você so pode escolher uma imagem');
                        //}
                    }

                    var index = 0;
                    var showFileInList = function(ev) {
                        var file = ev.target.file;

                        if (file) {
                            var li = $('<li></li>').prependTo(fileList);

                            $(li).append('<div><a href="#' + index + '" title="Remover" class="delete">Remover</a></div>');

                            if (file.type.search(/image\/.*/) != -1) {
                                var thumb = new Image();
                                thumb.src = ev.target.result;
                                thumb.addEventListener("mouseover", showImagePreview, false);
                                thumb.addEventListener("mouseout", removePreview, false);
                                var div = $('<div></div>').appendTo(li);
                                $(div).append(thumb);
                            }

                            $(li).append('<div>\
                                                    <h4>' + file.name + '\
                                                            <small>Tipo de arquivo: (' + file.type + ') - ' + Math.round(file.size / 1024) + 'KB</small>\
                                                    </h4>\
                                                    <input type="hidden" name="new_pic_name[]" value="" />\
                                            </div>');

                            //<input type="text" name="new_pic_title[]" value="" placeholder="Legenda" />

                            $(li).append('<span></span>');

                            fileQueue[index] = {file: file, li: li}
                            index++;
                        }

                    }

                    var showImagePreview = function(ev) {
                        var img = new Image();

                        $('.preview').find('img').attr('src', ev.target.src);
                        $('.preview').fadeIn('fast');

                        $(document).mousemove(function(e) {
                            $('.preview').css('top', e.pageY + 10);
                            $('.preview').css('left', e.pageX + 10);
                        });
                    }

                    var removePreview = function(ev) {
                        $('.preview').fadeOut('fast');
                    }

                    var uploadFile = function(file, li) {
                        if (li && file) {
                            var xhr = new XMLHttpRequest(),
                                    data = new FormData(),
                                    upload = xhr.upload;

                            upload.addEventListener("progress", function(ev) {
                                if (ev.lengthComputable) {
                                    var loader = $(li).find("span");
                                    $(loader).css('width', (ev.loaded / ev.total) * 100 + "%");
                                    $(loader).addClass('uploading');
                                }
                            }, false);

                            upload.addEventListener("load", function(ev) {
                                var div = $(li).find("span"),
                                        input = $(li).find('input[type=hidden]');

                                $(div).css('width', "100%");
                                $(div).removeClass('uploading');
                                $(div).addClass('uploaded');
                                //	                $(input).val(xhr.response);

                            }, false);

                            xhr.onreadystatechange = function(ev) {
                                if (this.readyState == 4) {
                                    if (this.status == 200) {
                                        var input = $(li).find('input[type=hidden]').val(xhr.response);
                                        var input = $(li).find('a').attr('class', 'uploaded').attr('href', '#');
                                    }
                                }
                            };

                            upload.addEventListener("error", function(ev) {
                                console.log(ev);
                            }, false);
                            xhr.open(
                                    "POST",
                                    '<?= site_url('gerenciador/galerias/upload') ?>'
                                    );

                            data.append('file', file);

                            xhr.send(data);
                        }
                    }

                }

                window.onload = function() {
                    if (typeof FileReader == "undefined")
                        alert("Sorry your browser does not support the File API and this demo will not work for you");
                    FileAPI = new FileAPI(
                            document.getElementById("fileList"),
                            document.getElementById("input-files")
                            );
                    FileAPI.init();
                    // var reset = document.getElementById("reset");
                    // reset.onclick = FileAPI.clearList;
                    var upload = document.getElementById("start-upload");
                    upload.onclick = FileAPI.uploadQueue;
                }


                $(document).ready(function() {
                    $('#select-files').live('click', function() {
                        $('#input-files').click();

                        return false;
                    });

                    $('.picture a').live('click', function() {
                        var pic = $(this).attr('rel'),
                                picEl = $(this).parent();
                                
                        $.get('<?= site_url('gerenciador/galerias/remove_picture') ?>', {
                            pic: pic
                        }, function(result) {
                            if (result == 1) {
                                $(picEl).remove();
                            } else {
                                alert('Não foi possível remover a imagem. Por favor, tente novamente!');
                            }
                        });

                        return false;
                    });

                });

            </script>

    </div>
</section>