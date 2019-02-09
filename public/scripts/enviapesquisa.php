<!DOCTYPE html>
<html>
<head>
	<title>$assunto</title>
</head>
<body>

<?php
	/* Pegar dados do formul·rio via mÈtodo post */
	// $mail = "klecio@lumenagencia.com.br";
	if (isset($_POST['tipo']) && $_POST['tipo'] == 'empresa') {
		$mail = "pesquisa@paraibarefeicoes.com.br";
		// $mail = "erickamaral@gmail.com";
	} else {
		$mail = "diretoria@restauranteparaibagrill.com.br";
	}


	$amb = $_POST['amb'];
	$atend = $_POST['atend'];
	$alimentos = $_POST['alimentos'];
	$bebidas = $_POST['bebidas'];
	$delivery = $_POST['delivery'];
	$varMensagem = $_POST['mensagem'];

	$email = "contato@lumenagencia.com.br[Usu·rio]";
	$empresa = "ParaÌba RefeiÁıes";
	$assunto .= " (Pesquisa - {$empresa})";

	// √â¬â necess·rio indicar que o formato do e-mail È html
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	$headers .= "From: $email";
    //$headers .= "Bcc: $EmailPadrao\r\n";


	/* Conteudo do email */
	$conteudo = ("
			<h2>DADOS DA PESQUISA:</h2>
			<table style='width: 100%; border: 1px solid #E4E2E2;'>
				<tr>
					<td style='width: 30%; padding: 5px;'><b>Ambiente:</b></td>
					<td style='width: 69%; padding: 5px;'>$amb </td>
				</tr>
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
			</table>
		");

	@mail($mail, $assunto, $conteudo,  $headers);

	// echo $conteudo;

?>

<script type="text/javascript">
	//P·gina de retorno ap√≥s envio
	alert('Opini„o enviada com sucesso. Muito obrigado!');

	window.location="/home";
</script>

</body>
</html>

