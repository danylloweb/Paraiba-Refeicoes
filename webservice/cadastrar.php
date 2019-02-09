<?php
include('conn.php');

$nome = $_GET['nome'];
$endereco = $_GET['endereco'];
$cpf = $_GET['cpf'];
$cidade = $_GET['cidade'];
$referencia = $_GET['referencia'];
$fone = $_GET['fone'];
$celular = $_GET['celular'];
$email = $_GET['email'];
$senha = md5($_GET['senha']);
$bairro = $_GET['bairro'];
$atualizar = $_GET['atualizar'];


if(isset($_GET['atualizar'])){
    $query="UPDATE cliente SET cli_nome='$nome',cli_email='$email',cli_endereco='$endereco',cli_cidade='$cidade',cli_bairro='$bairro',cli_telefone='$fone',cli_celular='$celular',cli_referencia='$referencia',cli_senha='$senha',cli_cpf='cpf' WHERE cli_email = '$atualizar'";
    mysqli_query($conexao,$query);
    echo "Cadastro atualizado";
    
}else{
$query_email = "select * from cliente where cli_email = '$email' ";
    $query_inserir = "insert into cliente (cli_nome,cli_email,cli_endereco,cli_cidade,cli_bairro,cli_telefone,cli_celular,cli_referencia,cli_senha,cli_cpf) values ('$nome','$email','$endereco','$cidade','$bairro','$fone','$celular','$referencia','$senha','$cpf')";
    
$sql_email = mysqli_query($conexao,$query_email);

if(mysqli_num_rows($sql_email)==0){
    mysqli_query($conexao,$query_inserir);
}else{
    echo "Email já cadastrado";
}
}

    


?>