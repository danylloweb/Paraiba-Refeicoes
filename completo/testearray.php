<?php @header('Content-type: application/json');
$conecta = mysqli_connect("localhost", "palavra_palavra", "carolftp","palavra_2015") or die("Não foi possível conectar com o servidor de dados!"); 
//mysql_select_db("hostl471_gilsonlima", $conecta) or die("Banco de dados não localizado!");
//echo mysqli_error();


$d=mysqli_query($conecta,"SELECT min_id as ID,min_nome as Titulo,min_imagem as Imagem,min_youtube as video,min_audio as audio FROM ministracao order by min_id asc")or die(mysqli_error($conecta));



while ($row = mysqli_fetch_assoc($d))  
{

    $i=0;
                
    foreach($row as $key => $value)    
    {

        if (is_string($key)) 
        {
         $fields[mysqli_fetch_field_direct($d, $i++)->name] = $value;
        }

    }

    $json_result["Lista"] [ ] =  $fields;
    //$cli[] = $fields;
}

echo $JSON = json_encode($json_result);
//echo $JSON = json_encode($cli);

?>
