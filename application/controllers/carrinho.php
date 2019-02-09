<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Carrinho extends CI_Controller {

    private $tpl = 'tpl';

    public function __construct() {
        parent::__construct();

        $this->form_validation->set_message('required', '%s é obrigatório');
        $this->form_validation->set_message('valid_email', '%s não possui um valor válido');

        $this->load->model('gerenciador/pedido');

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

        if ($this->session->userdata('tipo_cardapio') == 'alacarte') {
            $this->session->unset_userdata('cart_contents');
            $this->session->set_userdata('tipo_cardapio', 'marmita');
            redirect('carrinho');
        } else {
            $this->session->set_userdata('tipo_cardapio', 'marmita');
        }
        
        $dados['erro'] = $this->session->flashdata('erro');
        $dados['errocad'] = $this->session->flashdata('errocad');
        $dados['okcad'] = $this->session->flashdata('okcad');

        $config = $this->configs->select_by_id(1);
        
        $dados['preco_quentinha'] =  $config->conf_preco_marmita;
        
        $data_atual = date('Y/m/d');
        
        $dados['marmita'] = $this->marmita->get_marmita(array('mar_data' => $data_atual));
        
        if (empty($dados['marmita'])) {
            redirect('atendimento');
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->cart->insert($this->input->post());
        }
//        print_r($this->session->all_userdata());        
        $dados['titulo'] = 'Carrinho';

        $this->template->load($this->tpl, 'carrinho/index', $dados);
    }

    public function remover_marmita($rowid) {

        $this->cart->update(array('rowid' => $rowid, 'qty' => 0));
        redirect('carrinho');
    }

    public function atualizar_carrinho() {

        $dados = array();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (count($this->input->post()) > 0) {
                for ($i = 1; $i < count($this->input->post()); $i++) {
                    $dados[] = array('rowid' => $this->input->post($i . '_rowid'), 'qty' => $this->input->post($i . '_qty'));
                }
                $this->cart->update($dados);
                redirect('carrinho');
            }
        }
    }

    public function finalizar() {

        $this->log_in->is_cart($this->cart->contents(), 'carrinho');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->form_validation->set_rules('ped_nome_cliente', 'Nome', 'required|trim|strip_tags');
            $this->form_validation->set_rules('ped_email_cliente', 'Email', 'required|trim|strip_tags|valid_email');
            $this->form_validation->set_rules('ped_telefone_cliente', 'Telefone', 'required|trim|strip_tags');
            $this->form_validation->set_rules('ped_cidade', 'Cidade', 'required|trim|strip_tags');

            if (!$this->form_validation->run()) {

                $this->session->set_flashdata('errocad', validation_errors());

                redirect('carrinho');
            } else {

                $pedido = $this->input->post();

                $pedido['ped_ip'] = $_SERVER['REMOTE_ADDR'];
                $pedido['ped_status'] = 'pendente';
                $pedido['ped_data_criacao'] = date("Y-m-d H:i:s");

                if ($id_pedido = $this->pedido->inserir($pedido, $this->cart->contents())) {

                    $email_admin = $this->template_emails->email_pedido_admin($id_pedido);

                    $this->sender->enviar_email(
                            $this->configs->get_smtpuser(), $this->configs->get_titulo(), $this->configs->get_email(), 'Solicitação de Cotação.', $email_admin
                    );
//                    $this->cart->destroy();
                    $this->session->set_flashdata('okcad', 'Cotação enviada com sucesso, entraremos em contato em breve.');
                    redirect('cotacao#send');
                } else {
                    $this->session->set_flashdata('errocad', 'Sua cotação não foi enviada, entre em contato conosco.');
                    redirect('cotacao#send');
                }
            }
        }
    }

}
