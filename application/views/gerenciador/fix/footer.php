</div>
</section>

<footer id="rodape">

</footer>
<div id="dialog-confirm" title="Deseja prosseguir?">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
        <span class="msg"></span>
    </p>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        //inputs
        $('input[type="submit"], .btn').button();
        $('input[type="date"]').datepicker({
            changeYear: true
        });

        //icones
        $(".ico-edit").button({icons: {primary: "ui-icon-pencil"}, text: false});
        $(".ico-delete").button({icons: {primary: "ui-icon-trash"}, text: false});
        $(".ico-search").button({icons: {primary: "ui-icon-search"}, text: false});
        $(".logout").button({icons: {primary: "ui-icon-close"}});
        $(".ico-bin").button({icons: {primary: "ui-icon-trash"}});
        $(".ico-folder").button({icons: {primary: "ui-icon-folder-open"}, text: false});
        $(".ico-image").button({icons: {primary: "ui-icon-image"}, text: false});
        $(".ico-file").button({icons: {primary: "ui-icon-document"}, text: false});
        $(".ico-config").button({icons: {primary: "ui-icon-gear"}, text: false});
        $(".ico-clock").button({icons: {primary: "ui-icon-clock"}, text: false});
        $(".ico-close").button({icons: {primary: "ui-icon-circle-close"}, text: false});
        $(".ico-check").button({icons: {primary: "ui-icon-circle-check"}, text: false});
        $(".ico-down").button({icons: {primary: "ui-icon-arrowthickstop-1-s"}, text: false});
        $(".botao").button({text: true});

        $(".preco").maskMoney({decimal: ",", thousands: "."});
        $(".phone").mask("(99) 9999-9999");
        $(".cpf").mask("999.999.999-99");        
        $(".dataMask").mask("99/99/9999");        
        
        $(".funcao-apagar").click(function() { //apagar conteudo
            var targetUrl = $(this).attr('href');
            $("#dialog-confirm span.msg").html("Deseja apagar os iten(s) selecionado(s)?");
            $("#dialog-confirm").dialog({
                resizable: false,
                height: 140,
                modal: true,
                buttons: {
                    "Apagar": function() {
                        $(this).dialog("close");
                        window.location.href = targetUrl;
                    },
                    Cancel: function() {
                        $(this).dialog("close");
                        return false;
                    }
                }
            });
            return false;
        });
        // formulary sender
        $('form').find('.submit').live('click', function() {
            var form = $(this).parents('form:eq(0)')[0].submit();

            return false;
        });

        $('#selCategoria').change(function() {
            var id_categoria = $('#selCategoria > option:selected').attr('value');
            var controller = $('#selCategoria').attr('data-controller');
            $.ajax({
                type: "POST",
                url: controller,
                data: "subcat_cat_id=" + id_categoria,
                cache: false,
                success: function(result) {

                    $("#respsubcat").empty();
                    $("#respsubcat").html(result).show();

                }
            });
        });

        $('.atualizarFoto').click(function() {
            var id = $(".checkFoto:checked").attr('id');
            var data_id = $(".checkFoto:checked").attr('data-id');

            $.ajax({
                url: "<?= site_url('gerenciador/galerias/atualizar_principal') ?>",
                type: "post",
                data: {"gaf_id": id, "gaf_gal_id": data_id},
                success: function(data) {
                    window.location.reload();
//alert(data)
                },
                error: function() {
                    alert('Erro ao tentar atualizar a foto principal.');
                }
            });
            return false;
        });

        $('#envio').click(function() {
            $.blockUI({message: $('#formEnvio')});
        });
        $('#cancel').click(function() {
            $.unblockUI();
        });


        //tabela
        $('table.listagem tbody tr')
                .click(function(event) {
            if (event.target.type != 'checkbox' && event.target.type != 'number' && event.target.type != 'select-one' && event.target.type != 'text') {
                $(':checkbox', this).trigger('click');
            }
        })
                .find(':checkbox')
                .click(function(event) {
            $(this).parents('tr:first').toggleClass('selected');
        });

        $('input[name="checkall"]').click(function() {
            $(this).parents('table').find(':checkbox').attr('checked', this.checked);
            $(this).parents('table').find('tbody tr:not(selected)').toggleClass('selected');
        });

        setTimeout(function() {
            if ($('.dialog > div').css('display') != 'none') {
                $('.dialog > div').fadeTo('normal', 0.01, 'swing').slideUp('normal', 'swing');
            }
        }, 10000);
        $('.dialog > div').click(function() {
            $(this).fadeTo('normal', 0.01, 'swing').slideUp('normal', 'swing');
        });

//        $.datepicker.setDefaults({dateFormat: 'yy-mm-dd',
//            dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
//            dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
//            dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
//            monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
//            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
//            nextText: 'Próximo',
//            prevText: 'Anterior'
//        });


    });



</script>
</body>
</html>