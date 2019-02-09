<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Template_emails extends CI_Model {

    /**
     * @author Isaias Filho
     */
    public function __construct() {

        parent::__construct();
    }

    /*
     * Email pedido efetuado
     */

    public function email_pedido_efetuado($id_pedido) {

        $pedido = $this->pedido->get_pedido(array('pedido.ped_id' => $id_pedido));

        $itens_pedido = $this->pedido->listar_itempedido(array('pedido_item.pei_ped_id' => $id_pedido), 0, 9999);

        $it = '';
        foreach ($itens_pedido as $item) {
            $it .= "
                        <tr>
                            <td>{$item->pei_quantidade}</td>
                            <td>
                            {$item->ref_feijao}
                            {$item->ref_arroz}
                            {$item->ref_macarrao}
                            {$item->ref_salada_um}
                            {$item->ref_salada_dois}
                            {$item->ref_acompanhamento}
                            {$item->ref_carne_um}
                            {$item->ref_carne_dois}
                            {$item->ref_bebida}
                            {$item->ref_sobremesa}
                            </td>
                        </tr>
			       ";
        }

        $mensagem = "
		              <h2 style='margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #ccc;'><b>Prezado {$pedido->cli_nome}</b></h2>

		              <p style='margin-bottom: 10px;'>Obrigado por sua compra. Segue abaixo os itens do seu pedido:</p>
		              <table style='width=680px; border:1px;' cellpadding='3' cellspacing='2' border='1'>
		                  <tr>
		                      <td>Quantidade</td>
		                      <td>Marmita</td>
		                  </tr>
		                  " . $it . "
		              </table>
		    ";

        return $mensagem;
    }

    public function email_pedido_efetuado_prato($id_pedido) {

        $pedido = $this->pedido_prato->get_pedido_prato(array('pedido_prato.pep_id' => $id_pedido));

        $itens_pedido = $this->pedido_prato->listar_itempedido_prato(array('pedido_prato_item.ppi_pep_id' => $id_pedido), 0, 9999);

        $it = '';
        foreach ($itens_pedido as $item) {
            $it .= "
                        <tr>
                        <td>{$item->ppi_quantidade}</td>
                        <td>{$item->pra_id}</td>
                        <td>{$item->pra_nome}</td>
                        <td>" . number_format($item->pra_valor, 2, ',', '.') . "</td>
                        </tr>
			       ";
        }

        $mensagem = "
		              <h2 style='margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #ccc;'><b>Prezado {$pedido->cli_nome}</b></h2>

		              <p style='margin-bottom: 10px;'>Obrigado por sua compra. Segue abaixo os itens do seu pedido:</p>
		              <table style='width=680px; border:1px;' cellpadding='3' cellspacing='2' border='1'>
		                  <tr>
                                        <th>Quantidade</th>
                                        <th>Codigo do Prato</th>
                                        <th>Nome do Prato</th>
                                        <th>Valor do Prato</th>
		                  </tr>
		                  " . $it . "
		              </table>
		";

        return $mensagem;
    }

    /*
     * Email enviar pedido admin
     */

    public function email_pedido_admin($id_pedido) {

        $pedido = $this->pedido->get_pedido(array('ped_id' => $id_pedido));

        $mensagem = "
		              <h2 style='margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #ccc;'><b>Prezado Administrador</b></h2>

		              <p style='margin-bottom: 10px;'>Foi realizado uma solicitação de pedido. Segue abaixo os itens do pedido:</p>
		              <table style='width=680px; border:1px;' cellpadding='3' cellspacing='2' border='1'>
		                  <tr>
		                      <td>Número do Pedido</td>
		                      <td>Nome do Cliente</td>
		                      <td>Email do Cliente</td>
		                      <td>Telefone do Cliente</td>
		                  </tr>
		                  <tr>
			            <td>{$pedido->ped_id}</td>
			            <td>{$pedido->cli_nome}</td>
			            <td>{$pedido->cli_email}</td>
			            <td>{$pedido->cli_telefone}</td>
			         </tr>
		              </table>
		              <p style='margin-bottom: 10px;'>Para visualizar o pedido acesse a Área do Gerenciador,
                                <a href='" . site_url('gerenciador/pedidos/visualizar/' . $pedido->ped_id) . "'>clicando aqui</a>
		              </p>
		";

        return $mensagem;
    }

    public function email_pedido_admin_alacarte($id_pedido) {

        $pedido = $this->pedido_prato->get_pedido_prato(array('pep_id' => $id_pedido));

        $mensagem = "
		              <h2 style='margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #ccc;'><b>Prezado Administrador</b></h2>

		              <p style='margin-bottom: 10px;'>Foi realizado uma solicitação de pedido à la carte. Segue abaixo os itens do pedido:</p>
		              <table style='width=680px; border:1px;' cellpadding='3' cellspacing='2' border='1'>
		                  <tr>
		                      <td>Número do Pedido</td>
		                      <td>Nome do Cliente</td>
		                      <td>Email do Cliente</td>
		                      <td>Telefone do Cliente</td>
		                  </tr>
		                  <tr>
			            <td>{$pedido->pep_id}</td>
			            <td>{$pedido->cli_nome}</td>
			            <td>{$pedido->cli_email}</td>
			            <td>{$pedido->cli_telefone}</td>
			         </tr>
		              </table>
		              <p style='margin-bottom: 10px;'>Para visualizar o pedido acesse a Área do Gerenciador,
                                <a href='" . site_url('gerenciador/pedidos_pratos/visualizar/' . $pedido->pep_id) . "'>clicando aqui</a>
		              </p>
		";

        return $mensagem;
    }

    /*
     * Email pedido efetuado
     */

    public function email_pedido_enviar($dados) {
        $it = '';


        $i = 0;
        foreach ($dados['post']['teste'] as $produto) {
            if ($i % 3 == 0) {
                $it .= "<tr>";
            }

            $it .= "<td>{$produto}</td>";
            if ($i % 3 == 3) {
                $it .= "</tr>";
            }
            $i++;
        }

        $mensagem = "
		              <h2 style='margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #ccc;'>
                              <b>Prezado {$dados['post']['cliente']}, conforme solicitado no orçamento, segue abaixo os produtos e seus respectivos valores.</b>
                              </h2>

		              <table style='width=600px; border:1px;' cellpadding='0' cellspacing='0'>
		                  <tr>
		                      <td>Produto</td>
		                      <td>Quantidade</td>
		                      <td>Valor</td>
		                  </tr>

		                  " . $it . "

		              </table>
		              <p style='margin-bottom: 10px;'>O valor total do orçamento é R$  " . $dados['post']['valor_pedido'] . "</p>
                              <p style='margin-bottom: 10px;'>Para mais informações entre em contato conosco.</p>

                               <p style='margin-bottom: 10px;'>Atenciosamente, Paraíba Refeições Corporativas..</p>
		";

        return $mensagem;
    }

    public function email_cadastro_efetuado($id_cliente) {

        $cliente = $this->cliente->get_cliente(array('cli_id' => $id_cliente));
        $mensagem = "
                      <h2 style='margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #ccc;'><b>Prezado {$cliente->cli_nome}</b></h2>

                      <p style='margin-bottom: 10px;'>
                        Seu cadastro foi efetuado com sucesso. Segue abaixo os dados de acesso ao Painel do Cliente:
                      </p>

                      <p style='margin-bottom: 10px;'>
                          Email: {$cliente->cli_email}<br>
                          Senha: ************ <small style='color: #ff0000'>(por motivos de segurança sua senha foi criptografada)</small><br>
                      </p>

                      <p style='margin-bottom: 10px;'>
                          Atenciosamente,<br><br>
                          Paraíba Refeições Corporativas.
                      </p>
        ";

        return $mensagem;
    }

    public function email_cadastro_tapete($id_tapete) {

        $tapete = $this->tapete->get_tapete(array('tap_id' => $id_tapete));
        $data_cadastro = dh_for_humans($tapete->tap_data_criacao);
        $mensagem = "
                      <h2 style='margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #ccc;'><b>Novo pedido de tapete realizado!</b></h2>

                      <p style='margin-bottom: 10px;'>
                        Segue os dados do tapete:
                      </p>

                      <p style='margin-bottom: 10px;'>
                          Id do tapete: {$tapete->tap_id}<br>
                          Data do pedido: {$data_cadastro}<br>
                          Nome do cliente: {$tapete->cli_nome}<br>
                          Email do cliente: {$tapete->cli_email}<br>
                      </p>

                      <p style='margin-bottom: 10px;'>
                          Atenciosamente,<br><br>
                          Paraíba Refeições Corporativas.
                      </p>
        ";

        return $mensagem;
    }

    public function email_status_pedido($id_pedido) {

        $pedido = $this->pedido->get_pedido(array('ped_id' => $id_pedido));

        $mensagem = "
                      <h2 style='margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #ccc;'><b>Prezado Cliente.</b></h2>

                      <p style='margin-bottom: 10px;'>
                          O status do pedido foi alterado para: {$pedido->ped_status}
                      </p>

                      <p style='margin-bottom: 10px;'>
                          Atenciosamente,<br><br>
                          Paraíba Refeições Corporativas.
                      </p>
        ";


        return $mensagem;
    }

    public function email_status_pedido_prato($id_pedido) {

        $pedido = $this->pedido_prato->get_pedido_prato(array('pedido_prato.pep_id' => $id_pedido));

        $mensagem = "
                      <h2 style='margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #ccc;'><b>Prezado Cliente.</b></h2>

                      <p style='margin-bottom: 10px;'>
                          O status do pedido foi alterado para: {$pedido->pep_status}
                      </p>

                      <p style='margin-bottom: 10px;'>
                          Atenciosamente,<br><br>
                          Paraíba Refeições Corporativas.
                      </p>
        ";


        return $mensagem;
    }

    public function email_reset_senha($email, $senha, $link_area) {

        $mensagem = "
                      <p>Prezado Cliente,
                      <br><br>
                      Uma nova senha foi gerada para sua conta, para acessar sua
                      conta utilize os novos dados abaixo:
                      </p>
                      <p>
                      Email: {$email}<br>
                      Senha: {$senha}<br>
                      Link: <a href='" . $link_area . "' title='Área de login'>Área de login</a>
                      </p>
                      <br><br>
                      <p>
                      Atenciosamente,<br><br>
                      Paraíba Refeições Corporativas.
                      </p>
        ";

        return $mensagem;
    }

    public function email_contato($dados) {

        $campos = '';
        foreach ($dados as $key => $valor) {

            $campos .= ucfirst($key) . ': ' . $valor . '<br>';
        };

        $mensagem = "
                      <p>
                      {$campos}
                      </p>
                      <p>
                      Atenciosamente,<br><br>
                      Paraíba Refeições Corporativas.
                      </p>
        ";

        return $mensagem;
    }

    public function email_resposta_cotacao($dados) {


        $mensagem = "
                      <div>
                      {$dados}
                      </div>
                      <p>
                      Atenciosamente,<br><br>
                      Paraíba Refeições Corporativas.
                      </p>
        ";

        return $mensagem;
    }

    public function email_resposta_contato() {

        $mensagem = "
                      <p>Prezado Usuário,
                      <br><br>
                      Obrigado pelo seu contato. Nossa equipe entrará em contato o mais breve possível.
                      </p>
                      <br><br>
                      <p>
                      Atenciosamente,<br><br>
                      Paraíba Refeições Corporativas.
                      </p>
        ";

        return $mensagem;
    }

    public function email_orcamento($dados) {

        $campos = '';
        foreach ($dados as $key => $valor) {

            $campos .= ucfirst($key) . ': ' . $valor . '<br>';
        };

        $mensagem = "
                      <p>
                      {$campos}
                      </p>
                      <br><br>
                      <p>
                      Atenciosamente,<br><br>
                      FishBrindes
                      </p>
        ";

        return $mensagem;
    }

    public function email_resposta_orcamento($nome_cliente) {

        $mensagem = "
                      <p>Prezado {$nome_cliente},
                      <br><br>
                      Obrigado pelo seu contato. Nossa equipe entrará em contato o mais breve possível.
                      </p>
                      <br><br>
                      <p>
                      Atenciosamente,<br><br>
                      FishBrindes
                      </p>
        ";

        return $mensagem;
    }






    public function email_pesquisa_empresa($dados)
    {

      $msg = '<h2>DADOS DA PESQUISA:</h2>';
      $msg .= '<table style="width: 100%; border: 1px solid #E4E2E2;">';
      $msg .= '<tr style="background: #E4E2E2">';
      $msg .= '<td style="padding: 5px;"><b>Atendimento:</b></td>';
      $msg .= '<td style="padding: 5px;">'.$dados["atend"].'</td>';
      $msg .= '</tr>';
      $msg .= '<tr>';
      $msg .= '<td style="padding: 5px;"><b>Alimentos:</b></td>';
      $msg .= '<td style="padding: 5px;">'.$dados["alimentos"].'</td>';
      $msg .= '</tr>';
      $msg .= '<tr style="background: #E4E2E2">';
      $msg .= '<td style="padding: 5px;"><b>Bebidas:</b></td>';
      $msg .= '<td style="padding: 5px;">'.$dados["bebidas"].'</td>';
      $msg .= '</tr>';
      $msg .= '<tr>';
      $msg .= '<td style="padding: 5px;"><b>Delivery:</b></td>';
      $msg .= '<td style="padding: 5px;">'.$dados["delivery"].'</td>';
      $msg .= '</tr>';
      $msg .= '<tr style="background: #E4E2E2">';
      $msg .= '<td style="padding: 5px;"><b>Mensagem:</b></td>';
      $msg .= '<td style="padding: 5px;">'.$dados["mensagem"].'</td>';
      $msg .= '</tr>';
      $msg .= '<tr>';
      $msg .= '<td style="width: 30%; padding: 5px;"><b>Empresa:</b></td>';
      $msg .= '<td style="width: 69%; padding: 5px;">'.$dados["empresa"].'</td>';
      $msg .= '</tr>';
      $msg .= '</table>';

      return $msg;
    }

}
