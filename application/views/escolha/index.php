<div class="container">

    <h1 class="t-page">Faça seu pedido online</h1>
    <div id="box-pedidos">
        <div class="txt1 n-quentinha">Entregamos apenas no Bessa, Intermares, Poço, Jacaré, Manaíra, Tambaú, Cabo Branco, Bairro dos Estados, Miramar e Tambauzinho as marmitas individuais e os pedidos à la carte, e nas empresas localizadas na grande João Pessoa e Cabedelo.</div>

        <div class="txt1 pedido-dia"><span>Pedido para hoje: </span><?= $marmita->mar_dia_semana ?> | <?= data_for_humans($marmita->mar_data) ?></div>

        <div class="txt1 pedido-dia">
            <span>Peça sua refeição e receba no Horário Programado.</span><br>
            <strong>Pedidos realizados de:</strong><br>
            - 09:30hrs receba até 11:30hrs<br>
            - 11:00hrs receba atè 12:30hrs<br>
            - 12:00hrs receba até 13:30hrs<br>
            - 13:00hrs receba até 14:30hrs
        </div>

        <div class="txt-escolha">Selecione uma das opções a baixo para começar:</div>
        <div class="bt-marmita">
            <a href="<?= site_url('cardapio')?>" class="btn-1">Pedidos Marmitas</a>
            <span class="sprit ic-marmita"></span>
        </div>
        <div class="bt-marmita right">
            <a href="<?= site_url('cardapio_alacarte')?>" class="btn-1">Pedidos À la carte</a>
            <span class="sprit ic-lacarte"></span>
        </div>
    </div><!-- box-pedidos --> 
</div>   