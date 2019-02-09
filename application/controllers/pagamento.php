<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pagamento extends CI_Controller {

    private $tpl = 'tpl';

    public function __construct() {
        parent::__construct();

        $this->form_validation->set_message('required', '%s é obrigatório');
        $this->form_validation->set_message('valid_email', '%s não possui um valor válido');
        
        $this->load->model('gerenciador/pedido_prato');
        $this->load->model('gerenciador/prato');
        $this->load->model('gerenciador/prato_categoria');
        $config = $this->configs->select_by_id(1);

        $this->template->set('title', $config->conf_name);
        $this->template->set('description', $config->conf_seo_description);
        $this->template->set('keywords', $config->conf_seo_keywords);
        $this->template->set('emailConf', $config->conf_email);
        $this->template->set('foneConf', $config->conf_phone_one);
        $this->template->set('foneConfTwo', $config->conf_phone_two);
        $this->template->set('adressConf', $config->conf_adress);
    }

    public function index() {
        $dados = array();

        $this->log_in->is_loggedin('cliente', 'identificacao');
        $this->log_in->is_cart($this->cart->contents(), 'carrinho');

        $config = $this->configs->select_by_id(1);

        $dados['preco_quentinha'] = $config->conf_preco_marmita;

        $data_atual = date('Y/m/d');

        $dados['marmita'] = $this->marmita->get_marmita(array('mar_data' => $data_atual));

        if (empty($dados['marmita'])) {
            redirect('atendimento');
        }

        $dados['titulo'] = 'Escolha o Pagamento';

        $this->template->load($this->tpl, 'pagamento/index', $dados);
    }

    public function processar() {

        $this->log_in->is_loggedin('cliente', 'identificacao');
        $this->log_in->is_cart($this->cart->contents(), 'home');

        $sess_cliente = $this->session->userdata('log_cliente');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dadosPost = $this->input->post();

            $valor1 = str_replace(".", "", $dadosPost['ped_dinheiro_troco']);
            $valor_real = str_replace(",", ".", $valor1);

            $dadosPost['ped_dinheiro_troco'] = $valor_real;

            $pedido = array('ped_cli_id' => $sess_cliente['id_user'],
                'ped_valor_pedido' => $this->cart->total(), 'ped_data_criacao' => date("Y-m-d H:i:s"),
                'ped_status' => 'pendente', 'ped_ip' => $_SERVER['REMOTE_ADDR'],
                'ped_dinheiro_troco' => $dadosPost['ped_dinheiro_troco'], 'ped_tipo_pagamento' => $dadosPost['ped_tipo_pagamento']);

            if (($id_pedido = $this->pedido->inserir($pedido, $this->cart->contents())) > 0) {

                $email_admin = $this->template_emails->email_pedido_admin($id_pedido);
                $this->sender->enviar_email(
                        $this->configs->get_smtpuser(), $this->configs->get_titulo(), $this->configs->get_email(), 'Solicitação de marmita.', $email_admin
                );
                
                $email_cliente = $this->template_emails->email_pedido_efetuado($id_pedido);
                $this->sender->enviar_email(
                        $this->configs->get_smtpuser(), $this->configs->get_titulo(), $sess_cliente['email'], 'Dados da marmita.', $email_cliente
                );

            $this->cart->destroy();
            redirect('obrigado');            

            } else {
                $this->session->set_flashdata('erro', 'Falha ao processar o pedido.');
                redirect('carrinho');
            }
        }
    }
    
    public function processar_alacarte() {

        $this->log_in->is_loggedin('cliente', 'identificacao');
        $this->log_in->is_cart($this->cart->contents(), 'home');

        $sess_cliente = $this->session->userdata('log_cliente');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $dadosPost = $this->input->post();

            $valor1 = str_replace(".", "", $dadosPost['ped_dinheiro_troco']);
            $valor_real = str_replace(",", ".", $valor1);

            $dadosPost['pep_dinheiro_troco'] = $valor_real;

            $pedido = array('pep_cli_id' => $sess_cliente['id_user'],
                'pep_valor_pedido' => $this->cart->total(), 'pep_data_criacao' => date("Y-m-d H:i:s"),
                'pep_status' => 'pendente', 'pep_ip' => $_SERVER['REMOTE_ADDR'],
                'pep_dinheiro_troco' => $dadosPost['ped_dinheiro_troco'], 'pep_tipo_pagamento' => $dadosPost['ped_tipo_pagamento']);

            if (($id_pedido = $this->pedido_prato->inserir($pedido, $this->cart->contents())) > 0) {

                $email_admin = $this->template_emails->email_pedido_admin_alacarte($id_pedido);
                $this->sender->enviar_email(
                        $this->configs->get_smtpuser(), $this->configs->get_titulo(), $this->configs->get_email(), 'Solicitação de prato À la Carte.', $email_admin
                ); 
                
                $email_cliente = $this->template_emails->email_pedido_efetuado_prato($id_pedido);
                $this->sender->enviar_email(
                        $this->configs->get_smtpuser(), $this->configs->get_titulo(), $sess_cliente['email'], 'Dados do pedido - Paraíba Refeições.', $email_cliente
                );

            $this->cart->destroy();
            redirect('obrigado');            

            } else {
                $this->session->set_flashdata('erro', 'Falha ao processar o pedido.');
                redirect('carrinho_alacarte');
            }
        }
    }

}