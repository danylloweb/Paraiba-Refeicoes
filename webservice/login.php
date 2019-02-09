<?php
include('conn.php');

    if(isset($_GET['email']) && isset($_GET['senha']) && strlen($_GET['email'])!=0 && strlen($_GET['senha'])!=0) {
        $email = $_GET['email'];
        $senha = md5($_GET['senha']);
        
        $sql_code = "SELECT * FROM cliente WHERE cli_email='$email'";
    $sql_query = mysqli_query($conexao,$sql_code) or die ("erro ao selecionar");;
    $dado = mysqli_fetch_assoc($sql_query);
    $total = mysqli_num_rows($sql_query);

        if ($total==0){
          echo"Seu email ainda não está cadastrado";
          die();
        }else{
          $sql_senha = "SELECT * FROM cliente WHERE cli_email='$email' AND cli_senha='$senha'";  
          $con_senha = mysqli_query($conexao,$sql_senha);
            if(mysqli_num_rows($con_senha)==0){
                echo "Senha incorreta";
            }else{
                $resultado = array();
                
                while($resul = mysqli_fetch_assoc($con_senha)){
                    $resultado[] = $resul;
                }
                
                echo json_encode($resultado);
            }
        }
    }else{
        echo "Preencha todos os campos";
    }
    


?>
