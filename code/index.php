<?php
header("Content-type: text/html;charset=utf-8");
mb_internal_encoding("UTF-8");
mb_http_output("iso-8859-1");

    function download($arquivo)
    {
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream;");
        header("Content-Length:" . filesize($arquivo));
        header("Content-disposition: attachment; filename=" . $arquivo);
        header("Pragma: no-cache");
        header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
        header("Expires: 0");
        readfile($arquivo);
        flush();
    }


    function Listar()
    {
        try {
            $senha='FUqVldDS$lhm';
            $pdo = new PDO ("mysql:host=localhost;dbname=paraibar_refeicoes", "paraibar_root", $senha);
            date_default_timezone_set('America/Recife');
        } catch (PDOException $e) {

            echo "Senha do Banco de dados foi modificada";
            sleep(10);
            echo "<script> alert('Banco de dados não autorizado!');</script>";

        }

        $buscar = $pdo->prepare("SELECT * FROM cliente ");
        $buscar->execute();
        $linha = $buscar->fetchAll(PDO::FETCH_OBJ);
        $lista = $linha;
        return $lista;
    }

    $nome = "Lista.txt";
    $arquivo = fopen("$nome", "w+");
    $contato = Listar();
    foreach ($contato as $contatos) {
        $name = $contatos->cli_nome;
        $gravar=$name.", ";
        $gravar.= $contatos->cli_email. " \r\n";

        fputs($arquivo, "$gravar");

    }
    fclose($arquivo);
    download($nome);
?>