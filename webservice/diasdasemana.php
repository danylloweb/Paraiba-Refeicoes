<?php
include('conn.php');
header("Content-Type: application/json; charset=UTF-8",true);
$sql_marmita = "SELECT * FROM marmita ORDER BY marmita.mar_data DESC LIMIT 0, 6 ";

$sql = mysqli_query($conexao,$sql_marmita);


$sql_preco = "SELECT conf_preco_marmita FROM configuration";
$preco = mysqli_query($conexao,$sql_preco);
$preco_fim = mysqli_fetch_assoc($preco);
$resultado = array();
while($row = mysqli_fetch_assoc($sql)){
    
$cardapio_semana = array();
    $sql_fei = "SELECT f.fei_nome FROM feijao f JOIN marmita_tem_feijao mtf ON f.fei_id = mtf.mtf_fei_id AND mtf.mtf_mar_id =".$row['mar_id'] ;
    $sql_acom = "SELECT a.aco_nome FROM acompanhamento a JOIN marmita_tem_acompanhamento mta ON a.aco_id = mta.maa_aco_id  AND mta.maa_mar_id = ".$row['mar_id'];
    $sql_arroz = "SELECT arr.arr_nome FROM arroz arr JOIN marmita_tem_arroz mta ON arr.arr_id = mta.mta_arr_id AND mta.mta_mar_id = ".$row['mar_id'];
    $sql_carne = "SELECT c.car_nome FROM carne c JOIN marmita_tem_carne mtc ON c.car_id = mtc.mtc_car_id AND mtc.mtc_mar_id = ".$row['mar_id'];
    $sql_macarrao = "SELECT m.mac_nome FROM macarrao m JOIN marmita_tem_macarrao mtm ON m.mac_id = mtm.mtm_mac_id AND mtm.mtm_mar_id = ".$row['mar_id'];
    $sql_salada = "SELECT s.sal_nome FROM salada s JOIN marmita_tem_salada mts ON s.sal_id = mts.mts_sal_id AND mts.mts_mar_id = ".$row['mar_id'];
    $sql_bebida = "SELECT b.beb_nome, b.beb_preco FROM bebida b JOIN marmita_tem_bebida mtb ON b.beb_id = mtb.mtb_beb_id AND mtb.mtb_mar_id = ".$row['mar_id'];
    $sql_sobre = "SELECT s.sob_nome, s.sob_preco FROM sobremesa s JOIN marmita_tem_sobremesa mas ON s.sob_id = mas.mas_sob_id AND mas.mas_mar_id = ".$row['mar_id'];
    
    
    $cardapio_semana['DIA'] = $row['mar_dia_semana'];
    
    //FEIJAO
    $feijoes = array();
    $sql_aux = mysqli_query($conexao,$sql_fei);
    while($feijao = mysqli_fetch_assoc($sql_aux)){
        $feijoes[] = $feijao;
    }
    $cardapio_semana['FEIJAO'] = $feijoes;
    
    //ACOMPANHAMENTO
    $acompanhamentos = array();
    $sql_aux = mysqli_query($conexao,$sql_acom);
    while($acompanhamento = mysqli_fetch_assoc($sql_aux)){
        $acompanhamentos[] = $acompanhamento;
    }
    $cardapio_semana['ACOMPANHAMENTO'] = $acompanhamentos;
    
    //ARROZ
    $arrozes = array();
    $sql_aux = mysqli_query($conexao,$sql_arroz);
    while($arroz = mysqli_fetch_assoc($sql_aux)){
        $arrozes[] = $arroz;
    }
    $cardapio_semana['ARROZ'] = $arrozes;
    
    //CARNE
    $carnes = array();
    $sql_aux = mysqli_query($conexao,$sql_carne);
    while($carne = mysqli_fetch_assoc($sql_aux)){
        $carnes[] = $carne;
    }
    $cardapio_semana['CARNE'] = $carnes;
    
    //MACARRAO
    $macarroes = array();
    $sql_aux = mysqli_query($conexao,$sql_macarrao);
    while($macarrao = mysqli_fetch_assoc($sql_aux)){
        $macarroes[] = $macarrao;
    }
    $cardapio_semana['MACARRAO'] = $macarroes;
    
    //SALADA
    $saladas = array();
    $sql_aux = mysqli_query($conexao,$sql_salada);
    while($salada = mysqli_fetch_assoc($sql_aux)){
        $saladas[] = $salada;
    }
    $cardapio_semana['SALADA'] = $saladas;
    
    //BEBIDA
    $bebidas = array();
    $sql_aux = mysqli_query($conexao,$sql_bebida);
    while($bebida = mysqli_fetch_assoc($sql_aux)){
        $bebidas[] = $bebida;
    }
    $cardapio_semana['BEBIDA'] = $bebidas;
    
    //SOBREMESA
    $sobremesas = array();
    $sql_aux = mysqli_query($conexao,$sql_sobre);
    while($sobremesa = mysqli_fetch_assoc($sql_aux)){
        $sobremesas[] = $sobremesa;
    }
    
    $cardapio_semana['SOBREMESA'] = $sobremesas;
    $cardapio_semana['PRECO'] = $preco_fim['conf_preco_marmita'];
    
    array_push($resultado,$cardapio_semana);
    
}
echo preg_replace("/\\\\u([a-f0-9]{4})/e", "iconv('UCS-4LE','UTF-8',pack('V', hexdec('U$1')))", json_encode($resultado));
?>
