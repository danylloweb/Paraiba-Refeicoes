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

        foreach ($this->pedido->get_pedido($id_pedido) as $pedido)
            ;
        $itens_pedido = $this->pedido->listar_itens_pedido($id_pedido);
        $it = '';
        foreach ($itens_pedido as $itens) {
            $it .= "
			         <tr>
			            <td>{$itens->nome_produto}</td>
			            <td>{$itens->quantidade}</td>
			            <td>{$itens->valor}</td>
			            <td>" . number_format(($itens->valor * $itens->quantidade), 2, ',', '.') . "</td>
			         </tr>
			       ";
        }
        foreach ($this->cliente->get_cliente($pedido->id_cliente) as $cliente)
            ;

        $mensagem = "
		              <h2 style='margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #ccc;'><b>Prezado {$cliente->nome}</b></h2>
		              
		              <p style='margin-bottom: 10px;'>Obrigado por sua compra. Segue abaixo os itens do seu pedido:</p>
		              <table style='width=600px; border:1px;' cellpadding='0' cellspacing='0'>
		                  <tr>
		                      <td>Produto</td>
		                      <td>Quantidade</td>
		                      <td>Valor Unit.</td>
		                      <td>Total</td>
		                  </tr>
		                  " . $it . "
		              </table>
		              <p style='margin-bottom: 10px;'>Para acompanhar o processo do seu pedido acesse a Área do Cliente, 
                                <a href='" . base_url('clientes') . "'>clicando aqui</a>
		              </p>  
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

              $it  .= "<td>{$produto}</td>";
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
		              <p style='margin-bottom: 10px;'>O valor total do orçamento é R$  ". $dados['post']['valor_pedido'] ."</p> 
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
                      <h2 style='margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #ccc;'><b>Prezado Funcionário.</b></h2>
        
                      <p style='margin-bottom: 10px;'>
                          O status do pedido de código {$pedido->ped_id} foi alterado para: {$pedido->ped_status}
                      </p>
                          
                      <p style='margin-bottom: 10px;'>
                          Para acompanhar o seu pedido acesse a Área do Gerenciador.<br>
                          Link Área do Gerenciador: <a href='" . base_url('gerenciador/pedidos/visualizar') . "/" . $id_pedido . "'>Link Pedido.</a>
                      </p>
                      
                      <p style='margin-bottom: 10px;'>
                          Atenciosamente,<br><br>
                          Paraíba Refeições Corporativas..                    
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

}
