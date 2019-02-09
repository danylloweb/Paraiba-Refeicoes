<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Carrinho_Alacarte extends CI_Controller {

    private $tpl = 'tpl';

    public function __construct() {
        parent::__construct();

        $this->form_validation->set_message('required', '%s é obrigatório');
        $this->form_validation->set_message('valid_email', '%s não possui um valor válido');

        $this->load->model('gerenciador/prato');
        
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
        
        if ($this->session->userdata('tipo_cardapio') == 'marmita') {
            $this->session->unset_userdata('cart_contents');
            $this->session->set_userdata('tipo_cardapio', 'alacarte');
            redirect('carrinho');
        } else {
            $this->session->set_userdata('tipo_cardapio', 'alacarte');
        }
        
        $dados['erro'] = $this->session->flashdata('erro');
        $dados['errocad'] = $this->session->flashdata('errocad');
        $dados['okcad'] = $this->session->flashdata('okcad');
        
        $config = $this->configs->select_by_id(1);
        
        $dados['adressConf'] =  $config->conf_adress;
        
        $dados['preco_quentinha'] = $config->conf_preco_marmita;

        $data_atual = date('Y/m/d');

        $dados['marmita'] = $this->marmita->get_marmita(array('mar_data' => $data_atual));

        if (empty($dados['marmita'])) {
            redirect('atendimento');
        }
        
        $dados['titulo'] = 'Carrinho do À la carte.';

        $this->template->load($this->tpl, 'carrinho_alacarte/index', $dados);
    }
    
    public function remover_marmita($rowid) {

        $this->cart->update(array('rowid' => $rowid, 'qty' => 0));
        redirect('carrinho_alacarte');
    }

    public function atualizar_carrinho() {

        $dados = array();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (count($this->input->post()) > 0) {
                for ($i = 1; $i < count($this->input->post()); $i++) {
                    $dados[] = array('rowid' => $this->input->post($i . '_rowid'), 'qty' => $this->input->post($i . '_qty'));
                }
                $this->cart->update($dados);
                redirect('carrinho_alacarte');
            }
        }
    }


}