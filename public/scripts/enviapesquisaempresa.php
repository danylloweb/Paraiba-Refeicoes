<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>\</title>
</head>
<body>

<?php
	/* Pegar dados do formulário via método post */
	// $mail = "klecio@lumenagencia.com.br";
	$mail = "pesquisapb@outlook.com, klecio@lumenagencia.com.br";

	$atend = $_POST['atend'];
	$alimentos = $_POST['alimentos'];
	$bebidas = $_POST['bebidas'];
	$delivery = $_POST['delivery'];
	$varMensagem = $_POST['mensagem'];
	$empresa = $_POST['empresa'];

	// $email é usado como remetente do email
	$email = "diretoria@paraibarefeicoes.com.br";

	$assunto .= " (Pesquisa - Paraíba Refeições - Empresas";

	// Ã‰Â‰ necessário indicar que o formato do e-mail é html
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	$headers .= "From: $email";
    //$headers .= "Bcc: $EmailPadrao\r\n";


	/* Conteudo do email */
	$conteudo = ("
			<h2>DADOS DA PESQUISA:</h2>
			<table style='width: 100%; border: 1px solid #E4E2E2;'>
				
				<tr style='background: #E4E2E2'>
					<td style='padding: 5px;'><b>Atendimento:</b></td>
					<td style='padding: 5px;'>$atend</td>
				</tr>
				<tr>
					<td style='padding: 5px;'><b>Alimentos:</b></td>
					<td style='padding: 5px;'>$alimentos</td>
				</tr>
				<tr style='background: #E4E2E2'>
					<td style='padding: 5px;'><b>Bebidas:</b></td>
					<td style='padding: 5px;'>$bebidas</td>
				</tr>
				<tr>
					<td style='padding: 5px;'><b>Delivery:</b></td>
					<td style='padding: 5px;'>$delivery</td>
				</tr>
				<tr style='background: #E4E2E2'>
					<td style='padding: 5px;'><b>Mensagem:</b></td>
					<td style='padding: 5px;'>$varMensagem</td>
				</tr>
				<tr>
					<td style='width: 30%; padding: 5px;'><b>Empresa:</b></td>
					<td style='width: 69%; padding: 5px;'>$empresa </td>
				</tr>
			</table>
		");

	// @mail($mail, $assunto, $conteudo,  $headers);
 
	echo ($mail, $assunto, $conteudo,  $headers);

?>

<script type="text/javascript">
	//Página de retorno apÃ³s envio
	alert('Opinião enviada com sucesso. Muito obrigado!');

	// window.location="/home";
</script>

</body>
</html>

