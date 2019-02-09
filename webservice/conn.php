<?php

    $server = "ns1.hostlumen.com.br";
    $user= "paraibar_bd";
    $pass="paraiba#refeicoes";
    $db="paraibar_refeicoes";

    $conexao = new mysqli($server,$user,$pass,$db);
    $conexao->set_charset('utf8');
?>